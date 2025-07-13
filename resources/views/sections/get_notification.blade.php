    @php
        $getNotificationContent = getContent('get_notification.content', true);
    @endphp

    <!----------- Get Notificaton section End --------------->

    <section class="get-notification-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="get-notification">
                        <h2><?php echo e(__(@$getNotificationContent?->lang('title'))); ?></h2>
                        <p><?php echo __(@$getNotificationContent?->lang('description')); ?></p>
                        <form action="{{route('subscribe')}}" method="POST">
                            @csrf
                            <input class="get-form-control" type="email" name="email" placeholder="@lang('Enter your email')">
                            <button type="submit" class="btn primary-btn get-btn">@lang('Subscribe')</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----------- Get Notificaton  section End --------------->
