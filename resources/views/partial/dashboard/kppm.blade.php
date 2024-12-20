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