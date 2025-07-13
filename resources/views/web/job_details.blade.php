@extends('web.layouts.frontend', ['title' => gs('site_name')])

@section('content')

    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="job-item-deatls d-flex">
                    <div class="col-12 col-md-9">
                        <div class="d-flex">
                            <img class="job-img" src="{{ asset('assets/images/job.png')}}" alt="">
                            <div class="job-deatls">
                                <h2>{{ $job->title }}</h2>
                                <p>{!! strip_tags(mb_substr($job->description, 0, 50, 'UTF-8')) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="apply-button2 d-flex gap-2 mt-4">
                            <a href="{{ route('user.save.job', $job->id) }}" class="btn btn-outline-success px-4 bookmark-btn">@lang('Bookmark') <i
                                    class="fa-regular fa-bookmark"></i></a>
                            <a href="{{ route('user.application', $job->id) }}" class="btn btn-primary apply-btn px-4">{{ __('Apply Now')}}</a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!----------- Service form section End --------------->

    <!----------- Deadline  section Start --------------->
    <section class="py-4 deadline-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="deadline-box d-flex align-items-center justify-content-between py-3">
                        <div class="deadline-item d-flex align-items-center">
                            <h6 class="deadline-title mt-1">@lang('Deadline') :</h6>
                            <p><i class="fa-regular fa-clock"></i> <span>{{ $job->deadline }}</span></p>
                        </div>
                        <div class="line"></div>
                        <div class="deadline-item">
                            <p> <i class="fa-solid fa-location-dot"></i> <span>{{ $job->location }}</span> </p>
                        </div>
                        <div class="line"></div>
                        <div class="deadline-item d-flex align-items-center">
                            <p><i class="fa-solid fa-share-from-square"></i> @lang('Share') :</p>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </section>

    <!----------- Deadline : section End --------------->
    <!--------------- summary section start ------------------>
    <section class="summary-section py-3">
        <div class="container">
            <div class="card p-3">
                <div class="row">
                    <div class="col-12 ">
                        <div class="summary">
                            <h6>@lang('Summary')</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="summary-text">
                            <p>@lang('Vacancy') <span>: {{ $job->vacancies }}</span></p>
                            <p>@lang('Salary Range') <span>: {{ isset($job->salaryrange) ? \App\Constants\JobInfo::salaryrange()[$job->salaryrange] : 'N/A' }}</span></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="summary-text">
                            <p>@lang('Age') <span>: {{ isset($job->age) ? $job->age : 'N/A' }}</span></p>
                            <p>@lang('Experience') <span>: {{ isset($job->experience) ? \App\Constants\JobInfo::experience()[$job->experience] : 'N/A' }}</span></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="summary-text">
                            <p>@lang('Location') <span>: {{ $job->location }}</span></p>
                            <p>@lang('Published') <span>: {{ $job->created_at->diffForHumans() }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- summary section start ------------------>

    <!---------------About job section start ------------------>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-job">
                        <h4>@lang('About Job')</h4>
                        <p>
                            {!! $job->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------------About job section end ------------------>

    <!--------------- Requirements section start ------------------>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="requirement">
                        <h4>@lang('Requirements')</h4>
                        <ul>
                            @if (isset($job->qualification))
                                <li>{{ \App\Constants\JobInfo::qualification()[$job->qualification] }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--------------- Requirements section End ------------------>

    <!--------------- about-company section start ------------------>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-company">
                        <h4>@lang('About Company')</h4>
                        <ul>
                            {{-- <li><span>@lang('Name')</span> : {{ $job?->company?->name }}</li>
                            <li><span>@lang('Address')</span> : {{ $job?->company?->address }}</li>
                            <li><span>@lang('Phone')</span> : {{ $job?->company?->phone }}</li>
                            <li><span>@lang('Email')</span> : {{ $job?->company?->email }}</li>
                            <li><span>@lang('Website')</span> : {{ $job?->company?->website }}</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- about-company section End ------------------>

    <!--------------- related-job section start ------------------>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="related-job">
                        <h5>@lang('Related Jobs')</h5>
                        <a href="{{ route('related.job', ['category_id' => $job->job_category_id]) }}">@lang('See All Similar Job')</a>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12">
                    <div class="related-job-list">
                        <div class="row">
                            @include('web.components.job-slider')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- related-job section End ------------------>


    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif
@endsection
