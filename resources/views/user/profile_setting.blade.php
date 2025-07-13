@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>@lang('Account Settings')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-view-box">
                        <h6>@lang('Welcome to account settings')</h6>
                        <p>
                            @lang('Here you will be able to change your password, resume privacy, notification settings, delete')
                            @lang('resume, delete account and set / change User ID at any time.')
                        </p>
                    </div>

                    <div class="account-setting mt-5">
                        <div class="row">
                            <div class="col-12 col-md-6 pb-3">
                                <a href="{{ route('user.profile.change.user.id') }}"
                                    class="setting-box d-flex align-items-center">
                                    <i class="fas fa-id-card-o" aria-hidden="true" style="background: #00BCD4;"></i>
                                    <h4>@lang('Set / Change User ID')</h4>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 pb-3">
                                <a href="{{ route('user.profile.change.password') }}"
                                    class="setting-box d-flex align-items-center">
                                    <i class="fas fa-lock" aria-hidden="true" style="background: #43A047;"></i>
                                    <h4>@lang('Change Password')</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
