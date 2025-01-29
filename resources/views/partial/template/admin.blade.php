

@php
// Data
$head1 = ['Id','Nama Template', 'Type'];
$data1 = $temp->map(function($temp) {
    return [
        'id' => $temp->id,
        'Name' => $temp->template_name,
        'Type' => $temp->typeAjuan->ajuan_name,
    ];
});

$actions1 = $temp->mapWithKeys(function ($temp) {
    return [
        $temp->id => '
            <a href="' . asset('admin.template.edit' . $temp->id) . '" class="ml-2 text-blue-500 hover:text-blue-700" download>Edit</a>
        '
    ];
})->toArray();
@endphp


@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Template'" :slash1="'Ajuan'" :slash2="'Template'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<a href="{{ route('admin.template.create') }}"
   class="ml-3 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
    <i data-lucide="download" class="w-4 h-4 inline-block me-2"></i>
    Tambah Template
</a>


<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        @if ($temp->isEmpty())
        <div class="mb-4 justify-center">
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium text-center text-red-600"><i data-lucide="ban" class="w-4 h-4 inline-block me-2"></i>Belum ada Template</h1>
            </div>
        </div>
        @else
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            {{-- table --}}
            <x-table
                :head="$head1"
                :data="$data1->toArray()"
                :actionHeader="true"
                :actionSelect="true"
                :actionColumn="$actions1"
            />
        </div>
        @endif
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->

@endsection


