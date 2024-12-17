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
            <button type="button" data-fc-type="modal" data-fc-target="modal-primary" class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium">
        Primary
    </button>
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



