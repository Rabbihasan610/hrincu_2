@php
    $OurObjectivesElemets = getContent('our_objectives.element', false, null, true);
@endphp

<section class="py-5">
    <div class="container">
        <!-- Section Heading -->
        <div class="row">
            <div class="col-12 text-center">
                <div class="objectives-head">
                    <h2 class="fw-bold mb-5">@lang('Our Objectives')</h2>
                    {{-- <p class="text-muted">We aim to create sustainable impact through training & development</p> --}}
                </div>
            </div>
        </div>

        <!-- Objectives Cards -->
        <div class="row justify-content-center g-4">
            @foreach ($OurObjectivesElemets as $OurObjectivesElemet)
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="objectives">
                        <div class="objectives-content">
                            <p>{{ @$OurObjectivesElemet?->lang('title') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<style>
    /* Section Heading */
    .objectives-head h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #333;
    }

    .objectives-head p {
        font-size: 1rem;
        color: #777;
        max-width: 600px;
        margin: 0 auto 40px;
    }

    /* Objective Cards */
    .objectives-content {
        background: #F9F9FF;
        padding: 20px;
        border: 1px solid #E5E7EB;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        text-align: center;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .objectives-content p {
        font-size: 15px;
        color: #444;
        margin: 0;
        line-height: 1.5;
    }

    /* Smooth Hover */
    .objectives-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border-color: #5D5A88;
    }

    /* Spacing */
    .row.g-4>[class*='col'] {
        display: flex;
    }
</style>
