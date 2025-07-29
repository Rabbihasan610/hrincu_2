@php
    $lang = Session::get('lang');
    $user = Auth::user();

    if (!function_exists('menuActive')) {
        function menuActive($routeNames) {
            if (!is_array($routeNames)) {
                $routeNames = [$routeNames];
            }
            foreach ($routeNames as $routeName) {
                if (request()->routeIs($routeName)) {
                    return 'active';
                }
            }
            return '';
        }
    }
@endphp

<div class="d-lg-none float-left d-mobile-toggle-button">
    <i class="bi bi-list mobile-menu-icon"></i>
</div>


<ul class="sm-ul dashboard-sidnav">
    <li class="d-lg-none text-right py-3 px-4">
        <i class="bi bi-x-circle sidebar-close-btn"></i>
    </li>

    <li>
        <a href="{{ route('user.home') }}" class="{{ menuActive('user.home') }}">
            <i class="bi bi-speedometer2 me-1"></i>
            @lang('Dashboard')
        </a>
    </li>

    @if ($user->user_type == 'job_provider')
        <li class="sidebar-dropdown-parent">
            @php
                $manageJobsRoutes = [
                    'user.job.myjobs',
                    'user.active.jobs',
                    'user.pending.jobs',
                    'user.inactive.jobs',
                    'user.rejected.jobs',
                    'user.job.create',
                ];
                $isManageJobsActive = menuActive($manageJobsRoutes);
            @endphp
            <a href="#" class="d-flex justify-content-between align-items-center custom-toggle-btn {{ $isManageJobsActive }}"
                data-target-id="manage-jobs-submenu"
                aria-expanded="{{ $isManageJobsActive ? 'true' : 'false' }}">
                <div>
                    <i class="fa-solid fa-briefcase me-2"></i>
                    @lang('Manage Jobs')
                </div>
                <i class="fa-solid toggle-icon {{ $isManageJobsActive ? 'fa-angle-up' : 'fa-angle-down' }}"></i>
            </a>

            <ul class="list-unstyled submenu" id="manage-jobs-submenu" style="{{ $isManageJobsActive ? 'display: block;' : 'display: none;' }}">
                <li><a href="{{ route('user.job.myjobs') }}" class="{{ menuActive('user.job.myjobs') }}"><i class="fas fa-list me-2"></i> @lang('My Jobs')</a></li>
                <li><a href="{{ route('user.active.jobs') }}" class="{{ menuActive('user.active.jobs') }}"><i class="fas fa-check me-2"></i> @lang('Active Jobs')</a></li>
                <li><a href="{{ route('user.pending.jobs') }}" class="{{ menuActive('user.pending.jobs') }}"><i class="fas fa-clock me-2"></i> @lang('Pending Jobs')</a></li>
                <li><a href="{{ route('user.inactive.jobs') }}" class="{{ menuActive('user.inactive.jobs') }}"><i class="fas fa-minus me-2"></i> @lang('Inactive Jobs')</a></li>
                <li><a href="{{ route('user.rejected.jobs') }}" class="{{ menuActive('user.rejected.jobs') }}"><i class="fas fa-ban me-2"></i> @lang('Rejected Jobs')</a></li>
                <li><a href="{{ route('user.job.create') }}" class="{{ menuActive('user.job.create') }}"><i class="fas fa-plus me-2"></i> @lang('Post Job')</a></li>
            </ul>
        </li>
    @else {{-- user_type is not job_provider --}}
        <li class="sidebar-dropdown-parent">
            @php
                $manageResumeRoutes = [
                    'user.resume',
                    'user.resume.edit',
                ];
                $isManageResumeActive = menuActive($manageResumeRoutes);
            @endphp
            <a href="#" class="d-flex justify-content-between align-items-center custom-toggle-btn {{ $isManageResumeActive }}"
                data-target-id="manage-resume-submenu"
                aria-expanded="{{ $isManageResumeActive ? 'true' : 'false' }}">
                <div>
                    <i class="fa fa-file-text me-1"></i>
                    @lang('Manage Resume')
                </div>
                <i class="fa-solid toggle-icon {{ $isManageResumeActive ? 'fa-angle-up' : 'fa-angle-down' }}"></i>
            </a>

            <ul class="list-unstyled submenu" id="manage-resume-submenu" style="{{ $isManageResumeActive ? 'display: block;' : 'display: none;' }}">
                <li><a href="{{ route('user.resume') }}" class="{{ menuActive('user.resume') }}"><i class="fas fa-file-text me-2"></i> @lang('View Resume')</a></li>
                <li><a href="{{ route('user.resume.edit') }}" class="{{ menuActive('user.resume.edit') }}"><i class="fas fa-pencil-square me-2"></i> @lang('Edit Resume')</a></li>
            </ul>
        </li>

        <li class="sidebar-dropdown-parent">
            @php
                $appliedJobsRoutes = [
                    'user.applied.jobs',
                ];
                $isAppliedJobsActive = menuActive($appliedJobsRoutes);
            @endphp
            <a href="#" class="d-flex justify-content-between align-items-center custom-toggle-btn {{ $isAppliedJobsActive }}"
                data-target-id="applied-jobs-submenu"
                aria-expanded="{{ $isAppliedJobsActive ? 'true' : 'false' }}">
                <div>
                    <i class="fa-solid fa-briefcase me-2"></i>
                    @lang('Applied Jobs')
                </div>
                <i class="fa-solid toggle-icon {{ $isAppliedJobsActive ? 'fa-angle-up' : 'fa-angle-down' }}"></i>
            </a>

            <ul class="list-unstyled submenu" id="applied-jobs-submenu" style="{{ $isAppliedJobsActive ? 'display: block;' : 'display: none;' }}">
                <li><a href="{{ route('user.applied.jobs') }}" class="{{ menuActive('user.applied.jobs') }}"><i class="fas fa-list me-2"></i> @lang('Applied Jobs')</a></li>
            </ul>
        </li>

        <li class="sidebar-dropdown-parent">
            @php
                $uploadResumeRoutes = [
                    'user.external.resume',
                ];
                $isUploadResumeActive = menuActive($uploadResumeRoutes);
            @endphp
            <a href="#" class="d-flex justify-content-between align-items-center custom-toggle-btn {{ $isUploadResumeActive }}"
                data-target-id="resume-manage-submenu"
                aria-expanded="{{ $isUploadResumeActive ? 'true' : 'false' }}">
                <div>
                    <i class="fa-solid fa-upload me-2"></i>
                    @lang('Upload Resume')
                </div>
                <i class="fa-solid toggle-icon {{ $isUploadResumeActive ? 'fa-angle-up' : 'fa-angle-down' }}"></i>
            </a>

            <ul class="list-unstyled submenu" id="resume-manage-submenu" style="{{ $isUploadResumeActive ? 'display: block;' : 'display: none;' }}">
                <li><a href="{{ route('user.external.resume') }}" class="{{ menuActive('user.external.resume') }}"><i class="fas fa-upload me-2"></i> @lang('Upload Resume')</a></li>
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


