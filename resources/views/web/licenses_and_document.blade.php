@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')

<x-breadcrumb title="Licenses & Documents" />

@php
    $heroBanner = getHeroBanner('licenses-and-document');
@endphp
<x-hero-banner :subtitle="$heroBanner?->subtitle" :title="$heroBanner?->title" :description="$heroBanner?->description" :image="$heroBanner?->image" />


@include('sections.official_licenses')
@include('sections.regulatory_documents')
@include('sections.general_form')



<section class="py-6 px-4 sm:px-6 lg:px-4 bg-white">
  <div class="max-w-4xl mx-auto p-2 sm:p-2 border border-green-200 bg-green-50 text-green-800">
    <p class="text-sm sm:text-base leading-relaxed">
      <span class="font-bold">Note:</span> All documents and templates are available in digital format and support electronic signature to streamline processes and ensure efficient execution
    </p>
  </div>
</section>


@php
$callToAction = getHeroBanner('licenses-documents', 'call_to_action');
@endphp

<x-call-to-action 
    :title="$callToAction?->title" 
    :description="$callToAction?->description" 
    contact_button="{{ route('contact') }}"
/>


@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
