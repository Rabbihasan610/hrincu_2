@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <span> @lang('Change Password')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="account-setting">
                        <div class="resume-info-edit-form change-password">
                            <form class="needs-validation" action="{{ route('user.profile.change.password') }}"
                                method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 py-2">
                                        <label>@lang('User ID')</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="text" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label>@lang('Carrent Password')</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="password" name="current_password"
                                                placeholder="Current password">
                                        </div>
                                        <span
                                            class="text-danger">{{ $errors->has('current_password') ? $errors->first('current_password') : '' }}</span>
                                    </div>


                                    <div class="col-12 py-2">
                                        <label>@lang('New Password')</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="password" name="new_password"
                                                placeholder="New password">
                                        </div>
                                        <span
                                            class="text-danger">{{ $errors->has('new_password') ? $errors->first('new_password') : '' }}</span>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label>@lang('Confirm Password')</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                placeholder="Confirm password">
                                        </div>
                                        <span
                                            class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
                                    </div>

                                </div>
                                <button type="submit" class="save-data d-block w-100 mt-3">@lang('Change Password')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
