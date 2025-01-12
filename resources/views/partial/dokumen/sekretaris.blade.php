@if (session('success'))
    <div id="errorAlert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-lg mb-4 relative" role="alert">
        <div class="flex items-center">
            <div class="mr-3">
                <span data-lucide="circle-check" class="w-6 h-6 text-green-500"></span>
            </div>
            <div>
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
        <button type="button" onclick="closeAlert('errorAlert')" class="absolute top-2 right-2 text-green-500 hover:text-green-700 focus:outline-none">
            <span data-lucide="x" class="w-5 h-5"></span>
        </button>
    </div>

    <script>
        function closeAlert(id) {
            const alert = document.getElementById(id);
            if (alert) {
                alert.style.display = 'none';
            }
        }
    </script>
@endif

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
                   :customColumns="$customColumns"
               />
           </div>
        </div>
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->
