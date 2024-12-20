@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Manage Sekertaris'" :slash1="'Administrator'" :slash2="'Manage User'" :slash3="'Sekertaris'"></x-page-tittle>
@endsection

@section('content')
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            <a href="{{ route('superadmin.prodi.create') }}" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">
                Tambah Prodi</a>
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            @php
                $head=['ID', 'Nama', 'Prodi Kode'];
                $data1 = $prodi->map(function($prodi) {
                    return [
                        'id' => $prodi->id,
                        'name' => $prodi->name,
                        'prodi_kode' => $prodi->prodi_kode,
                    ];
                });

                $actions1 = $prodi->mapWithKeys(function ($prodi) {
                return [
                    $prodi->id => '
                        <form action="'. route('superadmin.prodi.destroy', $prodi->id) .'" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button class="px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-green-100 text-red text-sm rounded hover:bg-red-600 hover:text-white" type="submit">Hapus</button>
                        </form>
                        <a href="'. route('superadmin.prodi.edit', $prodi->id) .'" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">Edit</a>
                    '
                ];
            })->toArray();

            @endphp
            <x-table
                :head="$head"
                :actionHeader="true"
                :actionSelect="true"
                :actionColumn="$actions1"
                :data="$data1"
            />
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
@endsection
