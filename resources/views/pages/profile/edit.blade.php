@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Profile'" :slash1="'Edit'" :slash2="'Lengkapi Profile'" :slash3="''"></x-page-tittle>
@endsection

@section('content')

<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
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
                                        <form action="{{route('user.profile.update', $data->id)}}" method="post">
                                            @csrf
                                            <div class="grid md:grid-cols-12 lg:grid-cols-12">
                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">Name</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <input type="text" id="name" name="name" value="{{$data->name}}" class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700" required>
                                                </div>

                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="nik" class="font-medium text-sm text-slate-600 dark:text-slate-400">NIK</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <input type="text" id="nik" name="nik" placeholder="Masukkan NIK" class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700" required>
                                                </div>

                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="no" class="font-medium text-sm text-slate-600 dark:text-slate-400">Nomor Telepon</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <input type="text" id="no" name="no" placeholder="08xxxxxxxx" class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700" required>
                                                </div>

                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="prodi" class="font-medium text-sm text-slate-600 dark:text-slate-400">Prodi</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <select id="prodi" name="prodi" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700">
                                                        <option value="">-- Select --</option>
                                                        @foreach($prodi as $x)
                                                        <option value="{{$x->id}}">{{$x->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="jl" class="font-medium text-sm text-slate-600 dark:text-slate-400">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <select id="jl" name="jl" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700">
                                                        <option value="">-- Select --</option>
                                                        <option value="laki-laki">Laki-Laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="sts" class="font-medium text-sm text-slate-600 dark:text-slate-400">Status</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <select id="sts" name="sts" class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-[6.5px] focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700">
                                                        <option value="">-- Select --</option>
                                                        <option value="Mahasiswa">Mahasiswa</option>
                                                        <option value="Dosen">Dosen</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-12 md:col-span-12 lg:col-span-3 self-center text-right mr-2">
                                                    <label for="addr" class="font-medium text-sm text-slate-600 dark:text-slate-400">Alamat</label>
                                                </div>
                                                <div class="col-span-12 md:col-span-12 lg:col-span-9 mb-2">
                                                    <textarea id="addr" name="addr" cols="30" rows="3" placeholder="Masukkan Alamat" class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"></textarea>
                                                </div>

                                                <div class="col-start-4 col-end-13 mb-2">
                                                    <button type="submit" class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:bg-transparent dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded">Update Profil</button>
                                                </div>
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
