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
                <a href="' . route('user.ajuan.show', $doc->id) . '"><button type="button" class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-sm  rounded transition hover:bg-primary-500 hover:text-white order border-primary font-medium">Cek</button></a>
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
