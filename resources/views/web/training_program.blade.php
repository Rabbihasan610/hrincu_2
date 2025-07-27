@extends("web.layouts.frontend", ["title" => gs("site_name")])

@section("content")
        <x-breadcrumb title="Training Program" />


        @php
            $trainingProgramContent = getContent('training_program_features.content', true);
            $trainingProgramFeatures = getContent('training_program_features.element', false, null, true);
        @endphp

        <section class="bg-[#FFFFFF] px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <h3 class="mb-3 text-3xl text-gray-900">{{ @$trainingProgramContent?->lang('title') }}</h3>
                <hr class="mb-6">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($trainingProgramFeatures as $trainingProgramFeature)
                    <div class="bg-[#F9F9FF] flex flex-col overflow-hidden rounded-lg">
                        <div class="flex w-full items-center justify-center p-3 text-gray-500">
                            <img src="{{ getImage('assets/images/frontend/training_program_features/' . $trainingProgramFeature?->data_values?->image) }}" class="w-100 h-48 rounded" alt="">
                        </div>
                        <div class="flex-grow p-6">
                            <h3 class="mb-2 text-xl font-semibold text-gray-900">{{ @$trainingProgramFeature?->lang('title') }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


        @include("sections.training-program")

        @php
        $callToAction = getHeroBanner('training-program', 'call_to_action');
        @endphp

        <x-call-to-action 
            :title="$callToAction?->title" 
            :description="$callToAction?->description" 
            link_button="{{ route('training.and.qualification.request') }}"
        />

        @if (@$sections->secs != null)
            @foreach (json_decode($sections->secs) as $sec)
                @include("sections." . $sec)
            @endforeach
        @endif
@endsection
