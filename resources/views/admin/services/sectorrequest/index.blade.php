@extends('admin.layouts.app', ['title' => 'Service Requests'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Sl')</th>
                                    <th>@lang('Sectors')</th>
                                    <th>@lang('Full Name')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Mobile')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td> {{ $loop->index + 1 }} </td>
                                        <td> {{ $service?->sector?->lang('title') }}  </td>
                                        <td> {{ $service->name }} </td>
                                        <td> {{ $service->email }} </td>
                                        <td> {{ $service->phone }} </td>
                                        <td>
                                            <x-status :data="$service" :url="route('admin.sector.request.status', $service->id)" />
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">

                                                    <li>
                                                        <a href="{{ route('admin.sector.request.show', $service->id) }}">
                                                            <i class="bi bi-eye"></i>@lang('Details')
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0)" class="confirmationBtn"
                                                            data-action="{{ route('admin.sector.request.delete', $service->id) }}"
                                                            data-question="@lang('Are you sure to delete this?')">
                                                            <i class="bi bi-trash"></i>@lang('Delete')
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
                @if ($services->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($services) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
    </div>
@endpush
