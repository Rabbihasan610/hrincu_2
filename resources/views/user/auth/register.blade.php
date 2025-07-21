@extends('web.layouts.frontend', ['title' => __('Registration')])

@section('content')
@php
    $policyPages = getContent('policy_pages.element', false, null, true);
@endphp

<x-breadcrumb title="{{ __('Registration') }}" />

<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-4xl mx-auto my-4">
        <div class="bg-blue-800 text-white p-4 rounded-t-lg text-center text-xl font-semibold">
            @lang('Registration Form')
        </div>

        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mt-4 text-sm" id="formDescription">
            @lang('Join HR incubators network. Please select your registration type and fill out the form below.')
        </div>

        <!-- Registration Type Selection -->
        <div class="mt-6">
            <label class="block text-gray-700 text-md font-medium mb-2">@lang('Register as')</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="flex items-center p-3 border border-gray-300 rounded-md cursor-pointer registration-type">
                    <input type="radio" name="registration_type" value="job-seeker" class="form-radio text-blue-600 rounded mr-2">
                    <span class="text-gray-700">@lang('Job Seeker')</span>
                </label>
                <label class="flex items-center p-3 border border-gray-300 rounded-md cursor-pointer registration-type">
                    <input type="radio" name="registration_type" value="employer" class="form-radio text-blue-600 rounded mr-2">
                    <span class="text-gray-700">@lang('Employer')</span>
                </label>
                <label class="flex items-center p-3 border border-gray-300 rounded-md cursor-pointer registration-type">
                    <input type="radio" name="registration_type" value="service-provider" class="form-radio text-blue-600 rounded mr-2">
                    <span class="text-gray-700">@lang('Service Provider')</span>
                </label>
            </div>
        </div>

        <!-- Registration Form -->
        <form id="registrationForm" method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" id="registrationType" value="">

            <!-- Common Fields -->
            <div class="common-fields mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="text" name="name" placeholder="@lang('Full Name')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-name"></span>
                </div>
                <div>
                    <input type="email" name="email" placeholder="@lang('Email Address')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 checkUser">
                    <span class="text-red-500 text-sm error-email"></span>
                    <span class="text-red-500 text-sm emailExist"></span>
                </div>
                <div>
                    <input type="text" name="mobile" placeholder="@lang('Mobile')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 checkUser">
                    <span class="text-red-500 text-sm error-mobile"></span>
                    <span class="text-red-500 text-sm mobileExist"></span>
                </div>
                <div>
                    <select name="city_region" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('City / Region')</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm error-city_region"></span>
                </div>
                <div>
                    <input type="password" name="password" placeholder="@lang('Password')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-password"></span>
                </div>
                <div>
                    <input type="password" name="password_confirmation" placeholder="@lang('Confirm Password')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <!-- Job Seeker Specific Fields -->
            <div id="job-seeker-fields" class="hidden mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center border border-gray-300 rounded-md">
                    <input type="text" name="date_of_birth" placeholder="@lang('Date of Birth')" class="w-full p-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 border-r-0">
                    <span class="p-2 bg-gray-50 border-l border-gray-300 rounded-r-md text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <span class="text-red-500 text-sm error-date_of_birth"></span>
                </div>
                <div>
                    <select name="gender" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Gender')</option>
                        <option value="male">@lang('Male')</option>
                        <option value="female">@lang('Female')</option>
                        <option value="other">@lang('Other')</option>
                    </select>
                    <span class="text-red-500 text-sm error-gender"></span>
                </div>
                <div>
                    <input type="text" name="id_number" placeholder="@lang('ID/Iqama Number')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-id_number"></span>
                </div>
                <div>
                    <select name="marital_status" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Marital Status')</option>
                        <option value="single">@lang('Single')</option>
                        <option value="married">@lang('Married')</option>
                        <option value="divorced">@lang('Divorced')</option>
                        <option value="widowed">@lang('Widowed')</option>
                    </select>
                    <span class="text-red-500 text-sm error-marital_status"></span>
                </div>
                <div>
                    <input type="text" name="academic_qualification" placeholder="@lang('Academic Qualification')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-academic_qualification"></span>
                </div>
                <div>
                    <input type="text" name="field_of_study" placeholder="@lang('Field of Study')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-field_of_study"></span>
                </div>
                <div>
                    <select name="english_proficiency" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('English Proficiency')</option>
                        <option value="native">@lang('Native')</option>
                        <option value="fluent">@lang('Fluent')</option>
                        <option value="intermediate">@lang('Intermediate')</option>
                        <option value="basic">@lang('Basic')</option>
                    </select>
                    <span class="text-red-500 text-sm error-english_proficiency"></span>
                </div>
                <div>
                    <input type="text" name="key_skills" placeholder="@lang('Key Skills')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-key_skills"></span>
                </div>
                <div>
                    <input type="number" name="years_of_experience" placeholder="@lang('Years of Experience')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-years_of_experience"></span>
                </div>
                <div>
                    <select name="preferred_sectors" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Preferred Sectors')</option>
                        @foreach(\App\Data\SectorsData::forServiceProviders() as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm error-preferred_sectors"></span>
                </div>
                <div class="col-span-full">
                    <select name="preferred_job_type" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Preferred Job Type')</option>
                        <option value="full-time">@lang('Full-time')</option>
                        <option value="part-time">@lang('Part-time')</option>
                        <option value="contract">@lang('Contract')</option>
                        <option value="freelance">@lang('Freelance')</option>
                    </select>
                    <span class="text-red-500 text-sm error-preferred_job_type"></span>
                </div>
                <div class="col-span-full mt-4 p-4 border border-green-300 rounded-md bg-green-50 flex items-center justify-center flex-col text-green-800 cursor-pointer" id="resumeUploadArea">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    <span class="font-medium">@lang('Upload Resume')</span>
                    <span class="text-sm">@lang('Please upload files in PDF or image format (JPG/PNG)')</span>
                    <input type="file" name="resume" class="hidden" id="resumeInput" accept=".pdf, .jpg, .png">
                    <span class="text-red-500 text-sm error-resume"></span>
                </div>
            </div>

            <!-- Employer Specific Fields -->
            <div id="employer-fields" class="hidden mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-full">
                    <input type="text" name="company_name" placeholder="@lang('Company/Organization Name')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-company_name"></span>
                </div>
                <div>
                    <select name="business_sector" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">@lang('Industry or Business Sector')</option>
                        @foreach(\App\Data\SectorsData::forEmployers() as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-red-500 text-sm error-business_sector"></span>
                </div>
                <div>
                    <input type="text" name="commercial_registration" placeholder="@lang('Commercial Registration Number')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-commercial_registration"></span>
                </div>
                <div>
                    <input type="text" name="contact_person_position" placeholder="@lang('Job Title/Position')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-contact_person_position"></span>
                </div>
                <div>
                    <input type="text" name="num_employees" placeholder="@lang('Current Number of Employees')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-num_employees"></span>
                </div>
                <div class="col-span-full">
                    <label class="block text-gray-700 text-md font-medium mb-2">@lang('Do you currently have hiring needs?')</label>
                    <div class="flex space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="hiring_needs" value="yes" class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-gray-700">@lang('Yes')</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="hiring_needs" value="no" class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-gray-700">@lang('No')</span>
                        </label>
                    </div>
                    <span class="text-red-500 text-sm error-hiring_needs"></span>
                </div>
            </div>

            <!-- Service Provider Specific Fields -->
            <div id="service-provider-fields" class="hidden mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-full">
                    <input type="text" name="provider_name" placeholder="@lang('Service Provider / Company Name')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-provider_name"></span>
                </div>
                <div>
                    <input type="text" name="entity_type" placeholder="@lang('Type of Entity')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-entity_type"></span>
                </div>
                <div>
                    <input type="text" name="commercial_registration" placeholder="@lang('Commercial Registration Number')" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm error-commercial_registration"></span>
                </div>
                <div class="col-span-full">
                    <label class="block text-gray-700 text-md font-medium mb-2">@lang('Areas of Service Provided')</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="recruitment" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('Recruitment Services')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="training" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('Training & Development Services')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="outsourcing" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('Outsourcing & Operational Support')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="psychological" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('Psychological & Health Support')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="call_center" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('Call Center & Contact Services')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="hr_tech" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('HR Tech Solutions')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="consulting" class="form-checkbox text-blue-600 rounded mr-2">
                            <span class="text-gray-700">@lang('Organizational Consulting')</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="services[]" value="other" class="form-checkbox text-blue-600 rounded mr-2" id="otherServiceCheckbox">
                            <span class="text-gray-700">@lang('Other (please specify)')</span>
                        </label>
                    </div>
                    <input type="text" name="other_service" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2 hidden" placeholder="@lang('If Other please specify')" id="otherServiceInput">
                    <span class="text-red-500 text-sm error-services"></span>
                </div>
            </div>

            <!-- Preferred Communication Method (Common) -->
            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2">@lang('Preferred Communication method')</label>
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <label class="inline-flex items-center mt-1">
                        <input type="checkbox" name="communication_method[]" value="email" class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="ml-2 text-gray-700">@lang('Email')</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="checkbox" name="communication_method[]" value="phone" class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="ml-2 text-gray-700">@lang('Phone Call')</span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="checkbox" name="communication_method[]" value="whatsapp" class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="ml-2 text-gray-700">@lang('WhatsApp')</span>
                    </label>
                </div>
                <span class="text-red-500 text-sm error-communication_method"></span>
            </div>

            <!-- Description (Common) -->
            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2">@lang('Brief Summary of Your Experience and Specialization')</label>
                <textarea name="description" placeholder="@lang('Description')" rows="6" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <span class="text-red-500 text-sm error-description"></span>
            </div>

            <!-- Terms and Conditions -->
            <div class="mt-6">
                <label class="flex items-center">
                    <input type="checkbox" name="terms" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700">@lang('I agree to the') <a href="" class="text-blue-600 hover:underline">@lang('Terms and Conditions')</a> @lang('and') <a href="" class="text-blue-600 hover:underline">@lang('Privacy Policy')</a></span>
                </label>
                <span class="text-red-500 text-sm error-terms"></span>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-700 text-white p-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    @lang('Submit Register')
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        // Handle registration type selection
        $('input[name="registration_type"]').change(function() {
            const type = $(this).val();
            $('#registrationType').val(type);

            // Hide all specific fields
            $('#job-seeker-fields, #employer-fields, #service-provider-fields').addClass('hidden');

            // Show the selected one
            $(`#${type}-fields`).removeClass('hidden');

            // Update form description
            updateFormDescription(type);
        });

        // Update form description based on selected type
        function updateFormDescription(type) {
            let description = '';
            if (type === 'job-seeker') {
                description = '@lang("This form is for individuals who want to register in our job seeker database.")';
            } else if (type === 'employer') {
                description = '@lang("Register your organization with HR Incubator and start attracting top talents through our integrated hiring platform.")';
            } else if (type === 'service-provider') {
                description = '@lang("Join HR incubators network of certified service providers and offer your expertise in structured, learning, consultancy, and institutional support.")';
            }
            $('#formDescription').text(description);
        }

        // Handle other service specification
        $('#otherServiceCheckbox').change(function() {
            if ($(this).is(':checked')) {
                $('#otherServiceInput').removeClass('hidden');
            } else {
                $('#otherServiceInput').addClass('hidden').val('');
            }
        });

        // Handle resume upload click
        $('#resumeUploadArea').click(function() {
            $('#resumeInput').click();
        });

        // Show selected file name for resume
        $('#resumeInput').change(function() {
            if (this.files.length > 0) {
                $('#resumeUploadArea span.font-medium').text(this.files[0].name);
            }
        });

        // Check if user exists (email/mobile)
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

        // Form submission with validation
        $('#registrationForm').submit(function(e) {
            e.preventDefault();
            $('.text-red-500').text(''); // Clear previous errors

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $(`.error-${key}`).text(value[0]);
                        });
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
@endpush
