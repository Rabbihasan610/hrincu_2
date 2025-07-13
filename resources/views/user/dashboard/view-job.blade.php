@extends('web.layouts.master', ['title' => 'Job Details'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="datails-left">
                <div class="row">
                    <div class="col-12">
                        <div class="job-tittle">
                            <h4>{{ $job->title }}</h4>
                            <div class="tittle-button">
                                <span class="mr-4"><i class="fa fa-folder-open color"></i> {{ $job->category->name }}</span>

                                <span class="mr-4"><i class="fa fa-hand-o-right"></i> {{ $job->jobtype }}</span>
                                @php
                                    $changedateid = Date('d M Y', strtotime($job->created_at));
                                @endphp

                                <span class="mr-4"><i class="fa fa-clock-o" aria-hidden="true"></i>

                                    @if ($changedateid == Date('d M Y'))
                                        <span
                                            class="post-on">{{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                                    @else
                                        <span class="post-on">{{ $changedateid }}</span>
                                    @endif

                                </span>

                                <span class="mr-4"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    {{ @$job->country->name }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row py-5 pr-3">
                    <div class="col-md-4 border">
                        <div class="job-discription">
                            <div class="p-1  text-center">
                                <p class="m-0">@lang('Expected Salary')</p>
                                <h6 class="text-capitalize">{{ $job->salarycurrency }} {{ $job->salaryrange }} /
                                    {{ $job->salarytype }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border">
                        <div class="job-discription">
                            <div class="p-1 text-center">
                                <p class="m-0">@lang('Job Type')</p>
                                <h6 class="text-capitalize">{{ $job->jobtype }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border">
                        <div class="job-discription">
                            <div class="p-1 text-center">
                                <p class="m-0">@lang('Qualification')</p>
                                <h6 class="text-capitalize">{{ $job->qualification }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border">
                        <div class="job-discription">
                            <div class="p-1 text-center">
                                <p class="m-0">@lang('No of Vacancies')</p>
                                <h6>{{ $job->vacancies }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border">
                        <div class="job-discription">
                            <div class="p-1 text-center">
                                <p class="m-0">@lang('Job Experience')</p>
                                <h6>{{ $job->experience }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 border">
                        <div class="job-discription">
                            <div class="p-1 text-center">
                                <p class="m-0">@lang('Job Level')</p>
                                <h6>{{ $job->level }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="job-discript-bottom pb-3">
                            <h4>@lang('Job Description')</h4>
                            <p class="py-3">{!! $job->description !!}</p>
                            <div class="job-discription-social">
                                <span><i class="fab fa-facebook"></i></span>

                                <span><i class="fab fa-twitter"></i></span>

                                <span><i class="fas fa-envelope"></i></span>

                                <span><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="job-details-right card-body text-light">
                        <div class="media">
                            <i style="font-size:40px" class="fa fa-clock-o mr-3 mt-2"></i>
                            <div class="media-body">
                                <p class="m-0 text-capitalize text-dark">@lang('Deadline')</p>
                                <h5 class="m-0">{{ $job->deadline }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="job-details-right-button text-center text-capitalize">
                        @if (@Auth::user()->user_type == 'job_provider')
                            <a class="btn btn-block btn-primary my-3"
                                href="{{ route('user.edit.job', $job->id) }}">@lang('Edit Job')</a>
                        @endif

                        <a class="btn btn-block btn-dark my-3" href="#">@lang('Save Job')</a>
                    </div>

                    <!--Add modal-->
                    <div class="modal fade" id="_{{ $job->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-light p-2">
                                    <h5 class="modal-title m-0">{{ $job->title }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="#" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <label>@lang('Expected Salary')</label>
                                        <input type="text" name="expectedsalary" class="form-control"
                                            placeholder="@lang('Enter Expected Salary')">

                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                        <input type="hidden" name="employer_id" value="{{ $job->user_id }}">

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">@lang('Close')</button>
                                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
