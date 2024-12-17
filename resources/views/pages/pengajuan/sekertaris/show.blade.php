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
            <form action="{{route('sekertaris.pengajuan.expedited', $dums->id)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    Expedited
                </button>
            </form>
                <a href="{{route('sekertaris.pengajuan.extempted', $dums->id)}}"
                    class="ml-3 px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-green-100 text-red text-sm rounded hover:bg-red-600 hover:text-white"
                    >Extempted
                </a>
            <form action="{{route('sekertaris.pengajuan.all', $dums->id)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="ml-3 px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
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
                    :actionHeader="true"
                    :actionColumn="$actions1"
                    :actionSelect="true"
                />
                <a href="/sekertaris/ajuan"
                    class="ml-3 px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    Kembali
                </a>
            </div>
         </div>
         <!--end div-->
     </div>
     <!--end div-->
 </div>
 
 <!--end grid-->
 
 @endsection










