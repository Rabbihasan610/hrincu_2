<?php
    $RegulatoryDocumentsElemets = getContent('regulatory_documents.element', false, null, true);
?>

<section class="py-5 regulatory-section">
    <div class="container">
        <!-- Heading -->
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4 fw-bold" style="font-size: 2rem"><?php echo app('translator')->get('Regulatory Documents'); ?></h2>
            </div>
        </div>

        <!-- Cards -->
        <div class="row justify-content-center g-4">
            <?php $__currentLoopData = $RegulatoryDocumentsElemets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RegulatoryDocumentsElemet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="regulatory-card text-center p-3 h-100">
                        <div class="regulatory-img mb-3">
                            <img src="<?php echo e(getImage('assets/images/frontend/regulatory_documents/' . @$RegulatoryDocumentsElemet?->data_values?->image, '700x548')); ?>"
                                class="img-fluid rounded" 
                                alt="<?php echo e(@$RegulatoryDocumentsElemet?->lang('title')); ?>">
                        </div>
                        <div class="regulatory-content">
                            <h6 class="fw-semibold"><?php echo e(@$RegulatoryDocumentsElemet?->lang('title')); ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<style>
/* Section background and spacing */
.regulatory-section {
    background: #f8f9fa;
}

/* Card styling */
.regulatory-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    cursor: pointer;
}

/* Smooth hover effect */
.regulatory-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* Image styling */
.regulatory-card img {
    max-height: 120px;
    object-fit: contain;
    transition: transform 0.3s ease;
}

.regulatory-card:hover img {
    transform: scale(1.05);
}

/* Title */
.regulatory-card h6 {
    color: #333;
    font-size: 16px;
    margin: 0;
}
</style>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/regulatory_documents.blade.php ENDPATH**/ ?>