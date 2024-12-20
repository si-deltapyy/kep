{{-- @if ($sub == 'Progress')
    Review salah Satu Dokumen
    <a href="/reviewer/pengajuan">back</a>
@else
<div>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Judul Usulan</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $x)
            <tr>
                <td>-</td>
                <td>{{$x->doc_name}} - <a href="/storage/{{$x->doc_path}}">Unduh</a></td>
                <td><a href="{{ route('reviewer.dokRev.show', $x->id) }}" target="_blank">lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="/reviewer/pengajuan/">back</a>
@endif --}}


@php
// Data
$head1 = ['ID', 'Judul Usulan'];
$data1 = $doc->map(function($doc) {
    return [
        'id' => $doc->id,
        'Judul Usulan' => $doc->doc_name,
    ];
});

$actions1 = $doc->mapWithKeys(function ($doc) {
                                return [
                                    $doc->id => '<a href="' . asset('storage/' . $doc->doc_path) . '" class="ml-2 text-blue-500 hover:text-blue-700" download>Unduh</a>
                                    <a href="' . route('reviewer.dokRev.show', $doc->id) . '" target="_blank" class="ml-2 text-blue-500 hover:text-blue-700">Lihat PDF</a>'
                                ];
                            })->toArray();
@endphp

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Review'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')

@if ($sub == 'Progress')
    Review salah Satu Dokumen
    <a href="/reviewer/pengajuan">back</a>
@else

<div
                class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20"
                id="orders"
                role="tabpanel"
                aria-labelledby="orders-tab"
                >
    {{-- <button type=c"button" class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-xl  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium">Kirim Pesan</button> --}}
    <a href="{{ route('reviewer.dokRev.feedback', Auth::id()) }}">Beri Feedback Review</a>
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
</div>
@endif
<!--end grid-->
@endsection





