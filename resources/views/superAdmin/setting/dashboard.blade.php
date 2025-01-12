@push('pages-style')
    <!-- Css -->
<link rel="stylesheet" href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/animate.css/animate.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('pages-script')
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/pages/sweetalert.init.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    function showConfirmation() {
    Swal.fire({
        title: 'Apakah Anda Yakin Untuk Mengatur Jadwal Maintenance?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Submit',
        cancelButtonText: 'Batalkan',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit Form
            document.getElementById('maintenance-form').submit();
        }
    });
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#start_maintenance", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
    });

    flatpickr("#end_maintenance", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
    });
});

</script>
@endpush

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Setting'" :slash1="'Super Admin'" :slash2="'Setting'" :slash3="'Dashboard'"></x-page-tittle>
@endsection

@section('content')
<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-4 xl:col-span-3">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-3 px-4 dark:text-slate-300/70">
                <div class="flex-none md:flex">
                    <h4 class="font-medium flex-1 self-center mb-2 md:mb-0">Info Panel</h4>
                    <div class="inline-block relative">
                        <button type="button"  data-fc-autoclose="both" data-fc-placement="bottom" data-fc-type="dropdown" class="px-3 py-1 text-xs font-medium text-gray-500 focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-50 hover:text-slate-800 focus:z-10   dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><i class="icofont-rounded-down"></i></button>
                    </div>
                </div>
            </div><!--end header-title-->
            <div class="flex-auto p-4">
                <div class="p-4 bg-gray-50 rounded dark:bg-slate-900/20 mb-4">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="m-0 font-medium -mb-1 dark:text-slate-300">Storage</h5>
                            <small class="text-xs text-slate-400">80GB/200GB Used</small>
                        </div>
                        <div class="focus:outline-none text-[11px] bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded font-medium py-[2px] px-2 self-center">23</div>
                    </div>
                </div>



                <div class="w-full bg-gray-200 rounded-full h-2 dark:bg-gray-700">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-8 xl:col-span-9">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="flex-auto p-4">
                <div class="mb-4 border-b border-gray-200 dark:border-slate-700" data-fc-type="tab">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" aria-label="Tabs">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 active " id="profile-tab" data-fc-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Set Maintenance</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-fc-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Another Setting</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-fc-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Another Setting</button>
                        </li>
                        <li role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-fc-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Another Setting</button>
                        </li>

                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="active  p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h4 class="card-title dark:text-slate-300 mb-4">Maintenance Website</h4>
                        {{-- Form --}}
                        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                            <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">

                                    <div class="flex-auto p-4">
                                        <form id="maintenance-form" action="{{ route('superadmin.maintenance.update') }}" method="POST">
                                            @csrf
                                            <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                                                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900 rounded-md w-full relative mb-4">
                                                    <div class="flex-auto p-4">
                                                        <a href="#" class="block mb-3 text-[16px] font-medium tracking-tight text-gray-800 dark:text-white">
                                                            Atur Jadwal Maintenance
                                                        </a>
                                                        <x-input title="Tanggal Mulai" id="start_maintenance" type="date" class="form-control" name="start_maintenance" required />
                                                        <x-input title="Tanggal Selesai" id="end_maintenance" type="date" class="form-control" name="end_maintenance" required />
                                                        <button type="button" onclick="showConfirmation()" class="inline-block focus:outline-none text-slate-500 hover:bg-slate-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-slate-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-slate-500 text-sm font-medium py-1 px-3 rounded mb-1">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!--end card-body-->
                            </div> <!--end inner-grid-->
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <h4 class="card-title dark:text-slate-300 mb-4">Setting</h4>
                        <div class="gap-3 flex flex-wrap">
                            Setting
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <h4 class="card-title dark:text-slate-300 mb-4">Setting</h4>
                        <div class="gap-3 flex flex-wrap">
                            Setting
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800 w-full sm:w-full md:w-1/2 lg:w-1/2  mx-auto text-center" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <div class="mx-auto text-center">
                            Setting
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
</div><!--end inner-grid-->






{{-- Sweeet Alert --}}
<template id="my-template">
    <swal-title>
    Apakah Anda Yakin Untuk Mengatur Jadwal Maintenance?
    </swal-title>
    <swal-icon type="warning" color="red"></swal-icon>
    <swal-button type="confirm">
    Ya
    </swal-button>
    <swal-button type="cancel">
    Batalkan
    </swal-button>
    <swal-param name="allowEscapeKey" value="false" />
    <swal-param
    name="customClass"
    value='{ "popup": "my-popup" }' />
</template>
@endsection
