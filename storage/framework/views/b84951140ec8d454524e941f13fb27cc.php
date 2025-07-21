<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sections.page_banner', ['title' =>  $ourService?->lang('title')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="row my-3 my-md-5">
            <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('ourservice.submit', $ourService->slug)); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="alert small" style="background: #0D47A1; border: none; border-radius: 0 !important">
                        <h5 class="mb-0 text-center text-white"><?php echo e(__('Request Form')); ?></h5>
                    </div>

                    <div class="alert small" style="background: linear-gradient(to right, #f5fff4 0%, #f5fff4 100%); border: 0.2 solid #f5fff4  dotted; border-radius: 0 !important">
                        <?php echo app('translator')->get('Please fill in the following information accurately to help us provide the appropriate service.'); ?>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold"><?php echo app('translator')->get('Applicant Information'); ?></label>
                        <input type="text" name="organization_name" class="form-control <?php $__errorArgs = ['organization_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Organization Name" value="<?php echo e(old('organization_name')); ?>">
                        <?php $__errorArgs = ['organization_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <?php
                        $extraFields = old('form_extra_fields', $ourService->form_extra_fields ? json_decode($ourService->form_extra_fields, true) : []);
                    ?>

                    <?php if(count($extraFields)): ?>
                        <?php $__currentLoopData = $extraFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $type = $field['type'] ?? 'text';
                                $label = $field['label'] ?? 'Field';
                                $name = "form_extra_fields[{$index}]";
                                $value = old("form_extra_fields.{$index}");

                                $totalFields = count($extraFields);
                                $isSecondLast = $index === $totalFields - 2;
                                $isLast = $index === $totalFields - 1;
                            ?>

                            <?php if($isSecondLast): ?>
                                <div class="row">
                            <?php endif; ?>

                            <div class="<?php echo e($isSecondLast || $isLast ? 'col-md-6' : ''); ?> mb-2">
                                <label class="form-label fw-bold"><?php echo e(__($label)); ?></label>

                                <?php if(in_array($type, ['text', 'date', 'number'])): ?>
                                    <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" class="form-control <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($value); ?>">
                                    <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php elseif($type === 'textarea'): ?>
                                    <textarea name="<?php echo e($name); ?>" class="form-control <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"><?php echo e($value); ?></textarea>
                                    <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php elseif($type === 'select' && isset($field['options']) && is_array($field['options'])): ?>
                                    <select name="<?php echo e($name); ?>" class="form-select <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value="">Select</option>
                                        <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($option); ?>" <?php if($value == $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <?php elseif(in_array($type, ['checkbox', 'radio']) && isset($field['options']) && is_array($field['options'])): ?>
                                    <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="<?php echo e($type); ?>"
                                                name="<?php echo e($name); ?><?php echo e($type == 'checkbox' ? "[]" : ""); ?>"
                                                id="<?php echo e($name); ?>_<?php echo e($loop->index); ?>"
                                                value="<?php echo e($option); ?>"
                                                <?php echo e($type == 'checkbox' ? (is_array($value) && in_array($option, $value) ? 'checked' : '') : ($value == $option ? 'checked' : '')); ?>

                                            >
                                            <label class="form-check-label" for="<?php echo e($name); ?>_<?php echo e($loop->index); ?>"><?php echo e($option); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__errorArgs = ["form_extra_fields.{$index}"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php endif; ?>
                            </div>

                            <?php if($isLast): ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <!-- Notes -->
                    <div class="mb-4">
                        <label class="form-label fw-bold"><?php echo app('translator')->get('Additional notes'); ?></label>
                        <textarea name="additional_notes" class="form-control" rows="4" placeholder="Type your notes"><?php echo e(old('additional_notes')); ?></textarea>
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit" class="btn btn-primary px-4"><?php echo app('translator')->get('Submit Request'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    input,
    select,
    textarea{
        border-radius: 0px !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Our Service Request Form'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/requests/ourservice_request_form.blade.php ENDPATH**/ ?>