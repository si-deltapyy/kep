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
    // Cek status dokumen
    if ($doc->doc_status === 'new-proposal') {
        return [
            $doc->id => '
                <button
                    type="button"
                    data-fc-type="modal"
                    data-fc-target="modal-primary"
                    class="px-2 py-1 lg:px-4 bg-transparent text-primary text-sm rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium"
                    onclick="handleButtonClick(' . $doc->id . ')">
                    Proses Ajuan
                </button>
            '
        ];
    }

    return [$doc->id => '
    <button class="px-2 py-1 lg:px-4 bg-slate-100  text-gray-600 text-sm  rounded hover:bg-slate-200 border border-slate-100" disabled>Terproses</button>
    '];
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
                        return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Rejected</span>';

                    default:
                        return $cell;
                            }
                        }
                    ];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
    <!-- Card 1 -->
    <div class="col-span-1">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900 rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-center">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">{{ $nama[0]->name }}</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $num['sek1'] }}</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="book-open-check" class="h-16 w-16 stroke-primary-500/30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="col-span-1">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900 rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-center">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">{{ $nama[1]->name }}</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $num['sek2'] }}</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="book-open-check" class="h-16 w-16 stroke-primary-500/30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="col-span-1">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900 rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-center">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">{{ $nama[2]->name }}</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $num['sek3'] }}</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="book-open-check" class="h-16 w-16 stroke-primary-500/30"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div
                class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20"
                id="orders"
                role="tabpanel"
                aria-labelledby="orders-tab"
                >


        <div class="grid grid-cols-1 p-0 md:p-4">
            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                    {{-- table --}}
                    <x-table
                        :head="$head1"
                        :data="$data1->toArray()"
                        :actionHeader="true"
                        :actionSelect="true"
                        :actionColumn="$actions1"
                        :customColumns="$customColumns"
                    />
                </div>
                </div>
                <!--end div-->
            </div>
            <!--end div-->
        </div>
        <!--end grid-->
</div>


<div class="modal animate-ModalSlide hidden" id="modal-primary">
    <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
        <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
            <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Assign Dokumen</h6>
                <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
            </div>
            <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                <form action="{{ route('admin.pengajuan.store') }}" method="POST">
                    @csrf
                    <!-- Input untuk menyimpan ID ajuan -->
                    <input type="hidden" id="doc-id-input" name="id" value="">

                    <label for="sekertaris">Sekretaris</label>
                    <select name="sekertaris" id="sekertaris">
                        <option value="">Pilih Sekretaris</option>
                        @foreach ($sekertaris as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>

                    <div class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                        <button class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                        <button type="submit" class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Button Assign Ajuan --}}
<script>
   function handleButtonClick(docId) {
    console.log('Document ID:', docId);
    // Set nilai ID ke input hidden di form
    document.getElementById('doc-id-input').value = docId;

}

</script>
