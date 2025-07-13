@php
    $elements = getContent('banner.element', false, null, true);
@endphp

<section class="my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-slider">
                    @foreach($elements as $element)
                        <div>
                            <a href="#">
                                @if (session()->get('lang') == 'ar')
                                    <img src="{{ asset(getImage('assets/images/frontend/banner/' . @$element->data_values->arabic_image, '1920x350')) }}" class="d-block w-100" alt="">
                                @else
                                    <img src="{{ asset(getImage('assets/images/frontend/banner/' . @$element->data_values->image, '1920x350')) }}" class="d-block w-100" alt="">
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Slick CSS and JS -->
@push('style-lib')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
@endpush

@push('style')
<style>
.banner-slider img{
    width: 100%;
    height: 350px !important;
}


@media only screen and (max-width: 600px) {
    .banner-slider img{
        height: 200px !important;
    }
}
</style>
@endpush


@push('script-lib')
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
@endpush
@push('script')
<script>
    $(document).ready(function(){
        $('.banner-slider').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
            nextArrow: '<button type="button" class="slick-next">&#10095;</button>'
            @if (session()->get('lang') == 'ar')
            ,rtl: true,
            @endif
        });
    });
</script>

@endpush
