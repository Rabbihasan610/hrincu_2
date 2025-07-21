@php
    $MissionVisionElemets = getContent('mission_vision.element', false, null, true);
@endphp


<section class="py-5 mission_bg">
    <div class="container">
        <div class="row py-3 py-md-5 justify-content-center">
            @foreach ($MissionVisionElemets as $MissionVisionElemet)
                <div class="col-12 col-md-4 mb-3">
                    <div class="card mission_card h-100 py-3">
                        <img class="mv-img m-auto"
                            src="{{ getImage('assets/images/frontend/mission_vision/' . @$MissionVisionElemet?->data_values?->image, '120x120') }}"
                            class="img-fluid m-3" alt="{{ @$MissionVisionElemet?->lang('title') }}">
                        <div class="card-body text-center">
                            <div class="py-3">
                                <h5 class="text-center card-titlem my-3">{{ @$MissionVisionElemet?->lang('heading') }}
                                </h5>
                            </div>
                            <div class="flex">
                                <div class="relative pb-4 line-before"></div>
                                <div class="relative pb-4 dot"></div>
                                <div class="relative pb-4 line-after"></div>
                            </div>
                            <p class="card-text">{{ @$MissionVisionElemet?->lang('title') }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>

      
    .mission_card {
        border-radius: 12px;
    }

    .mv-img {
        height: 120px;
        width: 120px;
    }

    .card-titlem {
        color: #ffffff;
        background: #2F0052;
        display: inline;
        padding: 15px;
        font-size: 1.25rem;
        font-weight: 600;
    }

    p.card-text {

        padding-top: 15px;
    }
</style>
