@extends('web.layouts.frontend', ['title' => 'About Us'])

@section('content')

@include('sections.page_banner', ['title' => 'About Us'])



@include('sections.about_section')


@include('sections.get_notification')
@endsection
