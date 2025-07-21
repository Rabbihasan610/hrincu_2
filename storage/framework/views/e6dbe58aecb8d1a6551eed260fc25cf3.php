

<?php $__env->startSection("content"); ?>

    <section class="relative bg-cover bg-center text-white py-20" style="background-image: url('<?php echo e(asset('img/hero-bg.png')); ?>');">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="container px-4 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php echo app('translator')->get("Welcome to the official job portal of"); ?> <br class="hidden md:block">  <span class="text-[#2D5BFF]"><?php echo e(__("Human Resources Incubator.")); ?></span></h1>
            <p class="text-lg mb-8 max-w-2xl"><?php echo app('translator')->get('Find your dream job among thousands of vacancies, internships, and opportunities in various industries. Take the next step in your career with us!'); ?></p>
            <div class="flex">
                <div class="relative w-full max-w-md">
                    <input type="text" placeholder="<?php echo app('translator')->get('Search by job title or keyword'); ?>" class="w-full py-3 pl-5 pr-12 border border-gray-300 bg-transparent focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-2xl font-bold text-gray-800"><?php echo app('translator')->get('Search by'); ?> <span class="text-[#2D5BFF]"><?php echo e(__('Job Category')); ?></span></h2>
                <div class="flex space-x-2">
                    <a href="<?php echo e(route('submit.resume')); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-100">
                        <?php echo app('translator')->get('Upload Resume'); ?>
                    </a>
                    <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700"><?php echo app('translator')->get('Filter'); ?></button>
                </div>
            </div>
            <p class="text-gray-600 mb-4">
                <?php echo app('translator')->get('Choose your preference from our most exclusive job categories.'); ?>
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <?php $__currentLoopData = $job_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 text-center hover:shadow-md transition-shadow cursor-pointer">
                    <div class="w-12 h-12 mx-auto mb-2 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A2.25 2.25 0 0118.745 15H5.255A2.25 2.25 0 013 13.255V9a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 9v4.255z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.25 15.75L12 18h1.5l.75-2.25"></path></svg>
                    </div>
                    <p class="text-sm font-medium text-gray-700"><?php echo e($job_category?->lang('name')); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


    <?php
        $why_apply_through_us_content = getContent('why_apply_through_us.content', true);
        $why_apply_through_us_elements = getContent('why_apply_through_us.element', false, null, true);
    ?>


    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h2 class="text-2xl font-bold text-gray-800 mb-4"><?php echo e(@$why_apply_through_us_content?->lang('title')); ?></h2>
                <ul class="space-y-3 text-gray-700">
                    <?php $__currentLoopData = $why_apply_through_us_elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-start border-b border-gray-200 pb-2">
                            <span class="me-2"><?php echo e($key + 1); ?> </span>
                            <?php echo e($element?->lang('title')); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="<?php echo e(getImage('assets/images/frontend/why_apply_through_us/' . @$why_apply_through_us_content?->data_values?->image)); ?>" alt="<?php echo e(@$why_apply_through_us_content?->lang('title')); ?>" class="w-[600px] h-[350px]">
            </div>
        </div>
    </section>

    <?php
        $how_to_apply_content = getContent('how_to_apply.content', true);
        $how_to_apply_elements = getContent('how_to_apply.element', false, null, true);
    ?>

    <section class="py-12 bg-white">
        <div class="bg-white p-8 lg:p-12 w-11/12 max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-800 text-center mb-10">
                <?php echo e(@$how_to_apply_content?->lang('title')); ?>

            </h2>
    
            <div class="flex flex-col lg:flex-row items-center lg:items-start justify-center gap-8 lg:gap-12">
    
                <div>
                    <img src="<?php echo e(getImage('assets/images/frontend/how_to_apply/' . @$how_to_apply_content?->data_values?->image)); ?>" alt="<?php echo e(@$how_to_apply_content?->lang('title')); ?>" class="w-[800px] h-[350px]">
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 flex-grow">
                    
                    <?php $__currentLoopData = $how_to_apply_elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-xl shadow-md p-3 flex flex-col items-start space-y-3">
                            <div class="p-1">
                                <img src="<?php echo e(getImage('assets/images/frontend/how_to_apply/' . @$element?->data_values?->image)); ?>" alt="<?php echo e(@$element?->lang('title')); ?>" class="w-full h-[80px] rounded-2xl">
                            </div>
                            <p class="text-gray-700 text-lg font-semibold">
                                <?php echo e($element?->lang('title')); ?>

                            </p>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("web.layouts.frontend", ["title" => gs("site_name")], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projects\hrincu_v2\resources\views/web/job_listing.blade.php ENDPATH**/ ?>