@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')
    @include('sections.page_banner', ['title' => 'Service Request'])

    <!----------- Service form section Start --------------->
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mb-0">
                         <p>@lang('Fill up this form')</p>
                    </div>
                </div>
                <div class="card-body">
                     <form action="{{ route('user.service.request.submit') }}" method="POST">
                        @csrf

                        <input type="hidden" name="service_id" value="{{ request()->service_id }}">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="@lang('Full Name')" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="job_title" name="job_title" value="{{ old('job_title') }}" placeholder="@lang('Job Title')" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="mobile" name="phone" value="{{ old('phone') }}" placeholder="@lang('Mobile No')" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="@lang('Email')" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="@lang('Company Name')">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="@lang('Address')" value="{{ old('address') }}">
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="mb-3">
                                     <textarea name="details" id=""  rows="3" class="form-control" placeholder="@lang('Details of reqired service')"></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary mt-3" type="submit">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!----------- Service form section End --------------->
@endsection

@push('script')
<script>
   $("#country_id").on('change', function () {
        let cities = $(this).find('option:selected').data('cities') || [];
        let citySelect = $("#city_id");
        let options = `<option value="">@lang('City')</option>`;

        cities.forEach(city => {
            options += `<option value="${city.id}">${city.name}</option>`;
        });

        citySelect.html(options);
        citySelect.toggle(cities.length > 0);
    });

    $("#city_id").on('change', function () {
        let states = $(this).find('option:selected').data('states') || [];
        let stateSelect = $("#state_id");
        let options = `<option value="">@lang('State')</option>`;

        states.forEach(state => {
            options += `<option value="${state.id}">${state.name}</option>`;
        });

        stateSelect.html(options);
        stateSelect.toggle(states.length > 0);
    });
</script>
@endpush
