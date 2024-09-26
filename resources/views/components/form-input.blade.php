<!-- /resources/views/components/form-index.blade.php -->

@props([
    'method' => 'POST',
    'action',
    'hasFiles' => true,
])

<form
    method="{{ $method !== 'GET' ? 'POST' : 'GET' }}"
    action="{{ $action }}"
    {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
    {{ $attributes->except(['method', 'action']) }}
>
    @csrf
    @method($method)

    {{ $slot }}
</form>
