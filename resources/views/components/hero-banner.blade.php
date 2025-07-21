@props([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'image' => null,
    'path' => 'hero_banner'
])


<section>
    <div class="bg-gray-100 px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-12 md:flex-row">
            <div class="md:w-1/2">
                @if ($subtitle)
                    <p class="mb-2 text-lg font-semibold text-gray-600">{{ $subtitle }}</p>
                @endif

                @if ($title)
                    <h2 class="mb-6 text-4xl font-bold leading-tight text-gray-900 sm:text-5xl">{{ $title }}</h2>
                @endif

                @if ($description)
                    <p class="text-base leading-relaxed text-gray-700 sm:text-lg">
                        {!! $description !!}
                    </p>
                @endif
            </div>

            <div class="flex justify-center md:w-1/2 md:justify-end">
                <div class="w-full overflow-hidden rounded-lg">
                    @if ($image)
                        <img alt="Modern buildings cityscape" class="h-auto w-full" src="{{ $image }}">
                    @else
                        <img alt="Modern buildings cityscape" class="h-auto w-full" src="https://placehold.co/700x400">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>