@props([
    'data' => null,
    'url' => ''
])

@if ($data)
    @if ($data->status == 1)
        <a href="{{ $url ?? '#' }}" class="badge bg-success">@lang('Active')</a>
    @else
        <a href="{{ $url ?? '#' }}" class="badge bg-danger">@lang('Inactive')</a>
    @endif
@endif

@push('style')
<style>
    .badge{
        cursor: pointer;
    }
</style>
@endpush


