<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo app('translator')->get('Service Request Details'); ?></h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('admin.our-services-request.index')); ?>" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> <?php echo app('translator')->get('Back'); ?>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold"><?php echo app('translator')->get('Service'); ?></label>
                                <p class="form-control-static"><?php echo e($serviceRequest->ourService->lang('title')); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold"><?php echo app('translator')->get('Organization Name'); ?></label>
                                <p class="form-control-static"><?php echo e($serviceRequest->organization_name); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold"><?php echo app('translator')->get('Submitted At'); ?></label>
                                <p class="form-control-static"><?php echo e($serviceRequest->created_at->format('d M Y H:i')); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold"><?php echo app('translator')->get('Status'); ?></label>
                                <p class="form-control-static">
                                    <span class="badge bg-<?php echo e($serviceRequest->status == 'pending' ? 'warning' :
                                        ($serviceRequest->status == 'approved' ? 'success' :
                                        'danger')); ?>">
                                        <?php echo e(ucfirst($serviceRequest->status)); ?>

                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php if($serviceRequest->form_data): ?>
                        <div class="card mt-4">
                            <div class="card-header">
                                <h6 class="card-title"><?php echo app('translator')->get('Form Data'); ?></h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php $__currentLoopData = $serviceRequest->form_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                // Find the field label from the service's form_extra_fields
                                                $fieldLabel = $key;
                                                $extraFields = json_decode($serviceRequest->ourService->form_extra_fields, true);
                                                if ($extraFields && isset($extraFields[$key]) && isset($extraFields[$key]['label'])) {
                                                    $fieldLabel = $extraFields[$key]['label'];
                                                }
                                            ?>
                                            <tr>
                                                <th width="30%"><?php echo e($fieldLabel); ?></th>
                                                <td>
                                                    <?php if(is_array($value)): ?>
                                                        <?php echo e(implode(', ', $value)); ?>

                                                    <?php else: ?>
                                                        <?php echo e($value ?? 'N/A'); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-group mt-4">
                        <label class="text-bold"><?php echo app('translator')->get('Additional Notes'); ?></label>
                        <p class="form-control-static"><?php echo e($serviceRequest->additional_notes ?? 'N/A'); ?></p>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h6 class="card-title"><?php echo app('translator')->get('Update Status'); ?></h6>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo e(route('admin.our-services-request.update', $serviceRequest)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-group my-3">
                                    <label for="status"><?php echo app('translator')->get('Status'); ?></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="pending" <?php echo e($serviceRequest->status == 'pending' ? 'selected' : ''); ?>><?php echo app('translator')->get('Pending'); ?></option>
                                        <option value="approved" <?php echo e($serviceRequest->status == 'approved' ? 'selected' : ''); ?>><?php echo app('translator')->get('Approved'); ?></option>
                                        <option value="rejected" <?php echo e($serviceRequest->status == 'rejected' ? 'selected' : ''); ?>><?php echo app('translator')->get('Rejected'); ?></option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Update'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Service Requests'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/admin/services/our-service-rquests/show.blade.php ENDPATH**/ ?>