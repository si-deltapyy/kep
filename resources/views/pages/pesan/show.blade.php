@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    {{-- Sidebar (Tabs) --}}
    <div class="sm:col-span-12 md:col-span-12 lg:col-span-3 xl:col-span-3">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative">
            <div class="border-0 pt-3 px-4 dark:text-slate-300/70">
                <div class="border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-center" data-fc-type="tab">
                    <ul class="-mb-px grid grid-cols-3 place-content-stretch w-full" aria-label="Tabs">
                        <li class="me-2 flex items-center col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1" role="presentation">
                            <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300 active" id="Inbox-tab" data-fc-target="#Inbox" type="button" role="tab" aria-controls="Inbox" aria-selected="false">
                                <i class="icofont-email me-1 text-xl -mt-1"></i>Revisi
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex-auto p-4">
                <div id="EmailBox">
                    <div class="">
                        <form action="{{ route('messages.selesaiReview', $dummy_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button data-fc-type="modal" data-fc-target="compose_msg"  class="px-3 py-2 lg:px-4 block text-center w-full mb-4 bg-primary-500 text-white text-sm font-semibold rounded hover:bg-primary-600">Compose</button>
                        </form>
                    </div>
                    <div id="UserChat" role="tabpanel" aria-labelledby="UserChat-tab">
                        <div id="accordion-collapse" data-fc-type="accordion">
                            <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    @foreach ($documents as $doc_id => $reviews)
                                        @php
                                            $firstReview = $reviews->first();
                                        @endphp
                                        <div data-tab="{{ $loop->iteration }}" class="tabflex items-center mb-3 cursor-pointer">
                                            <div class="w-8 h-8 rounded">
                                                <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="{{ asset('assets/images/users/avatar-3.png') }}" alt="logo" />
                                            </div>
                                            <div class="ms-2">
                                                <h5 class="font-medium text-sm">
                                                    {{ $firstReview->Document->doc_name ?? 'Dokumen Tidak Ditemukan' }}
                                                </h5>
                                                <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">
                                                    Reviewer(s):
                                                    @foreach ($reviews->pluck('reviewer_id')->unique() as $reviewer_id)
                                                        {{ $reviewers[$reviewer_id] ?? 'Nama Tidak Ditemukan' }}@if (!$loop->last), @endif
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div>
    </div><!--end col-->

    {{-- Konten Berdasarkan reviewer_id --}}
    <div class="sm:col-span-12 md:col-span-12 lg:col-span-9 xl:col-span-9">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative">
            @foreach ($documents as $doc_id => $reviews)
                <div data-content="{{ $loop->iteration }}" class="content card-body">
                    @foreach ($reviews->groupBy('reviewer_id') as $reviewer_id => $reviewGroup)
                        <div class="mb-4">
                            @foreach ($reviewGroup as $review)
                                <x-revision-box
                                    :namaReviewer="$review->Sender->name ?? 'Nama Tidak Ditemukan'"
                                    :tanggal="$review->created_at"
                                    :reviewerID="$review->reviewer_id"
                                    :action="route('messages.detail', ['id' => $review->id])"
                                />
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

</div><!--end inner-grid-->

<style>
    .hidden {
    display: none;
}

</style>



<script>
   document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll("[data-tab]");
    const contents = document.querySelectorAll("[data-content]");

    contents.forEach((content, index) => {
        if (index !== 0) content.classList.add("hidden");
    });

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            tabs.forEach((tab) => tab.classList.remove("active-tab"));
            contents.forEach((content) => content.classList.add("hidden"));

            tab.classList.add("active-tab");
            document.querySelector(`[data-content='${tab.getAttribute("data-tab")}']`).classList.remove("hidden");
        });
    });
});

</script>


@endsection
