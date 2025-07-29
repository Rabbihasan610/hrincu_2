@extends('web.layouts.frontend', ['title' => 'Community Partnership'])

@section('content')
    
   <x-breadcrumb title="Community Partnership" />

    @if ($community_partnerships->count() > 0)
    <div class="container mx-auto px-4 py-10 md:py-20">
        @foreach ($community_partnerships as $community_partnership)

        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 mb-16 md:mb-20 bg-white p-6 md:p-10">
            <div class="w-full md:w-1/2 {{ $loop->odd ? 'order-1' : 'order-2' }}">
                <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">{{ $community_partnership?->lang('title') }}</h1>
                <p class="text-base md:text-lg text-gray-600 mb-6">
                    {{ $community_partnership?->lang('description') }}
                </p>
                <a href="{{ route('community.partnership.details', $community_partnership->id) }}" class="inline-block px-6 py-2 border-1 border-purple-500 text-purple-500 rounded-md font-semibold hover:bg-purple-500 hover:text-white transition duration-300">@lang('View Details')</a>
            </div>

            <div class="w-full md:w-1/2 h-64 md:h-96 overflow-hidden rounded-md {{ $loop->odd ? 'order-2' : 'order-1' }}">
                <img src="{{ getImage(getFilePath('deafult_service') . '/' . $community_partnership->image) }}" alt="Training Program Image" class="w-full h-full object-cover">
            </div>
        </div>
    
        @endforeach
    </div>
    @endif

    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection
