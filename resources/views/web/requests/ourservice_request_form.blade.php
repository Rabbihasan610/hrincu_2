@extends('web.layouts.frontend', ['title' => 'Our Service Request Form'])

@section('content')
    @include('sections.page_banner', ['title' =>  $ourService?->lang('title')])
    <div class="container">
        <div class="row my-3 my-md-5">
            <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('ourservice.submit', $ourService->slug) }}">
                    @csrf

                    <div class="alert small" style="background: #0D47A1; border: none; border-radius: 0 !important">
                        <h5 class="mb-0 text-center text-white">{{ __('Request Form')  }}</h5>
                    </div>

                    <div class="alert small" style="background: linear-gradient(to right, #f5fff4 0%, #f5fff4 100%); border: 0.2 solid #f5fff4  dotted; border-radius: 0 !important">
                        @lang('Please fill in the following information accurately to help us provide the appropriate service.')
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">@lang('Applicant Information')</label>
                        <input type="text" name="organization_name" class="form-control @error('organization_name') is-invalid @enderror" placeholder="Organization Name" value="{{ old('organization_name') }}">
                        @error('organization_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @php
                        $extraFields = old('form_extra_fields', $ourService->form_extra_fields ? json_decode($ourService->form_extra_fields, true) : []);
                    @endphp

                    @if(count($extraFields))
                        @foreach($extraFields as $index => $field)
                            @php
                                $type = $field['type'] ?? 'text';
                                $label = $field['label'] ?? 'Field';
                                $name = "form_extra_fields[{$index}]";
                                $value = old("form_extra_fields.{$index}");

                                $totalFields = count($extraFields);
                                $isSecondLast = $index === $totalFields - 2;
                                $isLast = $index === $totalFields - 1;
                            @endphp

                            @if($isSecondLast)
                                <div class="row">
                            @endif

                            <div class="{{ $isSecondLast || $isLast ? 'col-md-6' : '' }} mb-2">
                                <label class="form-label fw-bold">{{ __($label) }}</label>

                                @if(in_array($type, ['text', 'date', 'number']))
                                    <input type="{{ $type }}" name="{{ $name }}" class="form-control @error("form_extra_fields.{$index}") is-invalid @enderror" value="{{ $value }}">
                                    @error("form_extra_fields.{$index}")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                @elseif($type === 'textarea')
                                    <textarea name="{{ $name }}" class="form-control @error("form_extra_fields.{$index}") is-invalid @enderror" rows="4">{{ $value }}</textarea>
                                    @error("form_extra_fields.{$index}")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                @elseif($type === 'select' && isset($field['options']) && is_array($field['options']))
                                    <select name="{{ $name }}" class="form-select @error("form_extra_fields.{$index}") is-invalid @enderror">
                                        <option value="">Select</option>
                                        @foreach($field['options'] as $option)
                                            <option value="{{ $option }}" @selected($value == $option)>{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error("form_extra_fields.{$index}")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                @elseif(in_array($type, ['checkbox', 'radio']) && isset($field['options']) && is_array($field['options']))
                                    @foreach($field['options'] as $option)
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error("form_extra_fields.{$index}") is-invalid @enderror"
                                                type="{{ $type }}"
                                                name="{{ $name }}{{ $type == 'checkbox' ? "[]" : "" }}"
                                                id="{{ $name }}_{{ $loop->index }}"
                                                value="{{ $option }}"
                                                {{ $type == 'checkbox' ? (is_array($value) && in_array($option, $value) ? 'checked' : '') : ($value == $option ? 'checked' : '') }}
                                            >
                                            <label class="form-check-label" for="{{ $name }}_{{ $loop->index }}">{{ $option }}</label>
                                        </div>
                                    @endforeach
                                    @error("form_extra_fields.{$index}")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            @if($isLast)
                                </div>
                            @endif
                        @endforeach
                    @endif

                    <!-- Notes -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">@lang('Additional notes')</label>
                        <textarea name="additional_notes" class="form-control" rows="4" placeholder="Type your notes">{{ old('additional_notes') }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit" class="btn btn-primary px-4">@lang('Submit Request')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    input,
    select,
    textarea{
        border-radius: 0px !important;
    }
</style>
@endpush
