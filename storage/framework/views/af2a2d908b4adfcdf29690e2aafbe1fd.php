<?php $__env->startSection('content'); ?>
<?php
    $policyPages = getContent('policy_pages.element', false, null, true);

    $type = request()->type ?? 'service-supplier';
?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Registration as Job Seeker']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration as Job Seeker']); ?>
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
            <?php echo app('translator')->get('This form is for individuals who want to register in our job seeker database.'); ?>
        </div>


        <?php echo $__env->make('user.auth.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <form id="registrationFormJobSeeker" class="mt-6" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="user_type" value="job_seeker">

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="col-span-full form-group">
                    <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__('User Name')); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="col-span-full form-group">
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Full Name')); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center border border-gray-300 rounded-md form-group">
                    <input type="text" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>" placeholder="<?php echo e(__('Date of Birth')); ?>" class="w-full p-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 border-r-0">
                    <span class="p-2 bg-gray-50 border-l border-gray-300 rounded-r-md text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="form-group">
                    <select name="gender" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value=""><?php echo app('translator')->get('Gender'); ?></option>
                        <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>><?php echo app('translator')->get('Male'); ?></option>
                        <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>><?php echo app('translator')->get('Female'); ?></option>
                        <option value="other"  <?php echo e(old('gender') == 'other' ? 'selected' : ''); ?>><?php echo app('translator')->get('Other'); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="id_number" name="<?php echo e(old('id_number')); ?>" placeholder="<?php echo e(__('ID/Iqama Number')); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('Email Address')); ?>" class="w-full p-2 checkUser border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="emailExist text-red-500 text-sm"></span>
                </div>

                <div class="form-group">
                    <input type="text" name="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="<?php echo e(__("Mobile")); ?>" class="w-full p-2 checkUser border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="mobileExist text-red-500 text-sm"></span>
                </div>
                <div class="form-group">
                    <select name="city_region" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value=""><?php echo e(__('City / Region')); ?></option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('city_region') == $city->id ? 'selected' : ''); ?>><?php echo e($city?->lang('name')); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="marital_status" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" ><?php echo e(__('Marital Status')); ?></option>
                        <option value="single" <?php echo e(old('marital_status') == 'single' ? 'selected' : ''); ?>><?php echo app('translator')->get('Single'); ?></option>
                        <option value="married" <?php echo e(old('marital_status') == 'married' ? 'selected' : ''); ?>><?php echo app('translator')->get('Married'); ?></option>
                        <option value="divorced" <?php echo e(old('marital_status') == 'divorced' ? 'selected' : ''); ?>><?php echo app('translator')->get('Divorced'); ?></option>
                        <option value="widowed" <?php echo e(old('marital_status') == 'widowed' ? 'selected' : ''); ?>><?php echo app('translator')->get('Widowed'); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="academic_qualification" value="<?php echo e(old('academic_qualification')); ?>" placeholder="<?php echo e(__('Academic Qualification')); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <input type="text" name="field_of_study" value="<?php echo e(old('field_of_study')); ?>" placeholder="<?php echo e(__('Field of Study')); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <select name="english_proficiency" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value=""><?php echo app('translator')->get('English Proficiency'); ?></option>
                        <option value="native" <?php echo e(old('english_proficiency') == 'native' ? 'selected' : ''); ?>><?php echo app('translator')->get('Native'); ?></option>
                        <option value="fluent" <?php echo e(old('english_proficiency') == 'fluent' ? 'selected' : ''); ?>>
                            <?php echo app('translator')->get('Fluent'); ?>
                        </option>
                        <option value="intermediate" <?php echo e(old('english_proficiency') == 'intermediate' ? 'selected' : ''); ?>><?php echo app('translator')->get('Intermediate'); ?></option>
                        <option value="basic" <?php echo e(old('english_proficiency') == 'basic' ? 'selected' : ''); ?>><?php echo app('translator')->get('Basic'); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="key_skills" value="<?php echo e(old('key_skills')); ?>" placeholder="<?php echo app('translator')->get('Key Skills'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <input type="number" name="years_of_experience" value="<?php echo e(old('years_of_experience')); ?>" placeholder="<?php echo app('translator')->get('Years of Experience'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <select name="preferred_sectors" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="0"><?php echo app('translator')->get('Preferred Sectors'); ?></option>
                        <?php $__currentLoopData = \App\Data\SectorsData::forJobSeekers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sector->id); ?>" <?php echo e(old('preferred_sectors') == $sector->id ? 'selected' : ''); ?>> <?php echo e(app()->getLocale() == 'ar' ? $sector->name_ar : $sector->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-span-full form-group">
                    <select name="preferred_job_type" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value=""><?php echo app('translator')->get('Preferred Job Type'); ?></option>
                        <option value="full-time" <?php echo e(old('preferred_job_type') == 'full-time' ? 'selected' : ''); ?>><?php echo app('translator')->get('Full-time'); ?></option>
                        <option value="part-time" <?php echo e(old('preferred_job_type') == 'part-time' ? 'selected' : ''); ?>><?php echo app('translator')->get('Part-time'); ?></option>
                        <option value="contract" <?php echo e(old('preferred_job_type') == 'contract' ? 'selected' : ''); ?>><?php echo app('translator')->get('Contract'); ?></option>
                        <option value="freelance" <?php echo e(old('preferred_job_type') == 'freelance' ? 'selected' : ''); ?>><?php echo app('translator')->get('Freelance'); ?></option>
                    </select>
                </div>

                <div class="col-span-full form-group">
                    <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="col-span-full form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginal22dd814e34b3292120e6fee9433ec671 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22dd814e34b3292120e6fee9433ec671 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.file-upload','data' => ['inputName' => 'document']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('file-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['input-name' => 'document']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22dd814e34b3292120e6fee9433ec671)): ?>
<?php $attributes = $__attributesOriginal22dd814e34b3292120e6fee9433ec671; ?>
<?php unset($__attributesOriginal22dd814e34b3292120e6fee9433ec671); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22dd814e34b3292120e6fee9433ec671)): ?>
<?php $component = $__componentOriginal22dd814e34b3292120e6fee9433ec671; ?>
<?php unset($__componentOriginal22dd814e34b3292120e6fee9433ec671); ?>
<?php endif; ?>

            <div class="mt-6">
                <button type="submit" id="submitBtn" class="w-full bg-blue-700 text-white p-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Submit Register
                </button>
            </div>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .error {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .border-red-500 {
        border-color: #ef4444;
    }
    .border-gray-300 {
        border-color: #d1d5db;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <?php echo $__env->make('user.auth.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Sign In'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/job-seeker.blade.php ENDPATH**/ ?>