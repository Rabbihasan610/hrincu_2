
<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.trainingprogramcategory.update', @$category->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Title'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title" class="form-control" required
                                value="<?php echo e(old('title', @$category->title)); ?>">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Title Ar'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title_ar" class="form-control" required
                                value="<?php echo e(old('title_ar', @$category->title_ar)); ?>">
                        </div>
                    
                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.trainingprogramcategory.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/admin/services/training_program_categories/edit.blade.php ENDPATH**/ ?>