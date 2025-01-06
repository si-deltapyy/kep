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
