<?php
    $socialMediaElements = getContent('social_media.element', null, false, true);
    $footerContents = getContent('footer.content', true);
    $pages = App\Models\Page::where('is_default', Status::NO)->get();
    $policyPages = getContent('policy_pages.element', false, null, true);
    $lang = session()->get('lang') == 'ar' ? 'ar' : 'en';
?>

<footer class="bg-[#071d23] text-white text-sm pt-10 pb-5">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


    <div class="border border-gray-600 h-[6vh] rounded px-5 pt-3 pb-2 mb-10 grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-300">
      <div class="flex items-start space-x-2">
        <p class="text-sm me-2">
            <i class="fas fa-location"></i>
        </p>
        <p>
            <?php if($lang == 'ar'): ?>
            <?php echo e(@$footerContents?->data_values?->address); ?>

            <?php else: ?>
            <?php echo e(@$footerContents?->data_values?->address_ar); ?>

            <?php endif; ?>
        </p>
      </div>
      <div class="flex items-start space-x-2">
        <p class="text-sm me-2">✉️</p>
        <p>
            <?php echo e(@$footerContents?->data_values?->email); ?>

        </p>
      </div>
      <div class="flex items-start space-x-2">
        <p class="text-sm me-2">📞</p>
        <p><?php echo e(@$footerContents?->data_values?->mobile); ?></p>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-300">
      <div>
        <h2 class="text-blue-500 text-xl font-bold">
            <img src="<?php echo e(siteLogo()); ?>" class="h-16" alt="">
        </h2>
        <p class="mt-2 text-sm"><?php echo app('translator')->get('Make authenticate Brand'); ?></p>
        <p class="mt-4 mb-2"><?php echo app('translator')->get('Follow us:'); ?></p>
        <div class="flex space-x-3 text-lg">
            <?php $__currentLoopData = $socialMediaElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(@$socialMediaElement->data_values->link); ?>" class="hover:text-blue-400 m-3" target="_blank"><?php echo @$socialMediaElement->data_values->icon ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div>
        <h3 class="font-semibold mb-3"><?php echo app('translator')->get('Top Services'); ?></h3>
        <ul class="space-y-1 text-sm">
          <li>&gt;&gt; <?php echo app('translator')->get('Labor Service'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Manpower Supply'); ?></li>
          <li class="font-semibold">&gt;&gt; <?php echo app('translator')->get('Logistic Service'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Visa Processing'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Building Relationship'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Consultation'); ?></li>
        </ul>
      </div>

      <div>
        <h3 class="font-semibold mb-3"><?php echo app('translator')->get('Important Link'); ?></h3>
        <ul class="space-y-1 text-sm">
          <li>&gt;&gt; <?php echo app('translator')->get('Training & Rehabilitation'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Care for Employee'); ?></li>
          <li class="font-semibold">&gt;&gt; <?php echo app('translator')->get('Talent Recruitment'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Awareness & Events'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Staff Solution'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Talent Recruitment'); ?></li>
        </ul>
      </div>

      <div>
        <h3 class="font-semibold mb-3"><?php echo app('translator')->get('Help Center'); ?></h3>
        <ul class="space-y-1 text-sm">
          <li>&gt;&gt; <?php echo app('translator')->get('About us'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Contact us'); ?></li>
          <li class="text-green-400">&gt;&gt; <?php echo app('translator')->get('How it works'); ?></li>
          <li>&gt;&gt; <?php echo app('translator')->get('Help & FAQs'); ?></li>
        </ul>
      </div>
    </div>

    <div class="mt-10 border-t border-gray-600 pt-5 flex flex-col lg:flex-row justify-between items-center text-gray-400">
      <div class="space-x-4 text-sm mb-3 lg:mb-0">
        <a href="#" class="hover:underline"><?php echo app('translator')->get('Terms & condition'); ?>
        </a>
        <a href="#" class="hover:underline"><?php echo app('translator')->get('Privacy Policy'); ?></a>
        <a href="#" class="hover:underline"><?php echo app('translator')->get('Business Policy'); ?></a>
      </div>
      <div class="text-center text-sm mb-3 lg:mb-0">
        &copy; <?php echo e(Date('Y')); ?> <?php echo app('translator')->get('All rights reserved by'); ?> <a href="<?php echo e(url('/')); ?>" class="text-blue-400">
            <?php echo e(gs()->site_title); ?>

        </a>
      </div>
      <div class="flex items-center space-x-2">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/100px-Visa.svg.png" class="h-6" alt="Visa" />
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Mastercard_2019_logo.svg/100px-Mastercard_2019_logo.svg.png" class="h-6" alt="Mastercard" />
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a8/Paypal_Servise.jpg" class="h-6" alt="Paypal" />
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b0/Apple_Pay_logo.svg" class="h-6" alt="Apple Pay" />
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Google_Pay_Logo.svg" class="h-6" alt="Google Pay" />
      </div>
    </div>
  </div>
</footer>
<?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/partials/footer.blade.php ENDPATH**/ ?>