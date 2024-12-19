

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-3 xl:col-span-3 ">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="border-0  pt-3 px-4 dark:text-slate-300/70">
                <div class="border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-center" data-fc-type="tab">
                    <ul class="-mb-px grid grid-cols-3 place-content-stretch w-full" aria-label="Tabs">
                        <li class="me-2 flex items-center col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1" role="presentation">
                            <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300 active" id="Inbox-tab" data-fc-target="#Inbox" type="button" role="tab" aria-controls="Inbox" aria-selected="false"><i class="icofont-email me-1 text-xl -mt-1"></i>Revisi</button>
                        </li>


                    </ul>
                </div>
            </div><!--end header-title-->
            <div class="flex-auto p-4">
                <div id="EmailBox">
                    <div  id="UserChat" role="tabpanel" aria-labelledby="UserChat-tab">
                        <div id="accordion-collapse" data-fc-type="accordion">
                            <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
                              <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                {{-- Tab 1 --}}
                                <div data-tab="1" class="tabflex items-center mb-3">
                                    <div class="w-8 h-8 rounded">
                                        <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-3.png" alt="logo" />
                                    </div>
                                    <div class="ms-2">
                                        <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Donald Gonzalez</h5></a>
                                        <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">Ontario, Canada</p>
                                    </div>
                                </div>
                                {{-- Tab 2 --}}
                                <div data-tab="2" class="tabflex items-center mb-3">
                                    <div class="w-8 h-8 rounded">
                                        <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-2.png" alt="logo" />
                                    </div>
                                    <div class="ms-2">
                                        <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Ronald Young</h5></a>
                                        <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">New york, USA</p>
                                    </div>
                                </div>
                                {{-- Tab 3 --}}
                                <div data-tab="3" class="tabflex items-center mb-3">
                                    <div class="w-8 h-8 rounded">
                                        <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-4.png" alt="logo" />
                                    </div>
                                    <div class="ms-2">
                                        <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Leslie Dunham</h5></a>
                                        <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">San Diego, California</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-9 xl:col-span-9 ">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="p-4 grid grid-cols-12 gap-4">
            </div><!--end card-header-->
            {{-- conntent 1 --}}
            <div data-content="1" class="content card-body">
                <x-revisionBox></x-revisionBox>
                <x-revisionBox></x-revisionBox>
                <x-revisionBox></x-revisionBox>
            </div><!--end card-body-->

            {{-- conntent 2 --}}
            <div data-content="2" class="content card-body">
                <x-revisionBox></x-revisionBox>
                <x-revisionBox></x-revisionBox>
                <x-revisionBox></x-revisionBox>
            </div><!--end card-body-->
            {{-- conntent 3 --}}
            <div data-content="3" class="content card-body">
                <x-revisionBox></x-revisionBox>
                <x-revisionBox></x-revisionBox>
                <x-revisionBox></x-revisionBox>
            </div><!--end card-body-->
        </div> <!--end card-->

    </div><!--end col-->
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

    // Hide all content except the first one
    contents.forEach((content, index) => {
        if (index !== 0) content.style.display = "none";
    });

    // Add click event listener to each tab
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            // Remove active class from all tabs
            tabs.forEach((tab) => tab.classList.remove("active-tab"));

            // Hide all contents
            contents.forEach((content) => (content.style.display = "none"));

            // Add active class to clicked tab
            tab.classList.add("active-tab");

            // Show corresponding content
            const target = tab.getAttribute("data-tab");
            document.querySelector(`[data-content='${target}']`).style.display = "block";
        });
    });
});
</script>


@endsection
