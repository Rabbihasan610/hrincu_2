@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.sectors.store', @$service->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <label class="form-label">@lang('Image') <span class="text-danger fs-6">*</span></label>
                        <x-image-uploader image="{{ @$service->image }}" name="image" class="w-100" type="sector"/>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Title') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title" class="form-control" required
                                value="{{ old('title', @$service->title) }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Title Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title_ar" class="form-control" required
                                value="{{ old('title_ar', @$service->title_ar) }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Description') <span class="text-danger fs-6">*</span></label>
                            <textarea class="form-control" name="description" required>{{ old('description', @$service->description) }}</textarea>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Description Ar') <span class="text-danger fs-6">*</span></label>
                            <textarea class="form-control" name="description_ar" required>{{ old('description_ar', @$service->description_ar) }}</textarea>
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
    <a href="{{ route('admin.sectors.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

@push('script')
    <script>
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    </script>
@endpush

