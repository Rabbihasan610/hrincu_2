@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <span> Change Password</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="account-setting">
                        <div class="resume-info-edit-form change-password">
                            <form class="needs-validation" action="{{ route('user.profile.change.user.id') }}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-12 py-2">
                                        <label>Carrent User ID:</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="text" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label>New User ID:</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="text" name="email"
                                                value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('email') }}
                                        </span>
                                    </div>
                                    <div class="col-12 py-2">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">
                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" type="password" name="password"
                                                placeholder="Password">
                                        </div>
                                        <span
                                            class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="save-data d-block w-100 mt-3">Change User Id</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
