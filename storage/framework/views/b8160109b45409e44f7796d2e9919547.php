<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['title' => '', 'img_path' => 'img/hero-bg.png']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['title' => '', 'img_path' => 'img/hero-bg.png']); ?>
<?php foreach (array_filter((['title' => '', 'img_path' => 'img/hero-bg.png']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="relative bg-cover bg-center flex h-[15vh] items-center justify-start" style="background-image: url('<?php echo e(isset($img_path) ? asset($img_path) : asset('img/hero-bg.png')); ?>');" >
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="max-w-7xl container z-10 text-white pt-6 text-center">
        <h3 class="font-bold leading-tight mb-6 text-3xl">
            <?php echo e(__(@$title)); ?>

        </h3>
    </div>
</div>
<?php /**PATH D:\projects\hrincu_v2\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>