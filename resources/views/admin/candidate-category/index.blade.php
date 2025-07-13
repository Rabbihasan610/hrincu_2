@extends('admin.layouts.app', ['title' => 'Candidate Category'])
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
                                    <th>@lang('Name')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($datas as $data)
                                    <tr>
                                        <td>{{  $loop->index + 1 }}</td>

                                        <td> {{ $data?->lang('name') }} </td>

                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.candidate-category.edit', $data->id) }}">
                                                            <i class="bi bi-pencil"></i>@lang('Edit')
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="confirmationBtn"
                                                            data-action="{{ route('admin.candidate-category.delete', $data->id) }}"
                                                            data-question="@lang('Are you sure to delete this candidate category?')">
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
                @if ($datas->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($datas) }}
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
        <a href="{{ route('admin.candidate-category.create') }}" class="btn btn-primary"> <i class="fa-solid fa-plus"></i>@lang('Add New')</a>
    </div>
@endpush
