<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'image' => null,
    'path' => 'hero_banner'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'image' => null,
    'path' => 'hero_banner'
]); ?>
<?php foreach (array_filter(([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'image' => null,
    'path' => 'hero_banner'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<section>
    <div class="bg-gray-100 px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-12 md:flex-row">
            <div class="md:w-1/2">
                <?php if($subtitle): ?>
                    <p class="mb-2 text-lg font-semibold text-gray-600"><?php echo e($subtitle); ?></p>
                <?php endif; ?>

                <?php if($title): ?>
                    <h2 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl"><?php echo e($title); ?></h2>
                <?php endif; ?>

                <?php if($description): ?>
                    <p class="text-base leading-relaxed text-gray-700 sm:text-lg">
                        <?php echo $description; ?>

                    </p>
                <?php endif; ?>
            </div>

            <div class="flex justify-center md:w-1/2 md:justify-end">
                <div class="w-full overflow-hidden rounded-lg">
                    <?php if($image): ?>
                        <img alt="Modern buildings cityscape" class="h-auto w-full" src="<?php echo e($image); ?>">
                    <?php else: ?>
                        <img alt="Modern buildings cityscape" class="h-auto w-full" src="https://placehold.co/700x400">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/components/hero-banner.blade.php ENDPATH**/ ?>