<div class="job-slider">
    @foreach ($related_jobs as $job)
    <div class="job-card d-flex justify-content-start">
        <img src="{{ asset('assets/images/job.png') }}" alt="Company Logo">
        <div class="job-slide-deatls">
            <h3>{{ $job->title }}</h3>
            <p>Kim Heng Offshore & Marine Holdings Limited</p>
            <div class="job-location">
                <span>📍 {{ $job->location }}</span> • <span>🕒 {{ $job->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@push('style-lib')
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
@endpush


@push('style')
    <style>
        .job-slider {
            width: 100%;
            margin: auto;
        }

        .job-card {
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            border: 1px solid #ccc;
        }

        .job-card img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .job-slide-deatls{
            margin-left: 20px;
        }

        .job-card h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .job-card p {
            font-size: 12px;
            color: #666;
        }

        .job-location {
            font-size: 12px;
            color: #777;
        }

        .job-location span {
            margin-right: 10px;
        }

    </style>
@endpush


@push('script-lib')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('.job-slider').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                arrows: true,
                dots: false,
                prevArrow: '<button type="button" class="slick-prev">‹</button>',
                nextArrow: '<button type="button" class="slick-next">›</button>',
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        });
    </script>
@endpush
