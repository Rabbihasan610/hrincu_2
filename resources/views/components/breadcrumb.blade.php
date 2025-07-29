@props([
    'title' => null,
])

@php
    $page_slug = request()->segment(1);
    $topBanner = $page_slug ? getHeroBanner($page_slug, 'top_banner') : null;

    $image = $topBanner->image == '' ? asset('img/hero-bg.png') : $topBanner->image;
    $title = $topBanner->title == '' ? $title : $topBanner->title;
@endphp



<div class="relative bg-cover bg-center flex h-[15vh] items-center justify-start" style="background-image: url('{{ isset($image) ? asset($image) : asset('img/hero-bg.png') }}');" >
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="max-w-7xl container z-10 text-white pt-6 text-center">
        <h3 class="font-bold leading-tight mb-6 text-3xl">
            {{ __(@$title) }}
        </h3>
    </div>
</div>
