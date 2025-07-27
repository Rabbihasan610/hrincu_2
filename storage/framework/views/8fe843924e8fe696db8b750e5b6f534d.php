<?php $__env->startSection('content'); ?>
<?php
    $policyPages = getContent('policy_pages.element', false, null, true);
    $type = request()->type ?? 'service-supplier';
?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Registration as Service Provider']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration as Service Provider']); ?>
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
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-4xl mx-auto my-4">
        <div class="bg-blue-800 text-white p-4 rounded-t-lg text-center text-xl font-semibold">
            <?php echo app('translator')->get('Registration Form'); ?>
        </div>

        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mt-4 text-sm">
            <?php echo app('translator')->get('Join HR incubators network of certified service providers and offer your expertise in structured, learning, consultancy, and institutional support. Please fill out the form below.'); ?>
        </div>

        <?php echo $__env->make('user.auth.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

       <form action="<?php echo e(route('user.provider.register')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mt-6">
                <input type="text" name="company_name" value="<?php echo e(old('company_name')); ?>" placeholder="<?php echo app('translator')->get('Service Provider / Company Name'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4">
                <input type="text" name="entity_type" value="<?php echo e(old('entity_type')); ?>" placeholder="<?php echo app('translator')->get('Type of Entity'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Areas of Service Provided'); ?></label>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="recruitment" <?php echo e(in_array('recruitment', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Recruitment Services'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="training" <?php echo e(in_array('training', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Training & Development Services'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="outsourcing" <?php echo e(in_array('outsourcing', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Outsourcing & Operational Support'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="psychological" <?php echo e(in_array('psychological', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Psychological & Health Support'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="call_center" <?php echo e(in_array('call_center', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Call Center & Contact Services'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="hr_tech" <?php echo e(in_array('hr_tech', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('HR Tech Solutions'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="consulting" <?php echo e(in_array('consulting', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Organizational Consulting'); ?></span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="services[]" value="other" <?php echo e(in_array('other', old('services', [])) ? 'checked' : ''); ?> class="form-checkbox text-blue-600 rounded mr-2">
                        <span class="text-gray-700"><?php echo app('translator')->get('Other please specify'); ?></span>
                    </label>
                </div>
                <input type="text" name="other_service" value="<?php echo e(old('other_service')); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2" placeholder="<?php echo app('translator')->get('If Other please specify'); ?>">
            </div>

            <div class="mt-6">
                <input type="text" name="commercial_registration" value="<?php echo e(old('commercial_registration')); ?>" placeholder="<?php echo app('translator')->get('Commercial Registration Number (If available)'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4">
                <input type="text" name="contact_person" value="<?php echo e(old('contact_person')); ?>" placeholder="<?php echo app('translator')->get('Contact Person Name'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="<?php echo app('translator')->get('Mobile'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('Email Address'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-red-500 text-sm emailExist"></span>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <select name="city" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value=""><?php echo app('translator')->get('City / Region'); ?></option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('city') == $city->id ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <input type="text" name="website" value="<?php echo e(old('website')); ?>" placeholder="<?php echo app('translator')->get('Website (if available)'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Preferred Communication method'); ?></label>
                <div class="flex flex-col sm:flex-row sm:space-x-4">
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="communication_method" value="email" <?php echo e(old('communication_method') == 'email' ? 'checked' : ''); ?> class="form-radio text-blue-600">
                        <span class="ml-2 text-gray-700"><?php echo app('translator')->get('Email'); ?></span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="communication_method" value="phone_call" <?php echo e(old('communication_method') == 'phone_call' ? 'checked' : ''); ?> class="form-radio text-blue-600">
                        <span class="ml-2 text-gray-700"><?php echo app('translator')->get('Phone Call'); ?></span>
                    </label>
                    <label class="inline-flex items-center mt-1">
                        <input type="radio" name="communication_method" value="whatsapp" <?php echo e(old('communication_method') == 'whatsapp' ? 'checked' : ''); ?> class="form-radio text-blue-600">
                        <span class="ml-2 text-gray-700"><?php echo app('translator')->get('WhatsApp'); ?></span>
                    </label>
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Brief Summary of Your Experience and Specialization'); ?></label>
                <textarea name="experience" rows="6" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('experience')); ?></textarea>
            </div>

            <div class="col-span-full form-group my-3">
                <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="col-span-full form-group my-2">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-700 text-white p-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Sign In'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/provider.blade.php ENDPATH**/ ?>