@extends('web.layouts.frontend', ['title' => 'Edit Job post'])

@push('style')
<style>
    .post-title-header h4:after {
        content: '';
        height: 2px;
        width: 8%;
        margin: 0 auto;
        background: #8224e3;
        display: block;
        margin-top: 5px;
    }
</style>
@endpush

@php
    $qualifications = \App\Constants\JobInfo::qualification();
    $jobtypes = \App\Constants\JobInfo::jobtype();
    $salaryranges = \App\Constants\JobInfo::salaryrange();
    $experiences = \App\Constants\JobInfo::experience();
    $levels = \App\Constants\JobInfo::levels();
    $salarytypes = \App\Constants\JobInfo::salarytype();
    $salarycurrencies = \App\Constants\JobInfo::salarycurrency();
@endphp

@section('content')

@include('sections.page_banner', ['title' => 'Edit Job post'])

<div class="login-bg pt-5">
    <div class="main-login-sections">
        <div class="container">
            <div class="main-login-boxs main-jobs-box" style="width:100%;">
                <div class="row">
                    <div class="col">
                        <div class="card-bodys">
                            <div class="card-body">
                                <h5 class="mb-4">@lang('Job Post')</h5>
                                <form action="{{ route('user.update.job.employer', $job->id)}}" method="post" style="padding-bottom: 60px;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Job Title')</label>
                                            <input required type="text" name="title" value="{{$job->title}}" placeholder="@lang('Job Title')" class="form-control">
                                            <div style="color:red;">{{($errors->has('title'))?($errors->first('title')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Job Title') @lang('Ar')</label>
                                            <input required type="text" name="title_ar" value="{{$job->title_ar}}" placeholder="@lang('Job Title Ar')" class="form-control">
                                            <div style="color:red;">{{($errors->has('title_ar'))?($errors->first('title_ar')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Job Category')</label>
                                            <select name="category" class="custom-select form-control" required>
                                                <option value="">@lang('Select Category')</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ $job->job_category_id == $category->id ? 'selected' : '' }}>{{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name }}</option>
                                                @endforeach

                                            </select>
                                            <div style="color:red;">{{($errors->has('category'))?($errors->first('category')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label>@lang('Description')</label>
                                            <textarea required name="description" id="description" rows="6" class="form-control textarea nicEdit" placeholder="@lang('Description')">
                                                {!! $job->description !!}
                                            </textarea>
                                            <div style="color:red;">{{($errors->has('description'))?($errors->first('description')):''}}</div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col">
                                            <label>@lang('Description') @lang('Ar')</label>
                                            <textarea required name="description_ar" id="description_ar" rows="6" class="form-control textarea nicEdit" placeholder="@lang('Description Ar')">
                                                {!! $job->description_ar !!}
                                            </textarea>
                                            <div style="color:red;">{{($errors->has('description_ar'))?($errors->first('description_ar')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <h5 class="mb-4">@lang('Job Details')</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Application Deadline')</label>
                                            <input required type="date" class="form-control" name="deadline" placeholder="@lang('Application Deadline')" value="{{$job->deadline}}">
                                            <div style="color:red;">{{($errors->has('deadline'))?($errors->first('deadline')):''}}</div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Qualification')</label>
                                            <select name="qualification" class="form-control">
                                                @foreach ($qualifications as $key => $qualification)
                                                    <option {{ old('qualification', $job->qualification) == $key ? 'selected' : ''}} value="{{$key}}">{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('qualification'))?($errors->first('qualification')):''}}</div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Job Type')</label>
                                            <select required name="jobtype" class="form-control">
                                                <option value="">@lang('Select Job Type')</option>
                                                @foreach ($jobtypes as $key => $jobtype)
                                                    <option {{ old('jobtype', $job->jobtype) == $key ? 'selected' : ''}} value="{{$key}}">{{$jobtype}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('jobtype'))?($errors->first('jobtype')):''}}</div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Salary Type')</label>
                                            <select required name="salarytype" class="form-control">
                                                <option value="">@lang('Select Salary Type')</option>
                                                @foreach ($salarytypes as $key => $salarytype)
                                                    <option {{ old('salarytype', $job->salarytype) == $key ? 'selected' : ''}} value="{{$key}}">{{$salarytype}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('salarytype'))?($errors->first('salarytype')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Salary Range')</label>
                                            <select required name="salaryrange" class="form-control">
                                                <option value="">@lang('Select Salary Range')</option>
                                                @foreach ($salaryranges as $key => $salaryrange)
                                                    <option {{ old('salaryrange', $job->salaryrange) == $key ? 'selected' : ''}} value="{{$key}}">{{$salaryrange}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('salaryrange'))?($errors->first('salaryrange')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Salary Currency')</label>
                                            <select required name="salarycurrency" class="form-control">
                                                <option value="">@lang('Select Salary Currency')</option>
                                                @foreach ($salarycurrencies as $key => $salarycurrency)
                                                    <option {{ old('salarycurrency', $job->salarycurrency) == $key ? 'selected' : ''}} value="{{$key}}">{{$salarycurrency}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('salarycurrency'))?($errors->first('salarycurrency')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Experience')</label>
                                            <select required name="experience" class="form-control">
                                                <option value="">@lang('Select Experience')</option>
                                                @foreach ($experiences as $key => $experience)
                                                    <option {{ old('experience', $job->experience) == $key ? 'selected' : ''}} value="{{$key}}">{{$experience}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('experience'))?($errors->first('experience')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Levels')</label>
                                            <select required name="level" class="form-control">
                                                <option value="">@lang('Select Level')</option>
                                                @foreach ($levels as $key => $level)
                                                    <option {{ old('level', $job->level) == $key ? 'selected' : ''}} value="{{$key}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red;">{{($errors->has('level'))?($errors->first('level')):''}}</div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label>@lang('Number of Vacancies')</label>
                                            <input required type="text" name="vacancies" placeholder="@lang('Enter No. of Vacancies')" class="form-control" value="{{$job->vacancies}}">
                                            <div style="color:red;">{{($errors->has('vacancies'))?($errors->first('vacancies')):''}}</div>
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col">
                                            <h5 class="mb-4">@lang('Job Location')</h5>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <label>@lang('Country')</label>
                                                    <select required name="country" class="custom-select form-control" id="country_id">
                                                        <option value="">@lang('Select Country')</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{ old('country', $job->country_id) == $country->id ? 'selected' : ''}}>{{ app()->getLocale() == 'ar' ? $country->name_ar : $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div style="color:red;">{{($errors->has('country'))?($errors->first('country')):''}}</div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label>@lang('District')</label>
                                                    <select name="district" class="custom-select form-control" id="district_id">
                                                        <option value="">@lang('Select District')</option>
                                                        @foreach($districts as $district)
                                                        <option value="{{$district->id}}" {{ old('district', $job->district_id) == $district->id ? 'selected' : ''}}>{{ app()->getLocale() == 'ar' ? $district->name_ar : $district->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label>@lang('State/Location')</label>
                                                    <input required type="text" name="statelocation" placeholder="@lang('State/Location')" class="form-control" value="{{$job->location}}">
                                                    <div style="color:red;">{{($errors->has('statelocation'))?($errors->first('statelocation')):''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input class="btn btn-primary mt-3" type="submit" value="@lang('Submit')">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
         $(document).ready(function() {
            $('#country_id').change(function(){
                var country_id =  $(this).val();
                var url = "{{ route('districts') }}";
                $.ajax({
                    url: url,
                    data: {country_id: country_id},
                    type: "GET",
                    success: function(response){
                    $('#district_id').html(response);
                    },
                });
            });

        });
    </script>
@endpush
