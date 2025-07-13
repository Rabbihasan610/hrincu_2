@extends('web.layouts.master', ['title' => 'Edit Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span>@lang('Edit Photo')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{ route('user.photo.info.edit', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 m-auto">
                                    <div class="row">
                                        <div class="col-12 pb-4 text-center">
                                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image) }}"
                                                alt="" style="width: 150px">
                                        </div>
                                        <div class="col-12 pb-4">
                                            <label for="">@lang('Select Photo')</label>
                                            <input type="file" name="image" image>
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        </div>

                                        <div class="col-12 mt-4">
                                            <button type="submit" class="save-data">@lang('Change Photo')</button>
                                            <a href="{{ route('user.resume.photograph') }}"
                                                class="cancel-data">@lang('Cancel')</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
