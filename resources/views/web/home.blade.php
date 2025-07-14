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


    <div class="relative bg-cover bg-center flex h-[35vh] items-center justify-start" style="background-image: url('{{ asset('img/hero-bg.png') }}');" >
        <div class="absolute inset-0 bg-black opacity-70"></div>
        <div class="max-w-7xl container z-10 text-white px-6">
            <h3 class="font-bold leading-tight mb-6 text-3xl">
                Your Comprehensive Partner for HR <br>
                Solutions, Training, Employment, and <br>
                Contact Center Services
            </h3>
            <p class="text-base md:text-sm">
                At the Human Resources Incubator, we combine expertise, <br>
                technology, and community engagement to provide integrated solutions that enhance the<br>
                efficiency of individuals and organizations in employment, training, operations, <br>
                and HR management — all in line with Saudi Vision 2030.
            </p>
        </div>
    </div>




    @include('sections.ourservice_request')


    <section class="bg-[#3b0764] py-16 px-4 md:px-8 lg:px-16">
        <div class="max-w-7xl mx-auto text-white">
            <!-- Smaller heading text -->
            <h2 class="text-xl md:text-3xl font-semibold mb-6">
                Contact Us Now
            </h2>

            <ul class="text-base md:text-sm space-y-2 mb-8">
                <li>Looking for qualified candidates?</li>
                <li>Need to train your team?</li>
                <li>Seeking smart HR solutions?</li>
                <li>Start now — we’ll guide you step by step</li>
            </ul>

            <!-- Smaller buttons -->
            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-md transition duration-300 ease-in-out text-center text-sm">
                    Submit Request
                </a>
                <a href="#" class="inline-block border-2 border-white hover:bg-white hover:text-[#3b0764] text-white font-medium py-2 px-6 rounded-md transition duration-300 ease-in-out text-center text-sm">
                    Contact Us
                </a>
            </div>
        </div>
    </section>



    <div class="container mx-auto px-4 py-10 md:py-20">
        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 mb-16 md:mb-20 bg-white p-6 md:p-10">
            <div class="w-full md:w-1/2">
                <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">Our Training Programs</h1>
                <p class="text-base md:text-lg text-gray-600 mb-6">At the Human Resources Incubator, we empower individuals and organizations through a professional and integrated training system. Our goal is to build competitive national capabilities and prepare talents to adapt to market needs and future challenges.</p>
                <a href="#" class="inline-block px-6 py-2 border-1 border-blue-500 text-blue-500 rounded-md font-semibold hover:bg-blue-500 hover:text-white transition duration-300">View Details</a>
            </div>
            <div class="w-full md:w-1/2 h-64 md:h-96 overflow-hidden rounded-md">
                <img src="https://images.unsplash.com/photo-1741175363663-b83a99e37685?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Training Program Image" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="flex flex-col md:flex-row-reverse items-center gap-8 md:gap-12 bg-white p-6 md:p-10 ">
            <div class="w-full md:w-1/2">
                <h2 class="text-sm md:text-base font-normal uppercase tracking-wide text-gray-500 mb-2">Community Partnership</h2>
                <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">Together for Empowerment and Sustainable Impact</h1>
                <p class="text-base md:text-lg text-gray-600 mb-6">At HR Incubator, we believe that building strategic partnerships with government entities, the private sector, embassies, and non-profit organizations is key to achieving comprehensive and sustainable development in the labor market and the broader community. Our aim is to launch collaborative initiatives that enhance human capital, empower targeted groups, and promote a culture of work and social integration.</p>
                <a href="#" class="inline-block px-6 py-2 border-1  border-blue-500 text-blue-500 rounded-md font-semibold hover:bg-blue-500 hover:text-white transition duration-300">View Details</a>
            </div>
            <div class="w-full md:w-1/2 h-64 md:h-96 overflow-hidden rounded-md">
                <img src="https://images.unsplash.com/photo-1741175363663-b83a99e37685?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Community Partnership Image" class="w-full h-full object-cover">
            </div>
        </div>

    </div>


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection

