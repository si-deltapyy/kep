<!-- /resources/views/components/input.blade.php -->

@props([
    'name',
    'type',
    'id',
    'title'
])
<label for="{{$id}}">
    {{$title}}
</label>

<input
    name="{{ $name }}"
    id="{{ $id }}"
    type="{{$type}}"
    {{ $attributes->merge([ 'class' => 'form-control',]) }}

    @required(true)
/>
