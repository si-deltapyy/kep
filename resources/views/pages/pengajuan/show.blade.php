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
            @if ($dums->doc_status != 'approved')
            <h2 class="mb-2 font-medium">PROSES AJUAN: </h2>
            <form action="{{route('sekretariat.pengajuan.expedited', $dums->doc_group)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    Expedited
                </button>
            </form>
            <form action="{{route('sekretariat.pengajuan.extempted', $dums->doc_group)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-green-100 text-red text-sm rounded hover:bg-red-600 hover:text-white"
                    >Extempted
                </button>
            </form>
            <form action="{{route('sekretariat.pengajuan.all', $dums->doc_group)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    All Reviewer
                </button>
            </form>
            @endif
             {{-- table --}}
                <!-- resources/views/somepage.blade.php -->
                @php
                // Data
                $head1 = ['ID', 'File Usulan'];
                $data2 = $doc->map(function($dat){
                    return [
                        'name' => $dat->doc_name,
                        'path' => $dat->doc_path,
                    ];
                });

                $data1 = $doc->map(function($docs) {
                    return [
                        'id' => $docs->id,
                        'File Usulan' => $docs->doc_name,

                        ];
                });

                if($dums->doc_status != 'approved'){
                    $actions1 = $doc->mapWithKeys(function ($doc) {
                        return [
                            $doc->id => '
                                <a href="/storage/' . $doc->doc_path . '" target="_blank" rel="noopener noreferrer">Lihat</a>
                        '
                        ];
                    })->toArray();
                }else{
                    $actions1 = $doc->mapWithKeys(function ($doc) {
                        return [
                            $doc->id => '
                                <p>-</p>
                        '
                        ];
                    })->toArray();
                }

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










