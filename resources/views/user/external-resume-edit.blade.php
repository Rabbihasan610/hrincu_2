@extends('web.layouts.master', ['title' => 'Resume Edit'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="dashboard-content-area bg-white card p-1">
                <div class="card-header">
                    <h6 class="mb-3 mt-4">@lang('Resume Edit')</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.resume.upload.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="resume">@lang('Upload CV')</label>
                                <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="video_link">@lang('Video Link') @lang('(Optional)')</label>
                                <input type="text" name="video_link" id="video_link" class="form-control" value="{{ $resume->video_link }}">
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
@endsection

