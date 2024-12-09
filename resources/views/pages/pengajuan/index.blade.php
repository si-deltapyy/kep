{{-- <div>
    Simplicity is the essence of happiness. - Cedric Bledsoe
</div>
<div>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Judul Usulan</td>
                <td>Pengusul</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($doc as $x)
            <tr>
                <td>-</td>
                <td>{{$x->title}}</td>
                <td>{{$x->user_id}}</td>
                <td>{{$x->doc_status}}</td>
                <td>
                    @if($x->doc_status == 'new-proposal')
                    <a href="{{ route('sekretariat.pengajuan.show', $x->doc_group) }}">Lihat Dokumen</a>
                    @elseif($x->doc_status == 'on-review')
                    <a href="{{ route('sekretariat.pengajuan.show', $x->doc_group) }}">Cek</a>
                    @elseif($x->doc_status == 'approved')
                    <a href="{{ route('sekretariat.upload.ec', $x->doc_group) }}">Kelola EC</a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

 --}}

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
                $head1 = ['ID', 'Usulan', 'Status'];
                $data1 = $doc->map(function($docs) {
                    return [
                        'id' => $docs->id,
                        'Judul Usulan' => $docs->title,
                        'Status' => $docs->doc_status,
                        ];
                });

                $actions1 = $doc->mapWithKeys(function ($doc) {
                    return [
                        $doc->id => '
                            <form action="' . route('sekretariat.pengajuan.show', $doc->doc_group) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field("DELETE") . '
                                <button type="submit" class="px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-green-100 text-red text-sm rounded hover:bg-red-600 hover:text-white">Hapus</button>
                            </form>
                            <a href="' . route('sekretariat.pengajuan.show', $doc->doc_group) . '" class="px-2 py-1 bg-blue-500/10 border border-transparent collapse:bg-blue-100 text-blue text-sm rounded hover:bg-blue-600 hover:text-white">Cek</a>
                        '
                    ];
                })->toArray();
                @endphp
                <x-table
                    :head="$head1"
                    :data="$data1->toArray()"
                    :actionHeader="true"
                    :actionSelect="true"
                    :actionColumn="$actions1"
                />
            </div>
         </div>
         <!--end div-->
     </div>
     <!--end div-->
 </div>
 <!--end grid-->
 @endsection
