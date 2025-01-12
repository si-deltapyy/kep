@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Manage Reviewer'" :slash1="'Administrator'" :slash2="'Manage User'" :slash3="'Reviewer'"></x-page-tittle>
@endsection

@section('content')
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            <a href="{{ route('superadmin.manage.reviewer.create') }}" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">
                Add Reviewer</a>
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            {{-- @php
                $head=['ID', 'Nama', 'Email'];
                $data1 = $user->map(function($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ];
                });

                $actions1 = $user->mapWithKeys(function ($user) {
                    return [
                        $user->id => '
                        <form action="'. route('superadmin.manage.user.destroy', $user->id) .'" method="post">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button class="px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-green-100 text-red text-sm rounded hover:bg-red-600 hover:text-white" type="submit">Hapus</button>
                        </form>
                        <a href="'. route('superadmin.manage.user.edit', $user->id) .'" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">Edit</a>
                    '
                    ];
                })->toArray();
            @endphp --}}
            {{-- <x-table
                :head="$head"
                :actionHeader="true"
                :actionSelect="true"
                :actionColumn="$actions1"
                :data="$data1"
            /> --}}
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
@endsection