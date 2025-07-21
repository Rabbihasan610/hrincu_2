@props([
    'title' => null,
    'description' => null,
    'link_button' => null,
    'contact_button' => null,
])

<section class="px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-7xl rounded-xl bg-purple-900 p-8 text-center md:p-12">

        @if ($title)
            <h2 class="mb-4 text-2xl font-bold text-white sm:text-3xl">{{ $title }}</h2>
        @endif

        @if ($description)
            <p class="mb-8 text-base text-white text-opacity-80 sm:text-lg w-full max-w-xl mx-auto">{{ $description }}</p>
        @endif

        <div class="flex flex-col justify-center space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
            @if ($link_button)
                <a href="{{ $link_button }}"
                    class="bg-blue-600 px-8 py-2 font-semibold text-white transition duration-300 ease-in-out hover:bg-blue-700">
                    {{ __('Submit Request') }}
                </a>
            @endif
            @if ($contact_button)
                <a href="{{ $contact_button }}"
                    class="border border-white bg-transparent px-8 py-2 font-semibold text-white transition duration-300 ease-in-out hover:bg-white hover:text-purple-900">
                    {{ __('Contact Us') }}
                </a>
            @endif
        </div>
    </div>
</section>