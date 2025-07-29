@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-header">
                    <h5 class="card-title">@lang('Targeted Sector Request Details')</h5>
                    <div class="card-tools">
                        <a href="{{ route('admin.targeted_sector_request.index') }}" class="btn btn-sm btn-primary">
                            <i class="la la-arrow-left"></i> @lang('Back to List')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Organization Information -->
                        <div class="col-lg-6">
                            <div class="card border">
                                <div class="card-header bg--primary">
                                    <h6 class="card-title text-white mb-0">@lang('Organization Information')</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Organization Name'):</span>
                                            <span>{{ $request->organization_name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Business Type/Sector'):</span>
                                            <span class="badge badge--primary">{{ $request->business_type_sector }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('City'):</span>
                                            <span>{{ $request->city->name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('City/Region'):</span>
                                            <span>{{ $request->cityRegion->name ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-lg-6">
                            <div class="card border">
                                <div class="card-header bg--info">
                                    <h6 class="card-title text-white mb-0">@lang('Contact Information')</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Email Address'):</span>
                                            <span>{{ $request->email_address }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Mobile Number'):</span>
                                            <span>{{ $request->mobile_number }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Marital Status'):</span>
                                            <span>{{ $request->marital_status ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Preferred Communication'):</span>
                                            <span class="badge badge--success">{{ $request->preferred_communication_method }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="col-lg-6 mt-4">
                            <div class="card border">
                                <div class="card-header bg--warning">
                                    <h6 class="card-title text-white mb-0">@lang('Personal Information')</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Current Occupation'):</span>
                                            <span>{{ $request->current_occupation ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Average Monthly Income'):</span>
                                            <span>{{ $request->average_monthly_income ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Request Details -->
                        <div class="col-lg-6 mt-4">
                            <div class="card border">
                                <div class="card-header bg--success">
                                    <h6 class="card-title text-white mb-0">@lang('Request Details')</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Expected Timeframe'):</span>
                                            <span>{{ $request->expected_timeframe ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Status'):</span>
                                            @if($request->status == 0)
                                                <span class="badge bg-warning">@lang('Pending')</span>
                                            @elseif($request->status == 1)
                                                <span class="badge bg-success">@lang('Approved')</span>
                                            @elseif($request->status == 2)
                                                <span class="badge bg-danger">@lang('Rejected')</span>
                                            @else
                                                <span class="badge bg-dark">@lang('Unknown')</span>
                                            @endif
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Submitted Date'):</span>
                                            <span>{{ showDateTime($request->created_at) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Services Requested -->
                        <div class="col-lg-12 mt-4">
                            <div class="card border">
                                <div class="card-header bg--dark">
                                    <h6 class="card-title text-white mb-0">@lang('Services Requested')</h6>
                                </div>
                                <div class="card-body">
                                    @if($request->requested_services && is_array($request->requested_services))
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($request->requested_services as $service)
                                                <span class="badge bg-info">{{ \App\Models\OurService::find($service)->lang('title') }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted">@lang('No services specified')</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Description of Need -->
                        <div class="col-lg-12 mt-4">
                            <div class="card border">
                                <div class="card-header bg-secondary">
                                    <h6 class="card-title text-white mb-0">@lang('Description of Need')</h6>
                                </div>
                                <div class="card-body">
                                    @if($request->description_of_need)
                                        <p class="mb-0">{{ $request->description_of_need }}</p>
                                    @else
                                        <p class="text-muted mb-0">@lang('No description provided')</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection