<?php
    $lang = app()->getLocale();
?>

<div class="bg-purple-900 text-white text-sm h-8">
  <div class="max-w-7xl mx-auto px-6 flex justify-end items-center py-1">
    <ul class="flex space-x-4">
      <li class="flex items-center">
        <?php if(gs('multi_language')): ?>
            <?php if(@$lang == 'en'): ?>
                <a href="#" class="flex items-center hover:text-gray-300 langSel me-2" data-lang="ar">
                    <img src="https://flagicons.lipis.dev/flags/4x3/sa.svg" alt="Arabic Flag" class="h-4 mr-2" />
                    <?php echo app('translator')->get('Arabic'); ?>
                </a>
            <?php endif; ?>

            <?php if(@$lang == 'ar'): ?>
                <a href="#" class="flex items-center hover:text-gray-300 langSel me-2" data-lang="en">
                    <img src="https://flagicons.lipis.dev/flags/4x3/us.svg" alt="Arabic Flag" class="h-4 mr-2 me-2" />
                    <?php echo app('translator')->get('English'); ?>
                </a>
            <?php endif; ?>
        <?php endif; ?>
      </li>
      <li class="relative group">

        <button class="flex items-center hover:text-gray-300 focus:outline-none me-2">
          <i class="bi bi-person-fill mr-1"></i> <?php echo app('translator')->get('Account'); ?>
          <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5.25 7.75L10 12.5l4.75-4.75" />
          </svg>
        </button>

        <ul class="absolute right-0 w-40 mt-1 bg-white text-black rounded shadow-md hidden group-hover:block z-50">
            <?php if(auth()->check()): ?>
                <li><a href="<?php echo e(route('user.home')); ?>" class="block px-4 py-2 hover:bg-gray-100"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('user.logout')); ?>" class="block px-4 py-2 hover:bg-gray-100"><?php echo app('translator')->get('Logout'); ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo e(route('user.login')); ?>" class="block px-4 py-2 hover:bg-gray-100"><?php echo app('translator')->get('Sign In'); ?></a></li>
                <li><a href="<?php echo e(route('user.register')); ?>" class="block px-4 py-2 hover:bg-gray-100"><?php echo app('translator')->get('Sing Up'); ?></a></li>
            <?php endif; ?>
        </ul>


      </li>
    </ul>
  </div>
</div>

<nav class="bg-gray-100 shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <a href="#" class="flex items-center">
        <img src="<?php echo e(siteLogo()); ?>" alt="HRinco Logo" class="h-12" />
      </a>

      <div class="md:hidden">
        <button type="button" class="text-gray-500 hover:text-black focus:outline-none" onclick="showMobileMenu()">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <div class="hidden md:flex space-x-6 items-center">
        <a href="<?php echo e(url('/')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Home'); ?></a>
        <a href="<?php echo e(route('about')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('About Us'); ?></a>
        <a href="<?php echo e(route('service')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Our Services'); ?></a>
        <a href="<?php echo e(route('targeted.sector')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Targeted Sectors'); ?></a>
        <a href="<?php echo e(route('training.program')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Training Programs'); ?></a>
        <a href="<?php echo e(route('community.engagement')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Community Engagement'); ?></a>
        <a href="<?php echo e(route('licenses.document')); ?>" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Documents & Certificate'); ?></a>
        <a href="#" class="text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Contact Us'); ?></a>
        <a href="<?php echo e(route('submit.resume')); ?>" class="ml-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800 transition"><?php echo app('translator')->get('Submit'); ?></a>
      </div>
    </div>
  </div>

  <div class="md:hidden hidden" id="showMenu">
    <div class="px-4 pt-2 pb-4 space-y-2">
      <a href="<?php echo e(url('/')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Home'); ?></a>
      <a href="<?php echo e(route('about')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('About Us'); ?></a>
      <a href="<?php echo e(route('service')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Our Services'); ?></a>
      <a href="<?php echo e(route('targeted.sector')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Targeted Sectors'); ?></a>
      <a href="<?php echo e(route('training.program')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Training Programs'); ?></a>
      <a href="<?php echo e(route('community.engagement')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Community Engagement'); ?></a>
      <a href="<?php echo e(route('licenses.document')); ?>" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Documents & Certificate'); ?></a>
      <a href="#" class="block text-gray-700 hover:text-purple-700 text-sm"><?php echo app('translator')->get('Contact Us'); ?></a>
      <a href="<?php echo e(route('submit.resume')); ?>" class="block mt-2 px-4 py-2 bg-purple-700 text-white rounded hover:bg-purple-800"><?php echo app('translator')->get('Submit'); ?></a>
    </div>
  </div>
</nav>
<?php /**PATH E:\xampp\htdocs\hrincu_2\resources\views/web/partials/header.blade.php ENDPATH**/ ?>