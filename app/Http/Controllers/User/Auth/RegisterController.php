<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Constants\Status;
use App\Models\UserLogin;
use Illuminate\View\View;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\AdminNotification;
use App\Models\PersonalInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\ApplicationInformation;
use Illuminate\Auth\Events\Registered;
use App\Models\PreferredJobInformation;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('registration.status');
    }

    public function showRegistrationForm(Request $request): View
    {
       $countries = Country::orderByRaw('ISNULL(sort_order), sort_order')->get();

       if(request()->type == 'service-supplier'){
            $view = 'register';
       }else{
            $view = 'register';
       }

       $type = $request->type ?? 'service-supplier';

        return view('user.auth.' .$view, compact('countries', 'type'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $this->validator($request->all())->validate();

        if(preg_match("/[^a-z0-9_]/", trim($request->username))){
            $notify[] = ['info', 'Username can contain only small letters, numbers and underscore.'];
            $notify[] = ['error', 'No special character, space or capital letters in username.'];
            return back()->withNotify($notify)->withInput($request->all());
        }

        if(!verifyCaptcha()){
            $notify[] = ['error','Invalid captcha provided'];
            return back()->withNotify($notify);
        }


        $exist = User::where('mobile',$request->mobile)->first();


        if ($exist) {
            $notify[] = ['error', 'The mobile number already exists'];
            return back()->withNotify($notify)->withInput();
        }

        $user = $this->create($request->all());

        //return $user;

        event(new Registered($user));

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
            $userdetail->marital_status = $request->marital_status ?? null;
            $userdetail->save();
        }

        Auth::login($user);

        $notify[] = ['success','Registration completed successfully'];
        return redirect(RouteServiceProvider::HOME)->withNotify($notify);
    }

    protected function validator(array $data)
    {
        $general = gs();

        $passwordValidation = Password::min(6);

        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $agree = 'nullable';

        if ($general->agree) {
            $agree = 'required';
        }

        $is_name = 'nullable';

        if ($data['user_type'] == 'job_seeker') {
            $is_name = 'required';
        }


        $validate = Validator::make($data, [
            'user_type' => 'required|in:job_seeker,job_provider',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|unique:users|regex:/^([0-9]*)$/',
            'password' => ['required','confirmed'],
            'username' => 'required|unique:users|min:6',
            'captcha' => 'sometimes|required',
            'agree' => $agree,
            'name' => [$is_name, 'string', 'max:255'],
        ]);

        return $validate;

    }

    protected function create(array $data)
    {
        //User Create

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


    public function checkUser(Request $request){
        $exist['data'] = false;
        $exist['type'] = null;
        if ($request->email) {
            $exist['data'] = User::where('email',$request->email)->exists();
            $exist['type'] = 'email';
        }
        if ($request->mobile) {
            $exist['data'] = User::where('mobile',$request->mobile)->exists();
            $exist['type'] = 'mobile';
        }
        if ($request->username) {
            $exist['data'] = User::where('username',$request->username)->exists();
            $exist['type'] = 'username';
        }
        return response($exist);
    }
}
