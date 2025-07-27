@php
    $categories = \App\Models\TrainingProgramCategory::where('status', 1)->get();

    $category_id = request('category_id') ?? null;

    $url = isset($url) ? $url : 'training.program';

    if ($category_id) {
        $trainings = \App\Models\TrainingPath::where('status', 1)->where('training_program_category_id', $category_id)->get();
    } else {
        $trainings = \App\Models\TrainingPath::where('status', 1)->get();
    }
@endphp

<section class="bg-gray-200 py-3">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/4 rounded-lg p-4 lg:mr-8 mb-6 lg:mb-0">
                <h3 class="text-lg bg-blue-700 py-2 px-3 font-semibold text-white">@lang('Category')</h3>
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li><a href="{{ route($url, ['category_id' => $category->id]) }}" class="block py-2 px-3 text-gray-700 hover:bg-gray-100 rounded-md mb-1 transition-colors duration-200">{{ $category?->lang('title') }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="w-full lg:w-3/4 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-4">
                @foreach ($trainings as $training)
                <div class="bg-white shadow-md rounded-xl radius-10 border-1 overflow-hidden p-3">
                    <div class="relative">
                        <img src="{{ getImage(getFilePath('trainingpath') . '/' . $training?->image) }}" alt="{{ $training?->lang('title') }}" class="w-full h-40 object-cover">
                    </div>
                    <div class="mt-4">
                        <p class="text-xs text-gray-500 mb-1">@lang('Design by') <span class="text-purple-600">{{ $training?->creator?->name ?? __('HR Team') }}</span></p>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 h-12">{{ $training?->lang('title') }}</h4>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex">
                                <span class="text-purple-500 font-bold text-sm mr-1">{{ $training?->lang('rating') ?? 0 }}/5</span>
                                <div class="flex mr-3">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-3 h-3 text-yellow-{{ $i <= $training?->lang('rating') ? '500' : '300' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.644 5.068a1 1 0 00.95.691h5.334c.954 0 1.341 1.25.574 1.838l-4.303 3.125a1 1 0 00-.364 1.118l1.644 5.068c.3.921-.755 1.688-1.539 1.118l-4.303-3.125a1 1 0 00-1.176 0l-4.303 3.125c-.784.57-1.839-.197-1.539-1.118l1.644-5.068a1 1 0 00-.364-1.118L.557 10.524c-.767-.588-.38-1.838.574-1.838h5.334a1 1 0 00.95-.691l1.644-5.068z"></path></svg>
                                    @endfor
                                </div>
                            </div>
                            <div>
                                <span class="text-gray-500 text-sm text-purple-500">({{ $training?->enrolments?->count() ?? 0 }} @lang('Enrol'))</span>
                            </div>
                        </div>

                        <button class=" bg-purple-600 text-white p-2 hover:bg-purple-700 transition-colors duration-200">@lang('Apply Request')</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>