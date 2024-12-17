@role('user')
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
                <a href="' . route('user.ajuan.show', $doc->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Cek</a>
                '
            ];
        })->toArray();
    @endphp
@endrole
@role('admin')
@endrole

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan Ethical Clereance'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
@role('user')
    @include('partial.dokumen.user')
@endrole

@role('admin')
    @include('partial.dokumen.admin')
@endrole
@endsection
