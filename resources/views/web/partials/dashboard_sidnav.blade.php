@php
    $lang = Session::get('lang');
    $user = Auth::user();
@endphp

<div class="float-left d-mobile-close d-mobile-toggle">
    <i class="bi bi-x-circle"></i>
</div>
<ul class="sm-ul dashboard-sidnav">

    @if ($user->user_type == 'job_provider')
        <li>
            <a href="{{ route('user.home') }}" class="{{ menuActive('user.home') }}">
                <i class="bi bi-speedometer2 me-1"></i>
                @lang('Dashboard')
            </a>
        </li>

        <li>
            <a href="#" class="d-flex justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#manage-jobs" role="button" aria-expanded="false"
                aria-controls="manage-jobs">
                <div>
                    <i class="fa-solid fa-briefcase me-2"></i>
                    @lang('Manage Jobs')
                </div>
                <i class="fa-solid fa-angle-down toggle-icon float-end mt-1"></i>
            </a>

            <ul class="list-unstyled collapse submenu" id="manage-jobs">

                <li><a href="{{ route('user.job.myjobs') }}"><i class="fas fa-list me-2 mt-1"></i>
                        @lang('My Jobs')</a></li>

                <li><a href="{{ route('user.active.jobs') }}"><i class="fas fa-check me-2 me-2 mt-1"></i>
                                @lang('Active Jobs')</a></li>

                <li><a href="{{ route('user.pending.jobs') }}"><i class="fas fa-clock me-2 me-2 mt-1"></i>
                                @lang('Pending Jobs')</a></li>

                <li><a href="{{ route('user.inactive.jobs') }}"><i class="fas fa-minus  me-2 me-2 mt-1"></i>
                    @lang('Inactive Jobs')</a></li>

                <li><a href="{{ route('user.rejected.jobs') }}"><i class="fas fa-ban me-2 me-2 mt-1"></i>
                    @lang('Rejected Jobs')</a></li>

                <li><a href="{{ route('user.job.create') }}"><i class="fas fa-plus me-2 mt-1"></i>
                        @lang('Post Job')</a></li>


            </ul>
        </li>
    @else
        <li>
            <a href="{{ route('user.home') }}" class="{{ menuActive('user.home') }}">
                <i class="bi bi-speedometer2 me-1"></i>
                @lang('Dashboard')
            </a>
        </li>

        <li>
            <a href="#" class="{{ menuActive('user.profile.setting') }} d-flex justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#manage-resume" role="button" aria-expanded="false"
                aria-controls="manage-resume">
                <div>
                    <i class="fa fa-file-text me-1"></i>
                    @lang('Manage Resume')
                </div>
                <i class="fa-solid fa-angle-down toggle-icon float-end mt-1"></i>
            </a>

            <ul class="list-unstyled collapse submenu" id="manage-resume">

                <li><a href="{{ route('user.resume') }}"><i class="fas fa-file-text me-2 mt-1"></i>
                        @lang('View Resume')</a></li>
                <li><a href="{{ route('user.resume.edit') }}"><i class="fas fa-pencil-square me-2 mt-1"></i>
                        @lang('Edit Resume')</a></li>

            </ul>
        </li>

        <li>
            <a href="#" class="d-flex justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#applied-jobs" role="button" aria-expanded="false"
                aria-controls="applied-jobs">
                <div>
                    <i class="fa-solid fa-briefcase me-2"></i>
                    @lang('Applied Jobs')
                </div>
                <i class="fa-solid fa-angle-down toggle-icon float-end mt-1"></i>
            </a>

            <ul class="list-unstyled collapse submenu" id="applied-jobs">

                <li><a href="{{ route('user.applied.jobs') }}"><i class="fas fa-list me-2 mt-1"></i>
                        @lang('Applied Jobs')</a></li>
            </ul>
        </li>

        <li>
            <a href="#" class="d-flex justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#resume-manage" role="button" aria-expanded="false"
                aria-controls="resume-manage">
                <div>
                    <i class="fa-solid fa-upload me-2"></i>
                    @lang('Upload Resume')
                </div>
                <i class="fa-solid fa-angle-down toggle-icon float-end mt-1"></i>
            </a>

            <ul class="list-unstyled collapse submenu" id="resume-manage">

                <li><a href="{{ route('user.external.resume') }}"><i class="fas fa-upload me-2 mt-1"></i>
                        @lang('Upload Resume')</a></li>
            </ul>
        </li>
    @endif


    <li>
        <a href="{{ route('user.profile.setting') }}" class="{{ menuActive('user.profile.setting') }}">
            <i class="fa fa-cogs me-1"></i>
            @lang('Account Settings')
        </a>
    </li>
    <li>
        <a href="{{ route('support.index') }}" class="{{ menuActive('support.index') }}">
            <i class="bi bi-envelope me-1"></i>
            @lang('Support')
        </a>
    </li>
    <li>
        <a href="{{ route('user.change.password') }}" class="{{ menuActive('user.change.password') }}">
            <i class="bi bi-lock me-1"></i>
            @lang('Change Password')
        </a>
    </li>
    <li>
        <a href="{{ route('user.logout') }}">
            <i class="bi bi-box-arrow-right me-1"></i>
            @lang('Logout')
        </a>
    </li>
</ul>


@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function(toggle) {
                let targetId = toggle.getAttribute("data-bs-target");
                let collapseElement = document.querySelector(targetId);
                let toggleIcon = toggle.querySelector(".toggle-icon");

                collapseElement.addEventListener("show.bs.collapse", function() {
                    toggleIcon.classList.remove("fa-angle-down");
                    toggleIcon.classList.add("fa-angle-up");
                });

                collapseElement.addEventListener("hide.bs.collapse", function() {
                    toggleIcon.classList.remove("fa-angle-up");
                    toggleIcon.classList.add("fa-angle-down");
                });
            });
        });
    </script>
@endpush
