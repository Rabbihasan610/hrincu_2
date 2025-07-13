@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-right">
                <div class="resume-head">
                    <i class="fas fa-file-text" aria-hidden="true"></i>
                    <span>@lang('View Resume')</span>
                </div>

                <div class="resume-body my-2">
                    <div class="resume-view-box d-flex align-items-center justify-content-between">
                        @if (Auth::user()->user_type == 'job_seeker')
                        <div>
                            <a href="{{route('user.resume.edit')}}">
                                <i class="fas fa-pencil-square" aria-hidden="true"></i>
                                @lang('Edit')
                            </a>
                        </div>
                        @endif

                        <div>
                            @if (Auth::user()->user_type == 'job_seeker')
                            <a href="#" class="mx-2">
                                <i class="fas fa-file-text" aria-hidden="true"></i>
                                <span>@lang('View Resume')</span>
                            </a>
                            @endif
                            <div class="btn-group resume-view-btn">
                                <a href="{{route('user.resume', $user->id)}}" class="active-btn">@lang('Details')</a>
                                <a href="{{route('user.resume.short', $user->id)}}">@lang('Short')</a>
                             </div>
                        </div>
                    </div>

                    <div class="resume-top mt-4 d-flex justify-content-between">
                        <div>
                            <h4>{{@$personal_info->first_name}} {{$personal_info->last_name}}</h4>
                            <p>@lang('Address')  {{@$personal_info->countrypre ? $personal_info->countrypre->name : '' }},{{$personal_info->districtpre ? $personal_info->districtpre->name : '' }}, {{$personal_info->present_address_area}}</p>
                            <p> @lang('Mobile No') : {{$personal_info->mobile}}</p>
                            <p> @lang('Email') : {{$personal_info->email}}</p>
                        </div>
                        <div>
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image) }}" alt="">
                        </div>
                    </div>

                    <div class="pb-2">
                        <h4 class="resume-title">
                            @lang('Career Objective'):
                        </h4>
                        <p class="py-2">
                            {{$application_info->objective}}
                        </p>
                    </div>
                    <div class="pb-2">
                        <h4 class="resume-title">
                            @lang('Career Summary'):
                        </h4>
                        <p class="py-2">
                            {{$application_info->career_summary}}
                        </p>
                    </div>
                    <div class="pb-2">
                        <h4 class="resume-title">
                            @lang('Special Qualification'):
                        </h4>
                        <p class="">
                           {{$application_info->special_qualification}}
                        </p>

                    </div>
                    <div class="pb-2">
                        <h4 class="resume-title">
                            @lang('Employment History'):
                        </h4>
                        <p class="py-2">

                            <b>@lang('Total Year of Experience') :</b>
                        </p>
                        <ul class="resume-exprienct">
                            @foreach ($employment_info as $item)
                            <li>
                                <p class="m-0 p-0"><b>{{$item->designation}} (2 yrs)</b></p>
                                @if ($item->currently_working == 1)
                                    <p class="pt-0">({{ Carbon\Carbon::parse($item->employment_period_start)->format('M, Y') }} - Continuing)</p>
                                @else
                                    <p class="pt-0">({{ Carbon\Carbon::parse($item->employment_period_start)->format('M, Y') }} - {{ Carbon\Carbon::parse($item->employment_period_end)->format('M, Y') }})</p>
                                @endif

                                <p class="m-0 p-0"><b>{{$item->company_name}}</b></p>
                                <p class="pt-0">{{$item->company_location}}</p>
                                <p class="m-0 p-0"><b>Area of Expertise</b></p>
                                <p class="pt-0">{{$item->area_of_expertise_1}} ({{$item->area_of_expertise_1_month}}), {{$item->area_of_expertise_2}} ({{$item->area_of_expertise_2_month}}), {{$item->area_of_expertise_3}} ({{$item->area_of_expertise_3_month}})</p>
                                <p class="m-0 p-0"><b>Duties/Responsibilities</b></p>
                                <p class="pt-0">{{$item->responsibilities}}</p>
                            </li>
                            @endforeach

                        </ul>

                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">
                            @lang('Academic Qualification')
                        </h4>
                        <div class="academic-qualification-table pt-2">
                            <table>

                                <tr>
                                    <th>@lang('Exam Title')</th>
                                    <th>@lang('Concentration/Major')</th>
                                    <th>@lang('Institute')</th>
                                    <th>@lang('Result')</th>
                                    <th>@lang('Pas.Year')</th>
                                </tr>
                                @foreach ($academic_info as $item)


                                <tr>
                                    <td>{{$item->educationLavels ? $item->educationLavels->name:''}}</td>
                                    <td> {{$item->degree ? $item->degree->name:''}}</td>
                                    <td> {{$item->institute_name}}</td>
                                    <td> {{$item->result ? $item->result->name : ''}}
                                        @if($item->gpa)
                                         {{$item->gpa }}
                                         (out of {{$item->out_of}})
                                        @endif
                                    </td>
                                    <td>{{$item->year_of_passing}}</td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">
                            @lang('Training Summary')
                        </h4>
                        <div class="academic-qualification-table pt-2">
                            <table>

                                <tr>
                                    <th>@lang('Training Title')</th>
                                    <th>@lang('Topic')</th>
                                    <th>@lang('Institute')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('Location')</th>
                                    <th>@lang('Year')</th>
                                    <th>@lang('Duration')</th>
                                </tr>
                                @foreach ($traning_info as $item)
                                <tr>
                                    <td>{{$item->training_title}}</td>
                                    <td> {{$item->topics_covered}}</td>
                                    <td> {{$item->institute}}</td>
                                    <td>{{$item->country}}</td>
                                    <td>{{$item->Location}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->training_year)->format('M Y') }}</td>
                                    <td>{{$item->duration}}</td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                     <div class="pb-3">
                        <h4 class="resume-title">
                            @lang('Professional Qualification')
                        </h4>
                        <div class="academic-qualification-table pt-2">
                            <table>

                                <tr>
                                    <th>@lang('Certification')</th>
                                    <th>@lang('Institute')</th>
                                    <th>@lang('Location')</th>
                                    <th>@lang('From')</th>
                                    <th>@lang('To')</th>
                                </tr>
                                @foreach ($pro_certificate_info as $item)


                                <tr>
                                    <td>{{$item->certification}}</td>
                                    <td> {{$item->institute}}</td>
                                    <td> {{$item->Location}}</td>
                                    <td>{{ Carbon\Carbon::parse($item->duration_start)->format('M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->duration_end)->format('M Y') }}</td>

                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">
                            @lang('Career and Application Information')
                        </h4>
                        <div class="carrer-application-table pt-2">
                            <table>

                                <tr>
                                    <td>@lang('Looking For')</td>
                                    <td>: {{$application_info->job_level}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('Available For')</td>
                                    <td>: {{$application_info->available_for}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('Present Salary')</td>
                                    <td>: SAR. {{$application_info->present_salary}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('Expected Salary')</td>
                                    <td>: SAR. {{$application_info->expected_salary}}</td>
                                </tr>
                                <tr>
                                    <td>@lang('Preferred Job Category')</td>
                                    <td>: @lang('Engineer/Architect, IT/Telecommunication, Design/Creative, Data Entry/Computer Operator, Other Special Skilled Jobs')</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">@lang('Specialization')</h4>
                        <div class="specialize-table pt-2">
                            <table>
                                <tr>
                                    <th>@lang('Fields of Specialization')</th>
                                </tr>
                                <tr>

                                    <td>
                                        <ul>
                                            @foreach ($skill_info as $item)
                                            <li>{{$item->skill}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">
                            @lang('Language Proficiency')
                        </h4>
                        <div class="academic-qualification-table pt-2">
                            <table>

                                <tr>
                                    <th>@lang('Language')</th>
                                    <th>@lang('Reading')</th>
                                    <th>@lang('Writing')</th>
                                    <th>@lang('Speaking')</th>
                                </tr>
                                @foreach ($language_info as $item)
                                    <tr>
                                        <td> {{$item->Language}} </td>
                                        <td> {{$item->reading}} </td>
                                        <td> {{$item->writing}} </td>
                                        <td> {{$item->speaking}} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">
                            @lang('Personal Details')
                        </h4>
                        <div class="carrer-application-table pt-2">
                            <table>

                                <tr>
                                    <td>@lang("Father's Name")</td>
                                    <td>: {{$personal_info->father_name}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Mother's Name")</td>
                                    <td>: {{$personal_info->mother_name}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Date of Birth")</td>
                                    <td>: {{ Carbon\Carbon::parse($personal_info->date_of_birth)->format('M d, Y') }}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Gender")</td>
                                    <td>: {{$personal_info->gender}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Height (Meter)")</td>
                                    <td>: {{$personal_info->height}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Weight (Kg)")</td>
                                    <td>: {{$personal_info->weight}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Marital Status")</td>
                                    <td>: {{$personal_info->marital_status}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Nationality")</td>
                                    <td>: {{$personal_info->nationality}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Religion")</td>
                                    <td>: {{$personal_info->religion}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Permanent Address")</td>
                                    <td>: {{$personal_info->countrypar ? $personal_info->countrypar->name : ''}},{{$personal_info->districtpar ? $personal_info->districtpar->name : ''}}, {{$personal_info->permanent_address_area}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("Current Location")</td>
                                    @if($personal_info->same_as_address == 1)
                                        <td>: {{$personal_info->countrypar ? $personal_info->countrypar->name : ''}},{{$personal_info->districtpar ? $personal_info->districtpar->name : ''}}, {{$personal_info->permanent_address_area}}</td>
                                    @else
                                        <td>: {{$personal_info->countrypre ? $personal_info->countrypre->name : ''}},{{$personal_info->districtpre ? $personal_info->districtpre->name : ''}}, {{$personal_info->present_address_area}}</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>@lang("Blood Group")</td>
                                    <td>: {{$personal_info->blood_group}}</td>
                                </tr>
                                <tr>
                                    <td>@lang("National ID")</td>
                                    <td>: {{$personal_info->national_Id}} </td>
                                </tr>

                            </table>

                            <div class="some-difficult mt-3">
                                <p>@lang("I have some difficulties which are given below")</p>
                                <ul>
                                    <li>
                                        <p><b>@lang('Seeing')</b> ({{$application_info->difficulty_to_See}})</p>
                                    </li>
                                    <li>
                                        <p><b>@lang('Hearing') </b> ({{$application_info->difficulty_to_hear}})</p>
                                    </li>
                                    <li>
                                        <p><b>@lang('Physical')</b> ({{$application_info->difficulty_to_sit_stand}})</p>
                                    </li>
                                    <li>
                                        <p><b>@lang('Memory')</b>  ({{$application_info->difficulty_to_remember}})</p>
                                    </li>
                                    <li>
                                        <p><b>@lang('Taking Care')</b> ({{$application_info->difficulty_of_taking}})</p>
                                    </li>
                                    <li>
                                        <p><b>@lang('Communication')</b> ({{$application_info->difficulty_to_Communicate}})</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pb-3">
                        <h4 class="resume-title">
                            @lang("Reference (s):")
                        </h4>
                        <div class="carrer-application-table pt-2">
                            @foreach ($reference_info as $item)
                            <table>
                                <tr>
                                    <td>@lang("Name")</td>
                                    <td>: {{$item->name}} </td>
                                </tr>
                                <tr>
                                    <td>@lang("Organization")</td>
                                    <td>: {{$item->organization}} </td>
                                </tr>
                                <tr>
                                    <td>@lang("Address")</td>
                                    <td>: {{$item->address}} </td>
                                </tr>
                                <tr>
                                    <td>@lang("Mobile")</td>
                                    <td>: {{$item->mobile}} </td>
                                </tr>
                                <tr>
                                    <td>@lang("Email")</td>
                                    <td>: {{$item->email}} </td>
                                </tr>
                                <tr>
                                    <td>@lang("Relation")</td>
                                    <td>: {{$item->relation}} </td>
                                </tr>
                            </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
