<?php
    $elements = getContent('banner.element', false, null, true);
?>

<section class="my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-slider">
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <a href="#">
                                <?php if(session()->get('lang') == 'ar'): ?>
                                    <img src="<?php echo e(asset(getImage('assets/images/frontend/banner/' . @$element->data_values->arabic_image, '1920x350'))); ?>" class="d-block w-100" alt="">
                                <?php else: ?>
                                    <img src="<?php echo e(asset(getImage('assets/images/frontend/banner/' . @$element->data_values->image, '1920x350'))); ?>" class="d-block w-100" alt="">
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Slick CSS and JS -->
<?php $__env->startPush('style-lib'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
.banner-slider img{
    width: 100%;
    height: 350px !important;
}


@media only screen and (max-width: 600px) {
    .banner-slider img{
        height: 200px !important;
    }
}
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function(){
        $('.banner-slider').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
            nextArrow: '<button type="button" class="slick-next">&#10095;</button>'
            <?php if(session()->get('lang') == 'ar'): ?>
            ,rtl: true,
            <?php endif; ?>
        });
    });
</script>

<?php $__env->stopPush(); ?>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/banner.blade.php ENDPATH**/ ?>