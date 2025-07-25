<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'placeholder' => 'Search...',
    'btn' => 'btn--primary',
    'dateSearch' => 'no',
    'keySearch' => 'yes',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'placeholder' => 'Search...',
    'btn' => 'btn--primary',
    'dateSearch' => 'no',
    'keySearch' => 'yes',
]); ?>
<?php foreach (array_filter(([
    'placeholder' => 'Search...',
    'btn' => 'btn--primary',
    'dateSearch' => 'no',
    'keySearch' => 'yes',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<form action="" method="GET" class="d-flex flex-wrap gap-2">
    <?php if($keySearch == 'yes'): ?>
        <?php if (isset($component)) { $__componentOriginal4ac0317ad52c5e8be0b5ddc295816791 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4ac0317ad52c5e8be0b5ddc295816791 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-key-field','data' => ['placeholder' => ''.e($placeholder).'','btn' => ''.e($btn).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-key-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => ''.e($placeholder).'','btn' => ''.e($btn).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4ac0317ad52c5e8be0b5ddc295816791)): ?>
<?php $attributes = $__attributesOriginal4ac0317ad52c5e8be0b5ddc295816791; ?>
<?php unset($__attributesOriginal4ac0317ad52c5e8be0b5ddc295816791); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4ac0317ad52c5e8be0b5ddc295816791)): ?>
<?php $component = $__componentOriginal4ac0317ad52c5e8be0b5ddc295816791; ?>
<?php unset($__componentOriginal4ac0317ad52c5e8be0b5ddc295816791); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if($dateSearch == 'yes'): ?>
        <?php if (isset($component)) { $__componentOriginal00daea293777b493a0f7b779e8aa92fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal00daea293777b493a0f7b779e8aa92fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-date-field','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-date-field'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal00daea293777b493a0f7b779e8aa92fe)): ?>
<?php $attributes = $__attributesOriginal00daea293777b493a0f7b779e8aa92fe; ?>
<?php unset($__attributesOriginal00daea293777b493a0f7b779e8aa92fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal00daea293777b493a0f7b779e8aa92fe)): ?>
<?php $component = $__componentOriginal00daea293777b493a0f7b779e8aa92fe; ?>
<?php unset($__componentOriginal00daea293777b493a0f7b779e8aa92fe); ?>
<?php endif; ?>
    <?php endif; ?>

</form>
<?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/components/search-form.blade.php ENDPATH**/ ?>