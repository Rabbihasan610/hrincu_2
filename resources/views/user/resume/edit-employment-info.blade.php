@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Employment Details')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{route('employment.info.edit',$employment_info->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Company Name') <span>*</span></label>
                                    <input type="text" name="company_name" value="{{$employment_info->company_name}}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Company Business') </label>
                                    <input type="text" name="company_business" value="{{$employment_info->company_business}}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Designation') <span>*</span></label>
                                    <input type="text" name="designation" value="{{$employment_info->designation}}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Department') </label>
                                    <input type="text" name="department" value="{{$employment_info->department}}">

                                </div>
                                <div class="col-12 pb-4">

                                    <label for="">@lang('Employment Period') <span>*</span></label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="date" name="employment_period_start" value="{{$employment_info->employment_period_start}}">
                                        </div>
                                        <div class="col-6">
                                            <input type="date" name="employment_period_end">
                                            <div class="d-flex">
                                                <input type="checkbox" class="checkbox" id="Working" name="currently_working" value="1" {{$employment_info->currently_working == '1' ? 'checked' : ''}}>
                                                <label for="Working" class="ml-5">@lang('Currently Working')</label>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-12 pb-4">
                                    <label for="">@lang('Responsibilities') </label>
                                    <textarea name="responsibilities" id="" cols="30" rows="10">{{$employment_info->employment_period_start}}</textarea>
                                </div>

                                    <div class="col-12">
                                    <label for="">@lang('Company Location') </label>
                                    <input type="text" name="company_location" value="{{$employment_info->company_location}}">
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="save-data">@lang('Save')</button>
                                    <a href="{{route('dashboard.resume.employment')}}"  class="cancel-data">@lang('Cancel')</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
