@extends('web.layouts.frontend', ['title' => 'Qualification & Empowerment'])

@section('content')

    @include('sections.page_banner', ['title' => 'Qualification & Empowerment'])

    <!-----------  Qualification section Start ------------------>
    @php
        $qualification_content = getContent('qualification_for_empowerment.content', true);
        $qualification_elements = getContent('qualification_for_empowerment.element', false, null, true);
    @endphp

    <section class="py-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6">
                    <div class="qualification-img">
                        <img src="{{ getImage('assets/images/frontend/qualification_for_empowerment/' . $qualification_content?->data_values?->image) }}"
                            alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="qualification-text">
                        <p @if (session('lang') == 'ar') style="text-align: right !important;" @endif>{!! $qualification_content?->lang('description') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-----------  Qualification  section end ------------------>
    <!-----------  Qualification card section Start ------------------>

    <section>
        <div class="container">
            <div class="row align-items-stretch">
                @foreach ($qualification_elements as $element)
                    <div class="col-12 col-md-3">
                        <div class="pb-3">
                            <div class="qualification-body  flex-grow: 1 shadow d-flex">
                                <p @if (session('lang') == 'ar') style="text-align: right !important;" @endif>
                                    <span><i class="fa-regular fa-square-check"></i></span>
                                </p>
                                <p @if (session('lang') == 'ar') style="text-align: right !important;" @else style="text-align: left;" @endif>
                                    {{ $element?->lang('title') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-----------  Qualification card section end ------------------>


    <!-----------  Target groups  section Start ------------------>
    @php
        $target_group_content = getContent('target_group.content', true);
        $target_group_elements = getContent('target_group.element', false, null, true);
    @endphp
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="target-head">
                        <h1 class="text-center">{{ $target_group_content?->lang('title') }}</h1>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                @foreach ($target_group_elements as $element)
                <div class="col-12 col-md-3 h-100 my-3">
                    <div class="target-card text-center">
                        <img src="{{ getImage('assets/images/frontend/target_group/' . ($element?->data_values?->image ?? '')) }}" alt="" style="width: 50px;">

                        <h5>{{ $element?->lang('title') }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-----------  Target groups  section end ------------------>

    <!-----------  Tringing paths section Start ------------------>

    <section class="py-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-12">
                    <div class="traning-head text-center">
                        <h1>@lang('Training Paths')</h1>
                        <p>@lang('Specialized courses offered in:')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($training_paths as $training_path)
                <div class="col-12 col-md-3 my-2">
                    <div class="pb-2  h-100">
                        <div class="traing-card text-center h-100">
                            <img style="width: 98%; height: 200px; border-radius: 15px;" src="{{ getImage(getFilePath('trainingpath') . '/' . $training_path->image) }}" alt="{{ $training_path?->lang('title') }}">
                            <h5 class="my-3">{{ $training_path?->lang('title') }}</h5>
                            <button class="btn primary-btn"><a href="{{ route('training.request', ['slug' => $training_path->id]) }}" class="text-white text-decoration-none">@lang('Apply Now')</a></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-----------  Taringing paths section end ------------------>

    <!-----------  Acquired skills section Start ------------------>

    @php
        $acquired_skills_content = getContent('acquired_skills.content', true);
        $acquired_skills_elements = getContent('acquired_skills.element', false, null, true);
    @endphp
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="acquired-head text-center">
                        <h1>{{ $acquired_skills_content?->lang('title') }}</h1>
                        <p>{{ $acquired_skills_content?->lang('description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                @foreach ($acquired_skills_elements as $element)
                    <div class="col-12 col-md-3">
                        <div class="pb-3 h-100">
                            <div class="acquired-body w-100 h-100 shadow">
                                <p class="d-flex"> <span><i class="fa-regular fa-square-check me-2"></i></span>{{ $element?->lang('title') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-----------  Acquired skills section end ------------------>

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection
