@php
    $ValuesSectionContent = getContent('values_section.content', true);
    $ValuesSectionElemets = getContent('values_section.element', false, null, true);
@endphp

<section class="py-5" style="background:#f9f9fb;">
    <div class="container text-center">

        <!-- Icon -->
        <div class="mb-3 mx-auto" style="max-width: 120px;">
            <img src="{{ getImage('assets/images/frontend/values_section/' . @$ValuesSectionContent?->data_values?->image, '105x120') }}"
                alt="Human Resources Image" class="img-fluid mx-auto d-block mb-3">
        </div>

        <!-- Title with purple background -->
        <div class="mb-3">
            <span class="section-title">{{ @$ValuesSectionContent?->lang('title') }}</span>
        </div>

        <!-- Divider with dot -->
        <div class="divider-container">
            <div class="divider-line"></div>
            <div class="divider-dot"></div>
        </div>

        <!-- Cards -->
        <div class="row mt-5 g-4 justify-content-center">
            @foreach ($ValuesSectionElemets as $ValuesSectionElemet)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="value-card p-3 h-100">
                        <h5 class="fw-bold pb-2">{{ @$ValuesSectionElemet?->lang('title') }}</h5>
                        <p class="text-muted mb-0">{{ @$ValuesSectionElemet?->lang('subtitle') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<style>
    /* Purple label like screenshot */
    .section-title {
        background: #6a1b9a;
        color: #fff;
        font-weight: 600;
        padding: 12px 25px;
        border-radius: 4px;
        font-size: 1.1rem;
        display: inline-block;
    }

    /* Divider line + dot */
    .divider-container {
        position: relative;
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        margin-top: 10px;
    }
    .divider-line {
        height: 1px;
        background: #ccc;
    }
    .divider-dot {
        position: absolute;
        bottom: -6px;
        left: 50%;
        transform: translateX(-50%);
        width: 12px;
        height: 12px;
        background: #6a1b9a;
        border-radius: 50%;
    }

    /* Cards */
    .value-card {
        background: #fff;
        border-radius: 8px;
        border: 1px solid #eee;
        transition: 0.3s ease;
    }
    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    }
    .value-card h5 {
        font-weight: 700;
        font-size: 1rem;
    }
    .value-card p {
        font-size: 0.9rem;
        margin-top: 5px;
        line-height: 1.4;
    }

    /* Better spacing for small screens */
    @media (max-width: 576px) {
        .section-title {
            font-size: 1rem;
            padding: 8px 15px;
        }
        .value-card {
            text-align: center;
        }
    }
</style>
