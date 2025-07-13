@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
<div class="row">
    <div class="pb-3 col-12 col-lg-12">
        <div class="resume-dashboard-right">
            <div class="resume-head">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span> @lang('Edit Reference Information')</span>
            </div>
            <div class="resume-dashboard-body">
                <div class="resume-info-edit-form">
                    <form action="{{route('user.reference.info.edit',$reference_info->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Name') <span>*</span></label>
                                <input type="text" name="name" value="{{$reference_info->name}}">
                            </div>
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Designation') <span>*</span></label>
                                <input type="text" name="designation" value="{{$reference_info->designation}}">
                            </div>
                                <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Organization') <span>*</span></label>
                                <input type="text" name="organization" value="{{$reference_info->organization}}">
                            </div>
                                <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Email')</label>
                                <input type="text" name="email" value="{{$reference_info->email}}">
                            </div>
                                <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Relation') </label>
                                <select name="relation">
                                    <option value="Relative" {{$reference_info->relation == 'Relative' ? 'selected' : ''}}>@lang('Relative')</option>
                                    <option value="Family Friend" {{$reference_info->relation == 'Family Friend' ? 'selected' : ''}}>@lang('Family Friend')</option>
                                    <option value="Academic" {{$reference_info->relation == 'Academic' ? 'selected' : ''}}>@lang('Academic')</option>
                                    <option value="Professional" {{$reference_info->relation == 'Professional' ? 'selected' : ''}}>@lang('Professional')</option>
                                    <option value="Others" {{$reference_info->relation == 'Others' ? 'selected' : ''}}>@lang('Others')</option></select>
                            </div>
                            <div class="col-12 col-md-6 pb-4">
                                <label for="">@lang('Mobile') </label>
                                <input type="text" name="mobile" value="{{$reference_info->mobile}}">
                            </div>
                                <div class="col-12 pb-4">
                                <label for="">@lang('Address') </label>
                                <textarea name="address" id="" cols="30" rows="10">{{$reference_info->address}}</textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="save-data">@lang('Save')</button>
                                <a href="{{route('user.resume.other')}}"  class="cancel-data">@lang('Cancel')</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
