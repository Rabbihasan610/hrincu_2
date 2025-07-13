@extends('web.layouts.master', ['title' => 'Applier List'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="dashboard-content-area bg-white card p-1">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <h6 class="mb-3 mt-4">@lang('Applier List')</h6>
                        <table class="table ss table-hover table-responsive table-striped">
                            <thead class="text-light">
                                <tr>
                                    <th>@lang('Sl')</th>
                                    <th>@lang('Job Title')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('Resume')</th>
                                    <th>@lang('Expected Salary')</th>
                                    <th>@lang('Level')</th>
                                    <th>@lang('Created At')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appliers as $applier)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $applier?->job?->title }}</td>
                                        <td>{{ $applier?->user?->name }}</td>
                                        <td>
                                            <a href="{{ route('user.resume', $applier->user->id) }}"
                                                class="btn btn-sm btn-primary">
                                                @lang('View Resume')
                                            </a>
                                        </td>
                                        <td>
                                            {{ showAmount($applier->expected_salary) }}
                                        </td>
                                        <td>{{ $applier->level }}</td>
                                        <td>{{ showDateTime($applier->created_at) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">
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
