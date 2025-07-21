@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')

<x-breadcrumb title="Our Services" />

@php
$heroBanner = getHeroBanner('service');

@endphp

<x-hero-banner :subtitle="$heroBanner?->subtitle" :title="$heroBanner?->title" :description="$heroBanner?->description" :image="$heroBanner?->image" />


@include('sections.ourservice_request', ['is_title' => true])

@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
