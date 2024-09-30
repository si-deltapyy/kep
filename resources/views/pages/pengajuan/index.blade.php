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
