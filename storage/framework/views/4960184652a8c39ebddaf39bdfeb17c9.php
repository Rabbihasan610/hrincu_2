<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Our Services']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Our Services']); ?>
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



<section>
    <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="md:w-1/2">
            <p class="text-lg font-semibold text-gray-600 mb-2">Let's check</p>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6 leading-tight">Our service</h2>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
            At <strong class="text-blue-600">Human Resources Incubator</strong>, we provide a comprehensive ecosystem of services that support individuals and organizations in their journey toward employment, training, workforce management, talent optimization, and institutional excellence. We cover all aspects needed to help our clients build effective, flexible, and sustainable work environments.
            </p>
        </div>

        <div class="md:w-1/2 flex justify-center md:justify-end">
            <div class="rounded-lg overflow-hidden  w-full">
                <img src="https://placehold.co/700x400" alt="Modern buildings cityscape" class="w-full h-auto">
            </div>
        </div>
        </div>
    </div>
</section>

<?php echo $__env->make('sections.ourservice_request', ['is_title' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(@$sections->secs != null): ?>
<?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => gs('site_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/service.blade.php ENDPATH**/ ?>