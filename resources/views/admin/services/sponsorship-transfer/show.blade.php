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
                                    <th>@lang('Full Name')</th>
                                    <td> {{ $service->full_name }} </td>
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
                                    <th>@lang('Current Position')</th>
                                    <td> {{ $service->current_position }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Company Name')</th>
                                    <td> {{ $service->company_name }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Age')</th>
                                    <td> {{ $service->age }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Nationality')</th>
                                    <td> {{ $service->nationality }} </td>
                                </tr>

                                <tr>
                                    <th>@lang('Message')</th>
                                    <td> {{ $service->message }} </td>
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
