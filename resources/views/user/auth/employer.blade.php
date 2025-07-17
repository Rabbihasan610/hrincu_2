@extends('web.layouts.frontend', ['title' => __('Sign In')])

@section('content')
@php
    $policyPages = getContent('policy_pages.element', false, null, true);
    $type = request()->type ?? 'service-supplier';
@endphp

<x-breadcrumb title="Registration as Employee" />

<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-4xl mx-auto overflow-hidden">

        <h2 class="bg-[#0D47A1] text-white text-lg md:text-xl font-semibold py-3 px-4 mb-6">
            @lang('Registration Form')
        </h2>

        <div class="bg-green-50 border border-green-400 text-green-800 rounded-lg p-4 mb-6">
            <p class="text-sm leading-relaxed">
                @lang('Register your organization with HR Incubator and start attracting top talents through our integrated hiring platform.')
                <br>
                @lang('Please fill in the following form to register your business:')
            </p>
        </div>

        @include('user.auth.navigation')

        <form class="space-y-4 mt-6" action="{{ route('user.employee.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="companyName" class="sr-only">@lang('Company/Organization Name')</label>
                <input type="text" id="companyName" name="company_name" value="{{ old('company_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Company/Organization Name')">
            </div>

            <div>
                <label for="businessSector" class="sr-only">@lang('Industry or Business Sector')</label>
                <select id="businessSector" name="business_sector" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                    <option value="">@lang('Industry or Business Sector')</option>
                    <option value="tech" {{ old('business_sector') == 'tech' ? 'selected' : '' }}>@lang('Technology')</option>
                    <option value="finance" {{ old('business_sector') == 'finance' ? 'selected' : '' }}>@lang('Finance')</option>
                    <option value="healthcare" {{ old('business_sector') == 'healthcare' ? 'selected' : '' }}>@lang('Healthcare')</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div>
                <label for="commercialRegistration" class="sr-only">@lang('Commercial Registration Number (If available)')</label>
                <input type="text" id="commercialRegistration" name="commercial_registration" value="{{ old('commercial_registration') }}" class="w-full px-4 py-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Commercial Registration Number (If available)')">
            </div>

            <div>
                <label for="contactPersonName" class="sr-only">@lang('Contact Person Name')</label>
                <input type="text" id="contactPersonName" name="contact_person_name" value="{{ old('contact_person_name') }}" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Contact Person Name')">
            </div>

            <div>
                <label for="jobTitlePosition" class="sr-only">@lang('Job Title/Position')</label>
                <input type="text" id="jobTitlePosition" name="job_title_position" value="{{ old('job_title_position') }}" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Job Title/Position')">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="mobile" class="sr-only">@lang('Mobile')</label>
                    <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Mobile')">
                </div>
                <div>
                    <label for="email" class="sr-only">@lang('Email Address')</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Email Address')">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <label for="cityRegion" class="sr-only">@lang('City / Region')</label>
                    <select id="city_region" name="city_region" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        <option value="">@lang('City / Region')</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_region') == $city->id ? 'selected' : ''  }}>{{ $city?->lang('name') }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div>
                    <label for="numEmployees" class="sr-only">@lang('Current Number of Employees')</label>
                    <input type="text" id="numEmployees" name="num_employees" value="{{ old('num_employees') }}" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Current Number of Employees')">
                </div>
            </div>

            <div class="mb-6">
                <p class="block text-gray-700 text-base font-medium mb-3">@lang('Do you currently have hiring needs?')</p>
                <div class="flex space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="hiring_needs" value="yes" {{ old('hiring_needs') == 'yes' ? 'checked' : '' }} class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm">@lang('Yes')</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="hiring_needs" value="no" {{ old('hiring_needs') == 'no' ? 'checked' : '' }} class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm">@lang('No')</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <p class="block text-gray-700 text-base font-medium mb-3">@lang('Preferred Communication method')</p>
                <div class="flex flex-wrap gap-x-6 gap-y-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="communication_method[]" value="email" {{ in_array('email', old('communication_method', [])) ? 'checked' : '' }} class="form-checkbox h-4 w-4 text-blue-600  focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm">@lang('Email')</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="communication_method[]" value="phone_call" {{ in_array('phone_call', old('communication_method', [])) ? 'checked' : '' }} class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm">@lang('Phone Call')</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="communication_method[]" value="whatsapp" {{ in_array('whatsapp', old('communication_method', [])) ? 'checked' : '' }} class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm">@lang('WhatsApp')</span>
                    </label>
                </div>
            </div>

            <div>
                <label for="briefDescription" class="block text-gray-700 text-base font-medium mb-3">@lang('Brief Description of your business and hiring goals')</label>
                <textarea id="briefDescription" name="brief_description" rows="4" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Description')">{{ old('brief_description') }}</textarea>
            </div>

            <div class="col-span-full form-group">
                <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="col-span-full form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="pt-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 transition duration-300 ease-in-out">
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
    <script>
        "use strict";
        (function($) {
            $('.checkUser').on('focusout', function(e) {
                var url = "{{ route('user.checkUser') }}";
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                var fieldType = $(this).attr('name');
                var data = {
                    _token: token
                };
                data[fieldType] = value;

                $.post(url, data, function(response) {
                    if (response.data) {
                        $(`.${response.type}Exist`).text(`${response.type} already exists`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush
