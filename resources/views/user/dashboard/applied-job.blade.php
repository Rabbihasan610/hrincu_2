@extends('web.layouts.master', ['title' => 'My Applied'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="dashboard-content-area bg-white card p-1">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <h6 class="mb-3 mt-4">@lang('My Applied')</h6>
                        <table class="table ss table-hover table-responsive table-striped">
                            <thead class="text-light">
                                <tr>
                                    <th>@lang('Sl')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Expected Salary')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Job Details')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applieds as $applied)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $applied?->job->title }}</td>
                                        <td>{{ $applied->expectedsalary }}</td>
                                        <td>{{ Carbon\Carbon::parse($applied->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('job.details', $applied->job_id) }}"
                                                class="btn btn-info btn-sm">@lang('View')</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
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
