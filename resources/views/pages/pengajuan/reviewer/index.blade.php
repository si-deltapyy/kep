@php
// Data
$head1 = ['ID', 'Judul Usulan', 'Status', 'Review Status'];
$data1 = $doc->map(function($doc) {
    return [
        'id' => $doc->id,
        'Judul Usulan' => $doc->title,
        'as' => $doc->doc_status,
        'Status' => $doc->doc_flag,
    ];
});


$actions1 = $doc->mapWithKeys(function ($doc) {
        $actions = '';

        if ($doc->doc_flag == "In Review") {
            $actions .= '
            <a href="#" class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white" onclick="return false;" style="color: gray; cursor: not-allowed;">Waiting for Response</a>
            <a href="' . route('reviewer.dokRev.pils', $doc->id) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">
                    Lanjutkan Review</a>
            ';
        }
        else{
            $actions .= '<a href="' . route('reviewer.pengajuan.show', $doc->id) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">
                    Review Dokumen</a>';
        }
        return [
            $doc->id => $actions,
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




