<a href="{{route('user.ajuan.create')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
    <i class="ti ti-plus me-1"></i>
    Ajukan
    <span data-lucide="plus" class="w-4 h-4 inline-block me-2"></span>
</a>
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
        <!--end div-->
    </div>
    <!--end div-->
</div>
<!--end grid-->