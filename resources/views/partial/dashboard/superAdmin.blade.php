<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
    <!-- Card Jumlah Ajuan -->
    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-primary-500/10 rounded-full text-primary-500 dark:bg-primary-400/20 dark:text-primary-400">
            <span data-lucide="file-input" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Jumlah Ajuan</h3>
            <p class="mt-2 text-3xl font-bold text-primary-500 dark:text-primary-400">{{ $jumlahAjuan }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Ajuan yang telah diajukan.</p>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-purple-500/10 rounded-full text-purple-500 dark:bg-purple-400/20 dark:text-purple-400">
            <span data-lucide="book-open-check" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">On Review</h3>
            <p class="mt-2 text-3xl font-bold text-purple-500 dark:text-purple-400">{{ $jumlahOnReview }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Dokumen dalam proses</p>
        </div>
    </div>

    <!-- Card Jumlah User -->
    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-green-500/10 rounded-full text-green-500 dark:bg-green-400/20 dark:text-green-400">
            <span data-lucide="user-check" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Reviewer</h3>
            <p class="mt-2 text-3xl font-bold text-green-500 dark:text-green-400">{{ $jumlahUser }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Reviewer</p>
        </div>
    </div>

    <!-- Card Jumlah Dokumen -->
    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="p-4 bg-yellow-500/10 rounded-full text-yellow-500 dark:bg-yellow-400/20 dark:text-yellow-400">
            <span data-lucide="bell-ring" class="w-10 h-10 inline-block "></span>
        </div>
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Requested User</h3>
            <p class="mt-2 text-3xl font-bold text-yellow-500 dark:text-yellow-400">{{ $jumlahReq }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Dokumen yang tersedia.</p>
        </div>
    </div>

</div>
