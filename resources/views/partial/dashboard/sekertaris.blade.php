@can('update-password')
    <div class="modal animate-ModalSlide" id="modal-primary">
        <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                <!-- Header Modal -->
                <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                    <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="modalLabel">Ubah Password</h6>
                </div>

                <!-- Body Modal -->
                <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                    <p>Harap Mengganti <strong>Password</strong> dahulu dengan syarat:</p>
                    <li class=" text-gray-400"><i>Minimal 8 Karakter</i></li>
                    <li class=" text-gray-400"><i>Harus ada huruf kecil dan angka</i></li>
                    <br>
                    <form action="{{ route('sekertaris.update-password') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password Baru</label>
                            <input type="password"
                                class="form-control w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:border-gray-600 dark:text-gray-300 @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Masukkan Password Baru">
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end p-3 rounded-b border-t border-dashed dark:border-gray-700">
                            <button type="submit"
                                    class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded">
                                <i class="fas fa-key mr-1"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcan


@can('done-password')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
    <!-- Card Jumlah Ajuan -->
    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-primary-500/10 rounded-full text-primary-500 dark:bg-primary-400/20 dark:text-primary-400">
            <span data-lucide="file-input" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Dokumen Masuk</h3>
            <p class="mt-2 text-3xl font-bold text-primary-500 dark:text-primary-400">{{ $newProposalSek }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Ajuan yang telah diajukan.</p>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-purple-500/10 rounded-full text-purple-500 dark:bg-purple-400/20 dark:text-purple-400">
            <span data-lucide="book-open-check" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Proses Review</h3>
            <p class="mt-2 text-3xl font-bold text-purple-500 dark:text-purple-400">{{ $jumOnRevSek }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Dokumen dalam proses</p>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-purple-500/10 rounded-full text-purple-500 dark:bg-purple-400/20 dark:text-purple-400">
            <span data-lucide="book-open-check" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Dokumen Selesai</h3>
            <p class="mt-2 text-3xl font-bold text-purple-500 dark:text-purple-400">{{ $jumDone }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Dokumen dalam proses</p>
        </div>
    </div>

</div>

@endcan
