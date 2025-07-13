@extends('web.layouts.frontend', ['title' => 'Jobincu Service'])

@section('content')

    @include('sections.page_banner', ['title' => 'Jobincu Service'])


    <!---------- Cv marketing section start --------------->
    @php
        $cvMarketingContent = getContent('cv_marketing.content', true);
        $cvMarketingElements = getContent('cv_marketing.element', false, null, true);
    @endphp
    <section class="py-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6">
                    <div class="training-img">
                        <img style="height: 300px !important; width: 400px;" src="{{ getImage('assets/images/frontend/cv_marketing/' . $cvMarketingContent?->data_values?->image) }}"
                            alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="cv-text">
                        <h2>{{ $cvMarketingContent?->lang('title') }}</h2>
                        @foreach ($cvMarketingElements as $element)
                            <p class="{{ $loop->index == 1 ? 'active' : '' }}">{{ $element?->lang('title') }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------- Cv marketing  section End --------------->
    <!---------- Training section start --------------->
    @php
        $trainingContent = getContent('jobincu_rehabilitation_training.content', true);
    @endphp
    <section class="py-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6">
                    <div class="tarining p-2">
                        <h2>{{ $trainingContent?->lang('title') }}</h2>
                        <p>{{ $trainingContent?->lang('description') }}</p>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="traing-img">
                        <img style="height: 300px !important; width: 400px;" src="{{ getImage('assets/images/frontend/jobincu_rehabilitation_training/' . $trainingContent?->data_values?->image) }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------- Training  section End --------------->
    <!---------- Pre-contract  section start --------------->
    @php
        $preContractContent = getContent('pre_contract_qualification.content', true);
        $preContractElements = getContent('pre_contract_qualification.element', false, null, true);

        $trainingAfterRecruitmentContent = getContent('training_after_recruitment.content', true);
        $trainingAfterRecruitmentElements = getContent('training_after_recruitment.element', false, null, true);
    @endphp

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="Pre-contract">
                        <h5>{{ $preContractContent?->lang('title') }}</h5>
                        @foreach ($preContractElements as $element)
                            <p><span><i class="fa-regular fa-square-check"></i></span>{{ $element?->lang('title') }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="Pre-contract">
                        <h5>{{ $trainingAfterRecruitmentContent?->lang('title') }}</h5>
                        @foreach ($trainingAfterRecruitmentElements as $element)
                            <p><span><i class="fa-regular fa-square-check"></i></span>{{ $element?->lang('title') }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!---------- Training  section End --------------->


    <!---------- Awareness  section start --------------->
    @php
        $awarenessContent = getContent('awareness.content', true);
        $awarenessElements = getContent('awareness.element', false, null, true);

        $eventsContent = getContent('events.content', true);
        $eventsElements = getContent('events.element', false, null, true);
    @endphp

    <section class="awareness-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center py-5 fw-600">{{ $awarenessContent?->lang('title') }} & {{ $eventsContent?->lang('title') }}</h1>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="awareness">
                            <h5>{{ $awarenessContent?->lang('title') }}</h5>
                            @foreach ($awarenessElements as $element)
                                <p><span><i class="fa-regular fa-square-check"></i></span>{{ $element?->lang('title') }}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="awareness">
                            <h5>{{ $eventsContent?->lang('title') }}</h5>
                            @foreach ($eventsElements as $element)
                                <p><span><i class="fa-regular fa-square-check"></i></span>{{ $element?->lang('title') }}
                                </p>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------- Training  section End --------------->

    <!---------- Technical  section start --------------->

    @php
        $labsincuContent = getContent('labsincu.content', true);
        $labsincuElements = getContent('labsincu.element', false, null, true);
    @endphp

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="technical">
                        <h1 class="text-center py-5">{{ $labsincuContent?->lang('title') }}</h1>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($labsincuElements as $element)
                            <div class="col-12 col-md-3 my-3">
                                <div class="technical-body w-100 h-100 shadow">
                                    <p>{{ $element?->lang('title') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!---------- Technical  section End --------------->
    <!---------- Authentication Documents  section start --------------->

    @php
        $authenticationOfDocumentsContent = getContent('authentication_of_documents.content', true);
        $authenticationOfDocumentsElements = getContent('authentication_of_documents.element', false, null, true);
    @endphp

    <section class="py-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <div class="authentication">
                        <h2 class="text-center py-5">{{ $authenticationOfDocumentsContent?->lang('title') }}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($authenticationOfDocumentsElements as $element)
                        <div class="col-12 col-md-6">
                            <div class="authentication-body">
                                <p><span><i class="fa-regular fa-square-check"></i></span> {{ $element?->lang('title') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!---------- Authentication Documents   section End --------------->

    <!---------- Wighting cv  section Start --------------->

    @php
        $writingCvsContent = getContent('writing_cvs.content', true);
        $writingCvsElements = getContent('writing_cvs.element', false, null, true);

        $writingCvsDocumentsContent = getContent('writing_cvs_documents.content', true);
        $writingCvsDocumentsElements = getContent('writing_cvs_documents.element', false, null, true);
    @endphp

    <section class="wrighting-cv-section">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <div class="wrighting-cv">
                        <h2 class="text-center">{{ $writingCvsContent?->lang('title') }}</h2>
                        <p class="text-center">{{ $writingCvsContent?->lang('description') }}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($writingCvsElements as $element)
                        <div class="col-12 col-md-6">
                            <div class="wrighting-cv-body">
                                <p><span><i class="fa-regular fa-square-check"></i></span> {{ $element?->lang('title') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row py-5">
                    <div class="col-12">
                        <div class="wrighting-head2">
                            <h6>{{ $writingCvsDocumentsContent?->lang('description') }}</h6>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach ($writingCvsDocumentsElements as $element)
                        <div class="col-12 col-md-6">
                            <div class="wrighting-cv-body2">
                                <p><span><i class="fa-regular fa-square-check"></i></span>{{ $element?->lang('title') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!----------Wighting cv   section End --------------->


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection
