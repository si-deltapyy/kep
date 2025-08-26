@extends('layouts.app')
@section('title')
    <x-page-tittle :title="'Message'" :slash1="'Message'" :slash2="'Inbox'" :slash3="'List'"></x-page-tittle>
@endsection

@section('content')
    <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 rounded-md w-full relative">
        <div class="flex-auto p-4">
            <div class="mb-4 border-b border-gray-200 dark:border-slate-700" data-fc-type="tab">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" aria-label="Tabs">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 rounded-t-lg border-b-2 active" id="profile-tab" data-fc-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Message List</button>
                    </li>

                </ul>
            </div>
            <div id="myTabContent">
                <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800 active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="gap-3 flex flex-wrap">
                        @foreach($pesan as $p)
                            <div class="border bg-white border-slate-200 dark:border-slate-700 rounded p-5 inline-block cursor-pointer">
                                <a href="{{route('messages.show', $p->id)}}">
                                    <div class="text-center">
                                        <i class="icofont-comment icofont-5x text-slate-500 text-4xl"></i>
                                        <h6 class="truncate font-medium dark:text-slate-300 text-sm">{{$p->title}}</h6>
                                        <small class="text-slate-400">Tanggal  : {{$p->created_at}}</small>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!--end card-body-->
    </div>
    </div><!--end inner-grid-->



@endsection
