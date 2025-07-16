<?php $__env->startSection('content'); ?>
<?php
    $policyPages = getContent('policy_pages.element', false, null, true);
    $type = request()->type ?? 'service-supplier';
?>

<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['title' => 'Registration as Service Provider']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Registration as Service Provider']); ?>
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
            <?php echo app('translator')->get('Join HR incubators network of certified service providers and offer your expertise in structured, learning, consultancy, and institutional support. Please fill out the form below.'); ?>
        </div>

        <?php echo $__env->make('user.auth.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="mt-6">
            <input type="text" placeholder="<?php echo app('translator')->get('Service Provider / Company Name'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-4">
            <input type="text" placeholder="Type of Entity" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-6">
            <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Areas of Service Provided'); ?></label>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-2">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Recruitment Services'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Training & Development Services'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Outsourcing & Operational Support'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Psychological & Health Support'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Call Center & Contact Services'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('HR Tech Solutions'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Organizational Consulting'); ?></span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600 rounded mr-2">
                    <span class="text-gray-700"><?php echo app('translator')->get('Other please specify'); ?></span>
                </label>
            </div>
            <input type="text" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2" placeholder="<?php echo app('translator')->get('If Other please specify'); ?>">
        </div>

        <div class="mt-6">
            <input type="text" placeholder="<?php echo app('translator')->get('Commercial Registration Number (If available)'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-4">
            <input type="text" placeholder="<?php echo app('translator')->get('Contact Person Name'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <input type="text" placeholder="<?php echo app('translator')->get('Mobile'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="email" placeholder="<?php echo app('translator')->get('Email Address'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <select class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option><?php echo app('translator')->get('City / Region'); ?></option>
                    </select>
            </div>
            <div>
                <input type="text" placeholder="<?php echo app('translator')->get('Website (if available)'); ?>" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Preferred Communication method'); ?></label>
            <div class="flex flex-col sm:flex-row sm:space-x-4">
                <label class="inline-flex items-center mt-1">
                    <input type="radio" class="form-radio text-blue-600" name="communicationMethod" value="email">
                    <span class="ml-2 text-gray-700"><?php echo app('translator')->get('Email'); ?></span>
                </label>
                <label class="inline-flex items-center mt-1">
                    <input type="radio" class="form-radio text-blue-600" name="communicationMethod" value="phoneCall">
                    <span class="ml-2 text-gray-700"><?php echo app('translator')->get('Phone Call'); ?></span>
                </label>
                <label class="inline-flex items-center mt-1">
                    <input type="radio" class="form-radio text-blue-600" name="communicationMethod" value="whatsApp">
                    <span class="ml-2 text-gray-700"><?php echo app('translator')->get('WhatsApp'); ?></span>
                </label>
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Brief Summary of Your Experience and Specialization'); ?></label>
            <textarea placeholder="Description" rows="6" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="mt-6">
            <button class="w-full bg-blue-700 text-white p-3 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <?php echo app('translator')->get('Submit Register'); ?>
            </button>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
    <?php echo $__env->make('user.auth.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        "use strict";
        (function($) {
            $('.checkUser').on('focusout', function(e) {
                var url = "<?php echo e(route('user.checkUser')); ?>";
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                var fieldType = $(this).attr('name');
                var data = {
                    _token: token
                };
                data[fieldType] = value;

                $.post(url, data, function(response) {
                    if (response.data) {
                        $(`.${response.type}Exist`).text(`${response.type} already exists`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Sign In'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/provider.blade.php ENDPATH**/ ?>