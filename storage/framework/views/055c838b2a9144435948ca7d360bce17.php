<?php
    $blogContent = getContent('blog.content', true);
    $blogs = App\Models\Blog::active()->limit(3)->get();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="latest-news text-center mb-5">
                    <h2><?php echo e(@$blogContent->data_values->title); ?></h2>
                    <p><?php echo e(@$blogContent->data_values->sub_title); ?></p>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 my-3">
                    <div class="card news-card rounded shadow h-100">
                        <img src="<?php echo e(getImage(getFilePath('blog') . '/' . $blog->image)); ?>" alt="">
                        <div class="card-body">
                            <small><span><?php echo e($blog->created_at->format('M d, Y')); ?></span> <span class="dotted"></span> <span>37 Comment</span></small>
                            <h5><?php echo e($blog->lang('title')); ?> </h5>
                            <p> <?php echo e(strLimit(strip_tags($blog?->lang('description')), 100)); ?></p>
                            <a href="<?php echo e(route('blog.details', $blog->slug)); ?>"><?php echo app('translator')->get('Read more'); ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\projects\hrincu_v2\resources\views/sections/blog.blade.php ENDPATH**/ ?>