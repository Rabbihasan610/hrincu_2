<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title' => null,
    'description' => null,
    'link_button' => null,
    'contact_button' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title' => null,
    'description' => null,
    'link_button' => null,
    'contact_button' => null,
]); ?>
<?php foreach (array_filter(([
    'title' => null,
    'description' => null,
    'link_button' => null,
    'contact_button' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl rounded-xl bg-purple-900 p-8 text-center md:p-12">

        <?php if($title): ?>
            <h2 class="mb-4 text-2xl font-bold text-white sm:text-3xl"><?php echo e($title); ?></h2>
        <?php endif; ?>

        <?php if($description): ?>
            <p class="mb-8 text-base text-white text-opacity-80 sm:text-lg w-full max-w-xl mx-auto"><?php echo e($description); ?></p>
        <?php endif; ?>

        <div class="flex flex-col justify-center space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
            <?php if($link_button): ?>
                <a href="<?php echo e($link_button); ?>"
                    class="bg-blue-600 px-8 py-2 font-semibold text-white transition duration-300 ease-in-out hover:bg-blue-700">
                    <?php echo e(__('Submit Request')); ?>

                </a>
            <?php endif; ?>
            <?php if($contact_button): ?>
                <a href="<?php echo e($contact_button); ?>"
                    class="border border-white bg-transparent px-8 py-2 font-semibold text-white transition duration-300 ease-in-out hover:bg-white hover:text-purple-900">
                    <?php echo e(__('Contact Us')); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
</section><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/components/call-to-action.blade.php ENDPATH**/ ?>