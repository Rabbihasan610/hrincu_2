@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')

@include('sections.page_banner', ['title' => 'Service'])


@include('sections.our_service')

@include('sections.our_service_request_section')

@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
