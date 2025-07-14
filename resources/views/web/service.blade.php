@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')

<x-breadcrumb title="Our Services" />



<section>
    <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="md:w-1/2">
            <p class="text-lg font-semibold text-gray-600 mb-2">Let's check</p>
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6 leading-tight">Our service</h2>
            <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
            At <strong class="text-blue-600">Human Resources Incubator</strong>, we provide a comprehensive ecosystem of services that support individuals and organizations in their journey toward employment, training, workforce management, talent optimization, and institutional excellence. We cover all aspects needed to help our clients build effective, flexible, and sustainable work environments.
            </p>
        </div>

        <div class="md:w-1/2 flex justify-center md:justify-end">
            <div class="rounded-lg overflow-hidden  w-full">
                <img src="https://placehold.co/700x400" alt="Modern buildings cityscape" class="w-full h-auto">
            </div>
        </div>
        </div>
    </div>
</section>

@include('sections.ourservice_request', ['is_title' => true])

@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
