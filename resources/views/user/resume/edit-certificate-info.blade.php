@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Traning Details')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{route('certificate.info.edit',$certificate_info->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Certification')  <span>*</span></label>
                                    <input type="text" name="certification" value="{{$certificate_info->certification}}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Institute')  <span>*</span></label>
                                    <input type="text" name="institute" value="{{$certificate_info->institute}}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Location')</label>
                                    <input type="text" name="Location" value="{{$certificate_info->Location}}">
                                </div>
                                    <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Duration')  <span>*</span></label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="date" name="duration_start" value="{{$certificate_info->duration_start}}">
                                            </div>
                                            <div class="col-6">
                                                <input type="date" name="duration_end" value="{{$certificate_info->duration_end}}">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="save-data">@lang('Save')</button>
                                    <a href="{{route('dashboard.resume.traning')}}"  class="cancel-data">@lang('Cancel')</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
