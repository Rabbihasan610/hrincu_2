@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius-10">
                <div class="card-body p-0">
                    <div class="table-responsive-md table-responsive">
                        <table class="table-light style-two table">
                            <thead>
                                <tr>
                                    <th>@lang('Organization')</th>
                                    <th>@lang('Contact Info')</th>
                                    <th>@lang('City')</th>
                                    <th>@lang('Industry Sector')</th>
                                    <th>@lang('Services Requested')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Submitted')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $request)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $request->organization_name }}</span><br>
                                            <small class="text-muted">{{ $request->full_name_applicant }}</small>
                                        </td>
                                        <td>
                                            <span>{{ $request->email_number }}</span><br>
                                            <small class="text-muted">{{ $request->mobile_number ?? 'N/A' }}</small>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $request->city->name ?? 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $request->industry_sector }}</span>
                                        </td>
                                        <td>
                                            @if($request->requested_services && is_array($request->requested_services))
                                                <span class="badge bg-info">{{ count($request->requested_services) }} @lang('Services')</span>
                                            @else
                                                <span class="text-muted">@lang('No services')</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $badgeClass = match($request->status) {
                                                    '0' => 'bg-warning',
                                                    '1' => 'bg-success',
                                                    '2' => 'bg-danger',
                                                    default => 'bg-dark'
                                                };
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">@lang(ucfirst($request->status))</span>
                                        </td>
                                        <td>
                                            {{ showDateTime($request->created_at) }}<br>
                                            <small class="text-muted">{{ diffForHumans($request->created_at) }}</small>
                                        </td>
                                        <td>
                                            <div class="button--group">
                                                <a href="{{ route('admin.training-and-qualification-request.show', $request->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="la la-eye"></i> @lang('View')
                                                </a>
                                                
                                                <!-- Status Update Dropdown -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-info dropdown-toggle btn btn-dark" data-bs-toggle="dropdown">
                                                        @lang('Status')
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form action="{{ route('admin.training-and-qualification-request.update', $request->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="0">
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="la la-clock text-warning"></i> @lang('Pending')
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.training-and-qualification-request.update', $request->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="1">
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="la la-check text-success"></i> @lang('Approved')
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('admin.training-and-qualification-request.update', $request->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="2">
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="la la-times text-danger"></i> @lang('Rejected')
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Delete Button -->
                                                <button type="button" class="btn btn-sm btn-outline-danger confirmationBtn" 
                                                        data-question="@lang('Are you sure to delete this training request?')" 
                                                        data-action="{{ route('admin.training-and-qualification-request.destroy', $request->id) }}">
                                                    <i class="la la-trash"></i> @lang('Delete')
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-muted text-center">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($requests->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($requests) }}
                    </div>
                @endif
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
