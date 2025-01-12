@extends('layouts.app')
 @section('title')
 <x-page-tittle :title="'List Ajuan Ethical Clereance'" :slash1="'Daftar Ajuan'" :slash2="'List'" :slash3="''"></x-page-tittle>
 @endsection

 @section('content')
 <div class="grid grid-cols-1 p-0 md:p-4">
     <div class="sm:-mx-6 lg:-mx-8">
         <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            @if ($dums->doc_status != 'approved' && $dums->doc_status != 'on-review')
            <h2 class="mb-2 font-medium">PROSES AJUAN: </h2>
            <form action="{{route('sekertaris.pengajuan.expedited', $dums->id)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    Expedited
                </button>
            </form>
                <a href="{{route('sekertaris.pengajuan.extempted', $dums->id)}}"
                    class="ml-3 px-2 py-1 bg-yellow-500/10 border border-transparent collapse:bg-yellow-100 text-yellow text-sm rounded hover:bg-yellow-600 hover:text-white"
                    >Extempted
                </a>
            <form action="{{route('sekertaris.pengajuan.all', $dums->id)}}" method="POST" class="inline">
                @csrf
                <button type="submit"
                    class="ml-3 px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    All Reviewer
                </button>
            </form>
            
            <a href="javascript:void(0);"
                onclick="showModal()"
                class="ml-3 px-2 py-1 bg-red-500/10 border border-transparent collapse:bg-red-100 text-red text-sm rounded hover:bg-red-600 hover:text-white"
                >Tolak
            </a>

            <div id="accessModal"
                class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50 hidden"
                style="backdrop-filter: blur(1px);  background-color: rgba(0, 0, 0, 0.1);">
                <div class="bg-white w-1/3 rounded-lg shadow-lg">
                    <div class="flex justify-between items-center bg-gray-100 px-4 py-2">
                        <h2 class="text-lg font-semibold">Peringatan !</h2>
                    </div>
                    <div class="p-4">
                        <p class="text-gray-700">Anda yakin akan ingin <strong>Menolak Dokumen</strong> pengajuan EC ini ?</p>
                    </div>
                    <div class="flex justify-end space-x-4 px-4 py-2">
                        <!-- Tombol Ajukan -->
                        <a href="{{route('sekertaris.pengajuan.rejected', $dums->id)}}"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 flex items-center">
                            <i class="ti ti-plus me-1"></i>
                            <span>Tolak Ajuan EC</span>
                        </a>

                        <!-- Tombol Kembali -->
                        <button onclick="closeModal()"
                                class="px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                            <span>Kembali</span>
                        </button>
                    </div>

                </div>
            </div>
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
                                <a href="/app/' . $doc->doc_path . '" target="_blank" rel="noopener noreferrer">Lihat</a>
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
 <script>
    // Function to show modal
    function showModal() {
        const modal = document.getElementById('accessModal');
        modal.classList.remove('hidden'); // Show modal
    }

    // Function to close modal
    function closeModal() {
        const modal = document.getElementById('accessModal');
        modal.classList.add('hidden'); // Hide modal
    }
</script>
 
 @endsection










