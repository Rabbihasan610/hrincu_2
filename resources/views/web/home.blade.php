@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('meta_tags')
    @if(app()->getLocale() == 'en')
    <meta name="locale" content="{{ app()->getLocale() }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="en"/>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ gs('site_name') }}" />
    <meta property="og:description" content="{{ gs()->seo_description }}" />
    <meta property="og:keyword" content="{{ gs()->seo_keywords }}" />
    <meta property="og:url" content="{{ url()->current() }}"/>
	<meta property=" og:site_name" content="{{ gs('site_name') }}" />
    <meta property="article:author" content="Muhammad Al Sari" />
    <meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
    <meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
    <meta property="og:image" content="{{ siteLogo() }}" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="853" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="خليل النمازي" />
    @else
    <meta name="locale" content="{{ app()->getLocale() }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="ar" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="تنمية الأملاك" />
    <meta property="og:description" content="{{ gs()->seo_description }}" />
    <meta property="og:keyword" content="{{ gs()->seo_keywords }}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
	<meta property=" og:site_name" content="" />
    <meta property="article:author" content="{{ gs()->seo_description }}"/>
    <meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
    <meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
    <meta property="og:image" content="{{ siteLogo() }}" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="853" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@#" />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="خليل النمازي" />
    @endif
@endsection
@push('script-lib')
@endpush
@section('content')

    @include('sections.hero_section')

    @include('sections.ourservice_request')

    <section class="bg-[#3b0764] py-16 px-4 md:px-8 lg:px-16">
        <div class="max-w-7xl mx-auto text-white">

            <h2 class="text-xl md:text-3xl font-semibold mb-6">
                @lang('Contact Us Now')
            </h2>

            <ul class="text-base md:text-sm space-y-2 mb-8">
                <li>@lang('Looking for qualified candidates?')</li>
                <li>@lang('Need to train your team?')
                <li>@lang('Seeking smart HR solutions?')</li>
                <li>@lang('Start now — well guide you step by step')</li>
            </ul>

            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300 ease-in-out text-center text-sm">
                    @lang('Submit Request')
                </a>
                <a href="#" class="inline-block border-2 border-white hover:bg-white hover:text-[#3b0764] text-white font-medium py-2 px-6 rounded-md transition duration-300 ease-in-out text-center text-sm ms-3">
                    @lang('Contact Us')
                </a>
            </div>
        </div>
    </section>


    @if ($community_partnerships->count() > 0)
        <div class="container mx-auto px-4 py-10 md:py-20">
            @foreach ($community_partnerships as $community_partnership)
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 mb-16 md:mb-20 bg-white p-6 md:p-10">
                <div class="w-full md:w-1/2 order-1 {{ $loop->odd ? 'md:order-1' : 'md:order-2' }}">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">{{ $community_partnership?->lang('title') }}</h1>
                    <p class="text-base md:text-lg text-gray-600 mb-6">
                        {{ $community_partnership?->lang('description') }}
                    </p>
                    {{-- <a href="#" class="inline-block px-6 py-2 border-1 border-blue-500 text-blue-500 rounded-md font-semibold hover:bg-blue-500 hover:text-white transition duration-300">@lang('View Details')</a> --}}
                </div>

                <div class="w-full md:w-1/2 h-64 md:h-96 overflow-hidden rounded-md order-2 {{ $loop->odd ? 'md:order-2' : 'md:order-1' }}">
                    <img src="{{ getImage(getFilePath('deafult_service') . '/' . $community_partnership->image) }}" alt="Training Program Image" class="w-full h-full object-cover">
                </div>
            </div>
            @endforeach
        </div>
    @endif


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection

