<script>
$(document).ready(function() {
    $('.navigation').on('change', function() {
        var type = $(this).data('type');
        var url = "<?php echo e(route('user.register')); ?>" + "?type=" + type;
        window.location.href = url;
    });
});
</script>

<script>
    $(document).ready(function() {
        $('.checkUser').on('focusout', function(e) {
            var url = "<?php echo e(route('user.checkUser')); ?>";
            var value = $(this).val();
            var token = '<?php echo e(csrf_token()); ?>';
            var fieldType = $(this).attr('name');
            var data = {
                _token: token
            };
            data[fieldType] = value;

            $.post(url, data, function(response) {
                if (response.data) {
                    $(`.${response.type}Exist`).text(`${response.type} already exists`);
                } else {
                    $(`.${response.type}Exist`).text('');
                }
            });
        });

        $('input[name="date_of_birth"]').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            endDate: '-18y'
        });
    });
</script>


<?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/js.blade.php ENDPATH**/ ?>