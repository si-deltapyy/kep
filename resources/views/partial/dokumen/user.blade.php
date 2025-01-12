<a href="javascript:void(0);"
   onclick="showModal()"
   class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
    <i class="ti ti-plus me-1"></i>
    Ajukan
    <span data-lucide="plus" class="w-4 h-4 inline-block me-2"></span>
</a>


<button type="button" data-fc-type="modal" data-fc-target="modalcenter" class="inline-block focus:outline-none bg-green-500/10 text-green hover:bg-green hover:text-black border border-gray-200 dark:bg-transparent dark:text-slate-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-slate-500  text-sm font-medium py-1 px-3 rounded ">
    <i data-lucide="download" class="w-4 h-4 inline-block me-2"></i>
    Download Template
</button>


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
                :customColumns="$customColumns"
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


{{-- Template Modal --}}
<div class="modal animate-ModalSlide hidden" id="modalcenter">
    <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
        <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
            <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-green-500">
                <h6 class="mb-0 leading-4 text-base font-semibold text-white mt-0" id="staticBackdropLabel1">Green Modal</h6>
                <button type="button" class="box-content w-4 h-4 p-1 bg-green-700/60 rounded-full text-slate-300 leading-4 text-xl close" aria-label="Close" data-fc-dismiss>&times;</button>
            </div>
            <div data-fc-type="accordion">
                <h2 id="accordion-collapse-heading-1" class="bg-white"  data-fc-type="collapse">
                  <button type="button" class="fc-collapse-open:text-primary flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 rounded-t-xl border border-b-0 border-gray-200  dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>Template Saintek</span>
                    <i class="fas fa-angle-down  fc-collapse-open:rotate-180 transition-transform duration-300" data-accordion-icon></i>
                  </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden overflow-hidden transition-[height] duration-300" aria-labelledby="accordion-collapse-heading-1">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">Unduh Template Saintek</p>
                    <button class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Unduh</button>
                  </div>
                </div>
                <h2 id="accordion-collapse-heading-2" class="bg-white"  data-fc-type="collapse">
                  <button type="button" class="fc-collapse-open:text-primary flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200  dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>Template Saintek</span>
                    <i class="fas fa-angle-down  fc-collapse-open:rotate-180 transition-transform duration-300" data-accordion-icon></i>
                  </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden overflow-hidden transition-[height] duration-300" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Unduh Template Saintek</p>
                        <button class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Unduh</button>
                      </div>
                </div>
                <h2 id="accordion-collapse-heading-3" class="bg-white"  data-fc-type="collapse">
                  <button type="button" class="fc-collapse-open:text-primary flex justify-between items-center p-5 w-full font-medium text-left text-gray-500 border border-gray-200  dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                    <span>Template Saintek</span>
                    <i class="fas fa-angle-down fc-collapse-open:rotate-180 transition-transform duration-300" data-accordion-icon></i>
                  </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden overflow-hidden transition-[height] duration-300" aria-labelledby="accordion-collapse-heading-3">
                    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Unduh Template Saintek</p>
                        <button class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Unduh</button>
                      </div>
                </div>
            </div>
            <div class="flex flex-wrap shrink-0 justify-end p-3  rounded-b border-t border-dashed dark:border-gray-700">
                <button class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded mr-1 close" data-fc-dismiss>Close</button>
            </div>
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

