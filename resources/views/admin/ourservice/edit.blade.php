@extends('admin.layouts.app', ['title' => 'Edit Our Service'])
@section('panel')
<div>
    <form action="{{ route('admin.our-services.update', $ourService->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="form-group  my-2">
                    <label for="title">@lang('Title') (@lang('English'))</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $ourService->title) }}" required>
                </div>

                <div class="form-group my-2">
                    <label for="title_ar">@lang('Title') (@lang('Arabic'))</label>
                    <input type="text" name="title_ar" id="title_ar" class="form-control" value="{{ old('title_ar', $ourService->title_ar) }}" required>
                </div>

                <div class="form-group my-2">
                    <label for="status">@lang('Status')</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="active" {{ old('status', $ourService->status) === 'active' ? 'selected' : '' }}>@lang('Active')</option>
                        <option value="inactive" {{ old('status', $ourService->status) === 'inactive' ? 'selected' : '' }}>@lang('Inactive')</option>
                    </select>
                </div>

                <div class="form-group my-2">
                    <label for="icon">@lang('Icon') (@lang('Font Awesome class or image path'))</label>
                    <input type="file" name="icon" id="icon" class="form-control">
                    @if($ourService->icon)
                        <div class="mt-2">
                            <small>Current Icon:</small>
                            @if(str_contains($ourService->icon, 'fa-'))
                                <i class="fas {{ $ourService->icon }}"></i>
                            @else
                                <img src="{{ getImage(getFilePath('service') . '/' . $ourService->icon) }}" alt="Icon" style="max-height: 30px; max-width: 30px;">
                            @endif
                        </div>
                    @endif
                </div>

                <div class="card my-4">
                    <div class="card-header">
                        <h3>@lang('Service Items')</h3>
                        <button type="button" class="btn btn-sm btn-primary" id="add-item">@lang('Add Item')</button>
                    </div>
                    <div class="card-body" id="items-container">
                        @php
                            $items = old('items', $ourService->items ? json_decode($ourService->items, true) : []);
                        @endphp
                        @foreach($items as $index => $item)
                        <div class="d-flex mb-3 item" data-index="{{ $index }}">
                            <div class="col-md-4 mx-2">
                                <input type="text" name="items[{{ $index }}][title]" class="form-control" placeholder="Title (English)" value="{{ $item['title'] ?? '' }}" required>
                            </div>
                            <div class="col-md-4 mx-2">
                                <input type="text" name="items[{{ $index }}][title_ar]" class="form-control" placeholder="Title (Arabic)" value="{{ $item['title_ar'] ?? '' }}">
                            </div>
                            <div class="col-md-1 mx-2">
                                <button type="button" class="btn btn-danger remove-item">@lang('Remove')</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang('Update Service')</button>
                <a href="{{ route('admin.our-services.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
            </div>

            <div class="col-12 col-md-4 col-lg-4">
                <div class="card my-4">
                    <div class="card-header">
                        <h3>@lang('Form Extra Fields')</h3>
                        <button type="button" class="btn btn-sm btn-primary" id="add-extra-field">@lang('Add Field')</button>
                    </div>
                    <div class="card-body" id="extra-fields-container">
                        @php
                            $extraFields = old('form_extra_fields', $ourService->form_extra_fields ? json_decode($ourService->form_extra_fields, true) : []);
                        @endphp
                        @foreach($extraFields as $index => $field)
                        <div class="form-row mb-3 extra-field" data-index="{{ $index }}">
                            <div class="col my-2">
                                <input type="text" name="form_extra_fields[{{ $index }}][label]" class="form-control" placeholder="Label" value="{{ $field['label'] ?? '' }}" required>
                            </div>
                            <div class="col">
                                <select name="form_extra_fields[{{ $index }}][type]" class="form-control field-type" required>
                                    <option value="text" {{ isset($field['type']) && $field['type'] === 'text' ? 'selected' : '' }}>@lang('Text')</option>
                                    <option value="number" {{ isset($field['type']) && $field['type'] === 'number' ? 'selected' : '' }}>@lang('Number')</option>
                                    <option value="email" {{ isset($field['type']) && $field['type'] === 'email' ? 'selected' : '' }}>@lang('Email')</option>
                                    <option value="date" {{ isset($field['type']) && $field['type'] === 'date' ? 'selected' : '' }}>@lang('Date')</option>
                                    <option value="checkbox" {{ isset($field['type']) && $field['type'] === 'checkbox' ? 'selected' : '' }}>@lang('Checkbox')</option>
                                    <option value="radio" {{ isset($field['type']) && $field['type'] === 'radio' ? 'selected' : '' }}>@lang('Radio')</option>
                                    <option value="select" {{ isset($field['type']) && $field['type'] === 'select' ? 'selected' : '' }}>@lang('Select')</option>
                                </select>
                            </div>
                            <div class="col my-2">
                                <div class="form-check">
                                    <input type="checkbox" name="form_extra_fields[{{ $index }}][required]" class="form-check-input" value="1" {{ isset($field['required']) && $field['required'] ? 'checked' : '' }}>
                                    <label class="form-check-label">@lang('Required')</label>
                                </div>
                            </div>
                            <div class="col-auto my-2">
                                <button type="button" class="btn btn-danger remove-field">@lang('Remove')</button>
                            </div>

                            @if(isset($field['type']) && in_array($field['type'], ['select', 'radio', 'checkbox']))
                            <div class="col-12 options-container">
                                <label>@lang('Options (comma separated)')</label>
                                <input type="text"
                                    name="form_extra_fields[{{ $index }}][options]"
                                    class="form-control options-input"
                                    placeholder="Option 1, Option 2, Option 3"
                                    value="{{
                                        is_array($field['options'] ?? null)
                                            ? implode(', ', $field['options'])
                                            : ($field['options'] ?? '')
                                    }}"
                                    required>
                            </div>
                            @else
                            <div class="col-12 options-container d-none">
                                <label>@lang('Options (comma separated)')</label>
                                <input type="text" name="form_extra_fields[{{ $index }}][options]" class="form-control options-input" placeholder="Option 1, Option 2, Option 3">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {

        $('#add-extra-field').click(function() {
            const index = $('.extra-field').length;
            const fieldHtml = `
                <div class="form-row mb-3 extra-field" data-index="${index}">
                    <div class="col my-2">
                        <input type="text" name="form_extra_fields[${index}][label]" class="form-control" placeholder="@lang('Label')" required>
                    </div>
                    <div class="col">
                        <select name="form_extra_fields[${index}][type]" class="form-control field-type" required>
                            <option value="text">@lang('Text')</option>
                            <option value="number">@lang('Number')</option>
                            <option value="email">@lang('Email')</option>
                            <option value="date">@lang('Date')</option>
                            <option value="checkbox">@lang('Checkbox')</option>
                            <option value="radio">@lang('Radio')</option>
                            <option value="select">@lang('Select')</option>
                        </select>
                    </div>
                    <div class="col my-2">
                        <div class="form-check">
                            <input type="checkbox" name="form_extra_fields[${index}][required]" class="form-check-input" value="1">
                            <label class="form-check-label">@lang('Required')</label>
                        </div>
                    </div>
                    <div class="col-auto my-2">
                        <button type="button" class="btn btn-danger remove-field">@lang('Remove')</button>
                    </div>
                    <div class="col-12 options-container d-none">
                        <label>@lang('Options (comma separated)')</label>
                        <input type="text" name="form_extra_fields[${index}][options]" class="form-control options-input" placeholder="@lang('Option 1, Option 2, Option 3')">
                    </div>
                </div>
            `;
            $('#extra-fields-container').append(fieldHtml);
        });

        $('#add-item').click(function() {
            const index = $('.item').length;
            const itemHtml = `
                <div class="d-flex my-3 item" data-index="${index}">
                    <div class="col-md-4 mx-2">
                        <input type="text" name="items[${index}][title]" class="form-control" placeholder="@lang('Title (English)')" required>
                    </div>
                    <div class="col-md-4 mx-2">
                        <input type="text" name="items[${index}][title_ar]" class="form-control" placeholder="@lang('Title (Arabic)')">
                    </div>
                    <div class="col-md-1 mx-2">
                        <button type="button" class="btn btn-danger remove-item">@lang('Remove')</button>
                    </div>
                </div>
            `;
            $('#items-container').append(itemHtml);
        });

        $(document).on('change', '.field-type', function() {
            const fieldType = $(this).val();
            const container = $(this).closest('.extra-field');
            const optionsContainer = container.find('.options-container');
            const optionsInput = container.find('.options-input');

            if (['select', 'radio', 'checkbox'].includes(fieldType)) {
                optionsContainer.removeClass('d-none');
                optionsInput.prop('required', true);
            } else {
                optionsContainer.addClass('d-none');
                optionsInput.prop('required', false);
                optionsInput.val('');
            }
        });

        $(document).on('click', '.remove-field', function() {
            $(this).closest('.extra-field').remove();
            reindexFields('#extra-fields-container', 'form_extra_fields');
        });

        $(document).on('click', '.remove-item', function() {
            $(this).closest('.item').remove();
            reindexFields('#items-container', 'items');
        });

        function reindexFields(containerSelector, fieldName) {
            $(containerSelector).find(fieldName === 'form_extra_fields' ? '.extra-field' : '.item').each(function(index) {
                $(this).attr('data-index', index);
                $(this).find('input, select, textarea').each(function() {
                    const name = $(this).attr('name');
                    if (name) {
                        const newName = name.replace(/\[\d+\]/, `[${index}]`);
                        $(this).attr('name', newName);
                    }
                });
            });
        }
    });
</script>
@endpush
