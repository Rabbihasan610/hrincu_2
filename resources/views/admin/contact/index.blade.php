
@extends('admin.layouts.app', ['title' => __('Queries & Contact Us')])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Created')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Mobile')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($notifications as $notification)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ __($notification->created_at->diffForHumans()) }}</span>
                                        </td>
                                        <td> {{ __($notification->type) }}
                                            @if ($notification->is_read == 0)
                                            <span class="text-muted badge bg-danger text-white" style="color: #fff !important;">{{ __('New') }}</span>
                                            @endif
                                        </td>
                                        <td> {{ $notification->name }} </td>
                                        <td> {{ $notification->mobile }} </td>
                                        <td> {{ $notification->email }} </td>
                                        <td> {{ $notification->country }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.contact.details', $notification->id) }}">
                                                            <i class="bi bi-pencil"></i>@lang('Details')
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>


                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($notifications->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($notifications) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
    </div>
@endpush
