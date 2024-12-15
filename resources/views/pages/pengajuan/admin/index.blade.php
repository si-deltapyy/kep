 @php
 // Data
    $head1 = ['ID', 'Usulan', 'Status'];
    $data1 = $doc->map(function($docs) {
        return [
            'id' => $docs->id,
            'Judul Usulan' => $docs->title,
            'Status' => $docs->doc_status,
            ];
    });

    $actions1 = $doc->mapWithKeys(function ($doc) {
        return [
            $doc->id => '
                <a href="' . route('admin.pengajuan.assign', $doc->id) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">Proses Dokumen</a>
            '
        ];
    })->toArray();
 @endphp
 
 @extends('layouts.app')
 @section('title')
 <x-page-tittle :title="'List Ajuan Ethical Clereance'" :slash1="'Daftar Ajuan'" :slash2="'List'" :slash3="''"></x-page-tittle>
 @endsection

 @section('content')
    @include('partial.dokumen.admin')
 @endsection
