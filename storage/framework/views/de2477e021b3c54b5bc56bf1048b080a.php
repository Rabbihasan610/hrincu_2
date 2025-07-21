<?php
    $contactForm = getContent('contact_us.content', true);
    $socialMediaElements = getContent('social_media.element', null, false, true);
?>

<div class="contact-info px-4">
    <div class="row">
        <div class="col-12">
            <div class="contact-info-title">
                <h2>
                    <?php echo app('translator')->get('Official Address'); ?>
                </h2>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="contact-info-item">
                <div class="contact-info-item-content d-flex">
                    <p>
                        <?php echo e($contactForm?->lang('address')); ?>

                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-12">
            <div class="contact-info-item">
                <div class="contact-info-item-content d-flex">
                    <p>
                        <?php echo app('translator')->get('Phone'); ?>:
                    </p>
                    <p>
                        <?php echo e($contactForm?->lang('mobile')); ?>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="contact-info-item">
                <div class="contact-info-item-content d-flex">
                    <p>
                        <?php echo app('translator')->get('E-mail'); ?>:
                    </p>
                    <p>
                        <?php echo e($contactForm?->lang('email')); ?>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12">
            <div class="contact-info-item">
                <div class="contact-info-item-content d-flex">
                    <p>
                        <?php echo app('translator')->get('Web'); ?>:
                    </p>
                    <p>
                        <?php echo e($contactForm?->lang('website')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="follow-us d-flex">
                <p><?php echo app('translator')->get('Follow Us'); ?>:</p>
                <div class="follow-us-icon d-flex">
                    <?php $__currentLoopData = $socialMediaElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(@$socialMediaElement->data_values->link); ?>" target="_blank"><?php echo @$socialMediaElement->data_values->icon ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('style'); ?>

    <style>
        .contact-info {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .contact-info-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .contact-info-title h2 {
            font-size: 20px;
            font-weight: 600;
        }

        .contact-info-item {
            margin-bottom: 10px;
        }

        .contact-info-item-content {
            align-items: center;
        }

        .contact-info-item-content p {
            margin-bottom: 0;
            font-size: 14px;
        }

        .contact-info-item-content p:first-child {
            font-weight: 600;
            margin-right: 10px;
        }

        .contact-info-item-content p:last-child {
            color: #3566FB;
        }

        .follow-us-icon {
            margin-left: 10px;
        }

        .follow-us-icon a {
            margin-right: 10px;
            font-size: 16px;
            color: #484CC5;
        }
    </style>

<?php $__env->stopPush(); ?>
<?php /**PATH D:\projects\hrincu_v2\resources\views/web/includes/contact_info.blade.php ENDPATH**/ ?>