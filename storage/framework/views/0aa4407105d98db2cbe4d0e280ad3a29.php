<?php
    $HumanResourcesContent = getContent('human_resources_incubator.content', true);
?>

<section class="py-5" style="background: #f9f9fb;">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Text Content -->
            <div class="col-12 col-md-6 mb-4 mb-md-0">
                <div class="p-4 rounded shadow-sm bg-white h-100">
                    <h1 class="fw-bold mb-3 text-primary" style="font-size: 2rem;">
                        <?php echo e(@$HumanResourcesContent?->lang('title')); ?>

                    </h1>
                    <p class="text-muted" style="line-height: 1.8;">
                        <?php echo e(@$HumanResourcesContent?->lang('description')); ?>

                    </p>
                    
                </div>
            </div>
            
            <!-- Image Content -->
            <div class="col-12 col-md-6 text-center">
                <div class="human-resources-img position-relative">
                    <img src="<?php echo e(getImage('assets/images/frontend/human_resources_incubator/' . @$HumanResourcesContent?->data_values?->image, '700x400')); ?>"
                        alt="Human Resources Image"
                        class="img-fluid rounded shadow-sm hover-zoom">
                </div>
            </div>
            
        </div>
    </div>
</section>

<style>
/* Smooth hover zoom effect for the image */
.hover-zoom {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.hover-zoom:hover {
    transform: scale(1.03);
    box-shadow: 0 12px 25px rgba(0,0,0,0.1);
}

/* Fade-in animation */
.human-resources, .human-resources-img {
    animation: fadeInUp 0.8s ease-in-out;
}
@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/human_resources_incubator.blade.php ENDPATH**/ ?>