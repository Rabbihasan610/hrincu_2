<?php $__env->startSection("content"); ?>
        <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Training Program']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Training Program']); ?>
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


        <?php
            $trainingProgramContent = getContent('training_program_features.content', true);
            $trainingProgramFeatures = getContent('training_program_features.element', false, null, true);
        ?>

        <section class="bg-[#FFFFFF] px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <h3 class="mb-3 text-3xl text-gray-900"><?php echo e(@$trainingProgramContent?->lang('title')); ?></h3>
                <hr class="mb-6">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <?php $__currentLoopData = $trainingProgramFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainingProgramFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="<?php echo e(getImage('assets/images/frontend/training_program_features/' . $trainingProgramFeature?->data_values?->image)); ?>" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900"><?php echo e(@$trainingProgramFeature?->lang('title')); ?></h3>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>


        <?php echo $__env->make("sections.training-program", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php
        $callToAction = getHeroBanner('training-program', 'call_to_action');
        ?>

        <?php if (isset($component)) { $__componentOriginal2c9369c50378c35954451f9e19572a01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c9369c50378c35954451f9e19572a01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.call-to-action','data' => ['title' => $callToAction?->title,'description' => $callToAction?->description,'linkButton' => ''.e(route('training.and.qualification.request')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('call-to-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($callToAction?->title),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($callToAction?->description),'link_button' => ''.e(route('training.and.qualification.request')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c9369c50378c35954451f9e19572a01)): ?>
<?php $attributes = $__attributesOriginal2c9369c50378c35954451f9e19572a01; ?>
<?php unset($__attributesOriginal2c9369c50378c35954451f9e19572a01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c9369c50378c35954451f9e19572a01)): ?>
<?php $component = $__componentOriginal2c9369c50378c35954451f9e19572a01; ?>
<?php unset($__componentOriginal2c9369c50378c35954451f9e19572a01); ?>
<?php endif; ?>

        <?php if(@$sections->secs != null): ?>
            <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make("sections." . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("web.layouts.frontend", ["title" => gs("site_name")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/training_program.blade.php ENDPATH**/ ?>