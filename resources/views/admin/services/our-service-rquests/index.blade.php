@extends('admin.layouts.app', ['title' => 'Service Requests'])
@section('panel')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('Service Requests')</h3>
                    <div class="card-tools">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input type="text" name="search" class="form-control" placeholder="@lang('Search')" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('Service')</th>
                                <th>@lang('Organization')</th>
                                <th>@lang('Submitted At')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($serviceRequests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ $request->ourService->lang('title') }}</td>
                                    <td>{{ $request->organization_name }}</td>
                                    <td>{{ $request->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <span class="badge bg-{{
                                            $request->status == 'pending' ? 'warning' :
                                            ($request->status == 'approved' ? 'success' :
                                            'danger')
                                        }}">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.our-services-request.show', $request) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.our-services-request.destroy', $request) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">@lang('No service requests found')</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $serviceRequests->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
