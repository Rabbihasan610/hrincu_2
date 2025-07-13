@extends('admin.layouts.app', ['title' => 'Sector Request'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>@lang('Sector')</th>
                                    <td> {{ $service?->sector?->lang('title') }} </td>
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
                                    <th>@lang('Address')</th>
                                    <td> {{ $service->address }} </td>
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
