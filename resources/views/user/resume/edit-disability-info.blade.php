@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span> @lang('Edit Disability Details')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{route('user.disability.info.edit',$disability_info->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-6 pb-4">
                                    <label for=""> @lang('Difficulty to See') </label>
                                    <select name="difficulty_to_See">
                                        <option value="">@lang('Select one')</option>
                                        <option value="Yes - some difficulty" {{$disability_info->difficulty_to_See == 'Yes - some difficulty' ? 'selected' : ''}}>@lang('Yes - some difficulty')</option>
                                        <option value="Yes - a lot of difficulty" {{$disability_info->difficulty_to_See == 'Yes - a lot of difficulty' ? 'selected' : ''}}>@lang('Yes - a lot of difficulty')</option>
                                        <option value="Can not do at all" {{$disability_info->difficulty_to_See == 'Can not do at all' ? 'selected' : ''}}>@lang('Can not do at all')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for=""> @lang('Difficulty to Hear')  </label>
                                    <select name="difficulty_to_hear">
                                        <option value="">@lang('Select one')</option>
                                        <option value="Yes - some difficulty" {{$disability_info->difficulty_to_hear == 'Yes - some difficulty' ? 'selected' : ''}}>@lang('Yes - some difficulty')</option>
                                        <option value="Yes - a lot of difficulty" {{$disability_info->difficulty_to_hear == 'Yes - a lot of difficulty' ? 'selected' : ''}}>@lang('Yes - a lot of difficulty')</option>
                                        <option value="Can not do at all" {{$disability_info->difficulty_to_hear == 'Can not do at all' ? 'selected' : ''}}>@lang('Can not do at all')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for=""> @lang('Difficulty to Concentrate or remember') </label>
                                    <select name="difficulty_to_remember">
                                        <option value="">@lang('Select one')</option>
                                        <option value="Yes - some difficulty" {{$disability_info->difficulty_to_remember == 'Yes - some difficulty' ? 'selected' : ''}}>@lang('Yes - some difficulty')</option>
                                        <option value="Yes - a lot of difficulty" {{$disability_info->difficulty_to_remember == 'Yes - a lot of difficulty' ? 'selected' : ''}}>@lang('Yes - a lot of difficulty')</option>
                                        <option value="Can not do at all" {{$disability_info->difficulty_to_remember == 'Can not do at all' ? 'selected' : ''}}>@lang('Can not do at all')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for=""> @lang('Difficulty to Sit, Stand, Walk or Climb Stairs') </label>
                                    <select name="difficulty_to_sit_stand">
                                        <option value="">@lang('Select one')</option>
                                        <option value="Yes - some difficulty" {{$disability_info->difficulty_to_sit_stand == 'Yes - some difficulty' ? 'selected' : ''}}>@lang('Yes - some difficulty')</option>
                                        <option value="Yes - a lot of difficulty" {{$disability_info->difficulty_to_sit_stand == 'Yes - a lot of difficulty' ? 'selected' : ''}}>@lang('Yes - a lot of difficulty')</option>
                                        <option value="Can not do at all" {{$disability_info->difficulty_to_sit_stand == 'Can not do at all' ? 'selected' : ''}}>@lang('Can not do at all')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for=""> @lang('Difficulty to Communicate')  </label>
                                    <select name="difficulty_to_Communicate">
                                        <option value="">@lang('Select one')</option>
                                        <option value="Yes - some difficulty" {{$disability_info->difficulty_to_Communicate == 'Yes - some difficulty' ? 'selected' : ''}}>@lang('Yes - some difficulty')</option>
                                        <option value="Yes - a lot of difficulty" {{$disability_info->difficulty_to_Communicate == 'Yes - a lot of difficulty' ? 'selected' : ''}}>@lang('Yes - a lot of difficulty')</option>
                                        <option value="Can not do at all" {{$disability_info->difficulty_to_Communicate == 'Can not do at all' ? 'selected' : ''}}>@lang('Can not do at all')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 pb-4">
                                    <label for=""> @lang('Difficulty of Taking Care (example: shower, wearing clothes)')  </label>
                                    <select name="difficulty_of_taking">
                                        <option value="">@lang('Select one')</option>
                                        <option value="Yes - some difficulty" {{$disability_info->difficulty_of_taking == 'Yes - some difficulty' ? 'selected' : ''}}>@lang('Yes - some difficulty')</option>
                                        <option value="Yes - a lot of difficulty" {{$disability_info->difficulty_of_taking == 'Yes - a lot of difficulty' ? 'selected' : ''}}>@lang('Yes - a lot of difficulty')</option>
                                        <option value="Can not do at all" {{$disability_info->difficulty_of_taking == 'Can not do at all' ? 'selected' : ''}}>@lang('Can not do at all')</option>
                                    </select>
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
