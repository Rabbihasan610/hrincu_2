@extends('web.layouts.frontend', ['title' => 'Find Jobs'])

@section('content')

    <!----------- Service head section Start --------------->
    <section class="py-3 job-search-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-job-head text-center mb-4">
                        <h2 class="text-center">@lang('Find Your Dream Job')</h2>
                    </div>

                    <div class="find-job-form p-4 shadow-lg">
                        <form id="searchForm" action="/search" method="GET" onsubmit="urlProcess(); return false;">
                            <div class="input-group search-job">

                                <span class="input-group-text bg-white"><i class="fas fa-search text-primary"></i></span>

                                <input type="text" class="form-control" value="{{ request()->keyword ?? '' }}" name="keyword" placeholder="@lang('Job Title or Keyword')"
                                    aria-label="Job title or keyword">

                                <span class="input-group-text bg-white"><i
                                        class="fas fa-map-marker-alt text-danger"></i></span>

                                <select class="form-control" name="country_id">
                                    <option value="0">@lang('Select Country')</option>
                                    @foreach ($countries as $country)
                                        <option
                                            {{ old('country_id', request()->country_id) == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}" data-cities="{{ json_encode($country->city) }}">
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary px-4">@lang('Search')</button>
                            </div>
                        </form>

                        <div class="advance-search mt-3 d-flex me-5">
                            <a href="#" class="text-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#advanceFilter">
                                <span class="me-2"><i class="fa-solid fa-filter"></i></span>
                                @lang('Advance Search')
                            </a>
                            <a href="{{ route('search') }}" class="text-danger text-decoration-none">
                                <span class="ms-2"><i class="fa-solid fa-xmark"></i></span>
                                @lang('Clear')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------- Service head section Start --------------->

    <!-----------  Job Available  & filter section Start --------------->
    <section class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-3 filterJob">
                    @include('web.includes.filter')
                </div>

                <div class="col-12 col-md-9">
                    <div class="jobavailablecount">
                        <div class="d-flex justify-content-between">
                            <div class="job-post-count">
                                <p>{{ $job_counts ?? 0 }} @lang('Job Available')</p>
                            </div>

                            <div class="job-post-sort">
                                <select name="sort" id="sort">
                                    <option value="latest" {{ request()->sort == 'latest' ? 'selected' : '' }}>@lang('Latest')</option>
                                    <option value="oldest" {{ request()->sort == 'oldest' ? 'selected' : '' }}>@lang('Oldest')</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="joblist">
                        @if ($jobs->count() < 1)
                            <p>@lang('No jobs found.')</p>
                        @else
                            @foreach ($jobs as $job)
                                <div class="single-job-item mt-3">
                                    <div class="row">

                                        <div class="col-4 col-md-2">
                                            <a href="{{ route('job.details', $job->id) }}">
                                                <img src="{{ asset('assets/images/job.png')}}" alt="">
                                            </a>
                                        </div>

                                        <div class="col-8 col-md-7">
                                            <div class="job-heading">
                                                <a href="{{ route('job.details', $job->id) }}">
                                                    <h2>{{ $job->title }}</h2>
                                                </a>
                                                <p>{!! strip_tags(mb_substr($job->description, 0, 500, 'UTF-8')) !!} </p>
                                                <small class="mt-5"> <span><i
                                                            class="fa-solid fa-location-dot"></i></span>
                                                    {{ $job->location }}</small>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="apply-button text-end pt-3 d-flex gap-2">
                                                @if (auth()->check() && auth()->user()->savedJob($job->id))
                                                    <a href="{{ route('user.save.job', $job->id) }}"
                                                        class="btn job-btn btn-primary">@lang('Saved')</a>
                                                @else
                                                    <a href="{{ route('user.save.job', $job->id) }}"
                                                        class="btn job-btn btn-outline-primary">@lang('Save')</a>
                                                @endif

                                                @if (auth()->check() && auth()->user()->appliedJobs($job->id))
                                                    <a href="#"
                                                        class="btn job-btn btn-primary">@lang('Applied')</a>
                                                @else
                                                    <a href="{{ route('user.application', $job->id) }}"
                                                        class="btn job-btn btn-primary">@lang('Apply Now')</a>
                                                @endif
                                            </div>

                                            <div class="deadline mt-5">
                                                @if ($job->deadline)
                                                    @php
                                                        $deadline = \Carbon\Carbon::parse($job->deadline);
                                                        $today = \Carbon\Carbon::today();
                                                    @endphp
                                                    <p>
                                                        <i class="fa-solid fa-calendar-days"></i>
                                                        {{ $deadline->format('d M Y') }}
                                                        @if ($deadline->isToday())
                                                            <span class="text-warning">(@lang('Today'))</span>
                                                        @elseif ($deadline->isPast())
                                                            <span class="text-danger">(@lang('Expired'))</span>
                                                        @else
                                                            <span class="text-success">(@lang('Upcoming'))</span>
                                                        @endif
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="page-button d-flex py-5 justify-content-center align-items-center">
                                @if ($jobs->previousPageUrl())
                                    <a href="{{ $jobs->previousPageUrl() }}">
                                        <button class="btn btn-primary">
                                            <i class="fa-solid fa-angle-left"></i> @lang('Previous')
                                        </button>
                                    </a>
                                @endif

                                <div class="page-number mx-3">
                                    @foreach(range(1, $jobs->lastPage()) as $page)
                                        <a href="{{ $jobs->url($page) }}"
                                           class="{{ $jobs->currentPage() == $page ? 'fw-bold btn btn-primary' : '' }}">
                                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                        </a>
                                    @endforeach
                                </div>

                                @if ($jobs->nextPageUrl())
                                    <a href="{{ $jobs->nextPageUrl() }}">
                                        <button class="btn btn-primary">
                                            @lang('Next') <i class="fa-solid fa-angle-right"></i>
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

    <!----------- Job Available form section End --------------->


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif

    {{-- @include('web.includes.advance_filter') --}}
@endsection

@push('style')
<style>
 @media only screen and (max-width: 600px) {
     .filterJob{
         display: none;
     }
 }


 .job-btn{
     font-size: 12px !important;
     border-radius: 5px !important;
     text-transform: capitalize !important;
     padding: 8px 10px !important;
 }

 @media only screen and (min-width: 767px) and (max-width: 1400px) {
     .job-btn{
        font-size: 12px !important;
        border-radius: 5px !important;
        text-transform: capitalize !important;
        padding: 5px 10px !important;
     }
 }
</style>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $("#sort").on("change", function(e) {
                e.preventDefault();
                var selectedValue = $(this).val();

                if (selectedValue) {
                    window.location.href = "{{ route('search') }}?sort=" + selectedValue;
                }
            });

            function urlProcess() {
                let url = new URL(window.location.href);
                let params = new URLSearchParams(url.search);

                params.forEach((value, key) => {
                    if (value === '0' || value.trim() === '') {
                        params.delete(key);
                    }
                });

                let newUrl = url.origin + url.pathname + (params.toString() ? '?' + params.toString() : '');
                window.history.replaceState(null, '', newUrl);

                document.getElementById('searchForm').submit();
            }


            $(".advance-search").click(function() {
                $(".filterJob").toggle();
            })
        })
    </script>
@endpush
