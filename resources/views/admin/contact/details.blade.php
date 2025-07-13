@extends('admin.layouts.app', ['title' => 'Query Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>@lang('Name')</th>
                                    <td> {{ $service->name }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Email')</th>
                                    <td> {{ $service->email }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Mobile')</th>
                                    <td> {{ $service->mobile }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Work Place')</th>
                                    <td> {{ $service->work_place }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Country')</th>
                                    <td> {{ $service->country }} </td>
                                </tr>

                                @if ($service->type == 'basic')
                                <tr>
                                    <th>@lang('Message')</th>
                                    <td> {{ $service->message }} </td>
                                </tr>
                                @endif

                                @if ($service->type == 'query')
                                <tr>
                                    <th>@lang('Job Title')</th>
                                    <td> {{ $service->job_title }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Query')</th>
                                    <td> {{ $service->write_problem }} </td>
                                </tr>
                                @endif

                                <tr>
                                    <th>@lang('Status')</th>
                                    <td>
                                        @if ($service->status == 1)
                                            <span class="badge bg-success">@lang('Active')</span>
                                        @elseif($service->status == 0)
                                            <span class="badge bg-warning">@lang('Pending')</span>
                                        @elseif($service->status == 2)
                                            <span class="badge bg-danger">@lang('Rejected')</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
