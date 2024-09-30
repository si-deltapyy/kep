<!-- /resources/views/components/input.blade.php -->

@props([
    'name',
    'type',
    'id',
    'title'
])

<div class="relative z-0 mb-2 w-full group">
<input
    name="{{ $name }}"
    id="{{ $id }}"
    type="{{$type}}"
    {{ $attributes->merge([ 'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-slate-300/60 appearance-none dark:text-slate-300 dark:border-slate-700 dark:focus:border-primary-500 focus:outline-none focus:ring-0 focus:border-primary-500 peer',]) }}
    placeholder=" "
/>
<label for="{{$id}}"
{{ $attributes->merge([ 'class' => 'absolute text-sm text-gray-400 dark:text-slate-400/70 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-primary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6',]) }}>
    {{$title}}
</label>


  </div>
