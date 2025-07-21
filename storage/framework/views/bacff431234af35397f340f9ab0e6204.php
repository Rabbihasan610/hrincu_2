<?php $__env->startSection('content'); ?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Licenses & Documents']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Licenses & Documents']); ?>
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
    $heroBanner = getHeroBanner('licenses-and-document');
?>

<?php echo $__env->make('sections.official_licenses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sections.regulatory_documents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sections.general_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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












<section class="py-6 px-4 sm:px-6 lg:px-4 bg-white">
  <div class="max-w-4xl mx-auto p-2 sm:p-2 border border-green-200 bg-green-50 text-green-800">
    <p class="text-sm sm:text-base leading-relaxed">
      <span class="font-bold">Note:</span> All documents and templates are available in digital format and support electronic signature to streamline processes and ensure efficient execution
    </p>
  </div>
</section>


<?php
$callToAction = getHeroBanner('licenses-documents', 'call_to_action');
?>

<?php if (isset($component)) { $__componentOriginal2c9369c50378c35954451f9e19572a01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c9369c50378c35954451f9e19572a01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.call-to-action','data' => ['title' => $callToAction?->title,'description' => $callToAction?->description,'contactButton' => ''.e(route('contact')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('call-to-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($callToAction?->title),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($callToAction?->description),'contact_button' => ''.e(route('contact')).'']); ?>
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
    <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => gs('site_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/licenses_and_document.blade.php ENDPATH**/ ?>