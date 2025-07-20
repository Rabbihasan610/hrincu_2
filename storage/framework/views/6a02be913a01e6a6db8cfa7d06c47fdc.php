<?php $__env->startSection("content"); ?>
        <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Community Partnership Request']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Community Partnership Request']); ?>
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
            <div class="max-w-4xl mx-auto p-6 md:p-8 lg:p-10">

                <p class="text-gray-700 text-sm md:text-base mb-8 font-bold leading-relaxed">
                    <?php echo app('translator')->get("We welcome your interest in collaborating with Human Resources Incubator under our Community Partnership Program."); ?>
                    <?php echo app('translator')->get("Please fill out the following form to evaluate potential cooperation and joint efforts."); ?>
                </p>

                <h2 class="bg-[#0D47A1] text-white text-lg md:text-xl font-semibold py-3 px-4 mb-6">
                    <?php echo app('translator')->get("Community Partnership Request form"); ?>
                </h2>

                <form method="POST" action="<?php echo e(route('community.partnership.request.store')); ?>" enctype="multipart/form-data"> 
                    <?php echo csrf_field(); ?> 

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo app('translator')->get("1. Organization Information"); ?></h3>

                        <div class="mb-4">
                            <label for="organizationName" class="block text-gray-700 text-sm font-medium mb-2"><?php echo app('translator')->get("Organization Name"); ?></label>
                            <input type="text" id="organizationName" name="organization_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="<?php echo e(old('organization_name')); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="organizationType" class="block text-gray-700 text-sm font-medium mb-2"><?php echo app('translator')->get("Type of Organization (Government / Private / Non-profit / Other)"); ?></label>
                            <input type="text" id="organizationType" name="organization_type" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="<?php echo e(old('organization_type')); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="representativeName" class="block text-gray-700 text-sm font-medium mb-2"><?php echo app('translator')->get("Representative Name"); ?></label>
                            <input type="text" id="representativeName" name="representative_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="<?php echo e(old('representative_name')); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="jobTitle" class="block text-gray-700 text-sm font-medium mb-2"><?php echo app('translator')->get("Job Title"); ?></label>
                            <input type="text" id="jobTitle" name="job_title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="<?php echo e(old('job_title')); ?>">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="emailNumber" class="block text-gray-700 text-sm font-medium mb-2"><?php echo app('translator')->get("Email Number"); ?></label>
                                <input type="email" id="emailNumber" name="email_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="<?php echo e(old('email_number')); ?>">
                            </div>
                            <div>
                                <label for="mobileNumber" class="block text-gray-700 text-sm font-medium mb-2"><?php echo app('translator')->get("Mobile Number"); ?></label>
                                <input type="tel" id="mobileNumber" name="mobile_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" value="<?php echo e(old('mobile_number')); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo app('translator')->get("2. Partnership Objectives"); ?></h3>
                        <p class="text-gray-600 text-sm mb-4"><?php echo app('translator')->get("Please select the intended goals of the proposed collaboration"); ?></p>

                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="objective1" name="objectives[]" value="training_qualification" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(in_array('training_qualification', old('objectives', [])) ? 'checked' : ''); ?>>
                                <label for="objective1" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Training and qualification programs"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="objective2" name="objectives[]" value="labor_awareness_rights" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(in_array('labor_awareness_rights', old('objectives', [])) ? 'checked' : ''); ?>>
                                <label for="objective2" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Labor awareness and workers' rights"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="objective3" name="objectives[]" value="national_local_community" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(in_array('national_local_community', old('objectives', [])) ? 'checked' : ''); ?>>
                                <label for="objective3" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("National and local community events"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="objective4" name="objectives[]" value="saudization_job_opportunity" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(in_array('saudization_job_opportunity', old('objectives', [])) ? 'checked' : ''); ?>>
                                <label for="objective4" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Saudization and job opportunity support"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="objective5" name="objectives[]" value="empowering_targeted_groups" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(in_array('empowering_targeted_groups', old('objectives', [])) ? 'checked' : ''); ?>>
                                <label for="objective5" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Empowering targeted groups (women, youth, people with disabilities, etc.)"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="objective6" name="objectives[]" value="other_objectives" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" <?php echo e(in_array('other_objectives', old('objectives', [])) ? 'checked' : ''); ?>>
                                <label for="objective6" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Other (please specify)"); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo app('translator')->get("3. Initiative or Project Details"); ?></h3>
                        <p class="text-gray-600 text-sm mb-4"><?php echo app('translator')->get("Please provide a brief description of the proposed initiative or project"); ?></p>
                        <textarea id="projectDescription" name="project_description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Write your description"><?php echo e(old('project_description')); ?></textarea>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo app('translator')->get("4. Proposed Partnership Duration"); ?></h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" id="durationShort" name="partnership_duration" value="short" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" <?php echo e(old('partnership_duration') == 'short' ? 'checked' : ''); ?>>
                                <label for="durationShort" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Short term (less than 3 months)"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="durationMedium" name="partnership_duration" value="medium" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" <?php echo e(old('partnership_duration') == 'medium' ? 'checked' : ''); ?>>
                                <label for="durationMedium" class="ml-2 text-gray-700 text-sm"><?php echo app('translator')->get("Medium term (3 to 6 months)"); ?></label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="durationLong" name="partnership_duration" value="long" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" <?php echo e(old('partnership_duration') == 'long' ? 'checked' : ''); ?>>
                                <label for="durationLong" class="ml-2 text-gray-700 text-sm me-2"><?php echo app('translator')->get("Long term (more than 6 months)"); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo app('translator')->get("5. Additional notes"); ?></h3>
                        <textarea id="additionalNotes" name="additional_notes" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo e(__('Write your notes')); ?>"><?php echo e(old('additional_notes')); ?></textarea>
                    </div>

                    <div>
                        <button type="submit" class="bg-[#0069CA] hover:bg-blue-700 text-white font-semibold py-3 px-6 transition duration-300 ease-in-out">
                            <?php echo app('translator')->get('Submit Application'); ?>
                        </button>
                    </div>
                </form>

            </div>
        </section>


        <?php if(@$sections->secs != null): ?>
            <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make("sections." . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layouts.frontend", ["title" => gs("site_name")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/community_partnership_request.blade.php ENDPATH**/ ?>