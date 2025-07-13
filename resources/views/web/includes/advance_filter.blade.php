<div class="modal fade" id="advanceFilter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="filter">
                <form id="searchForm" action="/search" method="GET" onsubmit="urlProcess(); return false;">
                    <h5>@lang('Filter')</h5>
                    <div class="filter-form">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category')</label>
                            <select class="form-select" name="category_id" id="category_id"
                                aria-label="Default select example">
                                <option selected value="0">@lang('Select Category')</option>
                                @foreach ($categories as $category)
                                    <option
                                        {{ old('category_id', request()->category_id) == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="country_id" class="form-label">@lang('Country')</label>
                            <select class="form-select" name="country_id" id="country_id"
                                aria-label="Default select example">
                                <option selected value="0">@lang('Select Country')</option>
                                @foreach ($countries as $country)
                                    <option
                                        {{ old('country_id', request()->country_id) == $country->id ? 'selected' : '' }}
                                        value="{{ $country->id }}" data-cities="{{ json_encode($country->city) }}">
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="city_id" class="form-label">@lang('City')</label>
                            <select class="form-select" id="city_id" name="city_id"
                                aria-label="Default select example">
                                <option value="0" selected>@lang('Select city')</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qualification" class="form-label">@lang('Qualification')</label>
                            <select class="form-select" id="qualification" name="qualification"
                                aria-label="Default select example">
                                <option value="0" selected>@lang('Select Qualification')</option>
                                @foreach (\App\Constants\JobInfo::qualification() as $key => $qualification)
                                    <option
                                        {{ old('qualification', request()->qualification) == $key ? 'selected' : '' }}
                                        value="{{ $key }}">{{ __($qualification) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="job_type" class="form-label">@lang('Job Type')</label>
                            <select class="form-select" id="job_type" name="job_type"
                                aria-label="Default select example">
                                <option value="0" selected>@lang('Select Job Type')</option>
                                @foreach (\App\Constants\JobInfo::jobtype() as $key => $jobtype)
                                    <option {{ old('job_type', request()->job_type) == $key ? 'selected' : '' }}
                                        value="{{ $key }}">{{ __($jobtype) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <h6 class="my-2">@lang('Salary Range')</h6>

                        @foreach (\App\Constants\JobInfo::salaryrange() as $key => $salaryrange)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="salaryrange"
                                    id="salaryrange-{{ $key }}" value="{{ $key }}"
                                    {{ old('salaryrange', request()->salaryrange) == $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="salaryrange-{{ $key }}">
                                    {{ $salaryrange }}
                                </label>
                            </div>
                        @endforeach

                        <h6 class="my-2">@lang('Working Type')</h6>

                        @foreach (\App\Constants\JobInfo::salarytype() as $key => $salarytype)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="salarytype"
                                    id="salarytype-{{ $key }}" value="{{ $key }}"
                                    {{ old('salarytype', request()->salarytype) == $key ? 'checked' : '' }}>
                                <label class="form-check-label" for="salarytype-{{ $key }}">
                                    {{ $salarytype }}
                                </label>
                            </div>
                        @endforeach

                        <h6 class="my-3">@lang('Deadline')</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deadline" id="week" value="week"
                                {{ old('deadline', request()->deadline) == 'week' ? 'checked' : '' }}>
                            <label class="form-check-label" for="week">
                                @lang('This Week')
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deadline" id="month" value="month"
                                {{ old('deadline', request()->deadline) == 'month' ? 'checked' : '' }}>
                            <label class="form-check-label" for="month">
                                @lang('This Month')
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deadline" id="next_week"
                                value="next_week"
                                {{ old('deadline', request()->deadline) == 'next_week' ? 'checked' : '' }}>
                            <label class="form-check-label" for="next_week">
                                @lang('Next Week')
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deadline" id="next_month"
                                value="next_month"
                                {{ old('deadline', request()->deadline) == 'next_month' ? 'checked' : '' }}>
                            <label class="form-check-label" for="next_month">
                                @lang('Next Month')
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deadline" id="custom_date"
                                value="custom_date"
                                {{ old('deadline', request()->deadline) == 'custom_date' ? 'checked' : '' }}>
                            <label class="form-check-label" for="custom_date">
                                @lang('Custom Date')
                            </label>

                            <input type="date" class="form-control" name="date" id="date"
                                placeholder="date" value="{{ old('date', request()->date) }}">
                        </div>


                    </div>
                    <div class="filter-button">
                        <button type="submit" class="btn primary-btn w-100">@lang('Search Filter')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {
        $('#sort').on('change', function() {
            var selectedValue = $(this).val();
        });

        $("#country_id").on('change', function () {
            let cities = $(this).find('option:selected').data('cities') || [];

            let citySelect = $("#city_id");
            let options = `<option value="">@lang('City')</option>`;

            cities.forEach(city => {
                options += `<option value="${city.id}">${city.name}</option>`;
            });

            citySelect.html(options);
        });


        $("#date").hide();

        $("#custom_date").on('change', function() {
            $("#date").toggle(this.checked);
        });
    })
</script>
@endpush
