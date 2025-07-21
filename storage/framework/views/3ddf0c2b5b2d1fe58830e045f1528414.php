<?php $__env->startSection("content"); ?>

    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Targeted Sectors']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Targeted Sectors']); ?>
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
		$heroBanner = getHeroBanner('targeted-sector');

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

    <section class="bg-gray-50 px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>

                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="https://placehold.co/500x350">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">Commercial and Service Sector</h3>
                        <p class="text-sm text-gray-600">Supporting SMEs and large enterprises in recruitment, operations,
                            workforce development, and enhancing customer service quality.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if(@$sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make("sections." . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("web.layouts.frontend", ["title" => gs("site_name")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/targeted_sector.blade.php ENDPATH**/ ?>