    <?php
        $getNotificationContent = getContent('get_notification.content', true);
    ?>

    <!----------- Get Notificaton section End --------------->

    <section class="get-notification-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="get-notification">
                        <h2><?php echo e(__(@$getNotificationContent?->lang('title'))); ?></h2>
                        <p><?php echo __(@$getNotificationContent?->lang('description')); ?></p>
                        <form action="<?php echo e(route('subscribe')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input class="get-form-control" type="email" name="email" placeholder="<?php echo app('translator')->get('Enter your email'); ?>">
                            <button type="submit" class="btn primary-btn get-btn"><?php echo app('translator')->get('Subscribe'); ?></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----------- Get Notificaton  section End --------------->
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/get_notification.blade.php ENDPATH**/ ?>