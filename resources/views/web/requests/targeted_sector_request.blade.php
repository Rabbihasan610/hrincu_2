@extends('web.layouts.frontend', ['title' => 'Targeted Sector Request'])

@section('content')

    <x-breadcrumb />

    <div class="container mx-auto px-4 py-5 md:py-10">
        <div class="max-w-4xl mx-auto rounded-lg p-6 md:p-10">

            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8 text-[#0d47a1] w-[60%] mx-auto">
                @lang('Welcome to Human Resources') <br class="md:hidden"> @lang('Incubator Platform!')
            </h2>

            <div class="bg-[#0d47a1] text-white text-center py-2 mb-8 font-semibold">
                @lang('Targeted Request form')
            </div>


            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                    <p class="font-bold">@lang('Please correct the following errors:')</p>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('targeted.sector.request.store') }}" method="POST">
                @csrf

                <div class="bg-[#F5FFF4] border-dotted border-[#0d47a1]  text-green-700 p-2 mb-8">
                    <p class="text-sm">
                        @lang('Please fill out our the following form, and our specialized team will contact you with the most suitable solutions for your sector needs.')
                    </p>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-300 pb-2">@lang('1. Organization Information')</h3>


                    <div class="mb-3">
                        <label for="organization_name" class="block text-sm font-medium text-gray-700 mb-1">@lang('Organization / Company Name') <span class="text-red-500">*</span></label>
                        <input type="text" name="organization_name" id="organization_name"
                               class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('organization_name') border-red-500 @enderror"
                               value="{{ old('organization_name') }}" placeholder="@lang('Organization / Company Name')" required>
                        @error('organization_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">@lang('City') <span class="text-red-500">*</span></label>
                            <select name="city_id" id="city_id"
                                    class="mt-1 block w-full border border-gray-300 p-2.5 focus:border-blue-500 @error('city_id') border-red-500 @enderror" required>
                                <option value="">@lang('Select City')</option>
                                @foreach($citiesRegions as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ 
                                    app()->getLocale() == 'ar' ? $city->name_ar : $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="business_type_sector" class="block text-sm font-medium text-gray-700 mb-1">@lang('Business Type / Sector') <span class="text-red-500">*</span></label>
                            <select name="business_type_sector" id="business_type_sector"
                                    class="mt-1 block w-full border border-gray-300 p-2.5 focus:border-blue-500 @error('business_type_sector') border-red-500 @enderror" required>
                                <option value="">@lang('Select Business Type / Sector')</option>

                                @foreach($businessTypes as $type => $value)
                                    <option value="{{ $type }}" {{ old('business_type_sector') == $type ? 'selected' : '' }}>
                                        {{ app()->getLocale() == 'ar' ? $value : $type }}
                                    </option>
                                @endforeach

                            </select>
                            @error('business_type_sector')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="marital_status" class="block text-sm font-medium text-gray-700 mb-1">   @lang('Marital Status')</label>
                            <select name="marital_status" id="marital_status"
                                    class="mt-1 block w-full border border-gray-300  p-2.5 focus:border-blue-500 @error('marital_status') border-red-500 @enderror">
                                <option value="">@lang('Select Marital Status')</option>
                                @foreach($maritalStatuses as $status => $value)
                                    <option value="{{ $status }}" {{ old('marital_status') == $status ? 'selected' : '' }}>{{ 
                                    app()->getLocale() == 'ar' ? $value : $status }}</option>
                                @endforeach
                            </select>
                            @error('marital_status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="mobile_number" class="block text-sm font-medium text-gray-700 mb-1">@lang('Mobile Number')</label>
                            <input type="text" name="mobile_number" id="mobile_number"
                                   class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('mobile_number') border-red-500 @enderror"
                                   value="{{ old('mobile_number') }}" placeholder="@lang('Mobile Number')">
                            @error('mobile_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email_address" class="block text-sm font-medium text-gray-700 mb-1">@lang('Email Address')</label>
                            <input type="email" name="email_address" id="email_address"
                                   class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('email_address') border-red-500 @enderror"
                                   value="{{ old('email_address') }}" placeholder="@lang('Email Address')">
                            @error('email_address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="city_region" class="block text-sm font-medium text-gray-700 mb-1">@lang('City / Region')</label>
                            <select name="city_region" id="city_region"
                                    class="mt-1 block w-full border border-gray-300  p-2.5 focus:border-blue-500 @error('city_region') border-red-500 @enderror">
                                <option value="">@lang('Select City / Region')</option>
                                @foreach($citiesRegions as $region)
                                    <option value="{{ $region->lang('name') }}" {{ old('city_region') == $region ? 'selected' : '' }}>{{ $region->lang('name') }}</option>
                                @endforeach
                            </select>
                            @error('city_region')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>   
                            <label for="current_occupation" class="block text-sm font-medium text-gray-700 mb-1">@lang('Current Occupation (if any)')</label>
                            <input type="text" name="current_occupation" id="current_occupation"
                                   class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('current_occupation') border-red-500 @enderror"
                                   value="{{ old('current_occupation') }}" placeholder="@lang('Current Occupation (if any)')">
                            @error('current_occupation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="average_monthly_income" class="block text-sm font-medium text-gray-700 mb-1">@lang('Average Monthly Income')</label>
                            <input type="text" name="average_monthly_income" id="average_monthly_income"
                                   class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('average_monthly_income') border-red-500 @enderror"
                                   value="{{ old('average_monthly_income') }}" placeholder="@lang('Average Monthly Income')">
                            @error('average_monthly_income')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-300 pb-2">@lang('2. Requested Service(s)')</h3>
                    <p class="text-sm text-gray-600 mb-4">@lang('You can select more than one based on your needs')</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($requestedServices as $service)
                            <div class="flex items-center">
                                <input type="checkbox" name="requested_services[]" id="{{ Str::slug($service->id) }}" value="{{ $service->id }}"
                                       class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                       {{ in_array($service->id, old('requested_services', [])) ? 'checked' : '' }}>
                                <label for="{{ Str::slug($service->id) }}" class="ml-2 block text-sm text-gray-900">
                                    {{ $service?->lang('title') }}
                                </label>    
                            </div>
                        @endforeach
                    </div>
                    @error('requested_services')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-300 pb-2">@lang('3. Brief Description of Your Need')</h3>
                    <p class="text-sm text-gray-600 mb-4">@lang('Please provide a short description of the services required or the challenge your organization is facing')</p>
                    <textarea name="description_of_need" id="description_of_need" rows="5"
                              class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('description_of_need') border-red-500 @enderror"
                              placeholder="@lang('Some Descriptions...')">{{ old('description_of_need') }}</textarea>
                    @error('description_of_need')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-300 pb-2">@lang('4. Expected Timeframe for Implementation')</h3>
                    <label for="expected_timeframe" class="sr-only">@lang('Select Date & Time')</label>
                    <input type="date" name="expected_timeframe" id="expected_timeframe"
                           class="mt-1 block w-full border border-gray-300  p-2 focus:border-blue-500 @error('expected_timeframe') border-red-500 @enderror"
                           value="{{ old('expected_timeframe') }}">
                    @error('expected_timeframe')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-300 pb-2">@lang('5. Preferred Communication Method')</h3>
                    <p class="text-sm text-gray-600 mb-4">@lang('Please choose your preferred method of contact:')</p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="flex items-center border border-gray-300 rounded-md p-2 flex-1">
                            <input type="checkbox" name="preferred_communication_method" id="comm_email" value="email"
                                   class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                   {{ old('preferred_communication_method') == 'email' ? 'checked' : '' }}>
                            <label for="comm_email" class="ml-3 block text-base font-medium text-gray-700">@lang('Email')</label>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md p-2 flex-1">
                            <input type="checkbox" name="preferred_communication_method" id="comm_phone" value="phone"
                                   class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                   {{ old('preferred_communication_method') == 'phone' ? 'checked' : '' }}>
                            <label for="comm_phone" class="ml-3 block text-base font-medium text-gray-700">@lang('Phone Call')</label>
                        </div>
                        <div class="flex items-center border border-gray-300 rounded-md p-2 flex-1">
                            <input type="checkbox" name="preferred_communication_method" id="comm_whatsapp" value="whatsapp"
                                   class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                                   {{ old('preferred_communication_method') == 'whatsapp' ? 'checked' : '' }}>
                            <label for="comm_whatsapp" class="ml-3 block text-base font-medium text-gray-700">@lang('Whatsapp Message')</label>
                        </div>
                    </div>
                    @error('preferred_communication_method')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex">
                    <button type="submit"
                            class="px-8 py-2 bg-blue-700 text-white font-semibold hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                        @lang('Submit Application')
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection


@push('style')
    <style>
        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
@endpush


@push('script')
    <script>
        // only one checkbox can be selected
        document.querySelectorAll('input[name="preferred_communication_method"]').forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    document.querySelectorAll('input[name="preferred_communication_method"]').forEach((checkbox) => {
                        if (checkbox !== this) {
                            checkbox.checked = false;
                        }
                    });
                }
            });
        });
    </script>
@endpush