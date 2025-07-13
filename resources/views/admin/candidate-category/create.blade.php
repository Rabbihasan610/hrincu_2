@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.candidate-category.store', @$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ old('name', @$data->name) }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" required
                                value="{{ old('name_ar', @$data->name_ar) }}">
                        </div>


                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.candidate-category.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

@push('script')
    <script>
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    </script>
@endpush

