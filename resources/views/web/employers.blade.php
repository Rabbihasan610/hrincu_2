@extends('web.layouts.frontend', ['title' => 'Find Providers'])


@push('style')
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            background: #f8f9fa;
        }

        .verified {
            color: green;
            font-size: 12px !important;
            background: #08e5ec;
            border-radius: 50%;
            padding: 4px 6px;
            margin-left: 5px;
        }


        .hire-btn {
            background: #3d0075;
            color: white;
            border-radius: 5px;
            padding: 10px 15px;
            text-decoration: none;
        }

        .hire-btn:hover {
            background: #290052;
            color: white;
        }
    </style>
@endpush

@section('content')

    <!----------- Service head section Start --------------->
    <section class="py-3 job-search-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="find-job-head text-center mb-4">
                        <h2>@lang('Find job providers')</h2>
                    </div>

                    <div class="find-job-form p-4 shadow-lg">
                        <form id="searchForm" action="/employers" method="GET" onsubmit="urlProcess(); return false;">
                            <div class="input-group search-job">
                                <span class="input-group-text bg-white"><i class="fas fa-search text-primary"></i></span>
                                <input type="text" class="form-control" name="keyword" value="{{ request()->keyword ?? '' }}" placeholder="@lang('Search by Keyword')"
                                    aria-label="Job title or keyword">

                                <button type="submit" class="btn btn-primary px-4">@lang('Search')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!----------- Service head section Start --------------->

    <!-----------  provider  & filter section Start --------------->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="jobavailablecount">
                        <div class="d-flex justify-content-between">
                            <div class="job-post-count">
                                <p>{{ $providers->total() ?? 0 }} @lang('Job Providers')</p>
                            </div>

                            @if (request()->keyword)
                                <div class="job-post-sort">
                                    <a href="{{ route('employers') }}" class="text-danger">
                                        @lang('Clear Filter')
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="provider mt-3">
                        <div class="row">
                            @if ($providers->count() < 1)
                                <p>@lang('No Provider found.')</p>
                            @else
                                @foreach ($providers as $provider)
                                    <div class="col-md-3 col-sm-6 col-12 col-lg-2 mb-4">
                                        <div class="card">
                                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $provider->image) }}" alt="Profile Image">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $provider->name }}<span class="verified">&#10004;</span></h5>
                                                <p class="card-text">{{ __("Job Provider") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="page-button d-flex py-5 justify-content-center align-items-center">
                                @if ($providers->previousPageUrl())
                                    <a href="{{ $providers->previousPageUrl() }}">
                                        <button class="btn btn-primary">
                                            <i class="fa-solid fa-angle-left"></i> @lang('Previous')
                                        </button>
                                    </a>
                                @endif

                                <div class="page-number mx-3">
                                    @foreach (range(1, $providers->lastPage()) as $page)
                                        <a href="{{ $providers->url($page) }}"
                                            class="{{ $providers->currentPage() == $page ? 'fw-bold btn btn-primary' : '' }}">
                                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                        </a>
                                    @endforeach
                                </div>

                                @if ($providers->nextPageUrl())
                                    <a href="{{ $providers->nextPageUrl() }}">
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

    @include('sections.hire_developer')


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            function filterSearch(event) {

            }

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

        })
    </script>
@endpush
