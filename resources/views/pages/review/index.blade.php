@php
// Data
$head1 = ['ID', 'Judul Usulan'];
$data1 = $doc->map(function($doc) {
    return [
        'id' => $doc->id,
        'Judul Usulan' => $doc->doc_name,
    ];
});

$actions1 = $doc->mapWithKeys(function ($doc) {
    return [
        $doc->id => '
            <a href="' . asset('storage/' . $doc->doc_path) . '" class="ml-2 text-blue-500 hover:text-blue-700" download>Unduh</a>
            <a href="' . route('reviewer.dokRev.show', $doc->id) . '" target="_blank" class="ml-2 text-blue-500 hover:text-blue-700">Lihat PDF</a>
            <button
                type="button"
                data-fc-type="modal"
                data-fc-target="modal-primary"
                data-doc-id="' . ($doc->id ?? '') . '"
                data-reviewer-id="' . (auth()->id() ?? '') . '"
                data-dummy-id="' . ($doc->doc_group ?? '') . '"
                class="px-2 py-1 lg:px-4 bg-transparent text-primary text-sm rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium"
            >
                Message
            </button>
        '
    ];
})->toArray();

@endphp

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Review'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')

@if ($sub == 'Progress')
    Review salah Satu Dokumen
    <a href="/reviewer/pengajuan">back</a>
@else

<div
                class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20"
                id="orders"
                role="tabpanel"
                aria-labelledby="orders-tab"
                >
    {{-- <button type=c"button" class="px-2 py-1 lg:px-4 bg-transparent  text-primary text-xl  rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium">Kirim Pesan</button> --}}
    <a href="{{ route('reviewer.dokRev.feedback', Auth::id()) }}">Beri Feedback Review</a>
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
            <a href="{{ route('message.index') }}">TESTTT</a>

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
                <form action="{{ route('reviewer.message.store') }}" method="POST">
                    @csrf
                    <!-- Hidden Inputs -->
                    <input type="hidden" id="doc-id-input" name="doc_id" value="">
                    <input type="hidden" id="doc-dummy-id" name="dummy_id" value="">
                    <input type="hidden" id="doc-reviewer-id" name="reviewer_id" value="">

                    <label for="message" class="font-medium text-sm text-slate-600 dark:text-slate-400">Your message</label>
                    <textarea id="message" name="review" rows="4" class="form-input w-full rounded-md mt-1 border"></textarea>

                    <div class="flex flex-wrap shrink-0 justify-end p-3 rounded-b border-t border-dashed">
                        <button type="button" class="inline-block text-red-500 hover:bg-red-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                        <button type="submit" class="inline-block text-primary-500 hover:bg-primary-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
<!--end grid-->
@endsection

@push('pages-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Pilih modal
        const modal = document.getElementById('modal-primary');

        // Event listener untuk menampilkan modal
        document.querySelectorAll('[data-fc-target="modal-primary"]').forEach(button => {
            button.addEventListener('click', function () {
                const dummyId = button.getAttribute('data-dummy-id');
                const docId = button.getAttribute('data-doc-id');
                const reviewerId = button.getAttribute('data-reviewer-id');

                // Isi input di modal dengan data dari tombol
                document.getElementById('doc-id-input').value = docId || '';
                document.getElementById('doc-dummy-id').value = dummyId || '';
                document.getElementById('doc-reviewer-id').value = reviewerId || '';
            });
        });
    });
</script>
@endpush











