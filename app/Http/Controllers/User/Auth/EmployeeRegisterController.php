<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Constants\Status;
use App\Models\UserLogin;
use Illuminate\View\View;
use App\Models\UserDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class EmployeeRegisterController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('registration.status');
    }

    public function showRegistrationForm(Request $request): View
    {
        $cities = City::orderBy('name')->get();
        $type = $request->type ?? 'employee';

        return view('user.auth.employee', compact('cities', 'type'));
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = $this->create($request->all());

        $this->createCompanyDetails($user, $request->all());

        event(new Registered($user));
        Auth::login($user);

        $notify[] = ['success', 'Registration completed successfully'];
        return redirect()->route('user.home')->withNotify($notify);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required|string|max:255',
            'business_sector' => 'required|string|max:255',
            'commercial_registration' => 'nullable|string|max:100',
            'contact_person_name' => 'required|string|max:255',
            'job_title_position' => 'required|string|max:255',
            'mobile' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|unique:users',
            'city_region' => 'required|exists:cities,id',
            'num_employees' => 'nullable|string|max:50',
            'hiring_needs' => 'required|in:yes,no',
            'communication_method' => 'required|array',
            'communication_method.*' => 'in:email,phone_call,whatsapp',
            'brief_description' => 'required|string|max:1000',

            'password' => ['required', 'confirmed', Password::min(8)],
        ], $this->validationMessages());
    }

    protected function validationMessages()
    {
        return [
            'company_name.required' => 'Company/organization name is required',
            'business_sector.required' => 'Please select your business sector',
            'contact_person_name.required' => 'Contact person name is required',
            'job_title_position.required' => 'Job title/position is required',
            'mobile.required' => 'Mobile number is required',
            'mobile.unique' => 'This mobile number is already registered',
            'email.required' => 'Email address is required',
            'email.unique' => 'This email is already registered',
            'city_region.required' => 'Please select your city/region',
            'hiring_needs.required' => 'Please specify if you have hiring needs',
            'communication_method.required' => 'Please select at least one communication method',
            'brief_description.required' => 'Please provide a brief description of your business',

            'username.required' => 'Username is required',
            'username.unique' => 'This username is already taken',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
        ];
    }

    protected function create(array $data)
    {
        $user = new User();
        $user->user_type = 'employee';
        $user->username = Str::slug($data['company_name'], '_' ) . '_' . time();
        $user->email = strtolower($data['email']);
        $user->password = Hash::make($data['password']);
        $user->mobile = $data['mobile'];
        $user->ev = gs()->ev ? Status::NO : Status::YES;
        $user->sv = gs()->sv ? Status::NO : Status::YES;
        $user->profile_complete = Status::YES;
        $user->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New employee registered';
        $adminNotification->click_url = urlPath('admin.users.detail', $user->id);
        $adminNotification->save();

        $this->createLoginLog($user);
        return $user;
    }

    protected function createCompanyDetails(User $user, array $data)
    {
        $company = new Company();
        $company->user_id = $user->id;
        $company->name = $data['company_name'];
        $company->business_sector = $data['business_sector'];
        $company->commercial_registration = $data['commercial_registration'] ?? null;
        $company->contact_person = $data['contact_person_name'];
        $company->contact_position = $data['job_title_position'];
        $company->city_id = $data['city_region'];
        $company->num_employees = $data['num_employees'] ?? null;
        $company->hiring_needs = $data['hiring_needs'];
        $company->communication_method = json_encode($data['communication_method']);
        $company->description = $data['brief_description'];
        $company->save();
    }

    protected function createLoginLog(User $user)
    {
        $ip = getRealIP();
        $exist = UserLogin::where('user_ip', $ip)->first();
        $userLogin = new UserLogin();

        if ($exist) {
            $userLogin->longitude = $exist->longitude;
            $userLogin->latitude = $exist->latitude;
            $userLogin->city = $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country = $exist->country;
        } else {
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude = @implode(',', $info['long']);
            $userLogin->latitude = @implode(',', $info['lat']);
            $userLogin->city = @implode(',', $info['city']);
            $userLogin->country_code = @implode(',', $info['code']);
            $userLogin->country = @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip = $ip;
        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();
    }

    public function checkUser(Request $request)
    {
        $field = $request->has('email') ? 'email' : ($request->has('mobile') ? 'mobile' : ($request->has('username') ? 'username' : null));

        if (!$field) {
            return response()->json(['error' => 'Invalid request'], 400);
        }

        $exists = User::where($field, $request->$field)->exists();

        return response()->json([
            'exists' => $exists,
            'type' => $field,
            'message' => $exists ? "This $field is already taken" : "This $field is available"
        ]);
    }
}
