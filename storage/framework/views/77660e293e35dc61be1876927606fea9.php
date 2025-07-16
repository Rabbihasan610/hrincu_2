<script>
$(document).ready(function() {
    $('input[type="radio"]').on('change', function() {
        var type = $(this).data('type');
        var url = "<?php echo e(route('user.register')); ?>" + "?type=" + type;
        window.location.href = url;
    });
});
</script>

<script>
    "use strict";
    (function($) {
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

        $('#registrationFormJobSeeker').validate({
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true
                },
                mobile: 'required',
                date_of_birth: 'required',
                gender: 'required',
                id_number: 'required',
                city_region: 'required',
                marital_status: 'required',
                academic_qualification: 'required',
                field_of_study: 'required',
                english_proficiency: 'required',
                key_skills: 'required',
                years_of_experience: {
                    required: true,
                    digits: true
                },
                preferred_sectors: 'required',
                preferred_job_type: 'required',
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                name: "<?php echo e(__('Please enter your full name')); ?>",
                email: {
                    required: "<?php echo e(__('Please enter your email address')); ?>",
                    email: "<?php echo e(__('Please enter a valid email address')); ?>"
                },
                mobile: "<?php echo e(__('Please enter your mobile number')); ?>",
                date_of_birth: "<?php echo e(__('Please enter your date of birth')); ?>",
                gender: "<?php echo e(__('Please select your gender')); ?>",
                id_number: "<?php echo e(__('Please enter your ID/Iqama number')); ?>",
                city_region: "<?php echo e(__('Please select your city/region')); ?>",
                marital_status: "<?php echo e(__('Please select your marital status')); ?>",
                academic_qualification: "<?php echo e(__('Please enter your academic qualification')); ?>",
                field_of_study: "<?php echo e(__('Please enter your field of study')); ?>",
                english_proficiency: "<?php echo e(__('Please select your English proficiency')); ?>",
                key_skills: "<?php echo e(__('Please enter your key skills')); ?>",
                years_of_experience: {
                    required: "<?php echo e(__('Please enter years of experience')); ?>",
                    digits: "<?php echo e(__('Please enter a valid number')); ?>"
                },
                preferred_sectors: "<?php echo e(__('Please select preferred sectors')); ?>",
                preferred_job_type: "<?php echo e(__('Please select preferred job type')); ?>",
                password: {
                    required: "<?php echo e(__('Please enter a password')); ?>",
                    minlength: "<?php echo e(__('Password must be at least 8 characters long')); ?>"
                },
                password_confirmation: {
                    required: "<?php echo e(__('Please confirm your password')); ?>",
                    equalTo: "<?php echo e(__('Passwords do not match')); ?>"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('text-red-500 text-sm');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('border-red-500').removeClass('border-gray-300');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('border-red-500').addClass('border-gray-300');
            },
            submitHandler: function(form) {
                var formData = new FormData(form);

                $.ajax({
                    url: "<?php echo e(route('user.register')); ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $('#submitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = response.redirect;
                        }
                    },
                    error: function(xhr) {
                        $('#submitBtn').prop('disabled', false).html('Submit Register');
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else {
                            toastr.error('An error occurred. Please try again.');
                        }
                    }
                });
            }
        });

        $('input[name="date_of_birth"]').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            endDate: '-18y'
        });
    })(jQuery);
</script>
<?php /**PATH D:\projects\hrincu_v2\resources\views/user/auth/js.blade.php ENDPATH**/ ?>