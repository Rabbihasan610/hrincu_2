@extends('web.layouts.frontend', ['title' => 'Sign In'])

@section('content')
    @php
        $policyPages = getContent('policy_pages.element', false, null, true);

        $type = request()->type ?? 'service-seeker';

    @endphp

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="custom-card">
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                         <li class="nav-item mt-2">
                            <a class="nav-link {{ $type == 'service-seeker' ? 'active' : '' }} custom-nav-link "
                                href="{{ route('user.register', ['type'=> 'service-seeker']) }}"
                                aria-selected="false">{{ __('Register as service seeker “Supplying CVs”') }}</a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link {{ $type == 'service-supplier' ? 'active' : '' }} custom-nav-link"
                                href="{{ route('user.register', ['type'=> 'service-supplier']) }}"
                               >{{ __('Register as service supplier “Marketing CVs”') }}</a>
                        </li>

                    </ul>

                    <div>
                        <div>
                            <form action="{{ route('user.register') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_type" value="job_provider">
                                <div class="mb-3 ">
                                    <label class="form-label">@lang('Username')</label>
                                    <input type="text" class="form-control checkUser" name="username"
                                        value="{{ old('username') }}">
                                    <small class="text-danger usernameExist"></small>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label">@lang('Email Address')</label>
                                    <input type="email" class="form-control checkUser" name="email"
                                        value="{{ old('email') }}">
                                    <small class="text-danger emailExist"></small>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label">@lang('Phone Number')</label>
                                    <input type="text" class="form-control checkUser" name="mobile"
                                        value="{{ old('mobile') }}" required>
                                    <small class="text-danger mobileExist"></small>
                                </div>


                                <div class="mb-3 ">
                                    <label class="form-label">@lang('Password')</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label">@lang('Confirm Password')</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <x-captcha />

                                @if (gs()->agree)
                                    <div class="pb-3 col-12">
                                        <div class="">
                                            <input type="checkbox" id="agree_employer" @checked(old('agree'))
                                                name="agree" required>
                                            <label for="agree">@lang('I agree with')</label> <span>
                                                @foreach ($policyPages as $policy)
                                                    <a href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}"
                                                        target="_blank">{{ __($policy->data_values->title) }}</a>
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                <button type="submit" class="btn btn-base w-100">@lang('Sign Up')</button>
                            </form>
                        </div>
                    </div>

                    <p class="text-center mt-3">@lang('Already have an account?') <a
                            href="{{ route('user.login') }}">@lang('Sign In')</a></p>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .custom-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .custom-nav-link {
            background: transparent !important;
            color: #6a11cb;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s;
            padding: 12px 20px;
        }

        .custom-nav-link.active {
            background: #6a11cb !important;
            color: #fff;
            border-bottom: none;
        }

        .custom-nav-link:hover {
            background: #6a11cb !important;
            color: #fff;
            border-bottom: none;
        }

        .custom-nav-link::after {
            display: none;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
        }

        .form-label {
            font-weight: bold;
        }

        . {
            margin-bottom: 20px;
        }

        .text-danger {
            font-size: 14px;
            margin-top: 5px;
            margin-bottom: 0;
            display: block;
            color: red;
        }

        .form-check-label {
            font-weight: normal;
        }

        .form-check-input {
            margin-top: 6px;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .secure-password {
            position: relative;
        }

        .secure-password div {
            content: "\f0d4";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6a11cb;
        }





        .btn-base {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px;
            transition: 0.3s;
        }

        .btn-base:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }
    </style>
@endpush

{{-- @if (gs('secure_password'))
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif --}}

@push('script')
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
