@extends('layouts.app')

@section('title')
    <x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''" />
@endsection

@section('content')
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">

        {{-- Sidebar (Reviewer List) --}}

        <div class="sm:col-span-12 md:col-span-12 lg:col-span-3 xl:col-span-3">
            <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative">
                <div class="border-0 pt-3 px-4 dark:text-slate-300/70">
                    <div class="border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-center" data-fc-type="tab">
                        <ul class="-mb-px grid grid-cols-3 place-content-stretch w-full" aria-label="Tabs">
                            <li class="me-2 flex items-center col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1" role="presentation">
                                <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300 active" id="Inbox-tab" data-fc-target="#Inbox" type="button" role="tab" aria-controls="Inbox" aria-selected="false">
                                    <i class="icofont-email me-1 text-xl -mt-1"></i>Message
                                </button>
                            </li>
                            <li class="me-2 flex items-center col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1" role="presentation">
                                <a href="/messages" class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300" id="Inbox-tab" data-fc-target="#Inbox" type="button" role="tab" aria-controls="Inbox" aria-selected="false">
                                    <i class="icofont-mass-mail me-1 text-xl -mt-1"></i>Back
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex-auto p-4">
                    <div id="EmailBox">
                        <div id="UserChat" role="tabpanel" aria-labelledby="UserChat-tab">
                            <div id="accordion-collapse" data-fc-type="accordion">
                                <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
                                    <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                        @foreach ($documents->groupBy(fn($doc) => $doc->first()->reviewer_id) as $reviewer_id => $reviewGroup)
                                            <li role="presentation">
                                                <button
                                                    class="flex items-center w-full py-2 px-4 text-sm font-medium text-left text-gray-500 rounded-lg hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 reviewer-tab"
                                                    data-tab="{{ $reviewer_id }}"
                                                    type="button">
                                                    <i class="icofont-user me-2 text-lg"></i>
                                                    {{ $reviewers[$reviewer_id] ?? 'Reviewer Tidak Diketahui' }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                                @role('sekertaris')
                                @if($dum->doc_status != "approved")
                                    <div class="mt-4 flex justify-center">
                                        <form action="{{ route('messages.selesaiReview', $dummy_id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="px-4 py-2 bg-primary-500 text-white text-sm font-semibold rounded hover:bg-primary-600">
                                                Approved Review
                                            </button>
                                        </form>
                                    </div>
                                @elseif($dum->doc_status == "approved")
                                    <div class="mt-4 flex justify-center">
                                        <button class="px-4 py-2 bg-gray-100 text-gray-300 text-sm font-semibold rounded" disabled>
                                            Approved Review
                                        </button>
                                    </div>
                                @endif

                                @endrole
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div>
        </div><!--end col-->

        {{-- Konten Dokumen berdasarkan Reviewer --}}
        <div class="sm:col-span-12 md:col-span-12 lg:col-span-9 xl:col-span-9">
            <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative p-4">
                @foreach ($documents->groupBy(fn($doc) => $doc->first()->reviewer_id) as $reviewer_id => $reviewGroup)
                    <div data-content="{{ $reviewer_id }}" class="reviewer-content hidden">
                        <h4 class="text-lg font-semibold mb-4 text-gray-800 dark:text-slate-200">Dokumen oleh {{ $reviewers[$reviewer_id] ?? 'Reviewer Tidak Diketahui' }}</h4>

                        @foreach ($reviewGroup as $doc_id => $reviews)
                            @php $firstReview = $reviews->first(); @endphp
                            <div class="mb-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                                <h5 class="font-medium text-gray-600 dark:text-slate-100">
                                    {{ Str::replaceLast('.pdf', '', Str::after( $firstReview->Document->doc_path, 'document/')) }}
                                </h5>
                                @if($dum->doc_status != "approved")
                                    @foreach ($reviews as $review)
                                        <p class="text-xs text-gray-400">{{$review->created_at}}</p>
                                        <x-revision-box
                                            :namaReviewer="$review->Sender->name ?? 'Nama Tidak Ditemukan'"
                                            :tanggal="0"
                                            :reviewerID="$review->reviewer_id"
                                            :action="route('messages.detail', ['id' => $review->id])"
                                        />
                                    @endforeach
                                @endif
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>

            <!--Tambahan Dokumen-->
            <br>
            <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full relative p-4">
                <div class="mb-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                    <h4 class="text-lg font-semibold mb-4 text-gray-800 dark:text-slate-200">Daftar Dokumen oleh Pengguna</h4>
                    @foreach($allDoc as $doc)
                        <div>
                            <a href="{{ asset('/app/' . $doc->doc_path) }}" target="_blank" rel="noopener noreferrer"><button type="button" class="px-2 py-1 lg:px-4 bg-blue-500  text-white text-sm  rounded transition hover:bg-blue-200 hover:text-blue-500 order hover:border-blue-500 border-blue-500 font-medium">Buka di Tab Baru</button></a> {{$doc->doc_name}}
                            <iframe class="pdf-preview" src="{{ asset('/app/' . $doc->doc_path) }}?v={{ time() }}" frameborder="0" width="100%" height="400px"></iframe>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    {{-- Optional: style tambahan --}}
    <style>
        .hidden {
            display: none;
        }
    </style>

    {{-- Script untuk tab reviewer --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".reviewer-tab");
            const contents = document.querySelectorAll(".reviewer-content");

            function activateTab(reviewerId) {
                tabs.forEach(tab => tab.classList.remove("bg-gray-100", "dark:bg-gray-800"));
                contents.forEach(content => content.classList.add("hidden"));

                const activeTab = document.querySelector(`[data-tab='${reviewerId}']`);
                const activeContent = document.querySelector(`[data-content='${reviewerId}']`);

                if (activeTab) activeTab.classList.add("bg-gray-100", "dark:bg-gray-800");
                if (activeContent) activeContent.classList.remove("hidden");
            }

            // Aktifkan tab pertama secara default
            if (tabs.length) {
                const firstReviewerId = tabs[0].getAttribute("data-tab");
                activateTab(firstReviewerId);
            }

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    const reviewerId = tab.getAttribute("data-tab");
                    activateTab(reviewerId);
                });
            });
        });
    </script>

@endsection
