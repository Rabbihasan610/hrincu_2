@extends('web.layouts.master', ['title' => 'Resume'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="resume-dashboard-right">
                <div class="resume-head">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span>@lang('Edit Address Details')</span>
                </div>
                <div class="resume-dashboard-body">
                    <div class="resume-info-edit-form">
                        <form action="{{ route('user.personal-information.address.edit', $personal_info->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <label for="">@lang('Present Address') <span>*</span></label>
                                </div>
                                <div class="col-12 col-md-4 py-2">
                                    <select name="present_address_country" id="ecountry_id" required>
                                        <option value="">@lang('Select one')</option>
                                        @foreach ($countries as $country)
                                            <option
                                                {{ $personal_info->present_address_country == $country->id ? 'selected' : '' }}
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                value="{{ $country->id }}">
                                                {{ app()->getLocale() == 'ar' ? $country->name_ar : $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-md-4 py-2">
                                    <select name="present_address_district" id="district_id" required>
                                        <option value="">@lang('Select one')</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('present_address_district') }}</span>
                                </div>
                                <div class="col-12 col-md-4 py-2">
                                    <input type="text" name="present_address_area"
                                        value="{{ $personal_info->present_address_area }}" placeholder="@lang('Area')" required>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="#">@lang('Permanent Address')</label>
                                        <div class="d-flex">
                                            <input type="checkbox" class="checkbox" id="same_as_address"
                                                name="same_as_address" value="1">
                                            <label for="same_as_address" style="margin-left: 5px;">@lang('Same as Present Address')</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-md-4 py-2">
                                    <select name="permanent_address_country" id="country2_id">
                                        <option value="">@lang('Select one')</option>
                                        @foreach ($countries as $country)
                                            <option
                                                {{ $personal_info->permanent_address_country == $country->id ? 'selected' : '' }}
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}
                                                value="{{ $country->id }}">
                                                {{ app()->getLocale() == 'ar' ? $country->name_ar : $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 py-2">
                                    <select name="permanent_address_district" id="district2_id">
                                        <option value="">@lang('Select one')</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 py-2">
                                    <input type="text" name="permanent_address_area"
                                        value="{{ $personal_info->permanent_address_area }}" placeholder="@lang('Area')">
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="save-data">@lang('Save')</button>
                                    <a href="{{ route('user.resume') }}" class="cancel-data">@lang('Cancel')</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {


            $('#ecountry_id').change(function() {

                var country_id = $(this).val();

                var url = "{{ route('districts') }}";

                $.ajax({
                    url: url,
                    data: {
                        country_id: country_id
                    },
                    type: "GET",
                    success: function(response) {
                        $('#district_id').html(response);
                    },
                });
            });



            $('#country2_id').change(function() {

                var country_id = $(this).val();

                var url = "{{ route('districts') }}";

                $.ajax({
                    url: url,
                    data: {
                        country_id: country_id
                    },
                    type: "GET",
                    success: function(response) {
                        $('#district2_id').html(response);
                    },
                });
            });
        });
    </script>
@endpush
