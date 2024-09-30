@php
// Data Reviewer
$head1 = ['No', 'Document Name', 'Name', 'Created_at'];
$data1 = $doc->map(function($x, $index) {
    return [
        'id' => $x->id,
        'no' => $index + 1,
        'doc_name' => $x->doc_name,
        'name' => $x->name,
    ];
});

// Define actions based on document ID
$actions1 = $doc->mapWithKeys(function ($x) {
    return [
        $x->id => '
        <a href="' . route('sekretariat.review.edit', $x->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
    ];
})->toArray();
@endphp



@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Ethical Clereance'" :slash1="'Ethical Clereance'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection
@section('content')

<div id="myTabContent">
    <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
        aria-labelledby="all-tab">
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
    </div>
</div>
@endsection
