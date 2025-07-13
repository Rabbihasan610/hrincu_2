@extends('web.layouts.frontend', ['title' => 'Privacy Policy'])

@section('content')

@include('sections.page_banner', ['title' => 'Privacy Policy'])

<!-----------  Check Privacy section Start ------------>

@php
    $privacy = getContent('privacy_policy.content', true);
@endphp

<section class="py-5">
    <div class="container">
          <div class="row py-5">
                <div class="col-12 col-md-6">
                      <div class="check-privacy py-5">
                            <h3>{{ $privacy?->lang('title') }}</h3>
                            <p>
                                {!! $privacy?->lang('description') !!}
                            </p>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                      <div class="check-privacy-img">
                            <img src="{{ getImage('assets/images/frontend/privacy_policy/' . $privacy?->data_values?->image) }}" alt="">
                      </div>
                </div>
          </div>
    </div>
</section>
<!-----------  Check Privacy  section end ------------------>



<!-----------  Interpretation  section Start ------------------>
@php
    $interpretation_and_definition = getContent('interpretation_and_definition.content', true);
    $interpretation_and_definition_elements = getContent('interpretation_and_definition.element', false, null, true);

    $contexts = getContent('context.element', false, null, true);
    $context_of_personal_datas = getContent('context_of_personal_data.element', false, null, true);
@endphp


<section class="py-5">
    <div class="container">
          <div class="row py-5">
                <div class="col-12 col-md-8">
                      <div class="interpretation-head" id="interpretation">
                            <h3>{{ $interpretation_and_definition?->lang('name') }}</h3>
                            <p>{{ $interpretation_and_definition?->lang('description') }}</p>
                            <h5>{{ $interpretation_and_definition?->lang('title') }}</h5>
                      </div>

                      <div class="interpretation" id="interpretation_and_definition">
                            <h6>{{ $interpretation_and_definition?->lang('short_description') }}:</h6>
                            @foreach ($interpretation_and_definition_elements as $element)
                            <p>
                                <span><i class="fa-regular fa-square-check"></i></span>
                                {{ $element?->lang('title') }}
                            </p>
                            @endforeach
                      </div>
                </div>
                <div class="col-12 col-md-4">
                      <div class="context-head">
                            <h3>@lang('Context')</h3>

                      </div>
                      <div class="context-body pt-4">
                            <ul>
                                @foreach ($contexts as $context)
                                <li><a href="#interpretation" class="text-decoration-none pointer-events-none">{{ $context?->lang('title') }}</a></li>
                                @endforeach
                            </ul>

                            <ul class="link2 px-3">
                                @foreach ($context_of_personal_datas as $data)
                                  <li><a href="#interpretation_and_definition" class="text-decoration-none pointer-events-none"><i class="fa-solid fa-check"></i> {{ $data?->lang('title') }}</a></li>
                                @endforeach
                            </ul>
                      </div>
                </div>
          </div>
    </div>
</section>
@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
