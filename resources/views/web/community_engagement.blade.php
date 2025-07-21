@extends("web.layouts.frontend", ["title" => gs("site_name")])

@section("content")
        <x-breadcrumb title="Community Engagement" />


        <section>
            <div class="bg-gray-100 py-16 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="md:w-1/2">
                    <p class="text-lg font-semibold text-gray-600 mb-2">Community Partnership</p>
                    <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6 leading-tight">Together for Empowerment and Sustainable Impact</h2>
                    <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
                        At HR Incubator, we believe that building strategic partnerships with government entities, the private sector, embassies, and non-profit organizations is key to achieving comprehensive and sustainable development in the labor market and the broader community. Our aim is to launch collaborative initiatives that enhance human capital, empower targeted groups, and promote a culture of work and social integration.
                    </p>
                </div>

                <div class="md:w-1/2 flex justify-center md:justify-end">
                    <div class="rounded-lg overflow-hidden w-full">
                        <img src="https://placehold.co/700x400" alt="Modern buildings cityscape" class="w-full h-auto">
                    </div>
                </div>
                </div>
            </div>
        </section>


        @include('sections.our_objectives')
        @include('sections.partnership_areas')
        @include('sections.key_initiatives')

        {{-- <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Our Objectives</h2>
                <hr class="border-t-1 border-gray-500 mb-4">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Empower communities and target groups through comprehensive training and qualification programs.</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Support nationalization (Saudization) initiatives and improve employment opportunities</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Offer tailored services for expatriate workers to support cultural integration.</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Raise awareness of rights and responsibilities in the workplace and promote a positive work environment.</p>
                </div>

                <div class="bg-gray-200 border border-gray-200 rounded-lg p-6 text-gray-800 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <p class="text-sm">Build an effective collaboration ecosystem across sectors to deliver innovative development solutions.</p>
                </div>

                </div>
            </div>
        </section> --}}
{{-- 
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 items-center lg:items-start">

                <div class="w-full lg:w-1/2 flex justify-center lg:justify-start">
                    <div class="bg-gray-200 rounded-xl overflow-hidden h-98 lg:h-full w-full max-w-lg lg:max-w-none mt-2">
                        <img src="https://placehold.co/600x400" alt="Partnership Buildings" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Partnership Areas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Universities and Educational Institutions</h3>
                            <p class="text-sm text-slate-800">Joint training programs to prepare students for the job market.</p>
                        </div>

                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Embassies and Diplomatic Missions</h3>
                            <p class="text-sm text-slate-800">Organizing cultural and guidance events for expatriate communities.</p>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Government Ministries and Authorities</h3>
                            <p class="text-sm text-slate-800">Launching employment and capacity-building initiatives aligned with national development projects.</p>
                        </div>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold text-slate-800 mb-2">NGOs and Community Initiatives</h3>
                            <p class="text-sm text-slate-800">Special empowerment programs for women, youth, and persons with disabilities.</p>
                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Private Sector</h3>
                            <p class="text-sm text-slate-800">Providing on-the-job training, employment opportunities, and organizational development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}



         {{-- <section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 items-center lg:items-start">

                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Key Initiatives</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Universities and Educational Institutions</h3>
                            <p class="text-sm text-slate-800">Joint training programs to prepare students for the job market.</p>
                        </div>

                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Embassies and Diplomatic Missions</h3>
                            <p class="text-sm text-slate-800">Organizing cultural and guidance events for expatriate communities.</p>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Government Ministries and Authorities</h3>
                            <p class="text-sm text-slate-800">Launching employment and capacity-building initiatives aligned with national development projects.</p>
                        </div>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold text-slate-800 mb-2">NGOs and Community Initiatives</h3>
                            <p class="text-sm text-slate-800">Special empowerment programs for women, youth, and persons with disabilities.</p>
                        </div>

                        <div class="bg-red-50 border border-red-200 rounded-lg p-2 flex flex-col justify-between">
                            <h3 class="font-semibold  text-slate-800 mb-1">Private Sector</h3>
                            <p class="text-sm text-slate-800">Providing on-the-job training, employment opportunities, and organizational development.</p>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex justify-center lg:justify-start">
                    <div class="bg-gray-200 rounded-xl overflow-hidden h-98 lg:h-full w-full max-w-lg lg:max-w-none mt-2">
                        <img src="https://placehold.co/600x400" alt="Partnership Buildings" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section> --}}


        <section class="py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto bg-purple-900 rounded-xl p-8 md:p-12 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Are You Part of One of These Sectors?</h2>
                <p class="text-base sm:text-lg text-white text-opacity-80 mb-8">We are ready to deliver tailored solutions that fit your needs.</p>
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 transition duration-300 ease-in-out">
                        @lang('Submit Request')
                    </button>
                    <button class="bg-transparent border-1 border-white text-white font-semibold py-3 px-8 transition duration-300 ease-in-out hover:bg-white hover:text-purple-900">
                        @lang('Contact Us')
                    </button>
                </div>
            </div>
        </section>

        @if (@$sections->secs != null)
            @foreach (json_decode($sections->secs) as $sec)
                @include("sections." . $sec)
            @endforeach
        @endif
@endsection
