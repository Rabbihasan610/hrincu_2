@extends('web.layouts.frontend', ['title' => 'About Us'])

@section('content')
    <x-breadcrumb title="About Us" />



    @php
        $heroBanner = getHeroBanner('about');

    @endphp

    <x-hero-banner :subtitle="$heroBanner?->subtitle" :title="$heroBanner?->title" :description="$heroBanner?->description" :image="$heroBanner?->image" />


    @include('sections.mission_vision')
    @include('sections.values_section')
    @include('sections.whowe_serve')

    <section>
        <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">@lang('Targeted Sectors')</h2>

                    @php
                        $sectors = \App\Models\Sectors::where('status', 1)->get();
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
                        @foreach ($sectors as $sector)
                            <div class="flex items-center">
                                <svg class="h-4 w-4 text-blue-500 mr-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-sm text-gray-700 font-bold">{{ $sector?->lang('title') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('sections.partnerships_accreditations')


            </div>
    </section>
@endsection

@push('style')
    <style>
        .line-before::before {
            content: '';
            position: absolute;
            top: 80%;
            bottom: 0;
            left: -145px;
            width: 130px;
            height: 2px;
            background-color: #CCCCCC;
        }

        .line-after::after {
            content: '';
            position: absolute;
            top: 80%;
            bottom: 0;
            left: 15px;
            width: 130px;
            height: 2px;
            background-color: #CCCCCC;
        }

        .dot::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 8px;
            height: 8px;
            background-color: #8a2be2;
            border-radius: 50%;
        }


        .flex-line-wrapper {
            display: flex;
            align-items: center;
            width: 100%;
            position: relative;
            padding: 20px 0;
        }

        .line-2 {
            flex: 1;
            height: 2px;
            background-color: #CCCCCC;
            position: relative;
        }

        .dot-2 {
            width: 16px;
            height: 16px;
            background-color: #8a2be2;
            border-radius: 50%;
            position: relative;
            z-index: 2;
        }

        .checked-bullet::before {
            content: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%238a2be2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Cpolyline points="20 6 9 17 4 12"%3E%3C/polyline%3E%3C/svg%3E');
            /* Purple checkmark SVG */
            display: inline-block;
            width: 16px;
            height: 16px;
            margin-right: 8px;
            vertical-align: middle;
        }
    </style>
@endpush
