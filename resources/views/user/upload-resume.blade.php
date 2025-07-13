@extends('web.layouts.frontend', ['title' => 'Upload Resume'])

@section('content')
    @include('sections.page_banner', ['title' => 'Upload Resume'])
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <div class="card-bodys">
                    <div class="card-body">
                        <h5 class="mb-4"> @lang('Upload Resume')</h5>

                        <form action="{{ route('user.resume.upload') }}" method="post" style="padding-bottom: 60px;" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="resume">@lang('Upload CV')</label>
                                    <input required type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="video_link">@lang('Video Link') @lang('(Optional)')</label>
                                    <input type="text" name="video_link" id="video_link" class="form-control">
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
