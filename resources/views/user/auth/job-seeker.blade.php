@extends('web.layouts.frontend', ['title' => 'Sign In'])

@section('content')
@php
    $policyPages = getContent('policy_pages.element', false, null, true);

    $type = request()->type ?? 'service-supplier';
@endphp

<x-breadcrumb title="Registration as Job Seeker" />

<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-4xl mx-auto my-4">
        <div class="bg-blue-800 text-white p-4 rounded-t-lg text-center text-xl font-semibold">
            @lang('Registration Form')
        </div>

        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mt-4 text-sm">
            @lang('This form is for individuals who want to register in our job seeker database.')
        </div>


        @include('user.auth.navigation')


        <form id="registrationFormJobSeeker" class="mt-6" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_type" value="job_seeker">

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="col-span-full form-group">
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="{{ __('User Name') }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="col-span-full form-group">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Full Name') }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center border border-gray-300 rounded-md form-group">
                    <input type="text" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="{{ __('Date of Birth') }}" class="w-full p-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 border-r-0">
                    <span class="p-2 bg-gray-50 border-l border-gray-300 rounded-r-md text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="form-group">
                    <select name="gender" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Gender')</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>@lang('Male')</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>@lang('Female')</option>
                        <option value="other"  {{ old('gender') == 'other' ? 'selected' : '' }}>@lang('Other')</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="id_number" name="{{ old('id_number') }}" placeholder="{{ __('ID/Iqama Number') }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" class="w-full p-2 checkUser border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="emailExist text-red-500 text-sm"></span>
                </div>

                <div class="form-group">
                    <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="{{ __("Mobile") }}" class="w-full p-2 checkUser border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="mobileExist text-red-500 text-sm"></span>
                </div>
                <div class="form-group">
                    <select name="city_region" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">{{ __('City / Region') }}</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_region') == $city->id ? 'selected' : ''  }}>{{ $city?->lang('name') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="marital_status" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" >{{__('Marital Status') }}</option>
                        <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>@lang('Single')</option>
                        <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>@lang('Married')</option>
                        <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>@lang('Divorced')</option>
                        <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>@lang('Widowed')</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="academic_qualification" value="{{ old('academic_qualification') }}" placeholder="{{ __('Academic Qualification') }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <input type="text" name="field_of_study" value="{{ old('field_of_study') }}" placeholder="{{ __('Field of Study') }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <select name="english_proficiency" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('English Proficiency')</option>
                        <option value="native" {{ old('english_proficiency') == 'native' ? 'selected' : '' }}>@lang('Native')</option>
                        <option value="fluent" {{ old('english_proficiency') == 'fluent' ? 'selected' : '' }}>
                            @lang('Fluent')
                        </option>
                        <option value="intermediate" {{ old('english_proficiency') == 'intermediate' ? 'selected' : '' }}>@lang('Intermediate')</option>
                        <option value="basic" {{ old('english_proficiency') == 'basic' ? 'selected' : '' }}>@lang('Basic')</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="key_skills" value="{{ old('key_skills') }}" placeholder="@lang('Key Skills')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <input type="number" name="years_of_experience" value="{{ old('years_of_experience') }}" placeholder="@lang('Years of Experience')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <select name="preferred_sectors" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="0">@lang('Preferred Sectors')</option>
                        @foreach(\App\Data\SectorsData::forJobSeekers() as $sector)
                            <option value="{{ $sector->id }}" {{ old('preferred_sectors') == $sector->id ? 'selected' : ''  }}> {{ app()->getLocale() == 'ar' ? $sector->name_ar : $sector->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-full form-group">
                    <select name="preferred_job_type" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Preferred Job Type')</option>
                        <option value="full-time" {{ old('preferred_job_type') == 'full-time' ? 'selected' : '' }}>@lang('Full-time')</option>
                        <option value="part-time" {{ old('preferred_job_type') == 'part-time' ? 'selected' : '' }}>@lang('Part-time')</option>
                        <option value="contract" {{ old('preferred_job_type') == 'contract' ? 'selected' : '' }}>@lang('Contract')</option>
                        <option value="freelance" {{ old('preferred_job_type') == 'freelance' ? 'selected' : '' }}>@lang('Freelance')</option>
                    </select>
                </div>

                <div class="col-span-full form-group">
                    <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="col-span-full form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <x-file-upload input-name="document" />

            <div class="mt-6">
                <button type="submit" id="submitBtn" class="w-full bg-blue-700 text-white p-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Submit Register
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('style')
<style>
    .error {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .border-red-500 {
        border-color: #ef4444;
    }
    .border-gray-300 {
        border-color: #d1d5db;
    }
</style>
@endpush


@push('script')
    @include('user.auth.js')
@endpush
