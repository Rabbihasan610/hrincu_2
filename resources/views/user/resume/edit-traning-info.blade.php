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
                    <form action="{{route('user.traning.info.edit',$traning_info->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Training Title') <span>*</span></label>
                                <input type="text" name="training_title" value="{{$traning_info->training_title}}">
                            </div>
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Country') <span>*</span></label>
                                <input type="text" name="country" value="{{$traning_info->country}}">
                            </div>
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Topics Covered')</label>
                                <input type="text" name="topics_covered"  value="{{$traning_info->topics_covered}}">
                            </div>
                                <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Training Year')  <span>*</span></label>
                                <input type="date" name="training_year" value="{{$traning_info->training_year}}">
                            </div>
                                <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Institute') <span>*</span></label>
                                <input type="text" name="institute" value="{{$traning_info->institute}}">
                            </div>
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Duration') <span>*</span></label>
                                <input type="text" name="duration" value="{{$traning_info->duration}}">
                            </div>
                                <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Location')</label>
                                <input type="text" name="Location"  value="{{$traning_info->Location}}">
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="save-data">@lang('Save')</button>
                                <a href="{{route('user.resume.traning')}}"  class="cancel-data">@lang('Cancel')</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
