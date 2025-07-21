<?php $__env->startSection('meta_tags'); ?>
    <?php if(app()->getLocale() == 'en'): ?>
    <meta name="locale" content="<?php echo e(app()->getLocale()); ?>" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <meta property="og:locale" content="en"/>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo e(gs('site_name')); ?>" />
    <meta property="og:description" content="<?php echo e(gs()->seo_description); ?>" />
    <meta property="og:keyword" content="<?php echo e(gs()->seo_keywords); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
	<meta property=" og:site_name" content="<?php echo e(gs('site_name')); ?>" />
    <meta property="article:author" content="Muhammad Al Sari" />
    <meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
    <meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
    <meta property="og:image" content="<?php echo e(siteLogo()); ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="853" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="خليل النمازي" />
    <?php else: ?>
    <meta name="locale" content="<?php echo e(app()->getLocale()); ?>" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <meta property="og:locale" content="ar" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="تنمية الأملاك" />
    <meta property="og:description" content="<?php echo e(gs()->seo_description); ?>" />
    <meta property="og:keyword" content="<?php echo e(gs()->seo_keywords); ?>"/>
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
	<meta property=" og:site_name" content="" />
    <meta property="article:author" content="<?php echo e(gs()->seo_description); ?>"/>
    <meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
    <meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
    <meta property="og:image" content="<?php echo e(siteLogo()); ?>" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="853" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="خليل النمازي" />
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-lib'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>



    <?php echo $__env->make('sections.hero_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php echo $__env->make('sections.ourservice_request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <section class="bg-[#3b0764] py-16 px-4 md:px-8 lg:px-16">
        <div class="max-w-7xl mx-auto text-white">
            <!-- Smaller heading text -->
            <h2 class="text-xl md:text-3xl font-semibold mb-6">
                <?php echo app('translator')->get('Contact Us Now'); ?>
            </h2>

            <ul class="text-base md:text-sm space-y-2 mb-8">
                <li><?php echo app('translator')->get('Looking for qualified candidates?'); ?></li>
                <li><?php echo app('translator')->get('Need to train your team?'); ?>
                <li><?php echo app('translator')->get('Seeking smart HR solutions?'); ?></li>
                <li><?php echo app('translator')->get('Start now — well guide you step by step'); ?></li>
            </ul>

            <!-- Smaller buttons -->
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300 ease-in-out text-center text-sm">
                    <?php echo app('translator')->get('Submit Request'); ?>
                </a>
                <a href="#" class="inline-block border-2 border-white hover:bg-white hover:text-[#3b0764] text-white font-medium py-2 px-6 rounded-md transition duration-300 ease-in-out text-center text-sm ms-3">
                    <?php echo app('translator')->get('Contact Us'); ?>
                </a>
            </div>
        </div>
    </section>



    <?php if($community_partnerships->count() > 0): ?>
        <div class="container mx-auto px-4 py-10 md:py-20">
            <?php $__currentLoopData = $community_partnerships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $community_partnership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 mb-16 md:mb-20 bg-white p-6 md:p-10">
                <div class="w-full md:w-1/2 order-1 <?php echo e($loop->odd ? 'md:order-1' : 'md:order-2'); ?>">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900"><?php echo e($community_partnership?->lang('title')); ?></h1>
                    <p class="text-base md:text-lg text-gray-600 mb-6">
                        <?php echo e($community_partnership?->lang('description')); ?>

                    </p>
                    <a href="#" class="inline-block px-6 py-2 border-1 border-blue-500 text-blue-500 rounded-md font-semibold hover:bg-blue-500 hover:text-white transition duration-300">View Details</a>
                </div>

                <div class="w-full md:w-1/2 h-64 md:h-96 overflow-hidden rounded-md order-2 <?php echo e($loop->odd ? 'md:order-2' : 'md:order-1'); ?>">
                    <img src="<?php echo e(getImage(getFilePath('deafult_service') . '/' . $community_partnership->image)); ?>" alt="Training Program Image" class="w-full h-full object-cover">
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>


    <?php if(@$sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('web.layouts.frontend', ['title' => gs('site_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/home.blade.php ENDPATH**/ ?>