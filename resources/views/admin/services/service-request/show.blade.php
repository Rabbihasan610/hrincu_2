@extends('admin.layouts.app', ['title' => 'Sponsorship Transfer'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>@lang('Service')</th>
                                    <td> {{ $service?->service?->lang('title') }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Full Name')</th>
                                    <td> {{ $service->name }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Email')</th>
                                    <td> {{ $service->email }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Mobile')</th>
                                    <td> {{ $service->phone }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Job Title')</th>
                                    <td> {{ $service->job_title }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Company Name')</th>
                                    <td> {{ $service->company_name }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Address')</th>
                                    <td> {{ $service->address }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Country')</th>
                                    <td> {{ $service?->country?->lang('name') }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('City')</th>
                                    <td> {{ $service?->city?->lang('name') }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('State')</th>
                                    <td> {{ $service?->state?->lang('name') }}</td>
                                </tr>

                                <tr>
                                    <th>@lang('Zip Code')</th>
                                    <td> {{ $service->zip_code }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Zip Code')</th>
                                    <td> {{ $service->zip_code }} </td>
                                </tr>

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
