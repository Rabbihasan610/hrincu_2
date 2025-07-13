@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Other Details')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{route('user.other.info.edit',$other_info->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 pb-4">
                                    <label for="">@lang('Career Summary') <span>*</span></label>
                                    <textarea name="career_summary" id="" cols="30" rows="10" required>{{$other_info->career_summary}}</textarea>
                                </div>
                                <div class="col-12 pb-4">
                                    <label for="">@lang('Special Qualification') <span>*</span></label>
                                    <textarea name="special_qualification" id="" cols="30" rows="10" required>{{$other_info->special_qualification}}</textarea>
                                </div>
                                <div class="col-12 pb-4">
                                    <label for="">@lang('Keywords')</label>
                                    <input type="text" name="keywords"  value="{{$other_info->keywords}}">
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
