<!-- Modal -->
<div id="isShowModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header text-white">
                <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" class="img-fluid rounded shadow-sm mb-3 modal-image" style="max-height: 250px; display: none;">
                <p class="fw-bold question"></p>
                <ul class="list-group dynamic-data"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('style'); ?>
<style>
    .modal-title{
        font-size: 20px;
        color: #000;
    }
    .modal-image{
        max-height: 250px;
    }

    .list-group-item{
        align-items: left !important;
        text-align: left !important;
    }

    .text-title{
        color: #000;
        font-weight: bold;
        font-size: 16px;
        text-align: left !important;
        text-transform: capitalize;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    (function ($) {
        "use strict";
        $(document).on('click', '.isShow', function () {
            var modal = $('#isShowModal');
            let data = $(this).data();

            modal.find('.question').text(data.question || '<?php echo app('translator')->get("Details"); ?>');

            modal.find('.dynamic-data').empty();

            if (data.image) {
                modal.find('.modal-image').attr('src', data.image).show();
            } else {
                modal.find('.modal-image').hide();
            }

            $.each(data, function (key, value) {
                if (key !== 'question' && key !== 'image') {
                    modal.find('.dynamic-data').append(`
                        <li class="list-group-item">
                            <div class="fw-bold text-title">${key.replace(/_/g, ' ')}:</div>
                            <div>${value}</div>
                        </li>
                    `);
                }
            });

            modal.modal('show');
        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\projects\hrincu_v2\resources\views/components/show.blade.php ENDPATH**/ ?>