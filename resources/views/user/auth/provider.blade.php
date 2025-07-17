@extends('web.layouts.frontend', ['title' => 'Sign In'])

@section('content')
@php
    $policyPages = getContent('policy_pages.element', false, null, true);
    $type = request()->type ?? 'service-supplier';
@endphp

<x-breadcrumb title="Registration as Service Provider" />

<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-4xl mx-auto my-4">
        <div class="bg-blue-800 text-white p-4 rounded-t-lg text-center text-xl font-semibold">
            @lang('Registration Form')
        </div>

        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mt-4 text-sm">
            @lang('Join HR incubators network of certified service providers and offer your expertise in structured, learning, consultancy, and institutional support. Please fill out the form below.')
        </div>

        @include('user.auth.navigation')

       <form action="{{ route('user.provider.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-6">
                <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="@lang('Service Provider / Company Name')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4">
                <input type="text" name="entity_type" value="{{ old('entity_type') }}" placeholder="@lang('Type of Entity')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2">@lang('Areas of Service Provided')</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="recruitment" {{ in_array('recruitment', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Recruitment Services')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="training" {{ in_array('training', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Training & Development Services')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="outsourcing" {{ in_array('outsourcing', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Outsourcing & Operational Support')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="psychological" {{ in_array('psychological', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Psychological & Health Support')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="call_center" {{ in_array('call_center', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Call Center & Contact Services')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="hr_tech" {{ in_array('hr_tech', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('HR Tech Solutions')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="consulting" {{ in_array('consulting', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Organizational Consulting')</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="other" {{ in_array('other', old('services', [])) ? 'checked' : '' }} class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700">@lang('Other please specify')</span>
                    </label>
                </div>
                <input type="text" name="other_service" value="{{ old('other_service') }}" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2" placeholder="@lang('If Other please specify')">
            </div>

            <div class="mt-6">
                <input type="text" name="commercial_registration" value="{{ old('commercial_registration') }}" placeholder="@lang('Commercial Registration Number (If available)')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4">
                <input type="text" name="contact_person" value="{{ old('contact_person') }}" placeholder="@lang('Contact Person Name')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="@lang('Mobile')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="@lang('Email Address')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm emailExist"></span>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <select name="city" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('City / Region')</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="text" name="website" value="{{ old('website') }}" placeholder="@lang('Website (if available)')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2">@lang('Preferred Communication method')</label>
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="communication_method" value="email" {{ old('communication_method') == 'email' ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2 text-gray-700">@lang('Email')</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="communication_method" value="phone_call" {{ old('communication_method') == 'phone_call' ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2 text-gray-700">@lang('Phone Call')</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="communication_method" value="whatsapp" {{ old('communication_method') == 'whatsapp' ? 'checked' : '' }} class="form-radio text-blue-600">
                        <span class="ml-2 text-gray-700">@lang('WhatsApp')</span>
                    </label>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2">@lang('Brief Summary of Your Experience and Specialization')</label>
                <textarea name="experience" rows="6" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('experience') }}</textarea>
            </div>

            <div class="col-span-full form-group my-3">
                <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="col-span-full form-group my-2">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-700 text-white p-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    @lang('Submit Register')
                </button>
            </div>
       </form>

    </div>
</section>
@endsection

@push('style')

@endpush


@push('script')
    @include('user.auth.js')
@endpush
