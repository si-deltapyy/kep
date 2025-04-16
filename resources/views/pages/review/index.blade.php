@php
// Data
$head1 = ['ID', 'Judul Usulan', 'Id Dummy'];
$data1 = $doc->map(function($doc) {
    return [
        'id' => $doc->id,
        'Judul Usulan' => $doc->doc_name,
        'ID Dummy' => $doc->Dummy->sekertaris_id,
    ];
});

$actions1 = $doc->mapWithKeys(function ($doc) use ($submissionStatuses) {
    // Ambil status dari submissionStatuses berdasarkan log_id
    $status = $submissionStatuses->get($doc->id);

    // Jika status adalah 'done', jangan tampilkan tombol
    if ($status === 'done') {
        return [
            $doc->id => '
            <button
                type="button"
                disable
                class="px-2 py-1 lg:px-4 bg-transparent text-green text-sm rounded transition hover:bg-green-500 hover:text-white border border-green font-medium"
            >
                Dokumen telah direview
            </button>
            '
        ];
    }

    // Jika status tidak 'done', tampilkan tombol
    return [
    $doc->id => '
    <div class="flex items-center gap-3 text-slate-800 dark:text-slate-400">

        <a href="' . asset('/app/' . $doc->doc_path) . '" class="hover:text-purple-600" download title="Download">
            <span data-lucide="download" class="w-5 h-5"></span>
        </a>

        <a href="' . route('reviewer.dokRev.show', $doc->id) . '" target="_blank" class="hover:text-blue-600" title="Preview">
            <span data-lucide="eye" class="w-5 h-5"></span>
        </a>

        <button
            type="button"
            data-fc-type="modal"
            data-fc-target="modal-primary"
            data-doc-id="' . ($doc->id ?? '') . '"
            data-reviewer-id="' . (auth()->id() ?? '') . '"
            data-dummy-id="' . ($doc->doc_group ?? '') . '"
            data-receiver-id="' . ($doc->dummy->sekertaris_id ?? '') . '"
            class="hover:text-blue-600"
            title="Send">
            <span data-lucide="send" class="w-5 h-5"></span>
        </button>

        <form action="' . route('reviewer.dokRev.update', $doc->id) . '" method="POST" class="inline">
            ' . csrf_field() . '
            ' . method_field('PUT') . '
            <input type="hidden" name="doc_id" value="' . $doc->id . '">
            <button type="submit" class="hover:text-green-500" title="Mark as Reviewed">
                <span data-lucide="file-check" class="w-5 h-5"></span>
            </button>
        </form>

    </div>
    '
];
})->toArray();




@endphp
@push('pages-style')
        <!-- Css -->
<link rel="stylesheet" href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/animate.css/animate.min.css')}}">

@endpush

@push('pages-script')

<!-- JS -->
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/pages/sweetalert.init.js')}}"></script>

@endpush

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Review'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')


    <div
                class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20"
                id="orders"
                role="tabpanel"
                aria-labelledby="orders-tab"
                >
    {{-- <button type=c"button" class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-xl  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium">Kirim Pesan</button> --}}
    <a href="{{ route('reviewer.dokRev.feedback', Auth::id()) }}">Beri Feedback Review   </a>
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
                            />
            </div>

            @if ($allDone)
            <form action="{{ route('reviewer.finishReview', $id) }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                >
                    Finish Review
                </button>
            </form>
            @else
            <button type="button" onclick="executeExample('warning')" class=" inline-block focus:outline-none text-slate-500 hover:bg-slate-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-slate-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-slate-500  text-sm font-medium py-1 px-3 rounded mb-1">Finish Review</button>
            @endif


            <!--end div-->
        </div>
        <!--end div-->
    </div>
</div>


<div class="modal animate-ModalSlide hidden" id="modal-primary">
    <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
        <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
            <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Leave a Comment</h6>
                <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
            </div>
            <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <!-- Hidden Inputs -->

                    <input type="hidden" id="doc-id-input" name="doc_id" value="">

                    <input type="hidden" id="doc-dummy-id" name="dummy_id" value="">
                    <input type="hidden" id="doc-reviewer-id" name="reviewer_id" value="">
                    <input type="hidden" id="doc-receiver-id" name="receiver_id" value="">

                    <label for="message" class="font-medium text-sm text-slate-600 dark:text-slate-400">Your message</label>
                    <textarea id="message" name="message" rows="4" class="form-input w-full rounded-md mt-1 border"></textarea>

                    <div class="flex flex-wrap shrink-0 justify-end p-3 rounded-b border-t border-dashed">
                        <button type="button" class="inline-block text-red-500 hover:bg-red-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                        <button type="submit" class="inline-block text-primary-500 hover:bg-primary-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--end grid-->
@endsection

@push('pages-script')
<script>
 document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal-primary');

    // Fungsi untuk membuka modal dengan data yang sesuai
    const openModal = (button) => {
        const dummyId = button.getAttribute('data-dummy-id');
        const docId = button.getAttribute('data-doc-id');
        const reviewerId = button.getAttribute('data-reviewer-id');
        const receiverId = button.getAttribute('data-receiver-id');

        // Isi modal dengan data dari tombol
        document.getElementById('doc-id-input').value = docId || '';
        document.getElementById('doc-dummy-id').value = dummyId || '';
        document.getElementById('doc-reviewer-id').value = reviewerId || '';
        document.getElementById('doc-receiver-id').value = receiverId || '';

        // Tampilkan modal
        modal.classList.remove('hidden');
    };

    // Delegasi event click untuk membuka modal
    document.addEventListener('click', function (event) {
        const button = event.target.closest('[data-fc-target="modal-primary"]');
        if (button) {
            openModal(button);
        }
    });

    // Delegasi event click untuk menutup modal
    modal.addEventListener('click', function (event) {
        if (event.target.hasAttribute('data-fc-dismiss')) {
            modal.classList.add('hidden');
        }
    });

    // Inisialisasi DataTable jika tabel ditemukan
    const tableElement = document.querySelector('#datatable_1');
    if (tableElement) {
        const dataTable = new simpleDatatables.DataTable("#datatable_1", {
            searchable: true,
            fixedHeight: false,
        });

        // Tangani perubahan halaman atau update DataTable
        const rebindModalButtons = () => {
            document.dispatchEvent(new Event('DOMContentLoaded'));
        };

        dataTable.on('datatable.page', rebindModalButtons);
        dataTable.on('datatable.update', rebindModalButtons);
    }
});






</script>
@endpush











