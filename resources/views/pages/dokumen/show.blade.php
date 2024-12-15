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
                        <p class=" position-center">{{$d->created_at}}</p>
                        <p class=" position-center">{{$d->doc_status}}</p>
                    @endforeach
                <div class="mb-3">
                @foreach ($doc as $x)
                <table>
                    <li>{{$x->doc_name}}</li>
                </table>
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