@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
<div class="row">
    <div class="pb-3 col-12 col-lg-12">
        <div class="resume-dashboard-right">
            <div class="resume-head">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span> @lang('Edit specialization Information')</span>
            </div>
            <div class="resume-dashboard-body">
                <div class="resume-info-edit-form">
                    <form action="{{route('user.specialization.info.edit',$specialization_info->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 pb-4">
                                <label for="">Skill <span>*</span></label>
                                <input type="text" name="skill" value="{{$specialization_info->skill}}">
                            </div>
                            <div class="col-12 pb-4">
                                <label for="">@lang('How did you learn the skill?') <span>*</span></label>
                                <div class="d-flex">
                                    <div class="d-flex mr-15">
                                        <input type="checkbox" class="checkbox" id="Self" value="1" name="self" {{$specialization_info->self == 1 ? 'checked' : ''}}>
                                        <label for="Self" class="ml-5">@lang('Self') </label>
                                    </div>
                                    <div class="d-flex  mr-15">
                                        <input type="checkbox" class="checkbox" id="Job" value="1" name="job" {{$specialization_info->job == 1 ? 'checked' : ''}}>
                                        <label for="Job" class="ml-5">@lang('Job')</label>
                                    </div>
                                        <div class="d-flex mr-15">
                                        <input type="checkbox" class="checkbox" id="Educational" value="1" name="educational" {{$specialization_info->educational == 1 ? 'checked' : ''}}>
                                        <label for="Educational" class="ml-5">@lang('Educational')</label>
                                    </div>
                                        <div class="d-flex mr-15">
                                        <input type="checkbox" class="checkbox" id="Training" value="1" name="professional_training" {{$specialization_info->professional_training == 1 ? 'checked' : ''}}>
                                        <label for="Training" class="ml-5">@lang('Training')</label>
                                    </div>
                                    <div class="d-flex mr-15">
                                        <input type="checkbox" class="checkbox" id="NTVQF" value="1" name="ntvqf" {{$specialization_info->ntvqf == 1 ? 'checked' : ''}}>
                                        <label for="NTVQF" class="ml-5">@lang('NTVQF')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="save-data">@lang('Save')</button>
                                <a href="{{route('dashboard.resume.other')}}"  class="cancel-data">@lang('Cancel')</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
