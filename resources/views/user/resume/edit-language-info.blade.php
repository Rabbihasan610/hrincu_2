@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Lnaguage Information')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{route('language.info.edit',$language_info->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Language') <span>*</span></label>
                                    <input type="text" name="Language" value="{{$language_info->Language}}">
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Reading') <span>*</span></label>
                                    <select name="reading">
                                        <option value="">@lang('Select one')</option>
                                        <option value="High" {{$language_info->reading == 'High' ? 'selected' : ''}}>@lang('High')</option>
                                        <option value="Medium" {{$language_info->reading == 'Medium' ? 'selected' : ''}}>@lang('Medium')</option>
                                        <option value="Low" {{$language_info->reading == 'Low' ? 'selected' : ''}}>@lang('Low')</option>
                                    </select>
                                </div>
                                    <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Writing') <span>*</span></label>
                                    <select name="writing">
                                        <option value="">@lang('Select one')</option>
                                        <option value="High" {{$language_info->writing == 'High' ? 'selected' : ''}}>@lang('High')</option>
                                        <option value="Medium" {{$language_info->writing == 'Medium' ? 'selected' : ''}}>@lang('Medium')</option>
                                        <option value="Low" {{$language_info->writing == 'Low' ? 'selected' : ''}}>@lang('Low')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for="">@lang('Speaking') <span>*</span></label>
                                    <select name="speaking">
                                        <option value="">@lang('Select one')</option>
                                        <option value="High" {{$language_info->speaking == 'High' ? 'selected' : ''}}>@lang('High')</option>
                                        <option value="Medium" {{$language_info->speaking == 'Medium' ? 'selected' : ''}}>@lang('Medium')</option>
                                        <option value="Low" {{$language_info->speaking == 'Low' ? 'selected' : ''}}>@lang('Low')</option>
                                    </select>
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
