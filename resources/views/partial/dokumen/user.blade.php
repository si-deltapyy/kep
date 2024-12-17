<a href="javascript:void(0);" 
   onclick="showModal()" 
   class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
    <i class="ti ti-plus me-1"></i>
    Ajukan
    <span data-lucide="plus" class="w-4 h-4 inline-block me-2"></span>
</a>

<a href="{{route('user.template.index')}}" 
   class="ml-3 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
    <i data-lucide="download" class="w-4 h-4 inline-block me-2"></i>
    Download Template
</a>

<div class="grid grid-cols-1 p-0 md:p-4">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
            {{-- table --}}
            <x-table
                :head="$head1"
                :data="$data1->toArray()"
                :actionHeader="true"
                :actionSelect="true"
                :actionColumn="$actions1"
            />
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->

<!-- Modal -->
<div id="accessModal" 
     class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50 hidden"
     style="backdrop-filter: blur(1px);  background-color: rgba(0, 0, 0, 0.1);">
    <div class="bg-white w-1/3 rounded-lg shadow-lg">
        <div class="flex justify-between items-center bg-gray-100 px-4 py-2">
            <h2 class="text-lg font-semibold">Perlu Diperhatikan</h2>
        </div>
        <div class="p-4">
            <p class="text-gray-700">Silakan untuk mengunduh <strong>Template Pengajuan</strong> sesuai Dengan Bidang.</p>
        </div>
        <div class="flex justify-end space-x-4 px-4 py-2">
            <!-- Tombol Ajukan -->
            <a href="{{ route('user.ajuan.create') }}" 
               class="px-4 py-2 bg-primary-500/10 border border-transparent text-primary text-sm rounded hover:bg-blue-600 hover:text-white flex items-center">
                <i class="ti ti-plus me-1"></i>
                <span>Ajukan Dokumen</span>
            </a>
        
            <!-- Tombol Kembali -->
            <button onclick="closeModal()" 
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 flex items-center">
                <span>Kembali</span>
            </button>
        </div>
        
    </div>
</div>



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

