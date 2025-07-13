@php
    $featureElements = getContent('feature.element', false, null, true);
@endphp

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<style>
    .swiper {
        width: 100%;
        height: 100%;
        border-radius: 20px;
    }

    .wiper-wrapper {
        border-radius: 20px;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        border-radius: 6px;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    @media only screen and (max-width: 768px) {
        .home-icon {
            padding: 0px !important;
            margin: 0px !important;
        }

        .home-icon .card-body {
            padding: 5px !important;
            margin: 0px !important;
        }

        .home-icon .card-body img {
            max-width: 50px !important;
        }

        .home-icon h5 {
            font-size: 12px !important;
        }
    }
</style>
@endpush

<section class="py-5 home-icon-section">
    <div class="container">
        {{-- <div class="swiper mySwiper d-md-none">
            <div class="swiper-wrapper">
                @foreach ($featureElements as $featureElement)
                    <div class="swiper-slide">
                        <div class="home-icon card text-center shadow-lg p-4 bg-white rounded-3 h-100 border-0"
                            style="background: {{ $featureElement?->data_values?->color }};">
                            <div class="card-body">
                                <a href="{{ $featureElement?->data_values?->link }}" class="text-decoration-none">
                                    <img class="img-fluid mb-3"
                                        src="{{ getImage('assets/images/frontend/feature/' . $featureElement?->data_values?->image) }}"
                                        alt="{{ $featureElement?->lang('title') }}"
                                        style="max-width: 100px;">
                                    <h5 class="fw-bold">{{ $featureElement?->lang('title') }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}

        <!-- Normal Grid for Larger Screens -->
        <div class="row justify-content-center d-md-flex">
            @foreach ($featureElements as $featureElement)
                <div class="col-4 col-md-3 my-3">
                    <div class="card home-icon  text-center shadow-lg p-1 p-md-4 bg-white rounded-3 h-100 border-0"
                        style="background: {{ $featureElement?->data_values?->color }};">
                        <div class="card-body">
                            <a href="{{ $featureElement?->data_values?->link }}" class="text-decoration-none">
                                <img class="img-fluid mb-3"
                                    src="{{ getImage('assets/images/frontend/feature/' . $featureElement?->data_values?->image) }}"
                                    alt="{{ $featureElement?->lang('title') }}"
                                    style="max-width: 100px;">
                                <h5 class="fw-bold">{{ $featureElement?->lang('title') }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});
</script>

@endpush
