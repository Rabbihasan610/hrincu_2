<?php $__env->startSection('content'); ?>
<?php
    $policyPages = getContent('policy_pages.element', false, null, true);
    $type = request()->type ?? 'service-supplier';
?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Registration as Employee']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration as Employee']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-4xl mx-auto overflow-hidden">

        <h2 class="bg-[#0D47A1] text-white text-lg md:text-xl font-semibold py-3 px-4 mb-6">
            <?php echo app('translator')->get('Registration Form'); ?>
        </h2>

        <div class="bg-green-50 border border-green-400 text-green-800 rounded-lg p-4 mb-6">
            <p class="text-sm leading-relaxed">
                <?php echo app('translator')->get('Register your organization with HR Incubator and start attracting top talents through our integrated hiring platform.'); ?>
                <br>
                <?php echo app('translator')->get('Please fill in the following form to register your business:'); ?>
            </p>
        </div>

        <?php echo $__env->make('user.auth.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <form class="space-y-4 mt-6" action="<?php echo e(route('user.employee.register')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div>
                <label for="companyName" class="sr-only"><?php echo app('translator')->get('Company/Organization Name'); ?></label>
                <input type="text" id="companyName" name="company_name" value="<?php echo e(old('company_name')); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Company/Organization Name'); ?>">
            </div>

            <div>
                <label for="businessSector" class="sr-only"><?php echo app('translator')->get('Industry or Business Sector'); ?></label>
                <select id="businessSector" name="business_sector" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                    <option value=""><?php echo app('translator')->get('Industry or Business Sector'); ?></option>
                    <option value="tech" <?php echo e(old('business_sector') == 'tech' ? 'selected' : ''); ?>><?php echo app('translator')->get('Technology'); ?></option>
                    <option value="finance" <?php echo e(old('business_sector') == 'finance' ? 'selected' : ''); ?>><?php echo app('translator')->get('Finance'); ?></option>
                    <option value="healthcare" <?php echo e(old('business_sector') == 'healthcare' ? 'selected' : ''); ?>><?php echo app('translator')->get('Healthcare'); ?></option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div>
                <label for="commercialRegistration" class="sr-only"><?php echo app('translator')->get('Commercial Registration Number (If available)'); ?></label>
                <input type="text" id="commercialRegistration" name="commercial_registration" value="<?php echo e(old('commercial_registration')); ?>" class="w-full px-4 py-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Commercial Registration Number (If available)'); ?>">
            </div>

            <div>
                <label for="contactPersonName" class="sr-only"><?php echo app('translator')->get('Contact Person Name'); ?></label>
                <input type="text" id="contactPersonName" name="contact_person_name" value="<?php echo e(old('contact_person_name')); ?>" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Contact Person Name'); ?>">
            </div>

            <div>
                <label for="jobTitlePosition" class="sr-only"><?php echo app('translator')->get('Job Title/Position'); ?></label>
                <input type="text" id="jobTitlePosition" name="job_title_position" value="<?php echo e(old('job_title_position')); ?>" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Job Title/Position'); ?>">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="mobile" class="sr-only"><?php echo app('translator')->get('Mobile'); ?></label>
                    <input type="tel" id="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Mobile'); ?>">
                </div>
                <div>
                    <label for="email" class="sr-only"><?php echo app('translator')->get('Email Address'); ?></label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Email Address'); ?>">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative">
                    <label for="cityRegion" class="sr-only"><?php echo app('translator')->get('City / Region'); ?></label>
                    <select id="city_region" name="city_region" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        <option value=""><?php echo app('translator')->get('City / Region'); ?></option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_region') == $city->id ? 'selected' : ''); ?>><?php echo e($city?->lang('name')); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
                <div>
                    <label for="numEmployees" class="sr-only"><?php echo app('translator')->get('Current Number of Employees'); ?></label>
                    <input type="text" id="numEmployees" name="num_employees" value="<?php echo e(old('num_employees')); ?>" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Current Number of Employees'); ?>">
                </div>
            </div>

            <div class="mb-6">
                <p class="block text-gray-700 text-base font-medium mb-3"><?php echo app('translator')->get('Do you currently have hiring needs?'); ?></p>
                <div class="flex space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="hiring_needs" value="yes" <?php echo e(old('hiring_needs') == 'yes' ? 'checked' : ''); ?> class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm"><?php echo app('translator')->get('Yes'); ?></span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="hiring_needs" value="no" <?php echo e(old('hiring_needs') == 'no' ? 'checked' : ''); ?> class="form-radio h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm"><?php echo app('translator')->get('No'); ?></span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <p class="block text-gray-700 text-base font-medium mb-3"><?php echo app('translator')->get('Preferred Communication method'); ?></p>
                <div class="flex flex-wrap gap-x-6 gap-y-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="communication_method[]" value="email" <?php echo e(in_array('email', old('communication_method', [])) ? 'checked' : ''); ?> class="form-checkbox h-4 w-4 text-blue-600  focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm"><?php echo app('translator')->get('Email'); ?></span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="communication_method[]" value="phone_call" <?php echo e(in_array('phone_call', old('communication_method', [])) ? 'checked' : ''); ?> class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm"><?php echo app('translator')->get('Phone Call'); ?></span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="communication_method[]" value="whatsapp" <?php echo e(in_array('whatsapp', old('communication_method', [])) ? 'checked' : ''); ?> class="form-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700 text-sm"><?php echo app('translator')->get('WhatsApp'); ?></span>
                    </label>
                </div>
            </div>

            <div>
                <label for="briefDescription" class="block text-gray-700 text-base font-medium mb-3"><?php echo app('translator')->get('Brief Description of your business and hiring goals'); ?></label>
                <textarea id="briefDescription" name="brief_description" rows="4" class="w-full px-4 py-2 border border-gray-300  focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo app('translator')->get('Description'); ?>"><?php echo e(old('brief_description')); ?></textarea>
            </div>

            <div class="col-span-full form-group">
                <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="col-span-full form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="pt-2">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 transition duration-300 ease-in-out">
                    <?php echo app('translator')->get('Submit Register'); ?>
                </button>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <?php echo $__env->make('user.auth.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('web.layouts.frontend', ['title' => __('Sign In')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/employer.blade.php ENDPATH**/ ?>