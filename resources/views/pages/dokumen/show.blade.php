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
                {{-- buatkan foreach log disini dan auto generate ketika ada database baru --}}
                
                <!-- Loop Through Logs -->
                {{-- <div class="relative">
                    @foreach ($logs as $index => $log)
                        <div class="relative flex items-start mb-6">
                            <!-- Icon Wrapper -->
                            <div class="z-10 flex items-center justify-center w-10 h-10 bg-blue-500 text-white rounded-full dark:bg-blue-700 relative">
                                @if (!$loop->first)
                                    <!-- Garis atas -->
                                    <span class="absolute top-0 left-1/2 w-[2px] h-1/2 bg-gray-300 dark:bg-gray-600 transform -translate-x-1/2"></span>
                                @endif
                                @if (!$loop->last)
                                    <!-- Garis bawah -->
                                    <span class="absolute bottom-0 left-1/2 w-[2px] h-1/2 bg-gray-300 dark:bg-gray-600 transform -translate-x-1/2"></span>
                                @endif
                            </div>
                
                            <!-- Log Content -->
                            <div class="ml-6">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $log->title }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $log->description }}</p>
                                <span class="bg-gray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">{{ \Carbon\Carbon::parse($log->time)->translatedFormat('l, j F Y, H:i') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

                <div class="max-w-4xl mx-auto">
                    @foreach ($logs as $log)
                        <div class="relative flex items-start space-x-4 mb-6">
                            <div class="flex items-center space-x-4 mb-4">
                                <!-- Timeline Dot -->
                                <div class="w-4 h-4 rounded-full bg-blue-500 border-2 border-blue-500 dark:border-blue-700"></div>
                            
                                <!-- Time Display -->
                                <div>
                                    <span class="text-sm font-medium text-gray-800 dark:text-gray-100">
                                        {{ \Carbon\Carbon::parse($log->time)->translatedFormat('j M Y, H:i') }}
                                    </span>
                                </div>
                            </div>
                            <!-- Log Content -->
                            <div class="flex-1 p-4 bg-white border rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-sm font-medium text-gray-800 dark:text-gray-100">
                                        {{ $log->title }} 
                                        <span class="text-gray-500 dark:text-gray-400"> {{ $log->action }}</span>
                                    </h3>
                                    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($log->time)->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-2 dark:text-gray-300">{{ $log->description }}</p>
                                <div class="flex items-center justify-between mt-3">
                                    @switch($log->action_label)
                                        @case($log->action_label == 'Upload Success' || $log->action_label == 'Dokumen Valid' || $log->action_label == 'Ajuan Selesai' )
                                            <span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded flex items-center">
                                                <i data-lucide="check-check" class="w-4 h-4 mr-1"></i>
                                                {{ $log->action_label }}</span>
                                            @break
                                        @case($log->action_label == 'Reupload')
                                            <span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded flex items-center">
                                                <i data-lucide="file-warning" class="w-4 h-4 mr-1"></i>
                                                {{ $log->action_label }}</span>
                                            @break
                                        @case($log->action_label == 'Penerbitan EC')
                                            <span class="bg-purple-500/10 text-purple-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded flex items-center">
                                                <i data-lucide="file-check" class="w-4 h-4 mr-1"></i>
                                                {{ $log->action_label }}</span>
                                        @break
                                        @case($log->action_label == 'Ajuan Ditolak')
                                            <span class="bg-pink-500/10 text-pink-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded flex items-center">
                                                <i data-lucide="x" class="w-4 h-4 mr-1"></i>
                                                {{ $log->action_label }}
                                            </span>
                                            @break
                                        @case($log->action_label == 'Proses Review' || $log->action_label == 'Pengecakan Dokumen')
                                            <span class="bg-gray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded flex items-center">
                                                <i data-lucide="clipboard-check" class="w-4 h-4 mr-1"></i>
                                                {{ $log->action_label }}</span>
                                            @break

                                        @default
                                            
                                    @endswitch
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