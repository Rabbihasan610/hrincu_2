@extends('web.layouts.frontend', ['title' => 'Sponsorship transfer request'])

@section('content')

@include('sections.page_banner', ['title' => 'Sponsorship transfer request'])

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="acquired-head text-center">
                    <h1>{{ __('Sponsorship transfer request') }}</h1>

                    <form action="{{ route('sponsorship.transfer.submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" placeholder="{{ __('Full Name') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="{{ __('Mobile Number') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="current_position" class="form-control" value="{{ old('current_position') }}" placeholder="{{ __('Current Position') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" placeholder="{{ __('Company Name') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="date" name="age" class="form-control" value="{{ old('age') }}" placeholder="{{ __('Age') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="nationality" class="form-control" value="{{ old('nationality') }}" placeholder="{{ __('Nationality') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group my-3">
                                    <textarea name="message" class="form-control" placeholder="{{ __('Message') }}">{{ old('message') }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
