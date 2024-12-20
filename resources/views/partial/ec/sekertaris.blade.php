
<div id="myTabContent">
    <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
        aria-labelledby="all-tab">
        <div class="grid grid-cols-1 p-0 md:p-4">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                    {{-- table --}}
                    <!-- resources/views/somepage.blade.php -->
                    <x-table
                        :head="$head1"
                        :data="$data1->toArray()"
                        :actionHeader="true"
                        :actionColumn="$actions1"
                        :actionSelect="true"
                    />
                </div>
                <!--end div-->
            </div>
            <!--end div-->
        </div>
    </div>
</div>