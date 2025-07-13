<div class="resume-view-box">
    <p class="m-0">
        @lang('Here you can edit your resume in five different steps (Personal, Education/Training, Employment, Other Information and Photograph). To enrich your resume provide authentic information.')
    </p>
</div>

<div class="edit-resume-option d-flex align-items-center justify-content-between mt-3">
    <div class="edit-resume-option-single {{Route::current()->getName() == 'user.resume' ? 'active-resume' : ''}}">
        <i class="fas fa-user" aria-hidden="true"></i>
        <p>@lang('Personal')</p>
        <span></span>
        <a href="{{route('user.resume', $user->id)}}" class="stretched-link"></a>
    </div>
    <div class="edit-resume-option-single {{Route::current()->getName() == 'user.resume.traning' ? 'active-resume' : ''}}">
        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
        <p>@lang('Education/Traning')</p>
        <a href="{{route('user.resume.traning', $user->id)}}" class="stretched-link"></a>
    </div>
    <div class="edit-resume-option-single {{Route::current()->getName() == 'user.resume.employment' ? 'active-resume' : ''}}">
        <i class="fa fa-briefcase" aria-hidden="true"></i>
        <p>@lang('Employment')</p>
        <a href="{{route('user.resume.employment', $user->id)}}" class="stretched-link"></a>
    </div>
    <div class="edit-resume-option-single {{Route::current()->getName() == 'user.resume.other' ? 'active-resume' : ''}}">
        <i class="fa fa-tasks" aria-hidden="true"></i>
        <p>@lang('Others Information')</p>
        <a href="{{route('user.resume.other', $user->id)}}" class="stretched-link"></a>
    </div>
    <div class="edit-resume-option-single {{Route::current()->getName() == 'user.resume.photograph' ? 'active-resume' : ''}}">
        <i class="fa fa-camera" aria-hidden="true"></i>
        <p>@lang('Photograph')</p>
        <a href="{{route('user.resume.photograph', $user->id)}}" class="stretched-link"></a>
    </div>
</div>
