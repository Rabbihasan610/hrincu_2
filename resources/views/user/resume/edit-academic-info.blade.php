@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Academic Info')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{ route('user.academic.info.edit', $academic_info->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Level of Education') <span>*</span></label>
                                    <select name="education_lavels_id">
                                        <option value="">@lang('Select one')</option>
                                        @foreach ($education_lavel as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $academic_info->education_lavels_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">Exam/Degree Title <span>*</span></label>
                                    <select name="degrees_id">
                                        <option value="">@lang('Select one')</option>
                                        @foreach ($degree as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $academic_info->degrees_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Concentration/ Major/Group')</label>
                                    <input type="text" name="group" value="{{ $academic_info->group }}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Institute Name') <span>*</span></label>
                                    <input type="text" name="institute_name"
                                        value="{{ $academic_info->institute_name }}">
                                    <div class="d-flex">
                                        <input type="checkbox" class="checkbox" id="foreign" value="1"
                                            name="foreign_institute"
                                            {{ $academic_info->foreign_institute == '1' ? 'checked' : '' }}>
                                        <label for="foreign" class="ml-5">@lang('This is a foreign institute')</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Result') <span>*</span></label>

                                    <select name="result_id">
                                        <option value="">@lang('Select one')</option>
                                        @foreach ($result as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $academic_info->result_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('GPA/CGPA')</label>
                                    <input type="text" name="gpa" value="{{ $academic_info->gpa }}">
                                    <div class="d-flex">
                                        <div class="d-flex mr-15">
                                            <input type="radio" class="checkbox" id="Four" value="4"
                                                name="out_of" {{ $academic_info->out_of == 4 ? 'checked' : '' }}>
                                            <label for="Four" class="ml-5">@lang('Out Of Four(4)')</label>
                                        </div>
                                        <div class="d-flex">
                                            <input type="radio" class="checkbox" id="five" value="5"
                                                name="out_of" {{ $academic_info->out_of == 5 ? 'checked' : '' }}>
                                            <label for="five" class="ml-5">@lang('Out Of Five(5)')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Year Of Passing')</label>
                                    <input type="text" name="year_of_passing"
                                        value="{{ $academic_info->year_of_passing }}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Duration')</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="date" name="duration_start"
                                                value="{{ $academic_info->duration_start }}">
                                        </div>
                                        <div class="col-6">
                                            <input type="date" name="duration_end"
                                                value="{{ $academic_info->duration_end }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="save-data">@lang('Save')</button>
                                    <a href="{{ route('user.resume.traning') }}" class="cancel-data">@lang('Cancel')</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
