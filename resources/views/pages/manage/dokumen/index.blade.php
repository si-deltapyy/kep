@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Manage Type Dokumen'" :slash1="'Administrator'" :slash2="'Manage'" :slash3="'Type Dokumen'"></x-page-tittle>
@endsection

@section('content')
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            <a href="{{ route('superadmin.typedokumen.create') }}" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">
                Tambah Type Dokumen</a>
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            @php
                $head=['ID', 'Nama'];
                $data1 = $dokumen->map(function($dokumen) {
                    return [
                        'id' => $dokumen->id,
                        'name' => $dokumen->name,
                    ];
                });

                $actions1 = $dokumen->mapWithKeys(function ($dokumen) {
                return [
                    $dokumen->id => '
                        <form action="'. route('superadmin.typedokumen.destroy', $dokumen->id) .'" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button class="px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-green-100 text-red text-sm rounded hover:bg-red-600 hover:text-white" type="submit">Hapus</button>
                        </form>

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
