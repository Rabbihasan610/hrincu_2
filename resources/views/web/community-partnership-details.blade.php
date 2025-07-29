@extends('web.layouts.frontend', ['title' => $title])

@section('content')

    <x-breadcrumb :title="$title" />

    <div class="container mx-auto px-4 py-10 md:py-20">
        <div class="bg-white p-6 md:p-10 rounded-lg">
            <div class="w-full h-96 md:h-[500px] overflow-hidden rounded-md mb-8">
                <img src="{{ getImage(getFilePath('deafult_service') . '/' . $community_partnership->image) }}" alt="{{ $community_partnership->lang('title') }} Image" class="w-full h-full object-cover">
            </div>

            <h3 class="text-2xl md:text-3xl font-bold mb-6 text-gray-900 leading-tight">{{ $community_partnership->lang('title') }}</h3>

            <div class="text-base md:text-lg text-gray-700 leading-relaxed ">
                {{ $community_partnership->lang('description') }}

                @if($community_partnership->created_at)
                    <p class="mt-4 text-gray-600"><strong>@lang('Created Date')</strong> {{ \Carbon\Carbon::parse($community_partnership->created_at)->format('M d, Y') }}</p>
                @endif
               
            </div>

            <div class="mt-10">
                <a href="{{ route('community.partnership') }}" class="inline-block px-6 py-2 border-1 border-purple-500 text-purple-500 rounded-md font-semibold hover:bg-purple-500 hover:text-white transition duration-300">
                    &larr; @lang('Back')
                </a>
            </div>
        </div>
    </div>

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection