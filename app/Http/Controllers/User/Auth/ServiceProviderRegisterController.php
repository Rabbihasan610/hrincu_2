<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Constants\Status;
use App\Models\UserLogin;
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

class ServiceProviderRegisterController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('registration.status');
    }

    public function showRegistrationForm()
    {
        $cities = City::active()->get();
        $pageTitle = "Registration as Service Provider";
        return view('user.auth.service_provider_register', compact('pageTitle', 'cities'));
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
            'entity_type' => 'required|string|max:255',
            'services' => 'required|array|min:1',
            'services.*' => 'in:recruitment,training,outsourcing,psychological,call_center,hr_tech,consulting,other',
            'other_service' => 'required_if:services,other|string|max:255|nullable',
            'commercial_registration' => 'nullable|string|max:100',
            'contact_person' => 'required|string|max:255',
            'mobile' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|unique:users',
            'city' => 'required|exists:cities,id',
            'website' => 'nullable|url|max:255',
            'communication_method' => 'required',
            'experience' => 'required|string|max:1000',
            'password' => ['required', 'confirmed', Password::min(8)],
        ], $this->validationMessages());
    }

    protected function validationMessages()
    {
        return [
            'company_name.required' => 'Company/organization name is required',
            'entity_type.required' => 'Type of entity is required',
            'services.required' => 'Please select at least one service area',
            'contact_person.required' => 'Contact person name is required',
            'mobile.required' => 'Mobile number is required',
            'mobile.unique' => 'This mobile number is already registered',
            'email.required' => 'Email address is required',
            'email.unique' => 'This email is already registered',
            'city.required' => 'Please select your city/region',
            'website.url' => 'Please enter a valid website URL',
            'communication_method.required' => 'Please select at least one communication method',
            'experience.required' => 'Please provide a brief description of your experience',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
        ];
    }

    protected function create(array $data)
    {
        $user = new User();
        $user->user_type = 'job_provider';
        $user->username = Str::slug($data['company_name'], '_') . '_' . time();
        $user->email = strtolower($data['email']);
        $user->password = Hash::make($data['password']);
        $user->mobile = $data['mobile'];
        $user->ev = gs()->ev ? Status::NO : Status::YES;
        $user->sv = gs()->sv ? Status::NO : Status::YES;
        $user->profile_complete = Status::YES;
        $user->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New service provider registered';
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
        $company->entity_type = $data['entity_type'];
        $company->services = json_encode($data['services']);
        $company->other_service = $data['other_service'] ?? null;
        $company->commercial_registration = $data['commercial_registration'] ?? null;
        $company->contact_person = $data['contact_person'];
        $company->city_id = $data['city'];
        $company->website = $data['website'] ?? null;
        $company->communication_method = json_encode($data['communication_method']);
        $company->description = $data['experience'];
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
            'data' => $exists,
            'type' => $field,
            'exists' => $exists,
            'message' => $exists ? "This $field is already taken" : "This $field is available"
        ]);
    }
}
