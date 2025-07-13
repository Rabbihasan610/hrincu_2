@extends('admin.layouts.app', ['title' => 'Training Path'])
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
                                    <th>@lang('Image')</th>
                                    <th>@lang('Title')</th>
                                    {{-- <th>@lang('Description')</th> --}}
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td> {{ $loop->index + 1 }} </td>
                                        <td> <img src="{{ getImage(getFilePath('trainingpath') . '/' . $service->image) }}" alt="image" class="rounded" style="width: 50px"> </td>
                                        <td> {{ $service->lang('title') }} </td>
                                        {{-- <td> {{ Str::limit($service->lang('description'), 50) }} </td> --}}
                                        <td>
                                            <x-status :data="$service" :url="route('admin.trainingpath.status', $service->id)" />
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javascript:void(0)" class="isShow"
                                                            data-question="Training Path Information"
                                                            data-image="{{ getImage(getFilePath('service') . '/' . $service->image) }}"
                                                            data-title="{{ $service->lang('title') }}"
                                                            data-status="{{ $service->status ? 'Active' : 'Inactive' }}">
                                                            <i class="las la-desktop"></i>@lang('Detail')
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.trainingpath.edit', $service->id) }}">
                                                            <i class="bi bi-pencil"></i>@lang('Edit')
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('admin.trainingpath.duplicate', $service->id) }}">
                                                            <i class="bi bi-clipboard-plus"></i>@lang('Duplicate')
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="confirmationBtn"
                                                            data-action="{{ route('admin.trainingpath.delete', $service->id) }}"
                                                            data-question="@lang('Are you sure to delete this training path?')">
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

    <x-show />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.trainingpath.create') }}" class="btn btn-primary"> <i class="fa-solid fa-plus"></i>@lang('Add New')</a>
    </div>
@endpush
