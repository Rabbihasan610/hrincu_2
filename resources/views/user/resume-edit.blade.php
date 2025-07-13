@extends('web.layouts.master', ['title' => 'Edit Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Resume')</span>
                </div>

                <div class="resume-dashboard-body">
                    @include('user.includes.edit-resume-tab')
                    <div class="resume-edit-acc mt-5">
                        <div class="personal-info">
                            <div class="accordion" id="accordionExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="PersonalDetailsHandel">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#PersonalDetails" aria-expanded="true"
                                            aria-controls="PersonalDetails">
                                            @lang('Personal Details')
                                        </button>
                                    </h2>
                                    <div id="PersonalDetails" class="accordion-collapse collapse show"
                                        aria-labelledby="PersonalDetailsHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                <div class="resume-info-edit-btn d-flex justify-content-end">
                                                    <a
                                                        href="{{ route('user.personal-information.edit', $personal_info->id) }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('Edit')
                                                    </a>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('First Name')</b>
                                                        <p>{{ $personal_info->first_name }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Last Name')</b>
                                                        <p>{{ $personal_info->last_name }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang("Father's Name")</b>
                                                        <p>{{ $personal_info->father_name }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang("Mother's Name")</b>
                                                        <p>{{ $personal_info->mother_name }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Date of Birth')</b>
                                                        <p>{{ $personal_info->date_of_birth }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Gender')</b>
                                                        <p>{{ $personal_info->gender }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Religion')</b>
                                                        <p>{{ $personal_info->religion }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Marital Status')</b>
                                                        <p>{{ $personal_info->marital_status }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Nationality')</b>
                                                        <p>{{ $personal_info->nationality }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('National ID')</b>
                                                        <p>{{ $personal_info->national_Id }}</p>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Mobile Number')</b>
                                                        <p>{{ $personal_info->mobile }}</p>
                                                    </div>


                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Email')</b>
                                                        <p>{{ $personal_info->email }}</p>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Blood Group')</b>
                                                        <p>{{ $personal_info->blood_group }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Height (meters)')</b>
                                                        <p>{{ $personal_info->height }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Weight (kg)')</b>
                                                        <p>{{ $personal_info->weight }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="AddressDetailsHandel">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#AddressDetails" aria-expanded="false"
                                            aria-controls="AddressDetails">
                                            @lang('Address Details')
                                        </button>
                                    </h2>
                                    <div id="AddressDetails" class="accordion-collapse collapse"
                                        aria-labelledby="AddressDetailsHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                <div class="resume-info-edit-btn d-flex justify-content-end">
                                                    <a
                                                        href="{{ route('user.personal-information.address.edit', $personal_info->id) }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('Edit')
                                                    </a>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <b>@lang('Present Address')</b>
                                                        <p class="address-comma">
                                                            <span>{{ $personal_info->countrypre ? $personal_info->countrypre->name : '' }}</span>
                                                            <span>{{ $personal_info->districtpre ? $personal_info->districtpre->name : '' }}</span>
                                                            <span>{{ $personal_info->present_address_area }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <b>@lang('Permanent Address')</b>
                                                        @if ($personal_info->same_as_address == '1')
                                                            <p class="address-comma">
                                                                <span>{{ $personal_info->countrypre ? $personal_info->countrypre->name : '' }}</span>
                                                                <span>{{ $personal_info->districtpre ? $personal_info->districtpre->name : '' }}</span>
                                                                <span>{{ $personal_info->present_address_area }}</span>
                                                            </p>
                                                        @else
                                                            <p class="address-comma">
                                                                <span>{{ $personal_info->countrypar ? $personal_info->countrypar->name : '' }}</span>
                                                                <span>{{ $personal_info->districtpar ? $personal_info->districtpar->name : '' }}</span>
                                                                <span>{{ $personal_info->present_address_area }}</span>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="CareerandApplicationHandel">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#CareerandApplication"
                                            aria-expanded="false" aria-controls="CareerandApplication">
                                            @lang('Career and Application Information')
                                        </button>
                                    </h2>
                                    <div id="CareerandApplication" class="accordion-collapse collapse"
                                        aria-labelledby="CareerandApplicationHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                <div class="resume-info-edit-btn d-flex justify-content-end">
                                                    <a href="{{ route('user.carrer.info.edit', $personal_info->id) }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('Edit')
                                                    </a>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <b>@lang('Objective')</b>
                                                        <p>{{ $application_info->objective }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Present Salary')</b>
                                                        <p>{{ $application_info->present_salary }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Expected Salary')</b>
                                                        <p>{{ $application_info->expected_salary }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Looking for (Job Level)')</b>
                                                        <p>{{ $application_info->job_level }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Available for (Job Nature)')</b>
                                                        <p>{{ $application_info->available_for }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="PreferredAreasHandel">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#PreferredAreas"
                                            aria-expanded="false" aria-controls="PreferredAreas">
                                            @lang('Preferred Areas')
                                        </button>
                                    </h2>
                                    <div id="PreferredAreas" class="accordion-collapse collapse"
                                        aria-labelledby="PreferredAreasHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                <div class="resume-info-edit-btn d-flex justify-content-end">
                                                    <a
                                                        href="{{ route('user.preferredjob.info.edit', $prefer_job_info->id) }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('Edit')
                                                    </a>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <b>@lang('Preferred Job Categories')</b>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Functional')</b>
                                                        <div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Special Skills')</b>
                                                        <div>
                                                            <span class="hilight">@lang('Data Entry/ Computer Operator')</span>
                                                            <span class="hilight">@lang('Any Other Special Skills')</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="OtherinfoHandel">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#Otherinfo" aria-expanded="false"
                                            aria-controls="Otherinfo">
                                            @lang('Other Relevant Information')
                                        </button>
                                    </h2>
                                    <div id="Otherinfo" class="accordion-collapse collapse"
                                        aria-labelledby="OtherinfoHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                <div class="resume-info-edit-btn d-flex justify-content-end">
                                                    <a href="{{ route('user.other.info.edit', $application_info->id) }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('Edit')
                                                    </a>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 py-2">
                                                        <b>@lang('Career Summary')</b>
                                                        <p>{{ $application_info->career_summary }}</p>
                                                    </div>
                                                    <div class="col-12 py-2">
                                                        <b>@lang('Special Qualification')</b>
                                                        <p>{{ $application_info->special_qualification }}</p>
                                                    </div>
                                                    <div class="col-12 py-2">
                                                        <b>@lang('Keywords')</b>
                                                        <p>{{ $application_info->keywords }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="DisabilityInfoHandel">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#DisabilityIn"
                                            aria-expanded="false" aria-controls="DisabilityIn">
                                            @lang('Disability Information (if any)')
                                        </button>
                                    </h2>
                                    <div id="DisabilityIn" class="accordion-collapse collapse"
                                        aria-labelledby="DisabilityInfoHandel" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="resume-info-view">
                                                <div class="resume-info-edit-btn d-flex justify-content-end">
                                                    <a
                                                        href="{{ route('user.disability.info.edit', $application_info->id) }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        @lang('Edit')
                                                    </a>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Difficulty to See')</b>
                                                        <p>{{ $application_info->difficulty_to_See }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Difficulty to Hear')</b>
                                                        <p>{{ $application_info->difficulty_to_hear }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Difficulty to Concentrate or remember')</b>
                                                        <p>{{ $application_info->difficulty_to_remember }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Difficulty to Sit, Stand, Walk or Climb Stairs')</b>
                                                        <p>{{ $application_info->difficulty_to_sit_stand }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Difficulty to Communicate')</b>
                                                        <p>{{ $application_info->difficulty_to_Communicate }}</p>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <b>@lang('Difficulty of Taking Care')</b>
                                                        <p>{{ $application_info->difficulty_of_taking }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
