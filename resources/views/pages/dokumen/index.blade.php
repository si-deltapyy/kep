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
            return
            ($doc->doc_status == 'on-review')?
            [
                $doc->id => '
                <a href="' . route('user.ajuan.show', $doc->id) . '"><button type="button" class="px-2 py-1 lg:px-4 bg-blue-500  text-white text-sm  rounded transition hover:bg-blue-200 hover:text-blue-500 order hover:border-blue-500 border-blue-500 font-medium">Lacak Dokumen</button></a>
                <a href="' . route('user.ajuan.edit', $doc->id) . '"><button type="button" class="px-2 py-1 lg:px-4 bg-blue-500  text-white text-sm  rounded transition hover:bg-blue-200 hover:text-blue-500 order hover:border-blue-500 border-blue-500  font-medium">Revisi Dokumen</button></a>
                '
            ]:
            [
                $doc->id => '
                <a href="' . route('user.ajuan.show', $doc->id) . '"><button type="button" class="px-2 py-1 lg:px-4 bg-blue-500  text-white text-sm  rounded transition hover:bg-blue-200 hover:text-blue-500 order hover:border-blue-500 border-blue-500 font-medium">Lacak Dokumen</button></a>
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

@php
    $customColumns = [
            'Status' => function ($cell, $row) {
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
                        return '<span class="bg-pink-500/10 text-pink-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Rejected</span>';

                    default:
                        return $cell;
                            }
                        }
                    ];
@endphp

@section('content')
@role('user')
    @include('partial.dokumen.user')
@endrole

@role('admin')
    @include('partial.dokumen.admin')
@endrole
@endsection
