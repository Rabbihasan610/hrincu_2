@extends('web.layouts.frontend', ['title' => 'Application'])

@section('content')
    @include('sections.page_banner', ['title' => 'Application'])
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <div class="card-bodys">
                    <div class="card-body">
                        <h5 class="mb-4">@lang('Application for')    >    <span style="color: #000;">{{ $job?->lang('title') }}</span> </h5>

                        <form action="{{ route('user.application.submit') }}" method="post" style="padding-bottom: 60px;" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label>@lang('Expected Salary')</label>
                                    <input required type="text" name="expectedsalary" placeholder="@lang('Expected Salary')"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="resume">@lang('Upload CV')</label>
                                    <input required type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input class="btn btn-primary mt-3" type="submit" value="@lang('Submit')">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
