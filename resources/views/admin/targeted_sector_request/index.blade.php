@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive-md table-responsive">
                        <table class="table table-light style-two">
                            <thead>
                                <tr>
                                    <th>@lang('S.N.')</th>
                                    <th>@lang('Organization')</th>
                                    <th>@lang('Contact Info')</th>
                                    <th>@lang('City')</th>
                                    <th>@lang('Business Type')</th>
                                    <th>@lang('Services Requested')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Submitted')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $request)
                                    <tr>
                                        <td>{{ $requests->firstItem() + $loop->index }}</td>
                                        <td>
                                            <span class="fw-bold">{{ $request->organization_name }}</span>
                                        </td>
                                        <td>
                                            <div>
                                                <strong>@lang('Email'):</strong> {{ $request->email_address }}<br>
                                                <strong>@lang('Mobile'):</strong> {{ $request->mobile_number }}
                                            </div>
                                        </td>
                                        <td>
                                            <span>{{ $request->city->name ?? 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $request->business_type_sector }}</span>
                                        </td>
                                        <td>
                                            @if($request->requested_services)
                                                @foreach($request->requested_services as $service)
                                                    <span class="badge bg-info">{{ \App\Models\OurService::find($service)->lang('title') }}</span> <br>
                                                @endforeach
                                            @else
                                                <span class="text-muted">@lang('N/A')</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($request->status == 0)
                                                <span class="badge bg-warning">@lang('Pending')</span>
                                            @elseif($request->status == 1)
                                                <span class="badge bg-success">@lang('Approved')</span>
                                            @elseif($request->status == 2)
                                                <span class="badge bg-danger">@lang('Rejected')</span>
                                            @else
                                                <span class="badge bg-dark">@lang('Unknown')</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="d-block">{{ showDateTime($request->created_at) }}</span>
                                            <span>{{ diffForHumans($request->created_at) }}</span>
                                        </td>
                                        <td>
                                            <div class="button-group">
                                                <a href="{{ route('admin.targeted_sector_request.show', $request->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="la la-eye"></i> @lang('View')
                                                </a>
                                                
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        @lang('Status')
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('admin.targeted_sector_request.update', $request->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" class="dropdown-item">@lang('Pending')</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.targeted_sector_request.update', $request->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit" class="dropdown-item">@lang('Approve')</button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.targeted_sector_request.update', $request->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="status" value="2">
                                                                <button type="submit" class="dropdown-item">@lang('Reject')</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                                <button class="btn btn-sm btn-outline-danger confirmationBtn" 
                                                        data-action="{{ route('admin.targeted_sector_request.destroy', $request->id) }}" 
                                                        data-question="@lang('Are you sure to delete this request?')">
                                                    <i class="la la-trash"></i> @lang('Delete')
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
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

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-search">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search by organization name, email...')" value="{{ request()->search }}">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
@endpush