<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.trainingprogram.store', @$service->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-4">
                        <label class="form-label"><?php echo app('translator')->get('Image'); ?> <span class="text-danger fs-6">*</span></label>
                        <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['image' => ''.e(@$service->image).'','name' => 'image','class' => 'w-100','type' => 'trainingpath']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(@$service->image).'','name' => 'image','class' => 'w-100','type' => 'trainingpath']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $attributes = $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $component = $__componentOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
                    </div>
                    <div class="col-md-8">

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Category'); ?> <span class="text-danger fs-6">*</span></label>
                            <select name="training_program_category_id" class="form-control select2-basic">
                                <option value=""><?php echo app('translator')->get('Select Category'); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('training_program_category_id', @$service->training_program_category_id) == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->title); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Title'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title" class="form-control" required
                                value="<?php echo e(old('title', @$service->title)); ?>">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Title Ar'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title_ar" class="form-control" required
                                value="<?php echo e(old('title_ar', @$service->title_ar)); ?>">
                        </div>
                        
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Description'); ?> <span class="text-danger fs-6">*</span></label>
                            <textarea class="form-control" name="description" required><?php echo e(old('description', @$service->description)); ?></textarea>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Description Ar'); ?> <span class="text-danger fs-6">*</span></label>
                            <textarea class="form-control" name="description_ar" required><?php echo e(old('description_ar', @$service->description_ar)); ?></textarea>
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
    <a href="<?php echo e(route('admin.trainingprogram.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/admin/services/training_paths/create.blade.php ENDPATH**/ ?>