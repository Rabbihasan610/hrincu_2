@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
<div class="row">
    <div class="pb-3 col-12 col-lg-12">
        <div class="resume-dashboard-right">
            <div class="resume-head">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span> @lang('Edit Preferred Job Details')</span>
            </div>
            <div class="resume-dashboard-body">
                <div class="resume-info-edit-form">
                    <form action="{{route('user.preferredjob.info.edit',$prefer_job_info->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 pb-4">
                                <label for="">@lang('Referred Job Categories') <span>*</span></label>

                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Functional') (max 3)</label>
                                <div class="cat-box">
                                    @foreach ($prefer_functions as $item)
                                    <div class="d-flex">
                                        <input type="checkbox" name="preferred_job_functional[]" value="{{$item->id}}" class="checkbox" id="function{{$item->id}}">
                                        <label for="function{{$item->id}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="selectd-option">
                                    <span>@lang('Functional') (max 3) <i class="fa fa-times" aria-hidden="true"></i></span>
                                    <span>Accounting/Finance <i class="fa fa-times" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Special Skills') (max 3)</label>
                                <div class="cat-box">
                                    @foreach ($prefer_skills as $item)
                                    <div class="d-flex">
                                        <input type="checkbox" class="checkbox" value="{{$item->id}}" name="preferred_job_special_skill[]" id="skill{{$item->id}}">
                                        <label for="skill{{$item->id}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="selectd-option">
                                    <span>@lang('Functional') (max 3) <i class="fa fa-times" aria-hidden="true"></i></span>
                                    <span>Accounting/Finance <i class="fa fa-times" aria-hidden="true"></i></span>
                                </div>
                            </div>


                            <div class="col-12 py-2">
                                <label for="">@lang('Add your preferred organization type') (max 12)</label>
                                <input type="text" name="organization_type" value="{{$prefer_job_info->organization_type}}">
                                <div class="selectd-option">
                                    <span>
                                        @lang('Software Company')<i class="fa fa-times" aria-hidden="true"></i></span>
                                    <span>@lang('It Company') <i class="fa fa-times" aria-hidden="true"></i></span>
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
@endsection
