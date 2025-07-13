@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
<div class="row">
    <div class="pb-3 col-12 col-lg-12">
        <div class="resume-dashboard-right">
            <div class="resume-head">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <span> Edit Resume</span>
            </div>

            <div class="resume-dashboard-body">
                @include('user.includes.edit-resume-tab')

                <div class="resume-edit-acc mt-5">
                    <div class="personal-info py-5">
                        <div class="photograph-image clearfix">
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image)}}" alt="">
                        </div>
                        <div class="photograph-change clearfix mt-4">
                            <a href="{{route('user.photo.info.edit',$user->id)}}" class="change">Change Photo</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

