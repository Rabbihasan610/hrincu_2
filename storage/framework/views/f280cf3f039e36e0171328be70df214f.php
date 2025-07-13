<?php
    use App\Models\Service;
    use App\Enums\Status;

    $servicesQuery = Service::where('status', 1);

    if (!empty($limit)) {
        $services = $servicesQuery->take($limit)->get();
    } else {
        $services = $servicesQuery->paginate(20);
    }
?>

<section class="our-service-request">
    <div class="container">
        <div class="row justify-content-center">
            <?php if($services->isNotEmpty()): ?>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 my-3">
                        <div class="service-request-card rounded shadow d-flex flex-column h-100">
                            <div class="service-category-img">
                                <img src="<?php echo e(getImage(getFilePath('service') . '/' . $service->image)); ?>" alt="<?php echo e($service?->lang('title')); ?>">
                            </div>
                            <div class="card-body service-request-content flex-grow-1">
                                <h5 class="card-title text-center"><?php echo e($service?->lang('title')); ?></h5>
                            </div>
                            <div class="text-center mt-3">

                                <?php
                                    $uniqueSlug = Str::slug($service->lang('title')) . '-' . Str::random(20) . '-' . 'service' . '-' . $service->id;
                                ?>

                                <a href="<?php echo e(route('user.service.request', ['service_id' => $service->id, 'slug' => $uniqueSlug])); ?>" class="btn primary-btn"><?php echo app('translator')->get('Request Service'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <?php if($services instanceof \Illuminate\Pagination\LengthAwarePaginator && $services->hasPages()): ?>
            <div class="row my-3">
                <div class="col-12">
                    <div class="text-center">
                        <?php echo e($services->links()); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php $__env->startPush('style'); ?>
<style>
    @media only screen and (max-width: 600px) {
        .service-request-content {
            padding: 5px !important;
        }

        .primary-btn {
            width: 100% !important;
            padding: 10px 0px !important;
        }
    }
</style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/our_service_request_section.blade.php ENDPATH**/ ?>