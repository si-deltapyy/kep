@extends('layouts.app')

@section('title')
<x-page-tittle :title="'Ethical Clereance'" :slash1="'Ethical Clereance'" :slash2="'Dokumen'" :slash3="''"></x-page-tittle>
@endsection

@section('content')

@role('sekretariat')
    @php
        // Data Reviewer
        $head1 = ['No', 'Judul', 'Name', 'Created_at'];
        $data1 = $doc->map(function($x, $index) {
            return [
                'id' => $x->id,
                'no' => $x->title,
                'doc_name' => $x->doc_name,
                'sd' => $x->created_at,
            ];
        });

        // Define actions based on document ID
        $actions1 = $doc->mapWithKeys(function ($x) {
            return [
                $x->id => '
                -'
            ];
        })->toArray();
    @endphp

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
@endrole

@role('user')

    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">


        @foreach ($doc as $x)
        <div class="mb-4">
            <div>

                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium">{{$x->title}}</h1>
                <div class="mb-3 mt-3">
                <table>
                    <li>{{$x->doc_name}}</li>
                </table>
                </div>
                <a href="{{route('user.ajuan.index')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-left" class="w-4 h-4 inline-block me-2"></span>
                    Kembali

                </a>
                <a href="{{route('user.ajuan.index')}}" class="ml-2 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="download" class="w-4 h-4 inline-block me-2"></span>
                    Download

                </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
@endrole

@endsection


