

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-4 xl:col-span-3 ">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="flex-auto p-4 text-center">
                <img src="assets/images/users/avatar-1.png" alt="" class="h-20 inline-block rounded-full mb-4">
                <h5 class="text-2xl font-semibold text-slate-700 dark:text-gray-400 leading-5">Reviewer </h5>
                <span class="text-slate-500 text-sm">Judul Ajuan</span>
                <div class="mt-3">

                    <p class="text-sm text-slate-500 font-medium block"><span class="text-slate-700 dark:text-slate-400"><i class="ti ti-mail text-lg text-slate-500"></i> Subjek  :</span> Lengkapi Dokumen</p>
                </div>
                <p class="text-sm text-slate-600 font-medium block mb-3 mt-2"><span class="text-slate-700 dark:text-slate-400">Tanggal  :</span> 22/1/3021</p>
                    <a href="{{ route('message-show') }}">
                        <button class="inline-block focus:outline-none text-brand-500 hover:bg-brand-500 hover:text-white bg-transparent border border-brand-500 dark:bg-transparent dark:text-brand-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-brand-500  text-sm font-medium py-2 px-3">Message</button>
                    </a>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->

</div><!--end inner-grid-->
@endsection
