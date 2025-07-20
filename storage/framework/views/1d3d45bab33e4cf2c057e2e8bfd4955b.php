<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <div>
                <img src="<?php echo e(siteLogo()); ?>" alt="" style="width:60%">
            </div>
        </div>
        <div class="toggle-icon ms-auto">
            <i class="bi bi-list"></i>
        </div>
    </div>
    <ul class="metismenu sidebar__menu-main" id="menu">
        <li class="sidebar--menu <?php echo e(menuActive('admin.dashboard')); ?>">
            <a href="<?php echo e(route('admin.dashboard')); ?>">
                <div class="parent-icon"><i class="bi bi-speedometer2"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Dashboard'); ?></div>
            </a>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Category Management'); ?></li>
        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.candidate-category*'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Category'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.candidate-category*')); ?>">
                    <a href="<?php echo e(route('admin.candidate-category.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Candidate Categories'); ?></a>
                </li>
            </ul>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Job Management'); ?></li>
        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.job*'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Job'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.job*')); ?>">
                    <a href="<?php echo e(route('admin.job.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Jobs'); ?></a>
                </li>
            </ul>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Service Management'); ?></li>
        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.service*'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Service'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.sectors*')); ?>">
                    <a href="<?php echo e(route('admin.sectors.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Sectors'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.trainingpath*')); ?>">
                    <a href="<?php echo e(route('admin.trainingpath.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Training Path'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.community.partnership*')); ?>">
                    <a href="<?php echo e(route('admin.community.partnership.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Community Partnerships'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.our-services.index*')); ?>">
                    <a href="<?php echo e(route('admin.our-services.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Our Services'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.service.index*')); ?>">
                    <a href="<?php echo e(route('admin.service.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Services'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.service.request*')); ?>">
                    <a href="<?php echo e(route('admin.service.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Requests'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.sector.request*')); ?>">
                    <a href="<?php echo e(route('admin.sector.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Sector Requests'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.trainingpath.request*')); ?>">
                    <a href="<?php echo e(route('admin.trainingpath.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Training Path Request'); ?>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Request Management'); ?></li>
        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.sponsorship-transfer.request.*'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Request'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.sponsorship-transfer.request.index*')); ?>">
                    <a href="<?php echo e(route('admin.sponsorship-transfer.request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Sponsorship Requests'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.our-services-request.index*')); ?>">
                    <a href="<?php echo e(route('admin.our-services-request.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Our Service Requests'); ?></a>
                </li>
            </ul>
        </li>


        <li class="menu-label"><?php echo app('translator')->get('Query Management'); ?></li>
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.contact*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-question-circle"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Query Management'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(request()->get('type') == 'basic' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.contact.index', ['type' => 'basic'])); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Basic Queries'); ?></a>
                </li>
                <li class="<?php echo e(request()->get('type') == 'query' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.contact.index', ['type' => 'query'])); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Problem Queries'); ?></a>
                </li>
            </ul>
        </li>




        <li class="menu-label"><?php echo app('translator')->get('General Setting'); ?></li>
        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.users*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-people"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Users'); ?></div>
                <?php if($emailUnverifiedUsersCount || $mobileUnverifiedUsersCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.users.active')); ?>">
                    <a href="<?php echo e(route('admin.users.active')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Active Users'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.users.banned')); ?>">
                    <a href="<?php echo e(route('admin.users.banned')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Banned Users'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.users.unverified')); ?>">
                    <a href="<?php echo e(route('admin.users.email.unverified')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Email Unverified'); ?>
                        <?php if($emailUnverifiedUsersCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>

                </li>
                <li class="<?php echo e(menuActive('admin.users.unverified')); ?>">
                    <a href="<?php echo e(route('admin.users.mobile.unverified')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Mobile Unverified'); ?>
                        <?php if($mobileUnverifiedUsersCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>

                </li>
                <li class="<?php echo e(menuActive('admin.users.all')); ?>">
                    <a href="<?php echo e(route('admin.users.all')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Users'); ?></a>
                </li>
                
            </ul>
        </li>




        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.report*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-earmark-bar-graph"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Report'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.report.login.history')); ?>">
                    <a href="<?php echo e(route('admin.report.login.history')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Login History'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.report.notification.history')); ?>">
                    <a href="<?php echo e(route('admin.report.notification.history')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Notification History'); ?></a>
                </li>
            </ul>
        </li>

        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.country*'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-globe-asia-australia"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Area'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.country*')); ?>">
                    <a href="<?php echo e(route('admin.country.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Countries'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.city*')); ?>">
                    <a href="<?php echo e(route('admin.city.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('City'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.state*')); ?>">
                    <a href="<?php echo e(route('admin.state.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('State'); ?></a>
                </li>
            </ul>
        </li>



        <li
            class="sidebar--menu sidebar--dropdown <?php echo e(menuActive(['admin.setting.index', 'admin.setting.system*', 'admin.setting.cookie', 'admin.setting.logo.icon', 'admin.extensions', 'admin.language*', 'admin.seo', 'admin.maintenance.mode'])); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-gear"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Settings'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive(['admin.setting.index'])); ?>">
                    <a href="<?php echo e(route('admin.setting.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('General Setting'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.system.configuration')); ?>">
                    <a href="<?php echo e(route('admin.setting.system.configuration')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('System Configuration'); ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.logo.icon')); ?>">
                    <a href="<?php echo e(route('admin.setting.logo.icon')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Logo & Favicon'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.extensions.index')); ?>">
                    <a href="<?php echo e(route('admin.extensions.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Extensions'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.language.manage')); ?>">
                    <a href="<?php echo e(route('admin.language.manage')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Language'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.seo')); ?>">
                    <a href="<?php echo e(route('admin.seo')); ?>"><i class="bi bi-record-circle"></i><?php echo app('translator')->get('SEO Manager'); ?></a>
                </li>

                <li class="<?php echo e(menuActive('admin.maintenance.mode')); ?>">
                    <a href="<?php echo e(route('admin.maintenance.mode')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Maintenance Mode'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.cookie')); ?>">
                    <a href="<?php echo e(route('admin.setting.cookie')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('GDPR Cookie'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.custom.css')); ?>">
                    <a href="<?php echo e(route('admin.setting.custom.css')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Custom CSS'); ?></a>
                </li>
            </ul>
        </li>


        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.setting.notification*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bell"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Notification Setting'); ?></div>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.setting.notification.global')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.global')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Global Template'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.notification.email')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.email')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Email Setting'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.notification.sms')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.sms')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('SMS Setting'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.setting.notification.templates')); ?>">
                    <a href="<?php echo e(route('admin.setting.notification.templates')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Notification Templates'); ?></a>
                </li>
            </ul>
        </li>


        <li class="menu-label"><?php echo app('translator')->get('CRM'); ?></li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.setting.notification*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bell"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('CRM Setting'); ?></div>
            </a>
            <ul>
                <?php echo $__env->make('admin.partials.mail_sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.support*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-chat-right-dots"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Customer Support'); ?></div>
                <?php if($pendingSupportCount): ?>
                    <span class="red__notify"></span>
                <?php endif; ?>
            </a>
            <ul>
                <li class="<?php echo e(menuActive('admin.support.pending')); ?>">
                    <a href="<?php echo e(route('admin.support.pending')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo app('translator')->get('Pending Support'); ?>
                        <?php if($pendingSupportCount): ?>
                            <span class="red__notify"></span>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="<?php echo e(menuActive('admin.support.closed')); ?>">
                    <a href="<?php echo e(route('admin.support.closed')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Closed Support'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.support.answered')); ?>">
                    <a href="<?php echo e(route('admin.support.answered')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('Answered Support'); ?></a>
                </li>
                <li class="<?php echo e(menuActive('admin.support.index')); ?>">
                    <a href="<?php echo e(route('admin.support.index')); ?>"><i
                            class="bi bi-record-circle"></i><?php echo app('translator')->get('All Support'); ?></a>
                </li>
            </ul>
        </li>
        <li class="sidebar--menu <?php echo e(menuActive('admin.subscriber*')); ?>">
            <a href="<?php echo e(route('admin.subscriber.index')); ?>">
                <div class="parent-icon"><i class="bi bi-bell-slash"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Subscribers'); ?></div>
            </a>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Blog'); ?></li>

        <li class="sidebar--menu sidebar--dropdown">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bookshelf"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Blog Section'); ?></div>
            </a>
            <ul>
                <li class="">
                    <a href="<?php echo e(route('admin.blog.category.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo e(__('Blog Category')); ?>

                    </a>
                </li>
                <li class="">
                    <a href="<?php echo e(route('admin.blog.index')); ?>">
                        <i class="bi bi-record-circle"></i><?php echo e(__('Blog')); ?>

                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-label"><?php echo app('translator')->get('Pages & Section'); ?></li>
        <li class="sidebar--menu <?php echo e(menuActive('admin.frontend.manage.pages*')); ?>">
            <a href="<?php echo e(route('admin.frontend.manage.pages')); ?>">
                <div class="parent-icon"><i class="bi bi-file-earmark"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Pages'); ?></div>
            </a>
        </li>

        <li class="sidebar--menu sidebar--dropdown <?php echo e(menuActive('admin.frontend.sections*')); ?>">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-bookshelf"></i>
                </div>
                <div class="menu-title"><?php echo app('translator')->get('Manage Section'); ?></div>
            </a>
            <ul>
                <?php
                    $lastSegment = collect(request()->segments())->last();
                ?>
                <?php $__currentLoopData = getPageSections(true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $secs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($secs['builder']): ?>
                        <li class="<?php echo e($lastSegment == $k ? 'mm-active' : ''); ?>">
                            <a href="<?php echo e(route('admin.frontend.sections', $k)); ?>">
                                <i class="bi bi-record-circle"></i><?php echo e(__($secs['name'])); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
    </ul>
</aside>
<?php /**PATH D:\projects\hrincu_v2\resources\views/admin/partials/sidenav.blade.php ENDPATH**/ ?>