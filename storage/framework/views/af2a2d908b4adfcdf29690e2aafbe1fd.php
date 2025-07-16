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
            Registration Form
        </div>

        <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mt-4 text-sm">
            This form is for individuals who want to register in our job seeker database.
        </div>


        <?php echo $__env->make('user.auth.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <form id="registrationFormJobSeeker" class="mt-6" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="type" value="job_seeker">

            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="col-span-full form-group">
                    <input type="text" name="name" placeholder="Full Name" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center border border-gray-300 rounded-md form-group">
                    <input type="text" name="date_of_birth" placeholder="Date of Birth" class="w-full p-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 border-r-0">
                    <span class="p-2 bg-gray-50 border-l border-gray-300 rounded-r-md text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <div class="form-group">
                    <select name="gender" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="id_number" placeholder="ID/Iqama Number" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" class="w-full p-2 checkUser border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="emailExist text-red-500 text-sm"></span>
                </div>

                <div class="form-group">
                    <input type="text" name="mobile" placeholder="Mobile" class="w-full p-2 checkUser border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="mobileExist text-red-500 text-sm"></span>
                </div>
                <div class="form-group">
                    <select name="city_region" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">City / Region</option>
                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($city->id); ?>"><?php echo e($city?->lang('name')); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="marital_status" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="academic_qualification" placeholder="Academic Qualification" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="text" name="field_of_study" placeholder="Field of Study" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <select name="english_proficiency" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">English Proficiency</option>
                        <option value="native">Native</option>
                        <option value="fluent">Fluent</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="basic">Basic</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="key_skills" placeholder="Key Skills" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="number" name="years_of_experience" placeholder="Years of Experience" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <select name="preferred_sectors" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="0">Preferred Sectors</option>
                        <?php $__currentLoopData = \App\Data\SectorsData::forJobSeekers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sector->id); ?>"> <?php echo e(app()->getLocale() == 'ar' ? $sector->name_ar : $sector->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-span-full form-group">
                    <select name="preferred_job_type" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Preferred Job Type</option>
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="contract">Contract</option>
                        <option value="freelance">Freelance</option>
                    </select>
                </div>

                <div class="col-span-full form-group">
                    <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="col-span-full form-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="mt-6 p-4 border border-green-300 rounded-md bg-green-50 flex items-center justify-center flex-col text-green-800 form-group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                <span class="font-medium">Upload Resume</span>
                <span class="text-sm">Please upload files in PDF or image format (JPG/PNG)</span>
                <input type="file" name="resume" class="hidden" accept=".pdf, .jpg, .png">
            </div>

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