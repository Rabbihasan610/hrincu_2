<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <div>
                <img src="{{ siteLogo() }}" alt="" style="width:60%">
            </div>
        </div>
        <div class="toggle-icon ms-auto">
            <i class="bi bi-list"></i>
        </div>
    </div>
    <ul class="metismenu sidebar__menu-main" id="menu">
        <li class="sidebar--menu {{ menuActive('admin.dashboard') }}">
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class="bi bi-speedometer2"></i>
                </div>
                <div class="menu-title">@lang('Dashboard')</div>
            </a>
        </li>

        <li class="menu-label">@lang('Category Management')</li>
        <li
            class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.candidate-category*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title">@lang('Manage Category')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.candidate-category*') }}">
                    <a href="{{ route('admin.candidate-category.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Candidate Categories')</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">@lang('Job Management')</li>
        <li
            class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.job*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title">@lang('Manage Job')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.job*') }}">
                    <a href="{{ route('admin.job.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Jobs')</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">@lang('Service Management')</li>
        <li
            class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.service*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title">@lang('Manage Service')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.sectors*') }}">
                    <a href="{{ route('admin.sectors.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Sectors')</a>
                </li>
                <li class="{{ menuActive('admin.trainingpath*') }}">
                    <a href="{{ route('admin.trainingpath.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Training Path')</a>
                </li>
                <li class="{{ menuActive('admin.community.partnership*') }}">
                    <a href="{{ route('admin.community.partnership.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Community Partnerships')</a>
                </li>

                <li class="{{ menuActive('admin.our-services.index*') }}">
                    <a href="{{ route('admin.our-services.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Our Services')</a>
                </li>

                <li class="{{ menuActive('admin.service.index*') }}">
                    <a href="{{ route('admin.service.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Services')</a>
                </li>

                <li class="{{ menuActive('admin.service.request*') }}">
                    <a href="{{ route('admin.service.request.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('All Requests')
                    </a>
                </li>
                <li class="{{ menuActive('admin.sector.request*') }}">
                    <a href="{{ route('admin.sector.request.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Sector Requests')
                    </a>
                </li>
                <li class="{{ menuActive('admin.trainingpath.request*') }}">
                    <a href="{{ route('admin.trainingpath.request.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Training Path Request')
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-label">@lang('Request Management')</li>
        <li
            class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.sponsorship-transfer.request.*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title">@lang('Manage Request')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.sponsorship-transfer.request.index*') }}">
                    <a href="{{ route('admin.sponsorship-transfer.request.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Sponsorship Requests')</a>
                </li>

                <li class="{{ menuActive('admin.our-services-request.index*') }}">
                    <a href="{{ route('admin.our-services-request.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Our Service Requests')</a>
                </li>
            </ul>
        </li>


        <li class="menu-label">@lang('Query Management')</li>
        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.contact*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-question-circle"></i>
                </div>
                <div class="menu-title">@lang('Query Management')</div>
            </a>
            <ul>
                <li class="{{ request()->get('type') == 'basic' ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.index', ['type' => 'basic']) }}"><i
                            class="bi bi-record-circle"></i>@lang('Basic Queries')</a>
                </li>
                <li class="{{ request()->get('type') == 'query' ? 'active' : '' }}">
                    <a href="{{ route('admin.contact.index', ['type' => 'query']) }}"><i
                            class="bi bi-record-circle"></i>@lang('Problem Queries')</a>
                </li>
            </ul>
        </li>




        <li class="menu-label">@lang('General Setting')</li>
        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.users*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people"></i>
                </div>
                <div class="menu-title">@lang('Manage Users')</div>
                @if ($emailUnverifiedUsersCount || $mobileUnverifiedUsersCount)
                    <span class="red__notify"></span>
                @endif
            </a>
            <ul>
                <li class="{{ menuActive('admin.users.active') }}">
                    <a href="{{ route('admin.users.active') }}"><i
                            class="bi bi-record-circle"></i>@lang('Active Users')</a>
                </li>
                <li class="{{ menuActive('admin.users.banned') }}">
                    <a href="{{ route('admin.users.banned') }}"><i
                            class="bi bi-record-circle"></i>@lang('Banned Users')</a>
                </li>
                <li class="{{ menuActive('admin.users.unverified') }}">
                    <a href="{{ route('admin.users.email.unverified') }}"><i
                            class="bi bi-record-circle"></i>@lang('Email Unverified')
                        @if ($emailUnverifiedUsersCount)
                            <span class="red__notify"></span>
                        @endif
                    </a>

                </li>
                <li class="{{ menuActive('admin.users.unverified') }}">
                    <a href="{{ route('admin.users.mobile.unverified') }}">
                        <i class="bi bi-record-circle"></i>@lang('Mobile Unverified')
                        @if ($mobileUnverifiedUsersCount)
                            <span class="red__notify"></span>
                        @endif
                    </a>

                </li>
                <li class="{{ menuActive('admin.users.all') }}">
                    <a href="{{ route('admin.users.all') }}"><i
                            class="bi bi-record-circle"></i>@lang('All Users')</a>
                </li>
                {{-- <li> <a href="{{ route('admin.users.notification.all') }}"><i
                            class="bi bi-record-circle"></i>@lang('Notification to All')</a></li> --}}
            </ul>
        </li>




        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.report*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                <div class="menu-title">@lang('Report')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.report.login.history') }}">
                    <a href="{{ route('admin.report.login.history') }}"><i
                            class="bi bi-record-circle"></i>@lang('Login History')</a>
                </li>
                <li class="{{ menuActive('admin.report.notification.history') }}">
                    <a href="{{ route('admin.report.notification.history') }}"><i
                            class="bi bi-record-circle"></i>@lang('Notification History')</a>
                </li>
            </ul>
        </li>

        <li
            class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.country*']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title">@lang('Manage Area')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.country*') }}">
                    <a href="{{ route('admin.country.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Countries')</a>
                </li>
                <li class="{{ menuActive('admin.city*') }}">
                    <a href="{{ route('admin.city.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('City')</a>
                </li>
                <li class="{{ menuActive('admin.state*') }}">
                    <a href="{{ route('admin.state.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('State')</a>
                </li>
            </ul>
        </li>



        <li
            class="sidebar--menu sidebar--dropdown {{ menuActive(['admin.setting.index', 'admin.setting.system*', 'admin.setting.cookie', 'admin.setting.logo.icon', 'admin.extensions', 'admin.language*', 'admin.seo', 'admin.maintenance.mode']) }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-gear"></i>
                </div>
                <div class="menu-title">@lang('Settings')</div>
            </a>
            <ul>
                <li class="{{ menuActive(['admin.setting.index']) }}">
                    <a href="{{ route('admin.setting.index') }}">
                        <i class="bi bi-record-circle"></i>@lang('General Setting')
                    </a>
                </li>
                <li class="{{ menuActive('admin.setting.system.configuration') }}">
                    <a href="{{ route('admin.setting.system.configuration') }}">
                        <i class="bi bi-record-circle"></i>@lang('System Configuration')
                    </a>
                </li>
                <li class="{{ menuActive('admin.setting.logo.icon') }}">
                    <a href="{{ route('admin.setting.logo.icon') }}">
                        <i class="bi bi-record-circle"></i>@lang('Logo & Favicon')</a>
                </li>
                <li class="{{ menuActive('admin.extensions.index') }}">
                    <a href="{{ route('admin.extensions.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('Extensions')</a>
                </li>
                <li class="{{ menuActive('admin.language.manage') }}">
                    <a href="{{ route('admin.language.manage') }}"><i
                            class="bi bi-record-circle"></i>@lang('Language')</a>
                </li>
                <li class="{{ menuActive('admin.seo') }}">
                    <a href="{{ route('admin.seo') }}"><i class="bi bi-record-circle"></i>@lang('SEO Manager')</a>
                </li>

                <li class="{{ menuActive('admin.maintenance.mode') }}">
                    <a href="{{ route('admin.maintenance.mode') }}"><i
                            class="bi bi-record-circle"></i>@lang('Maintenance Mode')</a>
                </li>
                <li class="{{ menuActive('admin.setting.cookie') }}">
                    <a href="{{ route('admin.setting.cookie') }}"><i
                            class="bi bi-record-circle"></i>@lang('GDPR Cookie')</a>
                </li>
                <li class="{{ menuActive('admin.setting.custom.css') }}">
                    <a href="{{ route('admin.setting.custom.css') }}"><i
                            class="bi bi-record-circle"></i>@lang('Custom CSS')</a>
                </li>
            </ul>
        </li>


        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.setting.notification*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bell"></i>
                </div>
                <div class="menu-title">@lang('Notification Setting')</div>
            </a>
            <ul>
                <li class="{{ menuActive('admin.setting.notification.global') }}">
                    <a href="{{ route('admin.setting.notification.global') }}"><i
                            class="bi bi-record-circle"></i>@lang('Global Template')</a>
                </li>
                <li class="{{ menuActive('admin.setting.notification.email') }}">
                    <a href="{{ route('admin.setting.notification.email') }}"><i
                            class="bi bi-record-circle"></i>@lang('Email Setting')</a>
                </li>
                <li class="{{ menuActive('admin.setting.notification.sms') }}">
                    <a href="{{ route('admin.setting.notification.sms') }}"><i
                            class="bi bi-record-circle"></i>@lang('SMS Setting')</a>
                </li>
                <li class="{{ menuActive('admin.setting.notification.templates') }}">
                    <a href="{{ route('admin.setting.notification.templates') }}"><i
                            class="bi bi-record-circle"></i>@lang('Notification Templates')</a>
                </li>
            </ul>
        </li>


        <li class="menu-label">@lang('CRM')</li>

        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.setting.notification*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bell"></i>
                </div>
                <div class="menu-title">@lang('CRM Setting')</div>
            </a>
            <ul>
                @include('admin.partials.mail_sidenav')
            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.support*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-chat-right-dots"></i>
                </div>
                <div class="menu-title">@lang('Customer Support')</div>
                @if ($pendingSupportCount)
                    <span class="red__notify"></span>
                @endif
            </a>
            <ul>
                <li class="{{ menuActive('admin.support.pending') }}">
                    <a href="{{ route('admin.support.pending') }}">
                        <i class="bi bi-record-circle"></i>@lang('Pending Support')
                        @if ($pendingSupportCount)
                            <span class="red__notify"></span>
                        @endif
                    </a>
                </li>
                <li class="{{ menuActive('admin.support.closed') }}">
                    <a href="{{ route('admin.support.closed') }}"><i
                            class="bi bi-record-circle"></i>@lang('Closed Support')</a>
                </li>
                <li class="{{ menuActive('admin.support.answered') }}">
                    <a href="{{ route('admin.support.answered') }}"><i
                            class="bi bi-record-circle"></i>@lang('Answered Support')</a>
                </li>
                <li class="{{ menuActive('admin.support.index') }}">
                    <a href="{{ route('admin.support.index') }}"><i
                            class="bi bi-record-circle"></i>@lang('All Support')</a>
                </li>
            </ul>
        </li>
        <li class="sidebar--menu {{ menuActive('admin.subscriber*') }}">
            <a href="{{ route('admin.subscriber.index') }}">
                <div class="parent-icon"><i class="bi bi-bell-slash"></i>
                </div>
                <div class="menu-title">@lang('Subscribers')</div>
            </a>
        </li>

        <li class="menu-label">@lang('Blog')</li>

        <li class="sidebar--menu sidebar--dropdown">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bookshelf"></i>
                </div>
                <div class="menu-title">@lang('Blog Section')</div>
            </a>
            <ul>
                <li class="">
                    <a href="{{ route('admin.blog.category.index') }}">
                        <i class="bi bi-record-circle"></i>{{ __('Blog Category') }}
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('admin.blog.index') }}">
                        <i class="bi bi-record-circle"></i>{{ __('Blog') }}
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-label">@lang('Pages & Section')</li>
        <li class="sidebar--menu {{ menuActive('admin.frontend.manage.pages*') }}">
            <a href="{{ route('admin.frontend.manage.pages') }}">
                <div class="parent-icon"><i class="bi bi-file-earmark"></i>
                </div>
                <div class="menu-title">@lang('Manage Pages')</div>
            </a>
        </li>

        <li class="sidebar--menu sidebar--dropdown {{ menuActive('admin.frontend.sections*') }}">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bookshelf"></i>
                </div>
                <div class="menu-title">@lang('Manage Section')</div>
            </a>
            <ul>
                @php
                    $lastSegment = collect(request()->segments())->last();
                @endphp
                @foreach (getPageSections(true) as $k => $secs)
                    @if ($secs['builder'])
                        <li class="{{ $lastSegment == $k ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.frontend.sections', $k) }}">
                                <i class="bi bi-record-circle"></i>{{ __($secs['name']) }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>
</aside>
