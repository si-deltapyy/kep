{{--

@foreach ($user as $x)
<table>
    <tr>
        {{ $x->name }}
        {{ $x->email }}
        {{ $x->id }}
        <a href="{{ route('admin.sekertaris.create') }}">Edit</a>
    </tr>
</table>


@endforeach --}}


@php
// Data
$head1 = ['Id', 'Name', 'Email'];
$data1 = $user->map(function($x) {
    return [
        'id' => $x->id,
        'name' => $x->name,
        'email' => $x->email,
    ];
});

$actions1 = $user->mapWithKeys(function ($x) {
    return [
        $x->id => '
            <a href="' . route('admin.sekertaris.edit', $x->id) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">Edit</a>
        '
    ];
})->toArray();
@endphp

@extends('layouts.app')
@section('title')
    <x-page-tittle :title="'List Users'" :slash1="'Users'" :slash2="'List'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">

            <x-table
                :head="$head1"
                :data="$data1->toArray()"
                :actionHeader="true"
                :actionSelect="true"
                :actionColumn="$actions1"
            />
        </div>
    </div>
</div>
@endsection

