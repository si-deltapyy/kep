@extends('layouts.app')
@section('title')
<x-page-tittle :title="'EC Document'" :slash1="'EC Document'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>
@endsection

@section('content')
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 ">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="w-full relative overflow-hidden">
                <div class="p-0 xl:p-4">
                    <div class="mb-4 border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-start lg:justify-between" data-fc-type="tab">
                        <ul class="flex flex-wrap mb-5 lg:-mb-px" aria-label="Tabs">
                            <li role="presentation">
                                <button class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 border-gray-100 dark:border-gray-700 active" id="Settings-tab" data-fc-target="#Settings" type="button" role="tab" aria-controls="Settings" aria-selected="false">Profile</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div>

    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="w-full relative overflow-hidden">
                <div class="p-0">
                    <div id="myTabContent">
                        <div class="active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                            <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                                <div class="col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12">
                                    <div class="bg-white dark:bg-slate-800 shadow  rounded-md w-full relative">
                                        <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-3 px-4 dark:text-slate-300/70">
                                            <h4 class="font-medium">Personal Information</h4>
                                        </div><!--end card-header-->
                                        <div class="flex-auto p-4">
                                            <form method="POST" action="{{ route('user.profile.edit', Auth::user()->id) }}">
                                                @csrf
                                                <div class="grid md:grid-cols-12 lg:grid-cols-12">
                                                    <!-- Nama Lengkap -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="name" name="name" class="form-input w-full rounded-md" value="{{ $data->name }}" placeholder="Nama Lengkap" required>
                                                    </div>

                                                    <!-- Jenis Kelamin -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="gender" class="font-medium text-sm text-slate-600 dark:text-slate-400">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="gender" name="gender" class="form-input w-full rounded-md" value="{{ $data->gender }}" placeholder="Jenis Kelamin" required>
                                                    </div>

                                                    <!-- Alamat -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="address" class="font-medium text-sm text-slate-600 dark:text-slate-400">Alamat</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="address" name="address" class="form-input w-full rounded-md" value="{{ $data->address }}" placeholder="Alamat" required>
                                                    </div>

                                                    <!-- Nomor Telepon -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="phone_number" class="font-medium text-sm text-slate-600 dark:text-slate-400">Nomor Telepon</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="phone_number" name="phone_number" class="form-input w-full rounded-md" value="{{ $data->phone_number }}" placeholder="Nomor Telepon" required>
                                                    </div>

                                                    <!-- Status -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="status" class="font-medium text-sm text-slate-600 dark:text-slate-400">Status</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="status" name="status" class="form-input w-full rounded-md" value="{{ $data->status }}" placeholder="Status" required>
                                                    </div>

                                                    <!-- NIK -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="nik" class="font-medium text-sm text-slate-600 dark:text-slate-400">NIK</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="nik" name="nik" class="form-input w-full rounded-md" value="{{ $data->nik }}" placeholder="NIK" required>
                                                    </div>

                                                    <!-- Prodi -->
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                        <label for="prodi_id" class="font-medium text-sm text-slate-600 dark:text-slate-400">Prodi</label>
                                                    </div>
                                                    <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                        <input type="text" id="prodi_id" name="prodi_id" class="form-input w-full rounded-md" value="{{ $data->prodi_id }}" placeholder="Prodi" required>
                                                    </div>

                                                    <!-- Buttons -->
                                                    <div class=" col-start-4 col-end-13  mb-2">
                                                        <button type="submit" class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500  text-sm font-medium py-1 px-3 rounded">Edit Profile</button>
                                                        <button type="submit" class="inline-block focus:outline-none text-red-500 hover:bg-red-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-red-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-red-500  text-sm font-medium py-1 px-3 rounded">Cancel</button>
                                                    </div><!--end col-->
                                                </div>
                                            </form>
                                        </div><!--end card-body-->
                                    </div> <!--end card-->
                                </div><!--end col-->

                            </div><!--end grid-->
                        </div>
                    </div>
                </div>
            </div> <!--end inner-grid-->
        </div><!--end col-->

    </div><!--end grid-->
@endsection
