@extends('web.layouts.frontend', ['title' => 'Sectors'])

@section('content')

@include('sections.page_banner', ['title' => 'Sectors'])

 <!----------- Sector card  section Start --------------->
 <section class="py-5">
    <div class="container mt-4">
        <div class="row row-cols-2 row-cols-md-3 g-4">
            @foreach ($datas as $data)
                <div class="col" dir="{{ session('lang') == 'ar' ? 'rtl' : 'ltr' }}">
                    <div class="card sector shadow h-100 border-0">
                        <img src="{{ getImage(getFilePath('sector') . '/' . $data->image) }}"
                            class="card-img-top p-2"
                            alt="@lang('Image')">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" @if (session('lang') == 'ar') style="text-align: right !important;" @endif >{{ $data?->lang('title') }}</h5>
                            <p class="flex-grow-1" @if (session('lang') == 'ar') style="text-align: right !important;" @endif>{{ $data?->lang('description') }}</p>
                        </div>

                        <div class="mb-3 d-flex {{ session('lang') == 'ar' ? 'justify-content-end' : 'justify-content-start' }}">
                            <a href="{{ route('sector.request', ['slug' => $data->id]) }}"
                            class="btn primary-btn btn-request">
                                @lang('Request Service')
                                <i class="fa-solid fa-arrow-{{ session('lang') == 'ar' ? 'left' : 'right' }}"></i>
                            </a>
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
                                <i class="fa-solid fa-angle-left"></i> @lang('Previous')
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
                                @lang('Next') <i class="fa-solid fa-angle-right"></i>
                            </button>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!----------- Sector card section End --------------->
@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
