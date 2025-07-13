<div class="filter mb-4">
    <form id="searchForm" action="/search" method="GET" onsubmit="urlProcess(); return false;">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h4 class="mb-3">@lang('Filter')</h4>
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="category_id" class="form-label">@lang('Category')</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option selected value="0">@lang('Select Category')</option>
                            @foreach ($categories as $category)
                                <option {{ old('category_id', request()->category_id) == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">
                                    {{ app()->getLocale() == 'ar' ? $category->name_ar : $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="country_id" class="form-label">@lang('Country')</label>
                        <select class="form-select" name="country_id" id="country_id">
                            <option selected value="0">@lang('Select Country')</option>
                            @foreach ($countries as $country)
                                <option {{ old('country_id', request()->country_id) == $country->id ? 'selected' : '' }}
                                    value="{{ $country->id }}" data-cities="{{ json_encode($country->city) }}">
                                    {{ app()->getLocale() == 'ar' ? $country->name_ar : $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="city_id" class="form-label">@lang('City')</label>
                        <select class="form-select" id="city_id" name="city_id">
                            <option value="0" selected>@lang('Select City')</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="qualification" class="form-label">@lang('Qualification')</label>
                        <select class="form-select" id="qualification" name="qualification">
                            <option value="0">@lang('Select Qualification')</option>
                            @foreach (\App\Constants\JobInfo::qualification() as $key => $qualification)
                                <option {{ old('qualification', request()->qualification) == $key ? 'selected' : '' }}
                                    value="{{ $key }}">{{ __($qualification) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="job_type" class="form-label">@lang('Job Type')</label>
                        <select class="form-select" id="job_type" name="job_type">
                            <option value="0">@lang('Select Job Type')</option>
                            @foreach (\App\Constants\JobInfo::jobtype() as $key => $jobtype)
                                <option {{ old('job_type', request()->job_type) == $key ? 'selected' : '' }}
                                    value="{{ $key }}">{{ __($jobtype) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr class="my-4">

                <h5>@lang('Salary Range')</h5>
                <div class="row">
                    @foreach (\App\Constants\JobInfo::salaryrange() as $key => $salaryrange)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="salaryrange" id="salaryrange-{{$key}}"
                                    value="{{ $key }}" {{ old('salaryrange', request()->salaryrange) == $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="salaryrange-{{$key}}">
                                    {{ __($salaryrange) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr class="my-4">

                <h5>@lang('Working Type')</h5>
                <div class="row">
                    @foreach (\App\Constants\JobInfo::salarytype() as $key => $salarytype)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="salarytype" id="salarytype-{{$key}}"
                                    value="{{ $key }}" {{ old('salarytype', request()->salarytype) == $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="salarytype-{{$key}}">
                                    {{ __($salarytype) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr class="my-4">

                <h5>@lang('Deadline')</h5>
                <div class="row g-2">
                    @php
                        $deadlines = ['week' => 'This Week', 'month' => 'This Month', 'next_week' => 'Next Week', 'next_month' => 'Next Month'];
                    @endphp

                    @foreach ($deadlines as $value => $label)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="deadline" id="{{ $value }}"
                                    value="{{ $value }}" {{ old('deadline', request()->deadline) == $value ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $value }}">
                                    @lang($label)
                                </label>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-6 mt-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deadline" id="custom_date"
                                value="custom_date" {{ old('deadline', request()->deadline) == 'custom_date' ? 'checked' : '' }}>
                            <label class="form-check-label" for="custom_date">@lang('Custom Date')</label>
                        </div>
                        <input type="date" class="form-control mt-2" name="date" id="date"
                            value="{{ old('date', request()->date) }}" style="display: none;">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">@lang('Search Filter')</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('script')
<script>
    $(document).ready(function () {
        $("#country_id").on('change', function () {
            let cities = $(this).find('option:selected').data('cities') || [];
            let options = `<option value="0">@lang('Select City')</option>`;
            cities.forEach(city => {
                let name = '{{ app()->getLocale() == "ar" }}' ? city.name_ar : city.name;
                options += `<option value="${city.id}">${name}</option>`;
            });
            $("#city_id").html(options);
        });

        // Toggle custom date input
        function toggleDateInput() {
            if ($("#custom_date").is(':checked')) {
                $("#date").show();
            } else {
                $("#date").hide();
            }
        }

        $("#custom_date").on('change', toggleDateInput);
        $("input[name='deadline']").on('change', toggleDateInput);

        // Initial state
        toggleDateInput();
    });
</script>
@endpush
