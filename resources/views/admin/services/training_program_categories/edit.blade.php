@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.trainingprogramcategory.update', @$category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Title') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title" class="form-control" required
                                value="{{ old('title', @$category->title) }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Title Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title_ar" class="form-control" required
                                value="{{ old('title_ar', @$category->title_ar) }}">
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
    <a href="{{ route('admin.trainingprogramcategory.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

@push('script')
    <script>
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    </script>
@endpush

