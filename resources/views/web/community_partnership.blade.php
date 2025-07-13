@extends('web.layouts.frontend', ['title' => 'Community Partnership'])

@section('content')
    @include('sections.page_banner', ['title' => 'Community Partnership'])


    <!-----------  Community Partnership section start ------------------>
    <section class="py-5">
        <div class="container">

            <div class="row">
                @foreach ($datas as $data)
                <div class="col-12 col-md-4">
                    <div class="pb-5 h-100">
                        <div class="partnership-card-section h-100">
                            <div class="partnership-card d-flex justify-content-start">
                                <img class="img-fluid" src="{{ getImage(getFilePath('service') . '/' . $data->image) }}" alt="{{ $data?->lang('title') }}">
                                <h4 @if (session('lang') == 'ar') style="text-align: right !important;" @endif>{{ $data?->lang('title') }}</h4>
                            </div>
                            <div class="partnership-card-body" @if (session('lang') == 'ar') style="padding-right: 10px !important;" @endif>
                                <p @if (session('lang') == 'ar') style="text-align: right !important;" @endif>{{ $data?->lang('description') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="page-button d-flex py-3 justify-content-center align-items-center">
                        @if ($datas->previousPageUrl())
                            <a href="{{ $datas->previousPageUrl() }}">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-angle-left"></i> Previous
                                </button>
                            </a>
                        @endif

                        <div class="page-number mx-3">
                            @foreach(range(1, $datas->lastPage()) as $page)
                                <a href="{{ $datas->url($page) }}"
                                   class="{{ $datas->currentPage() == $page ? 'fw-bold btn btn-primary' : '' }}">
                                    {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                </a>
                            @endforeach
                        </div>

                        @if ($datas->nextPageUrl())
                            <a href="{{ $datas->nextPageUrl() }}">
                                <button class="btn btn-primary">
                                    Next <i class="fa-solid fa-angle-right"></i>
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-----------  Community Partnership section end ------------------>

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection
