@php
    $headerContent = getContent('header.content', true);
    $headerElements = getContent('header.element', false, null, true);
@endphp

@push('style-lib')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
@endpush

@push('style')
<style>
    .hero-image{
        position: relative;
        height:  220px !important;
    }
    .hero-image img{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height:  220px !important;
        object-fit: cover;
    }


</style>
@endpush

<section class="py-3 py-lg-5 header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <!-- Hero Content Slider -->
                <div class="hero-content mt-5 mt-lg-5">
                    @foreach ($headerElements as $headerElement)
                        <div class="hero-slide">
                            <h1>{{ $headerElement?->lang('title') }}</h1>
                        </div>
                    @endforeach
                </div>
                <!-- Hero Content Slider End -->

                <div class="my-1 my-lg-5">
                    <a href="{{ url(@$headerContent?->data_values?->job_search_url) }}" class="btn primary-btn"><i class="fa fa-search"></i>@lang('Find Job')</a>
                    <a href="#" class="btn btn-outline-secondary watch-btn" data-bs-toggle="modal" data-bs-target="#watchVideoModal">
                        <i class="fa fa-play-circle" aria-hidden="true"></i> @lang('Watch')
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-5 d-none d-md-block">
                <div class="hero-image">
                    <img class="image-fluid" src="{{ getImage('assets/images/frontend/header/' . @$headerContent?->data_values?->image) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="watchVideoModal" tabindex="-1" aria-labelledby="watchVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="watchVideoModalLabel">@lang('Watch Video')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="videoFrame" src="" title="Video" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->

@push('script-lib')
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
@endpush

@push('script')
<script>
    $(document).ready(function(){
        $('.hero-content').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-arrow slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow: '<button class="slick-arrow slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
           @if (session()->get('lang') == 'ar')
            rtl: true,
           @endif
        });
    });

    (function ($) {
        "use strict";

        $('.watch-btn').on('click', function () {
            let videoUrl = "{{ @$headerContent?->data_values?->video_url }}";

            if (videoUrl.includes("watch?v=")) {
                videoUrl = videoUrl.replace("watch?v=", "embed/");
            }

            $('#videoFrame').attr('src', videoUrl);

            $('#videoFrame').attr('src', videoUrl);
        });

        $('#watchVideoModal').on('hidden.bs.modal', function () {
            $('#videoFrame').attr('src', '');
        });

        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    })(jQuery);
</script>
@endpush
