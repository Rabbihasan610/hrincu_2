<?php $__env->startSection('panel'); ?>
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="<?php echo e(route('admin.our-services.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> <?php echo app('translator')->get('Add Service'); ?>
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo app('translator')->get('Icon'); ?></th>
                            <th><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('EN'); ?>)</th>
                            <th><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('AR'); ?>)</th>
                            <th><?php echo app('translator')->get('Slug'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Items Count'); ?></th>
                            <th><?php echo app('translator')->get('Extra Fields'); ?></th>
                            <th><?php echo app('translator')->get('Actions'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration + (($services->currentPage() - 1) * $services->perPage())); ?></td>
                            <td>
                                <?php if($service->icon): ?>
                                    <?php if(filter_var($service->icon, FILTER_VALIDATE_URL)): ?>
                                        <img src="<?php echo e($service->icon); ?>" alt="Icon" style="max-width: 30px; max-height: 30px;">
                                    <?php else: ?>
                                        <i class="<?php echo e($service->icon); ?>"></i>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($service->title); ?></td>
                            <td><?php echo e($service->title_ar); ?></td>
                            <td><?php echo e($service->slug); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($service->status == 'active' ? 'success' : 'secondary'); ?>">
                                    <?php echo e(ucfirst($service->status)); ?>

                                </span>
                            </td>
                            <td><?php echo e(safe_count($service->items)); ?></td>
                            <td><?php echo e(safe_count($service->form_extra_fields)); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('admin.our-services.edit', $service->id)); ?>" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.our-services.destroy', $service->id)); ?>" method="POST" class="d-inline btn-danger">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this service?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center"><?php echo app('translator')->get('No services found.'); ?> <a href="<?php echo e(route('admin.our-services.create')); ?>"><?php echo app('translator')->get('Create one now'); ?></a>.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($services->hasPages()): ?>
                <div class="d-flex justify-content-center mt-4">
                    <?php echo e($services->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .badge {
        font-size: 0.85em;
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Our Services'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/admin/ourservice/index.blade.php ENDPATH**/ ?>