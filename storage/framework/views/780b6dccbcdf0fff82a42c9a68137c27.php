<?php
    $PartnershipsAccreditationsContent = getContent('partnerships_accreditations.content', true);
    $PartnershipsAccreditationsElements = getContent('partnerships_accreditations.element', false, null, true);
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Heading -->
                <div class="partners-head mb-4">
                    <h2 class="fw-bold mb-3"><?php echo e(@$PartnershipsAccreditationsContent?->lang('title')); ?></h2>
                    <p class="text-muted">
                        <?php echo e(@$PartnershipsAccreditationsContent?->lang('subtitle')); ?>

                    </p>
                </div>

                <!-- Partnership list -->
                <div class="partners-content">
                    <?php $__currentLoopData = $PartnershipsAccreditationsElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PartnershipsAccreditationsElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-circle-check text-success me-2 fs-5"></i>
                            <span> <?php echo e(@$PartnershipsAccreditationsElement?->lang('title')); ?></span>
                        </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </div>
    </div>
</section>

    <style>
        .partners-head h2 {
            font-size: 1.4rem;
            line-height: 1.3;
        }

        .partners-head p {
            max-width: 800px;
        }

        .partners-content p {
            font-size: 1.05rem;
            color: #333;
            transition: color 0.3s ease;
        }

        .partners-content p:hover {
            color: #198754;
            /* Bootstrap success color */
        }
    </style>

<?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/sections/partnerships_accreditations.blade.php ENDPATH**/ ?>