@extends('admin.layouts.app', ['title' => $title ?? ''])

@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.state.store', $state->id ?? null) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">@lang('Image') <span class="text-danger fs-6">*</span></label>
                        <x-image-uploader image="{{ $state->image ?? '' }}" name="image" class="w-100" type="state"/>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
                            <select class="form-control select2-basic" name="country_id" id="country_id" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" data-cities='@json($country->city)' {{ old('country_id', $state->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                        {{ $country->lang('name') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                            <select class="form-control select2-basic" name="city_id" id="city_id" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id', $state->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                        {{ $city->lang('name') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $state->name ?? '') }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" required value="{{ old('name_ar', $state->name_ar ?? '') }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Latitude') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="lat" class="form-control" required value="{{ old('lat', $state->lat ?? '') }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Longitude') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="lng" class="form-control" required value="{{ old('lng', $state->lng ?? '') }}">
                        </div>

                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.state.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i> @lang('Back')</a>
@endpush

@push('script')
    <script>
        $(document).ready(function () {
            $('.select2-basic').select2({
                dropdownParent: $('.card-body')
            });

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
        });
    </script>
@endpush
