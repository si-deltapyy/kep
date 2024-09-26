@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan Ethical Clereance'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
{{-- <div>
    <table border="1" class="table">
        <thead>
            <tr>
                <td>Id</td>
                <td>Judul Usulan</td>
                <td>Tanggal Pengajuan</td>
                <td>Status</td>
                <td>Detail</td>
                @can('resubmission')
                <td>Note</td>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $doc)
            <tr>
                <td>{{$doc->id}}</td>
                <td>{{$doc->title}}</td>
                <td>{{$doc->created_at}}</td>
                <td>{{$doc->doc_status}}</td>
                <td><a href="{{ route('ajuan.detail', $doc->doc_group) }}">cek detail</a></td>
                @can('resubmission')
                <td>Revisi Ulang</td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
<a href="{{route('ajuan.upload')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
    <i class="ti ti-plus me-1"></i>
    Ajukan
    <span data-lucide="plus" class="w-4 h-4 inline-block me-2"></span>
</a>
<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            {{-- table --}}
            <!-- resources/views/somepage.blade.php -->
            <x-table :head="['ID', 'Judul Usulan', 'Status', 'Action']" :data="$doc->map(function($docc) {
                return [
                    $docc->id,
                    $docc->title,
                    $docc->doc_status,
                    'sa',
                ];
            })->toArray()" />
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
@endsection
