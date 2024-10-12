{{-- <table border="1">
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($user as $x)
        <tr>
            <td>{{$x->name}}</td>
            <td>{{$x->email}}</td>
            <td>
                <form action="{{route('sekretariat.review.destroy', $x->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
                <a href="{{route('sekretariat.review.edit', $x->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table> --}}

@php
// Data
$head1 = ['ID', 'Name', 'Email'];
$data1 = $user->map(function($user) {
    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'created_at' => $user->created_at,
    ];
})->toArray();
$actions1 = $user->mapWithKeys(function ($user) {
    return [
        $user->id => '
            <a href="' . route('sekretariat.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>  '
    ];
})->toArray();

@endphp

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'List Reviewer'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            <x-table
            :head="$head1"
            :data="$data1"
            :actionHeader="true"
            :actionColumn="$actions1"
        />
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
@endsection
