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

        if ($doc->doc_flag == "In Review" && $doc->review_status == "0") {
            $actions .= '
            <a href="#" class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white" onclick="return false;" style="color: gray; cursor: not-allowed;">Waiting for Response</a>
            <a href="' . route('reviewer.dokRev.pils', $doc->id) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">
                    Lanjutkan Review</a>
            ';
        }
        elseif ($doc->review_status == "1") {
            $actions .= '
            done bang
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

    $customColumns = [
            'as' => function ($cell, $row) {
                switch ($cell) {
                    //dark
                    case 'new-proposal':
                        return '<span class="bg-gray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">New Proposal</span>';
                    //yellow
                    case 'process':
                        return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Process</span>';
                    case 'on-review':
                        return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">On Review</span>';
                    //Green
                    case 'approved':
                        return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Approved</span>';
                    case 'approved-with':
                        return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded  ">Approved With</span>';
                    case 'done':
                        return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Done</span>';
                    //Pink
                    case 'resubmission':
                        return '<span class="bg-pink-500/10 text-pink-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Resubmission</span>';
                    case 'revised':
                        return '<span class="bg-pink-500/10 text-pink-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Revised</span>';
                    //Red
                    case 'disapproved':
                        return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Rejected</span>';

                    default:
                        return $cell;
                            }
                        }
                    ];
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
                            :customColumns="$customColumns"
                        />
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
@endsection




