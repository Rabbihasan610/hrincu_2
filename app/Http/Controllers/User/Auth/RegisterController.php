<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use Illuminate\View\View;
use App\Rules\ValidUsername;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
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

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return $request->wantsJson()
                ? $this->errorResponse($validator->errors()->first(), 422, $validator->errors())
                : back()->withErrors($validator)->withInput();
        }

        if (!verifyCaptcha()) {
            $message = 'Invalid captcha provided';
            return $request->wantsJson()
                ? $this->errorResponse($message, 422)
                : back()->with('error', $message)->withInput();
        }

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->createUserRelationships($user, $request);

        Auth::login($user);

        if ($request->wantsJson()) {
            return $this->successResponse([
                'user' => $user,
                'redirect' => RouteServiceProvider::HOME
            ], 'Registration completed successfully');
        }

        return redirect(RouteServiceProvider::HOME)
            ->with('success', 'Registration completed successfully');
    }

    protected function validator(array $data)
    {
        $general = gs();
        $userType = $data['user_type'] ?? 'job_seeker';

        $rules = [
            'user_type' => 'required|in:job_seeker,job_provider',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|unique:users|regex:/^([0-9]*)$/',
            'password' => ['required', 'confirmed', $this->getPasswordValidationRules()],
            'username' => ['required', 'unique:users', 'min:6'],
            'captcha' => 'sometimes|required',
            'agree' => $general->agree ? 'required' : 'nullable',
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
                'years_of_experience' => 'required|integer|min:0',
                'preferred_sectors' => 'required|array',
                'preferred_job_type' => 'required|in:full-time,part-time,contract,freelance',
                'resume' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            ]);
        }

        return Validator::make($data, $rules, $this->validationMessages());
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
}
