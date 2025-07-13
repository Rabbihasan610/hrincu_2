@extends('web.layouts.frontend', ['title' => $training?->lang('title')])

@section('content')

@include('sections.page_banner', ['title' => $training?->lang('title')])

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card px-3">
                    <div class="acquired-head text-center">
                    <h1>{{ __('Training path request form') }}</h1>

                    <form action="{{ route('training.request.submit') }}" method="post">
                        @csrf
                        <input type="hidden" name="training_path_id" class="form-control" value="{{ $training->id }}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Full Name') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}" placeholder="{{ __('Job Title') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="{{ __('Mobile No') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                                </div>
                            </div>
                            

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" placeholder="{{ __('Company Name') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group my-3">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="{{ __('Address') }}">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group my-3">
                                   <textarea name="details" id="" rows="5" class="form-control"  placeholder="{{ __('Details of required service') }}"></textarea>
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
    </div>
</section>

@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
