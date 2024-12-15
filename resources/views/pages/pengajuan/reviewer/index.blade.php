@php
// Data
$head1 = ['ID', 'Judul Usulan', 'Status'];
$data1 = $doc->map(function($doc) {
    return [
        'id' => $doc->id,
        'Judul Usulan' => $doc->title,
        'Status' => $doc->doc_status,
    ];
});


$actions1 = $doc->mapWithKeys(function ($doc) {
    return [
        $doc->id => '
        <a href="' . route('user.ajuan.show', $doc->doc_group) . '" class="ml-2 text-blue-500 hover:text-blue-700">Cek</a>
        '
    ];
})->toArray();
@endphp

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')

<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            <x-table
                            :head="$head1"
                            :data="$data1->toArray()"
                            :actionHeader="true"
                            :actionSelect="true"
                            :actionColumn="$actions1"
                        />
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
@endsection




