@php
$locale = app()->getLocale();
@endphp

@extends('web.layouts.frontend', ['title' => 'Community Partnership'])
@section('title', 'Blog Details')


@section('content')

    <section class="blog-section py-5">
        <div class="container">
           <div class="row">
                <div class="col-md-7 col-12">
                    <div class="blog-image">
                    <img src="{{ getImage(getFilePath('blog') . '/' . $blog->image, '500X263') }}" alt="Blog"
                    style="width: 100%; height: 350px !important;"
                    />
                </div>
                <div class="blog-date py-5 text-center">
                    <span>
                        @if ($locale == 'en')
                        {{ Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}
                        @elseif( $locale == 'ar')
                            {{ Carbon\Carbon::parse($blog->created_at)->translatedFormat('d M Y') }}
                        @endif
                    </span>
                </div>
                <div class="blog-page-title pb-5">
                    <h2>
                        @if ($locale == 'en')
                        {{$blog->title}}
                        @elseif( $locale == 'ar')
                            {{$blog->title_ar}}
                        @endif
                    </h2>
                </div>
                <div class="blog-details">
                    @if ($locale == 'en')
                    {!! $blog->description !!}
                    @elseif( $locale == 'ar')
                        {!! $blog->description_ar !!}
                    @endif
                </div>
             </div>
           </div>

        </div>
    </section>
    <!--    BLOG PAGE END-->




@endsection
