@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
                <div class="resume-dashboard-right">
                    <div class="resume-head">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span> @lang('Edit Carrer Details')</span>
                    </div>
                    <div class="resume-dashboard-body">
                        <div class="resume-info-edit-form">
                            <form action="{{route('user.carrer.info.edit',$application_info->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">@lang('Objective') <span>*</span></label>
                                        <textarea name="objective" id="" cols="30" rows="10" required>{{$application_info->objective}}</textarea>
                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="#">@lang('Present Salary')</label>
                                        <input type="text" name="present_salary" value="{{$application_info->present_salary}}">
                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="">@lang('Expected Salary')</label>
                                        <input type="text" name="expected_salary" value="{{$application_info->expected_salary}}">

                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="">@lang('Looking for (Job Level)')</label>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="job_level" id="Entry" value="Entry Level" {{$application_info->job_level == 'Entry Level' ? 'checked' : '' }}>
                                                <label for="Entry" class="ml-5">@lang('Entry Level')</label>
                                            </div>
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="job_level" id="Mid" value="Mid Lavel" {{$application_info->job_level == 'Mid Lavel' ? 'checked' : '' }}>
                                                <label for="Mid" class="ml-5">@lang('Mid Lavel')</label>
                                            </div>
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="job_level" id="Top" value="Top Lavel" {{$application_info->job_level == 'Top Lavel' ? 'checked' : '' }}>
                                                <label for="Top" class="ml-5">@lang('Top Lavel')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 py-2">
                                        <label for="">@lang('Available for (Job Nature)')</label>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="available_for" id="Full" value="Full Time" {{$application_info->available_for == 'Full Time' ? 'checked' : '' }}>
                                                <label for="Full" class="ml-5">@lang('Full Time')</label>
                                            </div>
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="available_for" id="Part" value="Part Time" {{$application_info->available_for == 'Part Time' ? 'checked' : '' }}>
                                                <label for="Part" class="ml-5">@lang('Part Time')</label>
                                            </div>
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="available_for" id="Contract" value="Contract" {{$application_info->available_for == 'Contract' ? 'checked' : '' }}>
                                                <label for="Contract" class="ml-5">@lang('Contract')</label>
                                            </div>
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="available_for" id="Internship" value="Internship" {{$application_info->available_for == 'Internship' ? 'checked' : '' }}>
                                                <label for="Internship" class="ml-5">@lang('Internship')</label>
                                            </div>
                                            <div class="d-flex mr-15">
                                                <input type="radio" class="checkbox" name="available_for" id="Freelance" value="Freelance" {{$application_info->available_for == 'Freelance' ? 'checked' : '' }}>
                                                <label for="Freelance" class="ml-5">@lang('Freelance')</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button type="submit" class="save-data">@lang('Save')</button>
                                        <a href="{{route('user.resume')}}" class="cancel-data">@lang('Cancel')</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
