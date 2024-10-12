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
        $doc->id => '<form action="' . route('sekretariat.review.destroy', $doc->id) . '" method="post" style="display:inline;">
            ' . csrf_field() .
            method_field('DELETE') . '
            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
        </form>'

    ];
})->toArray();
@endphp

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan Ethical Clereance'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<a href="{{route('user.ajuan.create')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
    <i class="ti ti-plus me-1"></i>
    Ajukan
    <span data-lucide="plus" class="w-4 h-4 inline-block me-2"></span>
</a>
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            <x-table
                            :head="$head1"
                            :data="$data1->toArray()"
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
