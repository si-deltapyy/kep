@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Payment'" :slash1="'Payment'" :slash2="'History'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">
    <div class="">
        <div>
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <div class="max-w-4xl mx-auto">
                    <div class="relative flex items-start space-x-4 mb-6">
                        <div class="flex-1 p-4 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex items-center justify-between mt-3">
                                <span class="bg-g[ray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded flex items-center">
                                    <i data-lucide="clipboard-check" class="w-4 h-4 mr-1"></i>
                                    a
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
