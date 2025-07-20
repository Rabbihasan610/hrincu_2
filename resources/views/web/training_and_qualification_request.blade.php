@extends("web.layouts.frontend", ["title" => gs("site_name")])

@section("content")
    <x-breadcrumb title="Targeted Request Form" />

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto p-6 md:p-8 lg:p-10 bg-white shadow-lg rounded-lg">

            <div class="text-center mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">@lang("Welcome to Human Resources Incubator Platform!")</h1>
                <p class="text-gray-600 text-sm md:text-base">@lang("We are pleased to offer specialized training programs tailored to your organization's needs.")</p>
            </div>

            <h2 class="bg-[#0D47A1] text-white text-lg md:text-xl font-semibold py-3 px-4 mb-6 text-center">
                @lang("Targeted Request form")
            </h2>

            <p class="text-gray-700 text-sm md:text-base mb-8 leading-relaxed">
                @lang("Please fill out the form below, and our team will get in touch with you shortly.")
            </p>

            <form method="POST" action="{{ route('your.targeted.form.submit.route') }}">
                @csrf

                {{-- 1. Organization Information --}}
                <div class="mb-8 p-6 border border-gray-200 rounded-md bg-white">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">@lang("1. Organization Information")</h3>

                    <div class="mb-4">
                        <label for="organizationName" class="block text-gray-700 text-sm font-medium mb-2">@lang("Organization Name")</label>
                        <input type="text" id="organizationName" name="organization_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('organization_name') }}">
                    </div>

                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 text-sm font-medium mb-2">@lang("City")</label>
                        <select id="city" name="city" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">@lang("Select a city")</option>
                            <option value="riyadh" {{ old('city') == 'riyadh' ? 'selected' : '' }}>@lang("Riyadh")</option>
                            <option value="jeddah" {{ old('city') == 'jeddah' ? 'selected' : '' }}>@lang("Jeddah")</option>
                            <option value="dammam" {{ old('city') == 'dammam' ? 'selected' : '' }}>@lang("Dammam")</option>
                            {{-- Add more cities as needed --}}
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="industrySector" class="block text-gray-700 text-sm font-medium mb-2">@lang("Industry Sector")</label>
                        <select id="industrySector" name="industry_sector" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                            <option value="">@lang("Select industry sector")</option>
                            <option value="it" {{ old('industry_sector') == 'it' ? 'selected' : '' }}>@lang("IT and Technology")</option>
                            <option value="healthcare" {{ old('industry_sector') == 'healthcare' ? 'selected' : '' }}>@lang("Healthcare")</option>
                            <option value="finance" {{ old('industry_sector') == 'finance' ? 'selected' : '' }}>@lang("Finance")</option>
                            {{-- Add more sectors as needed --}}
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="fullNameApplicant" class="block text-gray-700 text-sm font-medium mb-2">@lang("Full Name of Applicant")</label>
                            <input type="text" id="fullNameApplicant" name="full_name_applicant" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('full_name_applicant') }}">
                        </div>
                        <div>
                            <label for="emailNumber" class="block text-gray-700 text-sm font-medium mb-2">@lang("Email Number")</label>
                            <input type="email" id="emailNumber" name="email_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('email_number') }}">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="mobileNumber" class="block text-gray-700 text-sm font-medium mb-2">@lang("Mobile Number")</label>
                        <input type="tel" id="mobileNumber" name="mobile_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('mobile_number') }}">
                    </div>
                </div>

                {{-- 2. Requested Services --}}
                <div class="mb-8 p-6 border border-gray-200 rounded-md bg-white">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">@lang("2. Requested Services (You may select more than one):")</h3>
                    <div class="space-y-3">
                        @php
                            $services = [
                                'pre_employment_qualification_programs' => 'Pre-employment qualification programs',
                                'custom_designed_training_programs_based_on_organizational_needs' => 'Custom-designed training programs based on organizational needs',
                                'sharing_human_development_and_curriculum_design' => 'Sharing in human development and curriculum design',
                                'topic_specific_professional_workshops' => 'Topic specific professional workshops',
                                'training_for_expatriate_workers_and_foreign_communities' => 'Training for expatriate workers and foreign communities',
                                'workplace_mental_health_enhancement_programs' => 'Workplace mental health enhancement programs',
                                'leadership_and_management_development_programs' => 'Leadership and management development programs',
                                'innovative_advisory_and_legal_services' => 'Innovative advisory and legal services',
                                'technical_skills_data_mining_ai_cybersecurity' => 'Technical skills (Data Mining, AI, Cybersecurity)',
                                'administrative_accounting_and_financial_skills' => 'Administrative, accounting, and financial skills',
                                'soft_skills_communication_leadership_time_management' => 'Soft skills (Communication, Leadership, Time Management)',
                                'e_training_training_and_elearning_help' => 'E-training (Training and eLearning Help)',
                                'safety_and_emergency_response_training' => 'Safety and Emergency Response Training',
                                'training_for_food_pharmaceutical_and_medical_industries' => 'Training for food, pharmaceutical, and medical industries',
                            ];
                        @endphp

                        @foreach($services as $value => $label)
                            <div class="flex items-center">
                                <input type="checkbox" id="service_{{ $loop->index }}" name="requested_services[]" value="{{ $value }}" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ in_array($value, old('requested_services', [])) ? 'checked' : '' }}>
                                <label for="service_{{ $loop->index }}" class="ml-2 text-gray-700 text-sm md:text-base">@lang($label)</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- 3. Training Program Details --}}
                <div class="mb-8 p-6 border border-gray-200 rounded-md bg-white">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">@lang("3. Training Program Details")</h3>

                    <div class="mb-4">
                        <label for="targetGroup" class="block text-gray-700 text-sm font-medium mb-2">@lang("Target Group (e.g., New Hires, Mid-level Staff, Senior Management, Graduates)")</label>
                        <input type="text" id="targetGroup" name="target_group" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('target_group') }}">
                    </div>

                    <div class="mb-4">
                        <label for="expectedNumberOfParticipants" class="block text-gray-700 text-sm font-medium mb-2">@lang("Expected number of participants")</label>
                        <input type="number" id="expectedNumberOfParticipants" name="expected_participants" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('expected_participants') }}">
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700 text-sm font-medium mb-2">@lang("Preferred training format")</p>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="formatInPerson" name="training_format" value="in_person" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('training_format') == 'in_person' ? 'checked' : '' }}>
                                <label for="formatInPerson" class="ml-2 text-gray-700 text-sm">@lang("In-Person")</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="formatRemote" name="training_format" value="remote" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('training_format') == 'remote' ? 'checked' : '' }}>
                                <label for="formatRemote" class="ml-2 text-gray-700 text-sm">@lang("Remote")</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="formatHybrid" name="training_format" value="hybrid" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('training_format') == 'hybrid' ? 'checked' : '' }}>
                                <label for="formatHybrid" class="ml-2 text-gray-700 text-sm">@lang("Hybrid")</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="block text-gray-700 text-sm font-medium mb-2">@lang("Suggested Duration")</p>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="durationYes" name="suggested_duration" value="yes" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('suggested_duration') == 'yes' ? 'checked' : '' }}>
                                <label for="durationYes" class="ml-2 text-gray-700 text-sm">@lang("Yes")</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="durationNo" name="suggested_duration" value="no" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('suggested_duration') == 'no' ? 'checked' : '' }}>
                                <label for="durationNo" class="ml-2 text-gray-700 text-sm">@lang("No")</label>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="preferredTrainingLanguage" class="block text-gray-700 text-sm font-medium mb-2">@lang("Preferred training language")</label>
                            <select id="preferredTrainingLanguage" name="preferred_training_language" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <option value="">@lang("Select language")</option>
                                <option value="english" {{ old('preferred_training_language') == 'english' ? 'selected' : '' }}>@lang("English")</option>
                                <option value="arabic" {{ old('preferred_training_language') == 'arabic' ? 'selected' : '' }}>@lang("Arabic")</option>
                            </select>
                        </div>
                        <div>
                            <label for="expectedStartDate" class="block text-gray-700 text-sm font-medium mb-2">@lang("Expected Start Date")</label>
                            <input type="date" id="expectedStartDate" name="expected_start_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="{{ old('expected_start_date') }}">
                        </div>
                    </div>
                </div>

                {{-- 4. Additional notes --}}
                <div class="mb-8 p-6 border border-gray-200 rounded-md bg-white">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">@lang("4. Additional notes")</h3>
                    <textarea id="additionalNotes" name="additional_notes" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="@lang('Enter your notes')">{{ old('additional_notes') }}</textarea>
                </div>

                <div>
                    <button type="submit" class="bg-[#0069CA] hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-md transition duration-300 ease-in-out">
                        @lang('Submit Application')
                    </button>
                    <p class="text-gray-600 text-sm mt-2">
                        @lang("Our team will review your request and contact you to discuss your training needs in detail.")
                    </p>
                </div>
            </form>

        </div>
    </section>

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include("sections." . $sec)
        @endforeach
    @endif
@endsection