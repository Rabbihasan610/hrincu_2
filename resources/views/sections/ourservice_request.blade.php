@php
    $ourServices = \App\Models\OurService::where('status', 'active')->get();
    $istitle = isset($is_title) ? false : true;
@endphp

<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($istitle)
        <h3 class="text-center text-3xl md:text-4xl font-bold mb-12 text-gray-800">@lang('Our Services')</h3>
        @endif

         <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($ourServices as $service)
                <div class="group border border-gray-300 rounded-2xl shadow-sm p-6 flex flex-col h-full transition-all duration-300 ease-in-out hover:shadow-lg hover:border-purple-400">

                    <div class="mb-4">
                        <div class="icon-box mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase text-purple-700">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                <path d="M12 12h0"/>
                            </svg>
                        </div>
                        <h5 class="font-bold text-xl mb-0 text-gray-900">{{ $service?->lang('title') }}</h5>
                    </div>

                    <ul class="list-none pl-0 mb-6 flex-grow">
                        @php
                            $items = $service->items ? json_decode($service->items, true) : [];
                        @endphp

                        @foreach ($items as $item)
                            <li class="mb-2 flex items-start text-gray-700">
                                <span class="text-purple-700 me-2 mt-0.5"> ✔ </span>
                                <span class="leading-normal">{{ app()->getLocale() == 'ar' ? $item['title_ar'] : $item['title'] }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div>
                        <a href="{{ route('ourservice.request', $service->slug) }}" class="inline-block btn-dark-custom px-6 py-3 rounded-lg font-medium shadow-md">@lang('Request')</a>
                    </div>
                </div>
            @endforeach
        </div>

        </div>

    </div>
</section>
