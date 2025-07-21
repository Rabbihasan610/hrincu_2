@php
    $KeyInitiativesContent = getContent('key_initiatives.content', true);
    $KeyInitiativesElements = getContent('key_initiatives.element', false, null, true);
@endphp



<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- Content Section -->
            <div class="col-12 col-md-6 mb-4">
                <div class="partnership-top mb-4">
                    <h2>{{ @$KeyInitiativesContent?->lang('title') }}</h2>
                    <div class="divider"></div>
                </div>
                <div class="row">
                    @php
                        $bgColors = [
                            '#EAF2FF', // Light blue
                            '#F3E8FF', // Light purple
                            '#FFF5E5', // Light orange
                            '#E9FCE9', // Light green
                            '#FFE9EC', // Light pink
                        ];
                        $i = 0;
                    @endphp

                    @foreach ($KeyInitiativesElements as $KeyInitiativesElement)
                        <div class="col-12 col-md-6 mb-4">
                            <div class="partnership-card" style="background: {{ $bgColors[$i % count($bgColors)] }};">
                                <h5>{{ @$KeyInitiativesElement?->lang('title') }}</h5>
                                <p>{{ @$KeyInitiativesElement?->lang('subtitle') }}</p>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-12 col-md-6 mb-4">
                <div class="partnership-img text-center">
                    <img src="{{ getImage('assets/images/frontend/key_initiatives/' . @$KeyInitiativesContent?->data_values?->image, '700x548') }}"
                        class="img-fluid " alt="{{ @$KeyInitiativesContent?->lang('title') }}">
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* Section Title */
    .partnership-top h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1A2B4C;
        margin-bottom: 10px;
    }

    .partnership-top .divider {
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #5D5A88, #4A90E2);
        border-radius: 2px;
        margin: 10px 0 20px;
    }

    /* Card Style */
    .partnership-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 12px;
        padding: 20px;
        transition: all 0.3s ease;
        height: 100%;
    }

    .partnership-card h5 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .partnership-card p {
        color: #444;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Hover Effect */
    .partnership-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(74, 144, 226, 0.15);
    }

    /* Image Hover */
    .partnership-img img {
        border-radius: 15px;
        transition: transform 0.4s ease;
    }

    .partnership-img img:hover {
        transform: scale(1.03);
    }
</style>
