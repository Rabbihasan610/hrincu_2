@php
    $isHomePage = isset($is_home_page) ? true : false;
    $ourServices = \App\Models\OurService::query();

    if ($isHomePage) {
        $ourServices->take(8)->latest();
    }

    $ourServices = $ourServices->where('status', 'active')->get();

    $istitle = isset($is_title) ? false : true;
@endphp

<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($istitle)
        <h3 class="text-center text-4xl md:text-4xl font-bold mb-12 text-gray-800">@lang('Our Services')</h3>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($ourServices as $service)
                <div class="group border border-gray-300 rounded-2xl shadow-sm p-6 flex flex-col h-full transition-all duration-300 ease-in-out hover:border-purple-400">

                    <div class="mb-4">
                        <div class="icon-box mb-4">
                            <img src="{{ getImage(getFilePath('service') . '/' . $service->icon) }}" alt="Service Image" class="w-16 h-16 object-cover">
                        </div>
                        <h6 class="font-bold text-md mb-0 text-gray-900">{{ $service?->lang('title') }}</h6>
                    </div>

                    <ul class="list-none pl-0 mb-6 flex-grow">
                        @php
                            $items = $service->items ? json_decode($service->items, true) : [];
                        @endphp

                        @foreach ($items as $item)
                            <li class="mb-2 flex items-start text-gray-700 text-sm my-3">
                                <span class="text-purple-700 me-2 mt-0.5">
                                    <i class="las la-check"></i>
                                </span>
                                <span class="leading-normal text-gray-700 text-sm">{{ app()->getLocale() == 'ar' ? $item['title_ar'] : $item['title'] }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div>
                        <a href="{{ route('ourservice.request', $service->slug) }}" class="inline-block btn-dark-custom px-6 py-2 rounded-lg font-medium shadow-md">@lang('Request')</a>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($isHomePage)
            <div class="text-center mt-6">
                <a href="{{ route('service') }}" class="inline-flex items-center justify-center btn-dark-custom px-6 py-2 rounded-lg font-medium shadow-md mx-auto">
                    @lang('More')
                </a>
            </div>
        @endif
    </div>
</section>
