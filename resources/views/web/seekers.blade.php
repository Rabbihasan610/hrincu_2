@extends('web.layouts.frontend', ['title' => 'Find Jobs Seekers'])

@push('style')
    <style>
        :root {
            --gradient: linear-gradient(135deg, #6c63ff 0%, #ff6584 100%);
        }

        .card.seeker-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            background: white;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card.seeker-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .card.seeker-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .card.seeker-card img {
            height: 180px;
            object-fit: cover;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .card-body {
            padding: 1.5rem;
            background-color: white;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .verified {
            color: var(--primary-color);
            font-size: 14px;
            margin-left: 4px;
            display: inline-flex;
            align-items: center;
        }

        .seeker-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary-color);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .hire-btn {
            background: var(--gradient);
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            margin-top: auto;
            align-self: center;
            width: fit-content;
            box-shadow: 0 4px 10px rgba(108, 99, 255, 0.3);
        }

        .hire-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(108, 99, 255, 0.4);
            color: white;
        }

        .seeker-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin: 10px 0;
            justify-content: center;
        }

        .skill-tag {
            background: rgba(108, 99, 255, 0.1);
            color: var(--primary-color);
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .pagination .btn {
            border-radius: 8px;
            min-width: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 3px;
            font-weight: 600;
        }

        .job-search-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 3rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .search-input {
            /* border-radius: 50px !important; */
            padding: 12px 20px;
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
        }

        .search-btn {
            border-radius: 0 !important;
            padding: 12px 25px;
            font-weight: 600;
            background: var(--gradient);
            border: none;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, #564fcc 0%, #e64c6d 100%);
        }

        .input-group-text {
            background: white !important;
            border-right: none !important;
            padding-left: 20px;
        }

        .no-results {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .no-results-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .card.seeker-card img {
                height: 140px;
            }

            .card-title {
                font-size: 1rem;
            }

            .hire-btn {
                padding: 8px 16px;
                font-size: 0.8rem;
            }

            .seeker-badge {
                font-size: 0.6rem;
                padding: 3px 8px;
            }
        }

        /* Modern pagination styling */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .pagination .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .pagination .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
        }

        .pagination .btn-primary {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-indicator {
            display: flex;
            align-items: center;
            margin: 0 10px;
            color: var(--dark-color);
            font-weight: 500;
        }
    </style>
@endpush

@section('content')

<!-- Search Header -->
<section class="job-search-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5 mb-3">@lang('Find Top Talent')</h2>
            <p class="lead text-muted">@lang('Connect with skilled professionals ready for their next opportunity')</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form id="searchForm" action="/seekers" method="GET" onsubmit="urlProcess(); return false;">
                    <div class="input-group shadow-lg" style="border-radius: 50px;">
                        <span class="input-group-text bg-white border-0"><i class="fas fa-search text-primary"></i></span>
                        <input type="text" class="form-control border-0 search-input" name="keyword" value="{{ request()->keyword ?? '' }}" placeholder="Search by name, skills, or location">
                        <button type="submit" class="btn search-btn">@lang('Search')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Seeker Listings -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 fw-bold text-dark">{{ $seekers->total() ?? 0 }} @lang('Professionals Available')</h4>

            @if(request()->keyword)
                <a href="{{ route('seekers') }}" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-times me-1"></i> @lang('Clear Filter')
                </a>
            @endif
        </div>

        @if ($seekers->count() < 1)
            <div class="no-results">
                <div class="no-results-icon">
                    <i class="fas fa-user-slash"></i>
                </div>
                <h4 class="mb-3">@lang('No Professionals Found')</h4>
                <p class="text-muted">@lang('Try adjusting your search or filter to find what your looking for.')</p>
                <a href="{{ route('seekers') }}" class="btn btn-primary mt-3">@lang('Browse All Professionals')</a>
            </div>
        @else
            <div class="row g-4">
                @foreach ($seekers as $seeker)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card seeker-card h-100">
                            <span class="seeker-badge">@lang('AVAILABLE')</span>
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $seeker->image) }}" alt="{{ $seeker->name }}" class="img-fluid">
                            <div class="card-body text-center">
                                <h6 class="card-title mb-1">{{ $seeker->name }}
                                    <span class="verified" title="Verified"><i class="fas fa-check-circle"></i></span>
                                </h6>
                                {{-- <small class="text-muted d-block mb-2">UX Designer • San Francisco</small>

                                <div class="seeker-skills">
                                    <span class="skill-tag">Figma</span>
                                    <span class="skill-tag">UI/UX</span>
                                    <span class="skill-tag">Prototyping</span>
                                </div> --}}

                                <a href="{{ route('user.hire.me', $seeker->id) }}" class="hire-btn mt-3">
                                    <i class="fas fa-paper-plane me-2"></i> @lang('Hire Me')
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Modern Pagination -->
        <div class="pagination-container">
            <nav>
                @if ($seekers->onFirstPage() === false)
                    <a href="{{ $seekers->previousPageUrl() }}" class="btn btn-outline-primary">
                        <i class="fas fa-chevron-left me-1"></i> Previous
                    </a>
                @endif

                <span class="page-indicator">
                    Page {{ $seekers->currentPage() }} of {{ $seekers->lastPage() }}
                </span>

                @if ($seekers->hasMorePages())
                    <a href="{{ $seekers->nextPageUrl() }}" class="btn btn-outline-primary">
                        Next <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                @endif
            </nav>
        </div>
    </div>
</section>

<!-- Optional Sections -->
@if (@$sections->secs != null)
    @foreach (json_decode($sections->secs) as $sec)
        @include('sections.' . $sec)
    @endforeach
@endif

@endsection

@push('script')
<script>
    function urlProcess() {
        const form = document.getElementById('searchForm');
        const url = new URL(window.location.href);
        const params = new URLSearchParams(new FormData(form));

        // Clean up 0 or empty values
        for (const [key, value] of params.entries()) {
            if (value === '0' || value.trim() === '') {
                params.delete(key);
            }
        }

        const finalUrl = `${url.origin}${url.pathname}?${params.toString()}`;
        window.history.replaceState(null, '', finalUrl);
        form.submit();
    }
</script>
@endpush
