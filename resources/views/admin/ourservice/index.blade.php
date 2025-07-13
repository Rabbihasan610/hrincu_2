@extends('admin.layouts.app', ['title' => 'Our Services'])
@section('panel')
<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.our-services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> @lang('Add Service')
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('Icon')</th>
                            <th>@lang('Title') (@lang('EN'))</th>
                            <th>@lang('Title') (@lang('AR'))</th>
                            <th>@lang('Slug')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Items Count')</th>
                            <th>@lang('Extra Fields')</th>
                            <th>@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td>{{ $loop->iteration + (($services->currentPage() - 1) * $services->perPage()) }}</td>
                            <td>
                                @if($service->icon)
                                    @if(filter_var($service->icon, FILTER_VALIDATE_URL))
                                        <img src="{{ $service->icon }}" alt="Icon" style="max-width: 30px; max-height: 30px;">
                                    @else
                                        <i class="{{ $service->icon }}"></i>
                                    @endif
                                @endif
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->title_ar }}</td>
                            <td>{{ $service->slug }}</td>
                            <td>
                                <span class="badge bg-{{ $service->status == 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($service->status) }}
                                </span>
                            </td>
                            <td>{{ safe_count($service->items) }}</td>
                            <td>{{ safe_count($service->form_extra_fields) }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.our-services.edit', $service->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.our-services.destroy', $service->id) }}" method="POST" class="d-inline btn-danger">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this service?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">@lang('No services found.') <a href="{{ route('admin.our-services.create') }}">@lang('Create one now')</a>.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($services->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $services->links() }}
                </div>
            @endif
        </div>
    </div>
</div>


@endsection

@push('css')
<style>
    .badge {
        font-size: 0.85em;
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }
</style>
@endpush
