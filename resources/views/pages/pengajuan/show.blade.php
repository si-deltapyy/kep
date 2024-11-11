{{--
<table border="1">
    <thead>
        <tr>
            <td>No</td>
            <td>Judul Dokumen</td>
            <td>Status</td>
            @foreach($dummy as $x)
                @if($x->doc_status == 'new-proposal')
                <td>Action</td>
                @elseif($x->doc_status == 'on-review')
                <td>Note</td>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($dummy as $x)
        <tr>
            <td>{{$x->id}}</td>
            <td>{{$x->title}}<br>
                @foreach($doc as $xp)
                    - {{$xp->doc_name}}
                    @if($x->doc_status == 'new-proposal')
                    <a href="/storage/{{$x->doc_path}}" target="_blank" rel="noopener noreferrer">**</a>
                    @endif
                    <br>
                @endforeach
            </td>
            <td>{{$x->doc_status}}</td>
            @if($x->doc_status == 'new-proposal')
                <td>
                     <a href="{{ route('sekretariat.pengajuan.expedited', $x->doc_group) }}">Expedited</a>
                    <a href="{{ route('sekretariat.pengajuan.extempted', $x->doc_group) }}">Extempted</a>
                    <a href="{{ route('sekretariat.pengajuan.all', $x->doc_group) }}">All Review</a>
                </td>
                @elseif($x->doc_status == 'on-review')
                <td>Note</td>
                @endif
        </tr>
        @endforeach
    </tbody>
</table> --}}

@extends('layouts.app')
 @section('title')
 <x-page-tittle :title="'List Ajuan Ethical Clereance'" :slash1="'Daftar Ajuan'" :slash2="'List'" :slash3="''"></x-page-tittle>
 @endsection

 @section('content')
 <div class="grid grid-cols-1 p-0 md:p-4">
     <div class="sm:-mx-6 lg:-mx-8">
         <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
             {{-- table --}}
                <!-- resources/views/somepage.blade.php -->
                @php
                // Data
                $head1 = ['ID', 'Judul Usulan', 'Status'];
                $data2 = $doc->map(function($dat){
                    return [
                        'name' => $dat->doc_name,
                        'path' => $dat->doc_path,
                    ];
                });

                $data1 = $dummy->map(function($docs) {
                    return [
                        'id' => $docs->id,
                        'Judul' => $docs->title,
                        'Status' => $docs->doc_status,
                        ];
                });

                $actions1 = $doc->mapWithKeys(function ($doc) {
                    return [
                        $doc->id => '
                            <a href="'. route('sekretariat.pengajuan.expedited', $doc->doc_group) .'">Expedited</a>
                            <a href="'. route('sekretariat.pengajuan.extempted', $doc->doc_group) .'">Extempted</a>
                            <a href="'. route('sekretariat.pengajuan.all', $doc->doc_group) .'">All Review</a>
                    '
                    ];
                })->toArray();
                @endphp
                <x-table
                    :head="$head1"
                    :data="$data1->toArray()"
                    :data1="$data2->toArray()"
                    :actionHeader="true"
                    :actionColumn="$actions1"
                    :actionSelect="true"
                />
            </div>
         </div>
         <!--end div-->
     </div>
     <!--end div-->
 </div>
 <!--end grid-->
 @endsection










