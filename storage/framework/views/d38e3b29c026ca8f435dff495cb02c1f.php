<form action="<?php echo e(route('contact.query.submit')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <h5>
            <?php echo app('translator')->get('Please Send Your Comments Here:'); ?>
        </h5>
        <p>
            <?php echo app('translator')->get('For any suggestion or query please send your comments to us.'); ?>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <input required type="text" name="name" id="name" placeholder="<?php echo app('translator')->get('Name'); ?>" class="form-control">
        </div>

        <div class="col-md-12 mb-4">
            <input required type="text" name="mobile" id="mobile" placeholder="<?php echo app('translator')->get('Mobile Number'); ?>" class="form-control">
        </div>

        <div class="col-md-12 mb-4">
            <input required type="email" name="email" id="email" placeholder="<?php echo app('translator')->get('Email'); ?>" class="form-control">
        </div>

        <div class="col-md-12 mb-4">
            <input required type="text" name="work_place" id="work_place" placeholder="<?php echo app('translator')->get('Work Place'); ?>" class="form-control">
        </div>

        <div class="col-md-12 mb-4">
            <input required type="text" name="country" id="country" placeholder="<?php echo app('translator')->get('Country'); ?>" class="form-control">
        </div>

        <div class="col-md-12 mb-4">
            <input required type="text" name="job_title" id="job_title" placeholder="<?php echo app('translator')->get('Job Title'); ?>" class="form-control">
        </div>

        <div class="col-md-12 mb-4">
            <textarea required name="write_problem" id="write_problem" placeholder="<?php echo app('translator')->get('Write Problem'); ?>" class="form-control"></textarea>
        </div>

        <div class="col-12">
            <input class="btn primary-btn" type="submit" value="<?php echo app('translator')->get('Send Message'); ?>">
        </div>
    </div>
</form>
<?php /**PATH D:\projects\hrincu_v2\resources\views/web/includes/contact_registration_form.blade.php ENDPATH**/ ?>