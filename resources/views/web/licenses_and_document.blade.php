@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')

<x-breadcrumb title="Licenses & Documents" />

@php
    $heroBanner = getHeroBanner('licenses-and-document');
@endphp

<x-hero-banner :subtitle="$heroBanner?->subtitle" :title="$heroBanner?->title" :description="$heroBanner?->description" :image="$heroBanner?->image" />


<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Official Licenses:</h2>
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
</section>


<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Regulatory Documents</h2>
        <hr class="border-t-1 border-gray-500 mb-4">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">

            <div>
                <div class="border border-gray-200 p-4 text-gray-800 transition-shadow duration-300 rounded-lg">
                    <img src="http://placehold.co/300x150" class="my-2" alt="">
                </div>
                <p class="text-sm pt-3">Empower communities and target groups through comprehensive training and qualification programs.</p>
            </div>

            <div>
                <div class="border border-gray-200 p-4 text-gray-800 transition-shadow duration-300 rounded-lg">
                    <img src="http://placehold.co/300x150" class="my-2" alt="">
                </div>
                <p class="text-sm pt-3">Empower communities and target groups through comprehensive training and qualification programs.</p>
            </div>
            <div>
                <div class="border border-gray-200 p-4 text-gray-800 transition-shadow duration-300 rounded-lg">
                    <img src="http://placehold.co/300x150" class="my-2" alt="">
                </div>
                <p class="text-sm pt-3">Empower communities and target groups through comprehensive training and qualification programs.</p>
            </div>

            <div>
                <div class="border border-gray-200 p-4 text-gray-800 transition-shadow duration-300 rounded-lg">
                    <img src="http://placehold.co/300x150" class="my-2" alt="">
                </div>
                <p class="text-sm pt-3">Empower communities and target groups through comprehensive training and qualification programs.</p>
            </div>

        <div>
                <div class="border border-gray-200 p-4 text-gray-800 transition-shadow duration-300 rounded-lg">
                    <img src="http://placehold.co/300x150" class="my-2" alt="">
                </div>
                <p class="text-sm pt-3">Empower communities and target groups through comprehensive training and qualification programs.</p>
            </div>

        </div>
    </div>
</section>



<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 items-center lg:items-start">

        <div class="w-full lg:w-1/2">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-3">General Form</h2>
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
</section>


<section class="py-6 px-4 sm:px-6 lg:px-4 bg-white">
  <div class="max-w-4xl mx-auto p-2 sm:p-2 border border-green-200 bg-green-50 text-green-800">
    <p class="text-sm sm:text-base leading-relaxed">
      <span class="font-bold">Note:</span> All documents and templates are available in digital format and support electronic signature to streamline processes and ensure efficient execution
    </p>
  </div>
</section>


@php
$callToAction = getHeroBanner('licenses-documents', 'call_to_action');
@endphp

<x-call-to-action 
    :title="$callToAction?->title" 
    :description="$callToAction?->description" 
    contact_button="{{ route('contact') }}"
/>


@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection
