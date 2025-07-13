@extends('web.layouts.frontend', ['title' => 'Hire Me'])

@section('content')

@include('sections.page_banner', ['title' => 'Hire Me'])

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">@lang('Hire Me')</h3>
                        <hr>
                         <div class="row justify-content-center">
                            @lang('This feature is currently under development.')
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
