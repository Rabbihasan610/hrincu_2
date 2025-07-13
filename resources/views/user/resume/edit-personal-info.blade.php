@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
<div class="row">
    <div class="pb-3 col-12 col-lg-12">
        <div class="resume-dashboard-right">
            <div class="resume-head" id="abcde">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span>@lang('Edit Personal Details')</span>
            </div>
            <div class="resume-dashboard-body">
                <div class="resume-info-edit-form">
                    <form action="{{route('user.personal-information.update',$personal_info->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('First Name') <span>*</span> </label>
                                <input type="text" name="first_name" value="{{$personal_info->first_name}}" value="{{old('first_name')}}" required>
                                <span class="text-danger">{{$errors->first('first_name')}}</span>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Last Name') <span>*</span> </label>
                                <input type="text" name="last_name" value="{{$personal_info->last_name}}" value="{{old('last_name')}}" required>
                                <span class="text-danger">{{$errors->first('last_name')}}</span>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang("Father's Name") </label>
                                <input type="text"  name="father_name" value="{{$personal_info->father_name}}">
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang("Mother's Name")</label>
                                <input type="text"  name="mother_name" value="{{$personal_info->mother_name}}">

                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Date of Birth') <span>*</span></label>
                                <input type="date"  name="date_of_birth" value="{{$personal_info->date_of_birth}}" required>
                                <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Gender') <span>*</span></label>
                                <select name="gender" required>
                                    <option value="Male" {{$personal_info->gender == 'Male' ? 'selected' : ''}}>@lang('Male')</option>
                                    <option value="Female" {{$personal_info->gender == 'Female' ? 'selected' : ''}}>@lang('Female')</option>
                                    <option value="Others" {{$personal_info->gender == 'Others' ? 'selected' : ''}}>@lang('Others')</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Merital Status') <span>*</span></label>
                                <select name="marital_status" required>
                                    <option value="">@lang('Select one')</option>
                                    <option value="Unmarried" {{$personal_info->marital_status == 'Unmarried' ? 'selected' : ''}}>@lang('Unmarried')</option>
                                    <option value="Married" {{$personal_info->marital_status == 'Married' ? 'selected' : ''}}> @lang('Married') </option>
                                    <option value="Single" {{$personal_info->marital_status == 'Single' ? 'selected' : ''}}> @lang('Single') </option>
                                </select>
                                <span class="text-danger">{{$errors->first('marital_status')}}</span>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Religion')</label>
                                <select name="religion">
                                    <option value="">@lang('Select one')</option>
                                    <option value="Buddhism" {{$personal_info->religion == 'Buddhism' ? 'selected' : ''}}>@lang('Buddhism')</option>
                                    <option value="Christianity" {{$personal_info->religion == 'Christianity' ? 'selected' : ''}}>@lang('Christianity')</option>
                                    <option value="Hinduism"  {{$personal_info->religion == 'Hinduism' ? 'selected' : ''}}>@lang('Hinduism')</option>
                                    <option value="Islam"  {{$personal_info->religion == 'Islam' ? 'selected' : ''}}>@lang('Islam')</option>
                                    <option value="Jainism"  {{$personal_info->religion == 'Jainism' ? 'selected' : ''}}>@lang('Jainism')</option>
                                    <option value="Judaism"  {{$personal_info->religion == 'Judaism' ? 'selected' : ''}}>@lang('Judaism')</option>
                                    <option value="Sikhism"  {{$personal_info->religion == 'Sikhism' ? 'selected' : ''}}>@lang('Sikhism')</option>
                                    <option value="Others"  {{$personal_info->religion == 'Others' ? 'selected' : ''}}>@lang('Others')</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Nationality') <span>*</span></label>
                                <select name="nationality" required>
                                    <option value="">@lang('Select one')</option>
                                    @foreach (\App\Models\Country::all() as $country)
                                    <option value="{{$country?->lang('name') }}" {{$personal_info->nationality == $country?->lang('name') ? 'selected' : ''}}>{{$country?->lang('name')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('National Id') </label>
                                <input type="text" name="national_Id" value="{{$personal_info->national_Id}}">
                            </div>

                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Mobile Number')</label>
                                <input type="text" name="mobile" value="{{$personal_info->mobile}}">
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Email')</label>
                                <input type="text" name="email" value="{{$personal_info->email}}">
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Blood Group')</label>
                                <select name="blood_group">
                                    <option value="">@lang('Select one')</option>
                                    <option value="A+" {{$personal_info->blood_group == 'A+' ? 'selected' : ''}}>A(+ve)</option>
                                    <option value="A-" {{$personal_info->blood_group == 'A-' ? 'selected' : ''}}>A(-ve)</option>
                                    <option value="B+" {{$personal_info->blood_group == 'B+' ? 'selected' : ''}}>B(+ve)</option>
                                    <option value="B-" {{$personal_info->blood_group == 'B-' ? 'selected' : ''}}>B(-ve)</option>
                                    <option value="O+" {{$personal_info->blood_group == 'O+' ? 'selected' : ''}}>O(+ve)</option>
                                    <option value="O-" {{$personal_info->blood_group == 'O-' ? 'selected' : ''}}>O(-ve)</option>
                                    <option value="AB+" {{$personal_info->blood_group == 'AB+' ? 'selected' : ''}}>AB(+ve)</option>
                                    <option value="AB-" {{$personal_info->blood_group == 'AB-' ? 'selected' : ''}}>AB(-ve)</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Height (meters)')</label>
                                <input type="text" name="height" value="{{$personal_info->height}}">
                            </div>
                            <div class="col-12 col-md-6 py-2">
                                <label for="#">@lang('Weight (kg)')</label>
                                <input type="text"  name="weight" value="{{$personal_info->weight}}">
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="save-data">
                                    @lang('Save')
                                </button>
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


