<div class="single-job-item mt-3">
    <div class="row">
        <div class="col-12 col-md-2">
            <a href="{{ route('job.details', $job->id) }}">
            <img src="{{ asset('assets/images/job.png')}}" alt="">
            </a>
        </div>
        <div class="col-12 col-md-7">
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
                <a href="" class="btn btn-outline-primary px-4">@lang('Save')</a>
                <a href="" class="btn btn-secondary px-3">@lang('Apply Now')</a>
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
