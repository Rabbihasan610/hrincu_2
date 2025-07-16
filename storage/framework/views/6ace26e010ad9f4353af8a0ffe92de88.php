<div class="mt-6">
    <label class="block text-gray-700 text-md font-medium mb-2"><?php echo app('translator')->get('Register as'); ?>
    </label>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <label class="flex items-center p-3 border border-blue-500 rounded-md cursor-pointer <?php echo e(request()->type == 'job-seeker' ? 'bg-blue-50' : ''); ?>">
            <input type="radio" name="register-as" <?php echo e(request()->type == 'job-seeker' ? 'checked' : ''); ?> class="form-radio text-blue-600 rounded mr-2" data-type="job-seeker">
            <span class="text-blue-800 font-medium"><?php echo app('translator')->get('Job Seeker'); ?></span>
        </label>
        <label class="flex items-center p-3 border border-gray-300 rounded-md cursor-pointer <?php echo e(request()->type == 'employer' ? 'bg-blue-50' : ''); ?>">
            <input type="radio" name="register-as" <?php echo e(request()->type == 'employer' ? 'checked' : ''); ?>  class="form-radio text-blue-600 rounded mr-2" data-type="employer">
            <span class="text-gray-700"><?php echo app('translator')->get('Employer'); ?></span>
        </label>
        <label class="flex items-center p-3 border border-gray-300 rounded-md cursor-pointer <?php echo e(request()->type == 'service-provider' ? 'bg-blue-50' : ''); ?>">
            <input type="radio" name="register-as" <?php echo e(request()->type == 'service-provider' ? 'checked' : ''); ?> class="form-radio text-blue-600 rounded mr-2" data-type="service-provider">
            <span class="text-gray-700"><?php echo app('translator')->get('Service Provider'); ?></span>
        </label>
    </div>
</div>


<?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/navigation.blade.php ENDPATH**/ ?>