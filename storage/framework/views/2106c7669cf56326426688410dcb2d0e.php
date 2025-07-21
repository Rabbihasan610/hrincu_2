<?php
    $WhoweServeContent = getContent('whowe_serve.content', true);
    $WhoweServeElements = getContent('whowe_serve.element', false, null, true);
?>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- Left Image -->
            <div class="col-12 col-lg-6">
                <div class="position-relative">
                    <img src="<?php echo e(getImage('assets/images/frontend/whowe_serve/' . @$WhoweServeContent?->data_values?->image, '700x400')); ?>"
                        class="img-fluid rounded-3 shadow-sm" alt="<?php echo e(@$WhoweServeContent?->lang('title')); ?>">
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-12 col-lg-6">
                <div class="brand_registration">
                    <div>
                        <h2 class="fw-bold text-primary mb-3" style="font-size: 2rem">
                            <?php echo e(@$WhoweServeContent?->lang('title')); ?>

                        </h2>
                    </div>

                    <div>
                        <p class="lead text-muted mb-4">
                            <?php echo e(@$WhoweServeContent?->lang('sub_title')); ?>

                        </p>
                    </div>

                    <div>
                        <ul class="list-unstyled mb-4">
                            <?php $__currentLoopData = $WhoweServeElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $WhoweServeElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span><?php echo e(@$WhoweServeElement?->lang('title')); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div>
                        <p class="text-dark">
                            <?php echo e(@$WhoweServeContent?->lang('bottom')); ?>

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/whowe_serve.blade.php ENDPATH**/ ?>