<div class="offcanvas-overlay"></div>


@push('script')
<script>
    $(document).ready(function() {

        const $mobileToggleBtn = $('.d-mobile-toggle-button');
        const $offcanvasCloseBtn = $('.sidebar-close-btn');
        const $sidebar = $('.dashboard-sidnav');
        const $offcanvasOverlay = $('.offcanvas-overlay');

        function openOffcanvas() {
            $sidebar.addClass('show-offcanvas');
            $offcanvasOverlay.addClass('show-overlay');
            $('body').addClass('overflow-hidden');
        }

        function closeOffcanvas() {
            $sidebar.removeClass('show-offcanvas');
            $offcanvasOverlay.removeClass('show-overlay');
            $('body').removeClass('overflow-hidden');
        }
        $mobileToggleBtn.on('click', function() {
            openOffcanvas();
        });

        $offcanvasCloseBtn.on('click', function() {
            closeOffcanvas();
        });
        $offcanvasOverlay.on('click', function() {
            closeOffcanvas();
        });

        $sidebar.find('a').on('click', function() {
            if ($(window).width() < 992) {
                closeOffcanvas();
            }
        });


        $('.custom-toggle-btn').on('click', function(e) {
            e.preventDefault();

            const $this = $(this);
            const targetId = $this.data('target-id');
            const $targetSubmenu = $('#' + targetId);
            const $toggleIcon = $this.find('.toggle-icon');

            $targetSubmenu.slideToggle(300, function() {
                const isExpanded = $targetSubmenu.is(':visible');
                $this.attr('aria-expanded', isExpanded);

                if (isExpanded) {
                    $toggleIcon.removeClass('fa-angle-down').addClass('fa-angle-up');
                } else {
                    $toggleIcon.removeClass('fa-angle-up').addClass('fa-angle-down');
                }
            });
        });

        $('.sidebar-dropdown-parent').each(function() {
            const $parent = $(this);
            const $toggleBtn = $parent.find('.custom-toggle-btn');
            const targetId = $toggleBtn.data('target-id');
            const $targetSubmenu = $('#' + targetId);
            const $toggleIcon = $toggleBtn.find('.toggle-icon');

            if ($toggleBtn.hasClass('active')) {
                $targetSubmenu.css('display', 'block');
                $toggleIcon.removeClass('fa-angle-down').addClass('fa-angle-up');
                $toggleBtn.attr('aria-expanded', 'true');
            } else {
                $targetSubmenu.css('display', 'none');
                $targetSubmenu.css('display', 'none');
                $toggleIcon.removeClass('fa-angle-up').addClass('fa-angle-down');
                $toggleBtn.attr('aria-expanded', 'false');
            }
        });
    });
