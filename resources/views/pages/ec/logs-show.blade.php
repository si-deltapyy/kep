@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Pengajuan'" :slash1="'Pengajuan'" :slash2="'Dokumen'" :slash3="'Create'"></x-page-tittle>


@endsection
@section('content')
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">


        <div class="">
            <div>
                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                    @foreach ($dummy as $d)
                        <h2 class="font-medium text-2xl font-extrabold dark:text-slate-100">
                            {{ $d->title }}
                        </h2>
                        <p class=" position-center"><i>Tanggal Pengajuan: </i> <b>{{ \Carbon\Carbon::parse($d->created_at)->translatedFormat('l, j F Y, H:i')}}</b></p><br><br>

                    @endforeach


                <div class="max-w-4xl mx-auto">
                    @foreach ($logs as $index => $log)
                        <div class="relative flex items-start space-x-4 mb-6">
                            <!-- Timeline Dot -->
                            <div class="w-4 h-4 rounded-full
                                @if ($loop->first)
                                    bg-blue-500 border-2 border-blue-500 dark:border-blue-700
                                @else
                                    bg-gray-300 border-2 border-gray-300 dark:border-gray-600
                                @endif">
                            </div>
                            <!-- Log Content -->
                            <div class="flex-1 p-4 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    {!! $logAttributes[$index]['title'] !!}
                                    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</span>
                                </div>
                                {!! $logAttributes[$index]['description'] !!}
                                <div class="flex items-center justify-between mt-3">
                                    {!! $logAttributes[$index]['badge'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <a href="{{route('user.ajuan.index')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-left" class="w-4 h-4 inline-block me-2"></span>
                    Kembali

                </a>
                </div>
            </div>
        </div>
</div>
@endsection
