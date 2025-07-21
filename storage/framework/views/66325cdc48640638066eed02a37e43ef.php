<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => ''.e(__('Submit Your Resume')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Submit Your Resume')).'']); ?>
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

    <div class="container mx-auto px-4 py-8 max-w-4xl">

        <div class="bg-[#0D47A1] text-white text-center py-2 text-2xl font-bold">
            <?php echo e(__('Request Form')); ?>

        </div>

        <div class="bg-green-50 text-green-800 p-lg-2 mt-4 text-sm leading-relaxed mb-8">
            <?php echo e(__('Use this form if you dont find a suitable job currently. We will contact you once a matching opportunity becomes available')); ?>

        </div>

        <h2 class="text-xl font-semibold mb-4 text-gray-800 mt-3">
            <?php echo e(__('1. Applicant Information:')); ?>

        </h2>

        <form action="<?php echo e(route('submit.resume.store')); ?>" method="POST" enctype="multipart/form-data">

            <?php echo csrf_field(); ?>

            <div class="space-y-4">
                <div>
                    <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                        placeholder="<?php echo e(__('Full Name')); ?>" name="full_name" value="<?php echo e(old('full_name')); ?>">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input type="email" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Email Address')); ?>" name="email" value="<?php echo e(old('email')); ?>">
                    </div>
                    <div>
                        <input type="tel" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Mobile Number')); ?>" name="mobile_number" value="<?php echo e(old('mobile_number')); ?>">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('City/Country')); ?>" name="city_country" value="<?php echo e(old('city_country')); ?>">
                    </div>
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Nationality')); ?>" name="nationality" value="<?php echo e(old('nationality')); ?>">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Year of Experience')); ?>" name="years_experience" value="<?php echo e(old('years_experience')); ?>">
                    </div>
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Academic Qualification')); ?>" name="academic_qualification" value="<?php echo e(old('academic_qualification')); ?>">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Major')); ?>" name="major" value="<?php echo e(old('major')); ?>">
                    </div>
                    <div>
                        <input type="text" class="w-full p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:ring-blue-500"
                            placeholder="<?php echo e(__('Preferred Job Fields')); ?>" name="preferred_job_fields" value="<?php echo e(old('preferred_job_fields')); ?>">
                    </div>
                </div>
            </div>

            <hr class="my-8 border-gray-200">

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-3"><?php echo e(__('Preferred Job Type')); ?></label>
                <div class="flex items-center space-x-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                            name="job_type[]" value="fullTime" <?php echo e(in_array('fullTime', old('job_type', [])) ? 'checked' : ''); ?>>
                        <span class="ml-2 text-gray-700 ms-2"><?php echo e(__('Full-Time')); ?></span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                            name="job_type[]" value="partTime" <?php echo e(in_array('partTime', old('job_type', [])) ? 'checked' : ''); ?>>
                        <span class="ml-2 text-gray-700 ms-2"><?php echo e(__('Part-Time')); ?></span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                            name="job_type[]" value="remote" <?php echo e(in_array('remote', old('job_type', [])) ? 'checked' : ''); ?>>
                        <span class="ml-2 text-gray-700 ms-2"><?php echo e(__('Remote')); ?></span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
                            name="job_type[]" value="flexible" <?php echo e(in_array('flexible', old('job_type', [])) ? 'checked' : ''); ?>>
                        <span class="ml-2 text-gray-700 ms-2"><?php echo e(__('Flexible')); ?></span>
                    </label>
                </div>
            </div>

            <hr class="my-8 border-gray-200">

            <div class="bg-green-50 border border-green-200 p-2 text-center cursor-pointer hover:bg-green-100 transition duration-200 ease-in-out relative group">
                <input type="file" name="resume" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept=".pdf,.doc,.docx">
                <div class="flex flex-col items-start justify-start">
                    <svg class="w-8 h-8 text-green-600 mb-2 group-hover:text-green-700 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    <p class="text-green-800 font-semibold mb-1 group-hover:text-green-900 transition duration-200"><?php echo e(__('Upload Resume')); ?></p>
                    <p class="text-green-600 text-sm group-hover:text-green-700 transition duration-200"><?php echo e(__('Please upload files in PDF or Word File')); ?></p>
                </div>
            </div>

            <div class="text-center mt-8">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 focus:outline-none transition duration-200">
                    <?php echo e(__('Submit Resume')); ?>

                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => gs('site_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/submit.blade.php ENDPATH**/ ?>