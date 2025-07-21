@php
    $PartnershipsAccreditationsContent = getContent('partnerships_accreditations.content', true);
    $PartnershipsAccreditationsElements = getContent('partnerships_accreditations.element', false, null, true);
@endphp

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Heading -->
                <div class="partners-head mb-4">
                    <h2 class="fw-bold mb-3">{{ @$PartnershipsAccreditationsContent?->lang('title') }}</h2>
                    <p class="text-muted">
                        {{ @$PartnershipsAccreditationsContent?->lang('subtitle') }}
                    </p>
                </div>

                <!-- Partnership list -->
                <div class="partners-content">
                    @foreach ($PartnershipsAccreditationsElements as $PartnershipsAccreditationsElement)
                        <p class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-circle-check text-success me-2 fs-5"></i>
                            <span> {{ @$PartnershipsAccreditationsElement?->lang('title') }}</span>
                        </p>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

    <style>
        .partners-head h2 {
            font-size: 1.4rem;
            line-height: 1.3;
        }

        .partners-head p {
            max-width: 800px;
        }

        .partners-content p {
            font-size: 1.05rem;
            color: #333;
            transition: color 0.3s ease;
        }

        .partners-content p:hover {
            color: #198754;
            /* Bootstrap success color */
        }
    </style>

