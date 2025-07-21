<?php
    $PartnershipAreasContent = getContent('partnership_areas.content', true);
    $PartnershipAreasElements = getContent('partnership_areas.element', false, null, true);
?>



<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image Section -->
            <div class="col-12 col-md-6 mb-4">
                <div class="partnership-img text-center">
                    <img src="<?php echo e(getImage('assets/images/frontend/partnership_areas/' . @$PartnershipAreasContent?->data_values?->image, '700x548')); ?>"
                        class="img-fluid " alt="<?php echo e(@$PartnershipAreasContent?->lang('title')); ?>">
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-12 col-md-6 mb-4">
                <div class="partnership-top mb-4">
                    <h2><?php echo e(@$PartnershipAreasContent?->lang('title')); ?></h2>
                    <div class="divider"></div>
                </div>
                <div class="row">
                    <?php
                        $bgColors = [
                            '#EAF2FF', // Light blue
                            '#F3E8FF', // Light purple
                            '#FFF5E5', // Light orange
                            '#E9FCE9', // Light green
                            '#FFE9EC', // Light pink
                        ];
                        $i = 0;
                    ?>

                    <?php $__currentLoopData = $PartnershipAreasElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PartnershipAreaElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="partnership-card" style="background: <?php echo e($bgColors[$i % count($bgColors)]); ?>;">
                                <h5><?php echo e(@$PartnershipAreaElement?->lang('title')); ?></h5>
                                <p><?php echo e(@$PartnershipAreaElement?->lang('subtitle')); ?></p>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Section Title */
    .partnership-top h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1A2B4C;
        margin-bottom: 10px;
    }

    .partnership-top .divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #5D5A88, #4A90E2);
        border-radius: 2px;
        margin: 10px 0 20px;
    }

    /* Card Style */
    .partnership-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
        height: 100%;
    }

    .partnership-card h5 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .partnership-card p {
        color: #444;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Hover Effect */
    .partnership-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(74, 144, 226, 0.15);
    }

    /* Image Hover */
    .partnership-img img {
        border-radius: 15px;
        transition: transform 0.4s ease;
    }

    .partnership-img img:hover {
        transform: scale(1.03);
    }
</style>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/partnership_areas.blade.php ENDPATH**/ ?>