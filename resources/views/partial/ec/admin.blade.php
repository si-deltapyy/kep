
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">

    @if ($doc->isEmpty())
        <div class="mb-4 justify-center">
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium text-center text-red-600"><i data-lucide="ban" class="w-4 h-4 inline-block me-2"></i>Belum ada Penerbitan EC Document</h1>
            </div>
        </div>
    @else
        @foreach ($doc as $x)
        <div class="mb-4">
            <div>
                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium">{{$x->title}}</h1>
                <div class="mb-3 mt-3">
                <table>
                    <li>{{$x->doc_name}}</li>
                </table>
                </div>
                @if ($x->ec_status == 'Waiting Sign KPPM')
                    <a href="" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                        <i class="ti ti-plus me-1"></i>
                        <span data-lucide="arrow-right" class="w-4 h-4 inline-block me-2"></span>
                        Request Sign KPPM
                    </a>
                    @if ($x->ethical_number==null)
                        <button
                            type="button"
                            data-fc-type="modal"
                            data-fc-target="modal-primary"
                            data-id="{{$x->id}}"
                            class="px-2 py-1 lg:px-4 bg-transparent text-primary text-sm rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium"
                            >
                            Beri Penomoran Ethical Clearence
                        </button>
                    @else
                        edit
                    @endif

                @elseif($x->ec_status == 'Signed')
                <a href="{{route('admin.ec.publish', $x->id)}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-right" class="w-4 h-4 inline-block me-2"></span>
                    Publish to User
                </a>
                @elseif($x->ec_status == 'Process')
                <a href="#" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white" disabled>
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-right" class="w-4 h-4 inline-block me-2"></span>
                    Waiting....
                </a>
                <button
                            type="button"
                            data-fc-type="modal"
                            data-fc-target="modal-edit"
                            data-id="{{$x->id}}"
                            class="px-2 py-1 lg:px-4 bg-transparent text-primary text-sm rounded transition hover:bg-primary-500 hover:text-white border border-primary font-medium"
                            >
                            Beri Penomoran Ethical Clearence
                        </button>
                @else
                <a href="{{route('admin.pengajuan.index')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-left" class="w-4 h-4 inline-block me-2"></span>
                    Kembali

                </a>
                <a href="{{route('user.ajuan.index')}}" class="ml-2 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="download" class="w-4 h-4 inline-block me-2"></span>
                    Download

                </a>
                @endif
                <a href="{{ route('admin.ec.previewPDF', ['id' => $x->id]) }}" target="blank"
                    class='px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white'>Preview</a>
                    <a href="{{ route('admin.ec.log', ['id' => $x->id]) }}" target="blank"
                        class='px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white'>Log</a>
                </div>
            </div>
        </div>

        @endforeach




        <div class="modal animate-ModalSlide hidden" id="modal-primary">
            <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
                <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                    <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                        <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Input Ethical Number</h6>
                        <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
                    </div>
                    <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                        <form action="{{route('admin.ec.reqSign', $x->id)}}" method="POST">
                            @csrf
                            <!-- Hidden Inputs -->
                            <input type="text" id="data-id" hidden>
                            <x-input title="Masukan Ethical Number" id="ethical_number" placeholder="…../UN27.02.11/PP/EC/202…" name="ethical_number" type="text" class="form-control"/>

                            <div class="flex flex-wrap shrink-0 justify-end p-3 rounded-b border-t border-dashed">
                                <button type="button" class="inline-block text-red-500 hover:bg-red-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                                <button type="submit" class="inline-block text-primary-500 hover:bg-primary-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animate-ModalSlide hidden" id="modal-edit">
            <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
                <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                    <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                        <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="staticBackdropLabel1">Input Ethical Number</h6>
                        <button type="button" class="box-content w-4 h-4 p-1 bg-slate-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
                    </div>
                    <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                        <form action="{{route('admin.ec.reqSign', $x->id)}}" method="POST">
                            @csrf
                            <!-- Hidden Inputs -->
                            <input type="text" id="data-id" hidden>
                            <x-input title="Masukan Ethical Number (…../UN27.02.11/PP/EC/202…)" value="…../UN27.02.11/PP/EC/202…" id="ethical_number" name="ethical_number" type="text" class="form-control"/>

                            <div class="flex flex-wrap shrink-0 justify-end p-3 rounded-b border-t border-dashed">
                                <button type="button" class="inline-block text-red-500 hover:bg-red-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
                                <button type="submit" class="inline-block text-primary-500 hover:bg-primary-500 hover:text-white border border-gray-200 text-sm font-medium py-1 px-3 rounded">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>


{{-- Modal --}}




@push('pages-script')

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Tambahkan event listener untuk semua tombol yang memicu modal
    document.querySelectorAll('[data-fc-type="modal"]').forEach(button => {
        button.addEventListener('click', function () {
            // Ambil target modal dari atribut
            const modalTarget = button.getAttribute('data-fc-target');
            const modal = document.getElementById(modalTarget);

            if (!modal) {
                console.error(`Modal dengan ID "${modalTarget}" tidak ditemukan.`);
                return;
            }

            // Ambil data dari tombol
            const dataId = button.getAttribute('data-id');

            // Isi input di modal dengan data dari tombol
            document.getElementById('data-id').value = dataId || '';

            modal.classList.remove('hidden');
        });
    });

    // Event listener untuk menutup modal
    document.querySelectorAll('[data-fc-dismiss]').forEach(button => {
        button.addEventListener('click', function () {
            const modal = button.closest('.modal');
            if (modal) {
                modal.classList.add('hidden');
            }
        });
    });
});
</script>
@endpush
