@extends('web.layouts.frontend', ['title' => 'Sign In'])

@section('content')
@php
    $policyPages = getContent('policy_pages.element', false, null, true);

    $type = request()->type ?? 'service-supplier';
@endphp

<x-breadcrumb title="Registration as Job Seeker" />

<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-4xl mx-auto overflow-hidden">

        <h2 class="bg-[#0D47A1] text-white text-lg md:text-xl font-semibold py-3 px-4 mb-6">
            Registration Form
        </h2>

        <div class="bg-green-50 border border-green-400 text-green-800 rounded-lg p-4 mb-6">
            <p class="text-sm leading-relaxed">
                Register your organization with HR Incubator and start attracting top talents
                through our integrated hiring platform.
                <br>
                Please fill in the following form to register your business:
            </p>
        </div>

        @include('user.auth.navigation')

        <form class="space-y-4 mt-6">
            <div>
                <label for="companyName" class="sr-only">Company/Organization Name</label>
                <input type="text" id="companyName" name="companyName" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Company/Organization Name">
            </div>

            <div>
                <label for="businessSector" class="sr-only">Industry or Business Sector</label>
                <select id="businessSector" name="businessSector" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                    <option value="">Industry or Business Sector</option>
                    <option value="tech">Technology</option>
                    <option value="finance">Finance</option>
                    <option value="healthcare">Healthcare</option>
                    </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div>
                <label for="commercialRegistration" class="sr-only">Commercial Registration Number (If available)</label>
                <input type="text" id="commercialRegistration" name="commercialRegistration" class="w-full px-4 py-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Commercial Registration Number (If available)">
            </div>

            <div>
                <label for="contactPersonName" class="sr-only">Contact Person Name</label>
                <input type="text" id="contactPersonName" name="contactPersonName" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="Contact Person Name">
            </div>

            <div>
                <label for="jobTitlePosition" class="sr-only">Job Title/Position</label>
                <input type="text" id="jobTitlePosition" name="jobTitlePosition" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="Job Title/Position">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="mobile" class="sr-only">Mobile</label>
                    <input type="tel" id="mobile" name="mobile" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="Mobile">
                </div>
                <div>
                    <label for="email" class="sr-only">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="Email Address">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <label for="cityRegion" class="sr-only">City / Region</label>
                    <select id="cityRegion" name="cityRegion" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                    <option value="">City / Region</option>
                    <option value="dhaka">Dhaka</option>
                    <option value="chittagong">Chittagong</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div>
                    <label for="numEmployees" class="sr-only">Current Number of Employees</label>
                    <input type="text" id="numEmployees" name="numEmployees" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="Current Number of Employees">
                </div>
            </div>

            <div class="mb-6">
                <p class="block text-gray-700 text-base font-medium mb-3">Do you currently have hiring needs?</p>
                <div class="flex space-x-6">
                    <label class="inline-flex items-center">
                    <input type="radio" name="hiringNeeds" value="yes" class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 text-sm">Yes</span>
                    </label>
                    <label class="inline-flex items-center">
                    <input type="radio" name="hiringNeeds" value="no" class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 text-sm">No</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <p class="block text-gray-700 text-base font-medium mb-3">Preferred Communication method</p>
                <div class="flex flex-wrap gap-x-6 gap-y-2">
                    <label class="inline-flex items-center">
                    <input type="checkbox" name="communicationMethod" value="email" class="form-checkbox h-4 w-4 text-blue-600  focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 text-sm">Email</span>
                    </label>
                    <label class="inline-flex items-center">
                    <input type="checkbox" name="communicationMethod" value="phoneCall" class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 text-sm">Phone Call</span>
                    </label>
                    <label class="inline-flex items-center">
                    <input type="checkbox" name="communicationMethod" value="whatsapp" class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700 text-sm">WhatsApp</span>
                    </label>
                </div>
            </div>

            <div>
                <label for="briefDescription" class="block text-gray-700 text-base font-medium mb-3">Brief Description of your business and hiring goals</label>
                <textarea id="briefDescription" name="briefDescription" rows="4" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="Description"></textarea>
            </div>

            <div class="pt-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 transition duration-300 ease-in-out">
                    Submit Register
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('style')

@endpush

{{-- @if (gs('secure_password'))
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif --}}

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
