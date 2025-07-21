@props(['title' => '', 'img_path' => 'img/hero-bg.png'])
<div class="relative bg-cover bg-center flex h-[15vh] items-center justify-start" style="background-image: url('{{ isset($img_path) ? asset($img_path) : asset('img/hero-bg.png') }}');" >
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="max-w-7xl container z-10 text-white pt-6 text-center">
        <h3 class="font-bold leading-tight mb-6 text-3xl">
            {{ __(@$title) }}
        </h3>
    </div>
</div>
