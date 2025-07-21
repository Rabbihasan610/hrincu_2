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

<section>
    <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="md:w-1/2">
            <p class="text-lg font-semibold text-gray-600 mb-2">Licenses & Document</p>
            <h2 class="text-4xl sm:text-4xl font-bold text-gray-900 mb-6 leading-tight">Compliance and Governance to Ensure Service Quality and Partnership Credibility</h2>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">

                At HR Incubator, we are committed to the highest standards of transparency and regulatory compliance. We operate under official licenses and accreditations to deliver reliable and secure services for individuals, businesses, and institutional partners.
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

<?php echo $__env->make('sections.official_licenses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sections.regulatory_documents', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('sections.general_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>











<section class="py-6 px-4 sm:px-6 lg:px-4 bg-white">
  <div class="max-w-4xl mx-auto p-2 sm:p-2 border border-green-200 bg-green-50 text-green-800">
    <p class="text-sm sm:text-base leading-relaxed">
      <span class="font-bold">Note:</span> All documents and templates are available in digital format and support electronic signature to streamline processes and ensure efficient execution
    </p>
  </div>
</section>

<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto bg-purple-900 rounded-xl p-8 md:p-12 text-center">
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Are You Part of One of These Sectors?</h2>
        <p class="text-base sm:text-lg text-white text-opacity-80 mb-8">We are ready to deliver tailored solutions that fit your needs.</p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 transition duration-300 ease-in-out">
                <?php echo app('translator')->get('Submit Request'); ?>
            </button>
            <button class="bg-transparent border-1 border-white text-white font-semibold py-3 px-8 transition duration-300 ease-in-out hover:bg-white hover:text-purple-900">
                <?php echo app('translator')->get('Contact Us'); ?>
            </button>
        </div>
    </div>
</section>



<?php if(@$sections->secs != null): ?>
<?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => gs('site_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/licenses_and_document.blade.php ENDPATH**/ ?>