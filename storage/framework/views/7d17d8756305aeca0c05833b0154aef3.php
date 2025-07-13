<?php
    $ourServiceContent = getContent('our_service.content', true);
    $category_count = DB::table('job_categories')->count();
?>

<section class="service-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="our-service-img">
                    <img src="<?php echo e(getImage('assets/images/frontend/our_service/' . $ourServiceContent?->data_values?->image)); ?>" alt=""  class="img-fluid" />
                    <!---- category card section start ------>
                    <div class="category-card">
                        <div class="number">
                            <?php echo e($category_count); ?> <span>+</span></div>
                        <div class="content">
                            <h3><?php echo app('translator')->get('Job Categories'); ?></h3>
                            <p><?php echo app('translator')->get('Available'); ?></p>
                        </div>
                    </div>
                    <!---- category card section end ------>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="our-service">
                    <h3><?php echo app('translator')->get('Our Services'); ?></h3>
                    <p class="text" <?php if(session('lang') == 'ar'): ?> style="text-align: right !important;" <?php endif; ?>>
                        <?php echo @$ourServiceContent?->lang('description') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/our_service.blade.php ENDPATH**/ ?>