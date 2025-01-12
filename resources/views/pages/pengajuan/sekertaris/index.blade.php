 @php
 // Data
    $head1 = ['ID', 'Usulan', 'Type Ajuan', 'Status'];
    $data1 = $ajuan->filter(function ($docs) {
        return $docs->doc_flag !== 'EC Procces';
    })->map(function ($docs) {
        return [
            'id' => $docs->id,
            'Judul Usulan' => $docs->title,
            'Type Ajuan' => $docs->ajuan_name,
            'Status' => $docs->doc_status,
        ];
    });

    $actions1 = $ajuan->mapWithKeys(function ($doc) {
    $actions = '';

        // Add conditional action for "approved" status
        if ($doc->doc_status == "approved") {
            $actions .= '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Cek di menu EC Document</button>';
        } elseif ($doc->doc_status == "on-review") {
            $actions .= '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Sedang di Review</button>';
        } elseif ($doc->doc_status == "disapproved") {
            $actions .= '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Ajuan sudah ditolak</button>';
        } elseif ($doc->doc_status == "done") {
            $actions .= '<button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Ajuan selesai</button>';
        } else{
            $actions .= '<a href="' . route('sekertaris.pengajuan.show', $doc->id) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">Cek Dokumen</a>';
        }
        return [
            $doc->id => $actions,
        ];
    })->toArray();

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

 @extends('layouts.app')
 @section('title')
 <x-page-tittle :title="'List Ajuan Ethical Clereance'" :slash1="'Daftar Ajuan'" :slash2="'List'" :slash3="''"></x-page-tittle>
 @endsection

 @section('content')
    @include('partial.dokumen.sekretaris')
 @endsection
