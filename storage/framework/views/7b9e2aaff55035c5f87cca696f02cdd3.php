<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'About Us']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'About Us']); ?>
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
        $heroBanner = getHeroBanner('about');

    ?>

    <?php if (isset($component)) { $__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.hero-banner','data' => ['subtitle' => $heroBanner?->subtitle,'title' => $heroBanner?->title,'description' => $heroBanner?->description,'image' => $heroBanner?->image]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('hero-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->subtitle),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->title),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->description),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroBanner?->image)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5)): ?>
<?php $attributes = $__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5; ?>
<?php unset($__attributesOriginalcc976e4d6da565a9a99c34acb03c2bd5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5)): ?>
<?php $component = $__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5; ?>
<?php unset($__componentOriginalcc976e4d6da565a9a99c34acb03c2bd5); ?>
<?php endif; ?>


    <?php echo $__env->make('sections.mission_vision', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.values_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sections.whowe_serve', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section>
        <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-8"><?php echo app('translator')->get('Targeted Sectors'); ?></h2>

                    <?php
                        $sectors = \App\Models\Sectors::where('status', 1)->get();
                    ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
                        <?php $__currentLoopData = $sectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-bold"><?php echo e($sector?->lang('title')); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php echo $__env->make('sections.partnerships_accreditations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .line-before::before {
            content: '';
            position: absolute;
            top: 80%;
            bottom: 0;
            left: -145px;
            width: 130px;
            height: 2px;
            background-color: #CCCCCC;
        }

        .line-after::after {
            content: '';
            position: absolute;
            top: 80%;
            bottom: 0;
            left: 15px;
            width: 130px;
            height: 2px;
            background-color: #CCCCCC;
        }

        .dot::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 8px;
            height: 8px;
            background-color: #8a2be2;
            border-radius: 50%;
        }


        .flex-line-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            position: relative;
            padding: 20px 0;
        }

        .line-2 {
            flex: 1;
            height: 2px;
            background-color: #CCCCCC;
            position: relative;
        }

        .dot-2 {
            width: 16px;
            height: 16px;
            background-color: #8a2be2;
            border-radius: 50%;
            position: relative;
            z-index: 2;
        }

        .checked-bullet::before {
            content: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%238a2be2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Cpolyline points="20 6 9 17 4 12"%3E%3C/polyline%3E%3C/svg%3E');
            /* Purple checkmark SVG */
            display: inline-block;
            width: 16px;
            height: 16px;
            margin-right: 8px;
            vertical-align: middle;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'About Us'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/about.blade.php ENDPATH**/ ?>