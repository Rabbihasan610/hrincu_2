@extends('web.layouts.master', ['title' => 'Inactive Jobs'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="dashboard-content-area bg-white card p-1">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <h6 class="mb-3 mt-4">@lang('Inactive Jobs')</h6>
                        <table class="table ss table-hover table-responsive table-striped">
                            <thead class="text-light">
                                <tr>
                                    <th>@lang('Sl')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Appliers')</th>
                                    <th>@lang('Job Details')</th>
                                    <th>@lang('Edit')</th>
                                    <th>@lang('Delete')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobs as $job)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</td>
                                        <td><a href="{{ route('user.jobs.applier.list', $job->id) }}"
                                                class="btn btn-primary btn-sm">@lang('Appliers')</a></td>
                                        <td><a href="{{ route('user.view.job', $job->id) }}"
                                                class="btn btn-info btn-sm">@lang('View')</a></td>
                                        <td><a href="{{ route('user.edit.job', $job->id) }}"
                                                class="btn btn-primary btn-sm">@lang('Edit')</a></td>
                                        <td><a href="{{ route('user.delete.job.employer', $job->id) }}"
                                                class="btn btn-danger btn-sm">@lang('Delete')</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <h6 class="text-center">@lang('No Active Jobs')</h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
