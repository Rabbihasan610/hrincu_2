@php
    $WhoweServeContent = getContent('whowe_serve.content', true);
    $WhoweServeElements = getContent('whowe_serve.element', false, null, true);
@endphp

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- Left Image -->
            <div class="col-12 col-lg-6">
                <div class="position-relative">
                    <img src="{{ getImage('assets/images/frontend/whowe_serve/' . @$WhoweServeContent?->data_values?->image, '700x400') }}"
                        class="img-fluid rounded-3 shadow-sm" alt="{{ @$WhoweServeContent?->lang('title') }}">
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-12 col-lg-6">
                <div class="brand_registration">
                    <div>
                        <h2 class="fw-bold text-primary mb-3" style="font-size: 2rem">
                            {{ @$WhoweServeContent?->lang('title') }}
                        </h2>
                    </div>

                    <div>
                        <p class="lead text-muted mb-4">
                            {{ @$WhoweServeContent?->lang('sub_title') }}
                        </p>
                    </div>

                    <div>
                        <ul class="list-unstyled mb-4">
                            @foreach ($WhoweServeElements as $WhoweServeElement)
                                <li class="d-flex align-items-start mb-2">
                                    <i class="fa-solid fa-circle-check text-success me-2 mt-1"></i>
                                    <span>{{ @$WhoweServeElement?->lang('title') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <p class="text-dark">
                            {{ @$WhoweServeContent?->lang('bottom') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
