<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'data' => null,
    'url' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'data' => null,
    'url' => ''
]); ?>
<?php foreach (array_filter(([
    'data' => null,
    'url' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($data): ?>
    <?php if($data->status == 1): ?>
        <a href="<?php echo e($url ?? '#'); ?>" class="badge bg-success"><?php echo app('translator')->get('Active'); ?></a>
    <?php else: ?>
        <a href="<?php echo e($url ?? '#'); ?>" class="badge bg-danger"><?php echo app('translator')->get('Inactive'); ?></a>
    <?php endif; ?>
<?php endif; ?>

<?php $__env->startPush('style'); ?>
<style>
    .badge{
        cursor: pointer;
    }
</style>
<?php $__env->stopPush(); ?>


<?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/components/status.blade.php ENDPATH**/ ?>