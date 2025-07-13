@extends('web.layouts.master', ['title' => 'Dashboard'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span>@lang('View Resume')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-view-box">
                        <h6>@lang('Welcome to your job Incubator account!')</h6>
                        <p>
                            {{ __('Here you can check your detailed stats like Companies viewed your Resume, Online Application,') }}
                            {{ __('Emailed Resume, Shortlisted Jobs etc. Besides Stats from the Manage Resume option, you can view') }}
                            {{ __('your resume dashboard at a glance to add/update.') }}
                        </p>
                    </div>

                    <div class="resume-activities">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">@lang('This Month')</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">@lang('All Time')</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="resume-activite-box clearfix py-4">
                                    <h6>@lang('My Activities')</h6>
                                    <div>
                                        <div class="row">
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Online Application')</h6>
                                                        <h6>{{ @$online_application ?? 0 }}</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Emailed Resume')</h6>
                                                        <h6>{{ @$emailed_resume ?? 0}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single"
                                                    style="border-left: none; border-right: none;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>{{ __('Shortlisted Jobs') }}</h6>
                                                        <h6>{{ @$shortlisted_job ?? 0 }}</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Favorite search')</h6>
                                                        <h6>{{ @$favorite_search ?? 0 }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Following Employer(s)')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resume-activite-box clearfix py-2">
                                    <div class="d-flex align-itmes-center justify-content-between">
                                        <h6>@lang('Resume View Summary')</h6>
                                        <a href="{{ route('user.resume') }}">@lang('Manage Resume')</a>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Job incubator Resume')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Total company Viewed')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single"
                                                    style="border-left: none; border-right: none;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Personalized Resume')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Video Resume')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                                tabindex="0">
                                <div class="resume-activite-box clearfix py-4">
                                    <h6>@lang('My Activities')</h6>
                                    <div>
                                        <div class="row">
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Online Application')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Emailed Resume')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single"
                                                    style="border-left: none; border-right: none;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Shortlisted Jobs')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Favorite search')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Following Employer(s)')</h6>
                                                        <h6>0</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="resume-activite-box clearfix py-2">
                                    <div class="d-flex align-itmes-center justify-content-between">
                                        <h6>@lang('Resume View Summary')</h6>
                                        <a href="{{ route('user.resume') }}">
                                            @lang('Manage Resume')
                                        </a>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Resume')</h6>
                                                        <h6>{{ @$resume ?? 0 }}</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Total Company Viewed')</h6>
                                                        <h6>{{ @$total_company_view ?? 0 }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single"
                                                    style="border-left: none; border-right: none;">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Personalized Resume')</h6>
                                                        <h6>{{ @$personalized_resume ?? 0 }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 p-0">
                                                <div class="resume-activite-single">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>@lang('Video Resume')</h6>
                                                        <h6>{{ @$video_resume ?? 0}}</h6>
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