</script>
@endpush

@push('style')
<style>
.dashboard-sidnav {
    position: fixed;
    top: 0;
    left: -280px;
    width: 250px;
    height: 100vh;
    overflow-y: auto;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: left 0.3s ease-in-out;
    z-index: 1100;
}
.dashboard-sidnav.show-offcanvas {
    left: 0;
}
.offcanvas-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1090;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}

.offcanvas-overlay.show-overlay {
    opacity: 1;
    visibility: visible;
}

body.overflow-hidden {
    overflow: hidden;
}


.d-mobile-toggle-button {
    cursor: pointer;
    font-size: 1.8rem;
    padding: 10px;
    color: #333;
    display: none;
}

.mobile-menu-icon {
    font-size: 1.5em;
}

.sidebar-close-btn {
    cursor: pointer;
    font-size: 1.8rem;
    color: #555;
}

@media (max-width: 991.98px) {
    .d-mobile-toggle-button {
        display: block;
    }

    .dashboard-sidnav {
    }
}

@media (min-width: 992px) {
    .d-mobile-toggle-button {
        display: none !important;
    }
    .offcanvas-overlay {
        display: none !important;
    }
    .dashboard-sidnav {
        position: static;
        left: auto;
        width: auto;
        height: auto;
        box-shadow: none;
        transform: none;
        display: block !important;
    }
    .dashboard-sidnav.show-offcanvas {
        left: auto;
    }
    body.overflow-hidden {
        overflow: auto;
    }
    .sidebar-close-btn {
        display: none;
    }
}


.sm-ul.dashboard-sidnav {
    padding: 10px 15px;
    display: flex;
    align-items: center;
    color: #333;
    text-decoration: none;
}

.sm-ul.dashboard-sidnav li a:hover {
    background-color: #f0f0f0;
}

.sm-ul.dashboard-sidnav li a.active {
    background-color: #e9e9e9;
    color: #007bff; 
}

.sidebar-dropdown-parent {
   
}

.submenu {
    padding-left: 20px;
}

.submenu li a {
    padding-top: 8px;
    padding-bottom: 8px;
    font-size: 0.9em;
}

.toggle-icon {
    margin-left: auto;
    transition: transform 0.3s ease; /* Smooth icon rotation */
}
</style>
@endpush