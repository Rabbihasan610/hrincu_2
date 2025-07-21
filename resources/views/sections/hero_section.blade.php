@php
    $heroSectionContent =  getContent('hero_section.content', true);
@endphp

<div class="relative bg-cover bg-center flex h-[35vh] items-center justify-start" style="background-image: url('{{ getImage('assets/images/frontend/hero_section/' . @$heroSectionContent?->data_values?->image, '1920x300') }}');" >
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="max-w-7xl container z-10 text-white px-6">
        <h3 class="font-bold leading-tight mb-6 text-1xl md:text-3xl sm:w-100 md:w-[500px] ">
            {{ @$heroSectionContent?->lang('title') }}
        </h3>
        <p class="text-base text-sm md:text-sm sm:w-100 md:w-[500px]">
            {{ @$heroSectionContent?->lang('description') }}
        </p>
    </div>
</div>
