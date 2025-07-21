<?php $__env->startSection('panel'); ?>
<div>
    <form action="<?php echo e(route('admin.our-services.update', $ourService->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="form-group  my-2">
                    <label for="title"><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('English'); ?>)</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title', $ourService->title)); ?>" required>
                </div>

                <div class="form-group my-2">
                    <label for="title_ar"><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
                    <input type="text" name="title_ar" id="title_ar" class="form-control" value="<?php echo e(old('title_ar', $ourService->title_ar)); ?>" required>
                </div>

                <div class="form-group my-2">
                    <label for="status"><?php echo app('translator')->get('Status'); ?></label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="active" <?php echo e(old('status', $ourService->status) === 'active' ? 'selected' : ''); ?>><?php echo app('translator')->get('Active'); ?></option>
                        <option value="inactive" <?php echo e(old('status', $ourService->status) === 'inactive' ? 'selected' : ''); ?>><?php echo app('translator')->get('Inactive'); ?></option>
                    </select>
                </div>

                <div class="form-group my-2">
                    <label for="icon"><?php echo app('translator')->get('Icon'); ?> (<?php echo app('translator')->get('Font Awesome class or image path'); ?>)</label>
                    <input type="file" name="icon" id="icon" class="form-control">
                    <?php if($ourService->icon): ?>
                        <div class="mt-2">
                            <small>Current Icon:</small>
                            <?php if(str_contains($ourService->icon, 'fa-')): ?>
                                <i class="fas <?php echo e($ourService->icon); ?>"></i>
                            <?php else: ?>
                                <img src="<?php echo e(getImage(getFilePath('service') . '/' . $ourService->icon)); ?>" alt="Icon" style="max-height: 30px; max-width: 30px;">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card my-4">
                    <div class="card-header">
                        <h3><?php echo app('translator')->get('Service Items'); ?></h3>
                        <button type="button" class="btn btn-sm btn-primary" id="add-item"><?php echo app('translator')->get('Add Item'); ?></button>
                    </div>
                    <div class="card-body" id="items-container">
                        <?php
                            $items = old('items', $ourService->items ? json_decode($ourService->items, true) : []);
                        ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex mb-3 item" data-index="<?php echo e($index); ?>">
                            <div class="col-md-4 mx-2">
                                <input type="text" name="items[<?php echo e($index); ?>][title]" class="form-control" placeholder="Title (English)" value="<?php echo e($item['title'] ?? ''); ?>" required>
                            </div>
                            <div class="col-md-4 mx-2">
                                <input type="text" name="items[<?php echo e($index); ?>][title_ar]" class="form-control" placeholder="Title (Arabic)" value="<?php echo e($item['title_ar'] ?? ''); ?>">
                            </div>
                            <div class="col-md-1 mx-2">
                                <button type="button" class="btn btn-danger remove-item"><?php echo app('translator')->get('Remove'); ?></button>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Update Service'); ?></button>
                <a href="<?php echo e(route('admin.our-services.index')); ?>" class="btn btn-secondary"><?php echo app('translator')->get('Cancel'); ?></a>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card my-4">
                    <div class="card-header">
                        <h3><?php echo app('translator')->get('Form Extra Fields'); ?></h3>
                        <button type="button" class="btn btn-sm btn-primary" id="add-extra-field"><?php echo app('translator')->get('Add Field'); ?></button>
                    </div>
                    <div class="card-body" id="extra-fields-container">
                        <?php
                            $extraFields = old('form_extra_fields', $ourService->form_extra_fields ? json_decode($ourService->form_extra_fields, true) : []);
                        ?>
                        <?php $__currentLoopData = $extraFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-row mb-3 extra-field" data-index="<?php echo e($index); ?>">
                            <div class="col my-2">
                                <input type="text" name="form_extra_fields[<?php echo e($index); ?>][label]" class="form-control" placeholder="Label" value="<?php echo e($field['label'] ?? ''); ?>" required>
                            </div>
                            <div class="col">
                                <select name="form_extra_fields[<?php echo e($index); ?>][type]" class="form-control field-type" required>
                                    <option value="text" <?php echo e(isset($field['type']) && $field['type'] === 'text' ? 'selected' : ''); ?>><?php echo app('translator')->get('Text'); ?></option>
                                    <option value="number" <?php echo e(isset($field['type']) && $field['type'] === 'number' ? 'selected' : ''); ?>><?php echo app('translator')->get('Number'); ?></option>
                                    <option value="email" <?php echo e(isset($field['type']) && $field['type'] === 'email' ? 'selected' : ''); ?>><?php echo app('translator')->get('Email'); ?></option>
                                    <option value="date" <?php echo e(isset($field['type']) && $field['type'] === 'date' ? 'selected' : ''); ?>><?php echo app('translator')->get('Date'); ?></option>
                                    <option value="checkbox" <?php echo e(isset($field['type']) && $field['type'] === 'checkbox' ? 'selected' : ''); ?>><?php echo app('translator')->get('Checkbox'); ?></option>
                                    <option value="radio" <?php echo e(isset($field['type']) && $field['type'] === 'radio' ? 'selected' : ''); ?>><?php echo app('translator')->get('Radio'); ?></option>
                                    <option value="select" <?php echo e(isset($field['type']) && $field['type'] === 'select' ? 'selected' : ''); ?>><?php echo app('translator')->get('Select'); ?></option>
                                </select>
                            </div>
                            <div class="col my-2">
                                <div class="form-check">
                                    <input type="checkbox" name="form_extra_fields[<?php echo e($index); ?>][required]" class="form-check-input" value="1" <?php echo e(isset($field['required']) && $field['required'] ? 'checked' : ''); ?>>
                                    <label class="form-check-label"><?php echo app('translator')->get('Required'); ?></label>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <button type="button" class="btn btn-danger remove-field"><?php echo app('translator')->get('Remove'); ?></button>
                            </div>

                            <?php if(isset($field['type']) && in_array($field['type'], ['select', 'radio', 'checkbox'])): ?>
                            <div class="col-12 options-container">
                                <label><?php echo app('translator')->get('Options (comma separated)'); ?></label>
                                <input type="text"
                                    name="form_extra_fields[<?php echo e($index); ?>][options]"
                                    class="form-control options-input"
                                    placeholder="Option 1, Option 2, Option 3"
                                    value="<?php echo e(is_array($field['options'] ?? null)
                                            ? implode(', ', $field['options'])
                                            : ($field['options'] ?? '')); ?>"
                                    required>
                            </div>
                            <?php else: ?>
                            <div class="col-12 options-container d-none">
                                <label><?php echo app('translator')->get('Options (comma separated)'); ?></label>
                                <input type="text" name="form_extra_fields[<?php echo e($index); ?>][options]" class="form-control options-input" placeholder="Option 1, Option 2, Option 3">
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {

        $('#add-extra-field').click(function() {
            const index = $('.extra-field').length;
            const fieldHtml = `
                <div class="form-row mb-3 extra-field" data-index="${index}">
                    <div class="col my-2">
                        <input type="text" name="form_extra_fields[${index}][label]" class="form-control" placeholder="<?php echo app('translator')->get('Label'); ?>" required>
                    </div>
                    <div class="col">
                        <select name="form_extra_fields[${index}][type]" class="form-control field-type" required>
                            <option value="text"><?php echo app('translator')->get('Text'); ?></option>
                            <option value="number"><?php echo app('translator')->get('Number'); ?></option>
                            <option value="email"><?php echo app('translator')->get('Email'); ?></option>
                            <option value="date"><?php echo app('translator')->get('Date'); ?></option>
                            <option value="checkbox"><?php echo app('translator')->get('Checkbox'); ?></option>
                            <option value="radio"><?php echo app('translator')->get('Radio'); ?></option>
                            <option value="select"><?php echo app('translator')->get('Select'); ?></option>
                        </select>
                    </div>
                    <div class="col my-2">
                        <div class="form-check">
                            <input type="checkbox" name="form_extra_fields[${index}][required]" class="form-check-input" value="1">
                            <label class="form-check-label"><?php echo app('translator')->get('Required'); ?></label>
                        </div>
                    </div>
                    <div class="col-auto my-2">
                        <button type="button" class="btn btn-danger remove-field"><?php echo app('translator')->get('Remove'); ?></button>
                    </div>
                    <div class="col-12 options-container d-none">
                        <label><?php echo app('translator')->get('Options (comma separated)'); ?></label>
                        <input type="text" name="form_extra_fields[${index}][options]" class="form-control options-input" placeholder="<?php echo app('translator')->get('Option 1, Option 2, Option 3'); ?>">
                    </div>
                </div>
            `;
            $('#extra-fields-container').append(fieldHtml);
        });

        $('#add-item').click(function() {
            const index = $('.item').length;
            const itemHtml = `
                <div class="d-flex my-3 item" data-index="${index}">
                    <div class="col-md-4 mx-2">
                        <input type="text" name="items[${index}][title]" class="form-control" placeholder="<?php echo app('translator')->get('Title (English)'); ?>" required>
                    </div>
                    <div class="col-md-4 mx-2">
                        <input type="text" name="items[${index}][title_ar]" class="form-control" placeholder="<?php echo app('translator')->get('Title (Arabic)'); ?>">
                    </div>
                    <div class="col-md-1 mx-2">
                        <button type="button" class="btn btn-danger remove-item"><?php echo app('translator')->get('Remove'); ?></button>
                    </div>
                </div>
            `;
            $('#items-container').append(itemHtml);
        });

        $(document).on('change', '.field-type', function() {
            const fieldType = $(this).val();
            const container = $(this).closest('.extra-field');
            const optionsContainer = container.find('.options-container');
            const optionsInput = container.find('.options-input');

            if (['select', 'radio', 'checkbox'].includes(fieldType)) {
                optionsContainer.removeClass('d-none');
                optionsInput.prop('required', true);
            } else {
                optionsContainer.addClass('d-none');
                optionsInput.prop('required', false);
                optionsInput.val('');
            }
        });

        $(document).on('click', '.remove-field', function() {
            $(this).closest('.extra-field').remove();
            reindexFields('#extra-fields-container', 'form_extra_fields');
        });

        $(document).on('click', '.remove-item', function() {
            $(this).closest('.item').remove();
            reindexFields('#items-container', 'items');
        });

        function reindexFields(containerSelector, fieldName) {
            $(containerSelector).find(fieldName === 'form_extra_fields' ? '.extra-field' : '.item').each(function(index) {
                $(this).attr('data-index', index);
                $(this).find('input, select, textarea').each(function() {
                    const name = $(this).attr('name');
                    if (name) {
                        const newName = name.replace(/\[\d+\]/, `[${index}]`);
                        $(this).attr('name', newName);
                    }
                });
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Edit Our Service'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/admin/ourservice/edit.blade.php ENDPATH**/ ?>