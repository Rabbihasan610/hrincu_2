@php
    $contactForm = getContent('contact_us.content', true);
    $socialMediaElements = getContent('social_media.element', null, false, true);
@endphp

<div class="contact-info-map px-4">
    <div class="row">
        <div class="col-12">
            <div class="contact-info-title-left">
                <h2>
                    @lang('Location')
                </h2>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="contact-info-map">
               <iframe src="{{ $contactForm?->data_values?->map_url ?? '' }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>


@push('style')
    <style>
        .contact-info-map {
            border-radius: 5px;
        }

        .contact-info-title-left {
            text-align: left;
            margin-bottom: 15px;
        }
    </style>
@endpush
