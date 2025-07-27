@extends("web.layouts.frontend", ["title" => gs("site_name")])

@section("content")

    <x-breadcrumb title="Targeted Sectors" />

	@php
		$heroBanner = getHeroBanner('targeted-sector');

	@endphp

	<x-hero-banner :subtitle="$heroBanner?->subtitle" :title="$heroBanner?->title" :description="$heroBanner?->description" :image="$heroBanner?->image" />

    <section class="bg-gray-50 px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($sectors as $sector)
                <div class="border border-gray-200 flex flex-col overflow-hidden rounded-lg">
                    <div class="flex w-full items-center justify-center p-3 text-gray-500">
                        <img alt="" class="h-48 w-full rounded" src="{{ getImage(getFilePath('sector'). '/' . $sector?->image) }}">
                    </div>
                    <div class="flex-grow p-6">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">{{ $sector?->lang('title') }}</h3>
                        <p class="text-sm text-gray-600">{{ $sector?->lang('description') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include("sections." . $sec)
        @endforeach
    @endif
@endsection
