@php
    $heroSectionContent = getContent('hero_section.content', true);
@endphp

<div class="relative bg-cover bg-center bg-no-repeat w-full h-[300px]" style="background-image: url('{{ getImage('assets/images/frontend/hero_section/' . @$heroSectionContent?->data_values?->image, '1920x300') }}');">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="w-full py-4">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight mb-3 max-w-full md:max-w-[80%] lg:max-w-[700px] text-white">
                {{ @$heroSectionContent?->lang('title') }}
            </h1>
            <p class="text-sm sm:text-base md:text-lg max-w-full md:max-w-[80%] lg:max-w-[600px] text-white">
                {{ @$heroSectionContent?->lang('description') }}
            </p>
        </div>
    </div>
</div>