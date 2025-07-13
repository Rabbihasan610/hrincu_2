@extends('admin.layouts.app', ['title' => 'Jobs'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Job Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$job->title}}</td>
                                    <td>{{$job->category->name}}</td>
                                    <td>{{@$job->user->name}}</td>
                                    <td>{{$job->deadline}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-bs-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('admin.job.accept', $job->id) }}">Accept</a>
                                                <a class="dropdown-item" href="{{ route('admin.job.reject', $job->id) }}">Reject</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{route('admin.job.show',$job->id)}}"><i class="fa fa-eye"></i></a>
                                        {{-- <a class="btn btn-primary btn-sm" href="{{route('admin.job.edit',$job->id)}}"><i class="fa fa-edit"></i></a> --}}
                                        <a class="btn btn-danger btn-sm" href="{{route('admin.job.delete',$job->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($jobs->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($jobs) }}
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

