@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Training and Qualification Request Details')</h5>
                    <div class="card-header-actions">
                        <a href="{{ route('admin.training-and-qualification-request.index') }}" class="btn btn-sm btn-primary">
                            <i class="la la-arrow-left"></i> @lang('Back to List')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Organization Information -->
                        <div class="col-lg-6">
                            <div class="card border-primary">
                                <div class="card-header bg-primary">
                                    <h5 class="card-title text-white mb-0">@lang('Organization Information')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Organization Name'):</span>
                                            <span>{{ $request->organization_name }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('City'):</span>
                                            <span>{{ $request->city->name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Industry Sector'):</span>
                                            <span>{{ $request->industry_sector }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="col-lg-6">
                            <div class="card border-info">
                                <div class="card-header bg-info">
                                    <h5 class="card-title text-white mb-0">@lang('Contact Information')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Full Name'):</span>
                                            <span>{{ $request->full_name_applicant }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Email'):</span>
                                            <span>{{ $request->email_number }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Mobile Number'):</span>
                                            <span>{{ $request->mobile_number ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <!-- Training Program Details -->
                        <div class="col-lg-6">
                            <div class="card border-success">
                                <div class="card-header bg-success">
                                    <h5 class="card-title text-white mb-0">@lang('Training Program Details')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Target Group'):</span>
                                            <span>{{ $request->target_group ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Expected Participants'):</span>
                                            <span>{{ $request->expected_participants ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Training Format'):</span>
                                            <span>
                                                @if($request->training_format)
                                                    @lang(ucfirst(str_replace('_', ' ', $request->training_format)))
                                                @else
                                                    N/A
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Suggested Duration'):</span>
                                            <span>
                                                @if($request->suggested_duration !== null)
                                                    {{ $request->suggested_duration ? __('Yes') : __('No') }}
                                                @else
                                                    N/A
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Preferred Language'):</span>
                                            <span>
                                                @if($request->preferred_training_language)
                                                    @lang(ucfirst($request->preferred_training_language))
                                                @else
                                                    N/A
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Expected Start Date'):</span>
                                            <span>{{ $request->expected_start_date ? showDateTime($request->expected_start_date, 'd M Y') : 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Request Status & Metadata -->
                        <div class="col-lg-6">
                            <div class="card border-warning">
                                <div class="card-header bg-warning">
                                    <h5 class="card-title text-white mb-0">@lang('Request Status & Information')</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Status'):</span>
                                            <span>
                                                @php
                                                    $badgeClass = match($request->status) {
                                                        '0' => 'bg-warning',
                                                        '1' => 'bg-success',
                                                        '2' => 'bg-danger',
                                                        default => 'bg-dark'
                                                    };

                                                    $status = match($request->status) {
                                                        '0' => 'Pending',
                                                        '1' => 'Approved',
                                                        '2' => 'Rejected',
                                                        default => 'Unknown'
                                                    };
                                                @endphp
                                                <span class="badge {{ $badgeClass }}">
                                                    {{ $status }}
                                                </span>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Submitted Date'):</span>
                                            <span>{{ showDateTime($request->created_at) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span class="fw-bold">@lang('Last Updated'):</span>
                                            <span>{{ showDateTime($request->updated_at) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Services Requested -->
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="card border-dark">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title text-white mb-0">@lang('Services Requested')</h5>
                                </div>
                                <div class="card-body">
                                    @if($request->requested_services && is_array($request->requested_services) && count($request->requested_services) > 0)
                                        <div class="row">
                                            @foreach($request->requested_services as $service)
                                                <div class="col-md-6 col-lg-4 mb-2">
                                                    <span class="badge bg-primary p-2">{{ $service }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-muted">@lang('No services requested')</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Notes -->
                    @if($request->additional_notes)
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="card border-secondary">
                                    <div class="card-header bg-secondary">
                                        <h5 class="card-title text-white mb-0">@lang('Additional Notes')</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-0">{{ $request->additional_notes }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

        
                </div>
            </div>
        </div>
    </div>

    {{-- Confirmation Modal --}}
    <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Confirmation Alert!')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p class="question"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn--primary">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.confirmationBtn').on('click', function() {
                var modal = $('#confirmationModal');
                var data = $(this).data();
                modal.find('.question').text(`${data.question}`);
                modal.find('form').attr('action', `${data.action}`);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
