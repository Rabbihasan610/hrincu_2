<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo app('translator')->get('Service Requests'); ?></h3>
                    <div class="card-tools">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('Search'); ?>" value="<?php echo e(request('search')); ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('ID'); ?></th>
                                <th><?php echo app('translator')->get('Service'); ?></th>
                                <th><?php echo app('translator')->get('Organization'); ?></th>
                                <th><?php echo app('translator')->get('Submitted At'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $serviceRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($request->id); ?></td>
                                    <td><?php echo e($request->ourService->lang('title')); ?></td>
                                    <td><?php echo e($request->organization_name); ?></td>
                                    <td><?php echo e($request->created_at->format('d M Y H:i')); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo e($request->status == 'pending' ? 'warning' :
                                            ($request->status == 'approved' ? 'success' :
                                            'danger')); ?>">
                                            <?php echo e(ucfirst($request->status)); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.our-services-request.show', $request)); ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.our-services-request.destroy', $request)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center"><?php echo app('translator')->get('No service requests found'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <?php echo e($serviceRequests->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Service Requests'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/admin/services/our-service-rquests/index.blade.php ENDPATH**/ ?>