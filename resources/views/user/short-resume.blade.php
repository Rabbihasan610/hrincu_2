@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-right">
                <div class="resume-head">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span>@lang('View Resume')</span>
                </div>
                <div class="resume-small-body">
                    <div class="resume-view-box d-flex align-items-center justify-content-between my-3">
                        <div>
                            <a href="#">
                                <i class="fas fa-download" aria-hidden="true"></i>
                                <span>@lang('Download')</span>
                            </a>
                            @if (Auth::user()->user_type == 'job_seeker')
                            <a href="{{route('user.resume.edit')}}" class="mx-4">
                                <i class="fas fa-pencil-square" aria-hidden="true"></i>
                                @lang('Edit')
                            </a>
                            @endif
                        </div>
                        <div>
                            <a href="#" class="mx-2">
                                <i class="fas fa-file-text" aria-hidden="true"></i>
                                <span>@lang('View Resume')</span>
                            </a>
                            <div class="btn-group resume-view-btn">
                               <a href="{{route('user.resume', $user->id)}}">@lang('Details')</a>
                               <a href="{{route('user.resume.short', $user->id)}}" class="active-btn">@lang('Short')</a>
                            </div>
                        </div>
                    </div>

                    <div class="resume-small-main clearfix">
                        <div class="row">
                            <div class="col-5">
                                <div class="small-resume-left">
                                    <div class="resume-small-photo">
                                        <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image)}}" alt="">
                                    </div>
                                    <h4>{{$personal_info->first_name}} {{$personal_info->last_name}}</h4>

                                    <div class="small-resume-contact">
                                        <div class="d-flex justify-content-start py-2">
                                            <i class="fa fa-phone flex-shrink-0" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">{{$personal_info->mobile}}</span>
                                        </div>
                                        <div class="d-flex justify-content-start py-1">
                                            <i class="fa fa-envelope-o flex-shrink-0" aria-hidden="true"></i>
                                            <span class="flex-shrink-1"> {{$personal_info->email}}</span>
                                        </div>
                                        <div class="d-flex justify-content-start py-2">
                                            <i class="fa fa-home flex-shrink-0" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">
                                                {{$personal_info->countrypre ? $personal_info->countrypre->name : '' }},{{$personal_info->districtpre ? $personal_info->districtpre->name : '' }}, {{$personal_info->present_address_area}}
                                            </span>
                                        </div>

                                    </div>
                                    <div class="mt-4">
                                        <div class="small-resume-title d-flex">
                                            <i class="fa fa-user-o flex-shrink-0" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">@lang('Personal Information')</span>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang("Father's Name")</p>
                                            <b> {{$personal_info->father_name}}</b>
                                        </div>
                                         <div class="py-1">
                                            <p>@lang("Mother's Name")</p>
                                            <b>{{$personal_info->mother_name}}</b>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang('Gender')</p>
                                            <b>{{$personal_info->gender}}</b>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang('Date of Birth')</p>
                                            <b>{{ Carbon\Carbon::parse($personal_info->date_of_birth)->format('M d, Y') }}</b>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang("Height (Meter)")</p>
                                            <b>{{$personal_info->height}}</b>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang('Weight (Kg)')</p>
                                            <b> {{$personal_info->weight}}</b>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang('Nationality')</p>
                                            <b>{{$personal_info->nationality}}</b>
                                        </div>
                                        <div class="py-1">
                                            <p>@lang('Permanent Address')</p>
                                            <b> {{$personal_info->countrypar ? $personal_info->countrypar->name : ''}},{{$personal_info->districtpar ? $personal_info->districtpar->name : ''}}, {{$personal_info->permanent_address_area}}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="small-resume-right py-2">

                                    <div class="py-2">
                                        <div class="small-resume-title d-flex mb-2">
                                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">@lang('Experience')</span>
                                        </div>
                                        @foreach ($employment_info as $item)
                                        <div class="py-2 border-bottom">
                                            <h6>{{$item->designation}}</h6>
                                            <p>@lang('Experience') (@lang('Years')):
                                                @if ($item->currently_working == 1)
                                                    <b class="pt-0">({{ Carbon\Carbon::parse($item->employment_period_start)->format('M, Y') }} - Continuing)</b>
                                                @else
                                                    <b class="pt-0">({{ Carbon\Carbon::parse($item->employment_period_start)->format('M, Y') }} - {{ Carbon\Carbon::parse($item->employment_period_end)->format('M, Y') }})</b>
                                                @endif

                                            <p>@lang('Company') : <b>{{$item->company_name}}</b></p>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="py-2">
                                        <div class="small-resume-title d-flex mb-2">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">@lang('Skills')</span>
                                        </div>
                                        <div class="py-2 border-bottom">
                                            <ul>
                                                @foreach ($skill_info as $item)
                                                <li><b>{{$item->skill}}</b></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="small-resume-title d-flex mb-2">
                                            <i class="fa fa-gavel" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">@lang('Training Summary')</span>
                                        </div>
                                        <div class="py-2 border-bottom">
                                            <ul>
                                                @foreach ($traning_info as $item)
                                                <p><b>{{$item->training_title}}</b></p>
                                                <p>@lang('Institute') : <b>{{$item->institute}}</b></p>
                                                <p>@lang('Duration') : <b>{{$item->duration}}</b></p>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="small-resume-title d-flex mb-2">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            <span class="flex-shrink-1">@lang('Educational Qualification')</span>
                                        </div>
                                        <div class="py-2 border-bottom">
                                            @foreach ($academic_info as $item)
                                            <div class="pb-2">
                                                <b>{{$item->educationLavels ? $item->educationLavels->name:''}}</b>
                                                <p>@lang('Institute') <b>{{$item->institute_name}}</b></p>
                                                <p>@lang('Pass Year') : <b>{{$item->year_of_passing}}</b></p>
                                                <p>@lang('Concentration/Major') : <b>{{$item->degree ? $item->degree->name:''}}</b></p>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="small-resume-title d-flex mb-2">
                                            <i class="fa fa-users" aria-hidden="true"></i>

                                            <span class="flex-shrink-1">@lang('Reference')</span>
                                        </div>
                                        <div class="py-2">
                                            @foreach ($reference_info as $item)
                                            <div>
                                                <b> {{$item->name}}</b>
                                                <p>@lang('Relation') : <b>{{$item->relation}}</b></p>
                                                <p>@lang('Mobile No') <b> {{$item->mobile}}</b></p>
                                                <p>@lang('Email') : <b>  {{$item->email}}</b></p>

                                            </div>
                                            @endforeach
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
