<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Constants\Status;
use App\Models\UserLogin;
use Illuminate\View\View;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Models\AdminNotification;
use Illuminate\Http\JsonResponse;
use App\Models\PersonalInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ApplicationInformation;
use Illuminate\Auth\Events\Registered;
use App\Models\PreferredJobInformation;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('registration.status');
    }

    public function showRegistrationForm(Request $request): View|JsonResponse
    {
        $countries = Country::orderByRaw('ISNULL(sort_order), sort_order ASC')->get();
        $cities = City::orderBy('name')->get();

        $type = $request->type ?? 'job-seeker';
        $view = match($type) {
            'employer' => 'employer',
            'service-provider' => 'provider',
            default => 'job-seeker'
        };

        if ($request->wantsJson()) {
            return $this->successResponse([
                'countries' => $countries,
                'cities' => $cities,
                'type' => $type
            ]);
        }

        return view('user.auth.' . $view, compact('countries', 'type', 'cities'));
    }

    public function store(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return $request->wantsJson()
                ? $this->errorResponse($validator->errors()->first(), 422, $validator->errors())
                : back()->withErrors($validator)->withInput();
        }


        $user = $this->create($request->all());

        event(new Registered($user));

        Auth::login($user);

        if($user){
            if($user->user_type == 'job_provider'){
                $company = new Company();
                $company->user_id = $user->id;
                $company->save();
            }

            if($user->user_type == 'job_seeker'){
                PersonalInformation::create(['user_id'=>$user->id]);
                ApplicationInformation::create(['user_id'=>$user->id]);
                PreferredJobInformation::create(['user_id'=>$user->id]);
            }

            $userdetail = new UserDetail();
            $userdetail->user_id = $user->id;
            $userdetail->dateofbirth =  $request->date_of_birth;
            $userdetail->gender = $request->gender;
            $userdetail->experience = $request->years_of_experience;
            $userdetail->qualification = $request->academic_qualification;
            $userdetail->english_proficiency = $request->english_proficiency;
            $userdetail->key_skills = $request->key_skills;
            $userdetail->preferred_sectors = $request->preferred_sectors;
            $userdetail->preferred_job_type = $request->preferred_job_type;
            $userdetail->marital_status = $request->marital_status ?? null;
            $userdetail->id_number = $request->id_number;

            if ($request->hasFile('document')) {

                $request->validate([
                    'document' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048'
                ]);

                $file = $request->file('document');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('documents', $fileName, 'public');

                $userdetail->document = $filePath;
            }

            $userdetail->save();
        }

        Auth::login($user);

        $notify[] = ['success','Registration completed successfully'];

        return redirect(RouteServiceProvider::HOME)->withNotify($notify);
    }

    protected function validator(array $data)
    {
        $general = gs();

        $userType = $data['user_type'] ?? 'job_seeker';

        $rules = [
            'user_type' => 'required|in:job_seeker,job_provider,employee',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|unique:users|regex:/^[0-9]+$/',
            'password' => ['required', 'confirmed'],
            'username' => ['required', 'unique:users', 'min:6', 'alpha_dash'],
        ];

        if ($userType === 'job_seeker') {
            $rules = array_merge($rules, [
                'name' => 'required|string|max:255',
                'date_of_birth' => 'required|date|before:-18 years',
                'gender' => 'required|in:male,female,other',
                'id_number' => 'required|string|max:50',
                'city_region' => 'required|exists:cities,id',
                'marital_status' => 'required|in:single,married,divorced,widowed',
                'academic_qualification' => 'required|string|max:255',
                'field_of_study' => 'required|string|max:255',
                'english_proficiency' => 'required|in:native,fluent,intermediate,basic',
                'key_skills' => 'required|string|max:500',
                'years_of_experience' => 'required|integer|min:0|max:50',
                'preferred_sectors' => 'required',
                'preferred_job_type' => 'required|in:full-time,part-time,contract,freelance',
                'document' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120', // 5MB
            ]);
        }

        return Validator::make($data, $rules, $this->validationMessages());
    }

    protected function validationMessages()
    {
        return [
            'user_type.required' => 'Please select your user type',
            'user_type.in' => 'Invalid user type selected',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'mobile.required' => 'Mobile number is required',
            'mobile.unique' => 'This mobile number is already registered',
            'mobile.regex' => 'Please enter a valid mobile number',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'username.required' => 'Username is required',
            'username.unique' => 'This username is already taken',
            'username.min' => 'Username must be at least 6 characters',
            'username.alpha_dash' => 'Username can only contain letters, numbers, dashes and underscores',
            'agree.required' => 'You must agree to the terms and conditions',
            'agree.accepted' => 'You must agree to the terms and conditions',

            // Job seeker specific messages
            'name.required' => 'Full name is required',
            'date_of_birth.required' => 'Date of birth is required',
            'date_of_birth.before' => 'You must be at least 18 years old',
            'gender.required' => 'Please select your gender',
            'id_number.required' => 'ID number is required',
            'city_region.required' => 'Please select your city/region',
            'marital_status.required' => 'Please select your marital status',
            'academic_qualification.required' => 'Academic qualification is required',
            'field_of_study.required' => 'Field of study is required',
            'english_proficiency.required' => 'Please select your English proficiency',
            'key_skills.required' => 'Please enter your key skills',
            'years_of_experience.required' => 'Please enter years of experience',
            'preferred_sectors.required' => 'Please select at least one preferred sector',
            'preferred_job_type.required' => 'Please select your preferred job type',
            'document.mimes' => 'Resume must be a PDF, DOC, DOCX, JPG or PNG file',
            'document.max' => 'Resume must be less than 5MB',
        ];
    }


    public function checkUser(Request $request): JsonResponse
    {
        $field = match(true) {
            $request->has('email') => 'email',
            $request->has('mobile') => 'mobile',
            $request->has('username') => 'username',
            default => null
        };

        if (!$field) {
            return $this->errorResponse('No valid field provided', 400);
        }

        $exists = User::where($field, $request->$field)->exists();

        return $this->successResponse([
            'exists' => $exists,
            'type' => $field,
            'message' => $exists ? "This $field is already taken" : "This $field is available"
        ]);
    }

    protected function getPasswordValidationRules()
    {

        $rules = Password::min(8);

        if (gs()->secure_password) {
            $rules = $rules
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised();
        }

        return $rules;
    }

    protected function create(array $data)
    {
       // return $data;
        $user = new User();
        $user->name = isset($data['name']) ? $data['name'] : null;
        $user->user_type = $data['user_type'];
        $user->email = strtolower($data['email']);
        $user->password = Hash::make($data['password']);
        $user->username = $data['username'];
        $user->mobile = $data['mobile'];
        $user->ev = gs()->ev ? Status::NO : Status::YES;
        $user->sv = gs()->sv ? Status::NO : Status::YES;
        $user->profile_complete = Status::YES;
        $user->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New member registered';
        $adminNotification->click_url =  urlPath('admin.users.detail',$user->id);
        $adminNotification->save();


        //Login Log Create
        $ip = getRealIP();
        $exist = UserLogin::where('user_ip',$ip)->first();
        $userLogin = new UserLogin();

        //Check exist or not
        if ($exist) {
            $userLogin->longitude =  $exist->longitude;
            $userLogin->latitude =  $exist->latitude;
            $userLogin->city =  $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country =  $exist->country;
        }else{
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude =  @implode(',',$info['long']);
            $userLogin->latitude =  @implode(',',$info['lat']);
            $userLogin->city =  @implode(',',$info['city']);
            $userLogin->country_code = @implode(',',$info['code']);
            $userLogin->country =  @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();


        return $user;
    }

}
