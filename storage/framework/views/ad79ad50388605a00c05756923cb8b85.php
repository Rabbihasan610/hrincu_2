<?php $__env->startSection('content'); ?>
    <?php
        $policyPages = getContent('policy_pages.element', false, null, true);

        $type = request()->type ?? 'service-seeker';

    ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="custom-card">
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                         <li class="nav-item mt-2">
                            <a class="nav-link <?php echo e($type == 'service-seeker' ? 'active' : ''); ?> custom-nav-link "
                                href="<?php echo e(route('user.register', ['type'=> 'service-seeker'])); ?>"
                                aria-selected="false"><?php echo e(__('Register as service seeker “Supplying CVs”')); ?></a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="nav-link <?php echo e($type == 'service-supplier' ? 'active' : ''); ?> custom-nav-link"
                                href="<?php echo e(route('user.register', ['type'=> 'service-supplier'])); ?>"
                               ><?php echo e(__('Register as service supplier “Marketing CVs”')); ?></a>
                        </li>

                    </ul>

                    <div>
                        <div>
                            <form action="<?php echo e(route('user.register')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_type" value="job_provider">
                                <div class="mb-3 ">
                                    <label class="form-label"><?php echo app('translator')->get('Username'); ?></label>
                                    <input type="text" class="form-control checkUser" name="username"
                                        value="<?php echo e(old('username')); ?>">
                                    <small class="text-danger usernameExist"></small>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label"><?php echo app('translator')->get('Email Address'); ?></label>
                                    <input type="email" class="form-control checkUser" name="email"
                                        value="<?php echo e(old('email')); ?>">
                                    <small class="text-danger emailExist"></small>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label"><?php echo app('translator')->get('Phone Number'); ?></label>
                                    <input type="text" class="form-control checkUser" name="mobile"
                                        value="<?php echo e(old('mobile')); ?>" required>
                                    <small class="text-danger mobileExist"></small>
                                </div>


                                <div class="mb-3 ">
                                    <label class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <?php if (isset($component)) { $__componentOriginalff0a9fdc5428085522b49c68070c11d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff0a9fdc5428085522b49c68070c11d6 = $attributes; } ?>
<?php $component = App\View\Components\Captcha::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff0a9fdc5428085522b49c68070c11d6)): ?>
<?php $attributes = $__attributesOriginalff0a9fdc5428085522b49c68070c11d6; ?>
<?php unset($__attributesOriginalff0a9fdc5428085522b49c68070c11d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff0a9fdc5428085522b49c68070c11d6)): ?>
<?php $component = $__componentOriginalff0a9fdc5428085522b49c68070c11d6; ?>
<?php unset($__componentOriginalff0a9fdc5428085522b49c68070c11d6); ?>
<?php endif; ?>

                                <?php if(gs()->agree): ?>
                                    <div class="pb-3 col-12">
                                        <div class="">
                                            <input type="checkbox" id="agree_employer" <?php if(old('agree')): echo 'checked'; endif; ?>
                                                name="agree" required>
                                            <label for="agree"><?php echo app('translator')->get('I agree with'); ?></label> <span>
                                                <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('policy.pages', [slug($policy->data_values->title), $policy->id])); ?>"
                                                        target="_blank"><?php echo e(__($policy->data_values->title)); ?></a>
                                                    <?php if(!$loop->last): ?>
                                                        ,
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-base w-100"><?php echo app('translator')->get('Sign Up'); ?></button>
                            </form>
                        </div>
                    </div>

                    <p class="text-center mt-3"><?php echo app('translator')->get('Already have an account?'); ?> <a
                            href="<?php echo e(route('user.login')); ?>"><?php echo app('translator')->get('Sign In'); ?></a></p>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .custom-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .custom-nav-link {
            background: transparent !important;
            color: #6a11cb;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s;
            padding: 12px 20px;
        }

        .custom-nav-link.active {
            background: #6a11cb !important;
            color: #fff;
            border-bottom: none;
        }

        .custom-nav-link:hover {
            background: #6a11cb !important;
            color: #fff;
            border-bottom: none;
        }

        .custom-nav-link::after {
            display: none;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
        }

        .form-label {
            font-weight: bold;
        }

        . {
            margin-bottom: 20px;
        }

        .text-danger {
            font-size: 14px;
            margin-top: 5px;
            margin-bottom: 0;
            display: block;
            color: red;
        }

        .form-check-label {
            font-weight: normal;
        }

        .form-check-input {
            margin-top: 6px;
        }

        .form-check {
            margin-bottom: 20px;
        }

        .secure-password {
            position: relative;
        }

        .secure-password div {
            content: "\f0d4";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6a11cb;
        }





        .btn-base {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px;
            transition: 0.3s;
        }

        .btn-base:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }
    </style>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($) {
            $('.checkUser').on('focusout', function(e) {
                var url = "<?php echo e(route('user.checkUser')); ?>";
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                var fieldType = $(this).attr('name');
                var data = {
                    _token: token
                };
                data[fieldType] = value;

                $.post(url, data, function(response) {
                    if (response.data) {
                        $(`.${response.type}Exist`).text(`${response.type} already exists`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Sign In'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/service-seeker.blade.php ENDPATH**/ ?>