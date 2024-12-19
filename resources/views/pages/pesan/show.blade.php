

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
<div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-3 xl:col-span-3 ">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="border-0   dark:text-slate-300/70">
                <div class="border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-center" data-fc-type="tab">
                    <ul class="-mb-px grid grid-cols-3 place-content-stretch w-full" aria-label="Tabs">
                        <li class="me-2 flex items-center col-span-3 md:col-span-3 lg:col-span-3 xl:col-span-3" role="presentation">
                            <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300 active" id="Chat-tab" data-fc-target="#Chat" type="button" role="tab" aria-controls="Chat" aria-selected="false"><i data-lucide="mail" class="me-1 w-5 h-5"></i>Quick Access</button>
                        </li>
                    </ul>
                </div>
            </div><!--end header-title-->
            <div class="flex-auto p-0">
                <div id="ChatBox" class="h-[675px]" data-simplebar>
                    <div class="" id="Chat" role="tabpanel" aria-labelledby="Chat-tab">
                        <ul class="list-group">
                            <li class="list-group-item items-center flex border-b border-dashed border-slate-200 dark:border-slate-700 p-4 unread bg-slate-50 dark:bg-slate-700">
                                <a href="">
                                    <div class="flex items-center">
                                        <div class="w-9 h-9 rounded relative">
                                            <span class="absolute text-green-500 -left-1 -top-1">
                                                <svg width="12" height="12">
                                                <circle cx="4" cy="4" r="4" fill="currentColor"></circle>
                                                </svg>
                                            </span>
                                            <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-1.png" alt="logo" />
                                        </div>
                                        <div class="ms-2">
                                            <div class="cursor-pointer hover:text-gray-900 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none">
                                                <h5 class=" font-medium text-sm">Judul Ajuan</h5>
                                            </div>
                                            <p class="focus:outline-none text-gray-800 dark:text-gray-400 text-xs font-medium flex-wrap truncate w-40">Subjek Revisi</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-9 h-9 rounded relative">
                                            <span class="absolute text-green-500 -left-1 -top-1">
                                                <svg width="12" height="12">
                                                <circle cx="4" cy="4" r="4" fill="currentColor"></circle>
                                                </svg>
                                            </span>
                                            <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-1.png" alt="logo" />
                                        </div>
                                        <div class="ms-2">
                                            <div class="cursor-pointer hover:text-gray-900 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none">
                                                <h5 class=" font-medium text-sm">Judul Ajuan</h5>
                                            </div>
                                            <p class="focus:outline-none text-gray-800 dark:text-gray-400 text-xs font-medium flex-wrap truncate w-40">Subjek Revisi</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-9 h-9 rounded relative">
                                            <span class="absolute text-green-500 -left-1 -top-1">
                                                <svg width="12" height="12">
                                                <circle cx="4" cy="4" r="4" fill="currentColor"></circle>
                                                </svg>
                                            </span>
                                            <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-1.png" alt="logo" />
                                        </div>
                                        <div class="ms-2">
                                            <div class="cursor-pointer hover:text-gray-900 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none">
                                                <h5 class=" font-medium text-sm">Judul Ajuan</h5>
                                            </div>
                                            <p class="focus:outline-none text-gray-800 dark:text-gray-400 text-xs font-medium flex-wrap truncate w-40">Subjek Revisi</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="ms-auto self-center text-center">
                                    <span class="w-4 h-4 rounded-full bg-green-500 text-white text-xs font-medium text-center inline-block">3</span>
                                    <p class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">07:30 AM</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-9 xl:col-span-9 ">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="flex-1 p-2 sm:p-4 justify-between flex flex-col h-[725px]">
                <div class="flex sm:items-center justify-between pb-4 border-b border-dashed border-gray-200 dark:border-slate-700">
                    <div class="relative flex items-center space-x-4">
                        <div class="relative">
                            <span class="absolute text-green-500 right-0 bottom-0">
                                <svg width="10" height="10">
                                <circle cx="4" cy="4" r="4" fill="currentColor"></circle>
                                </svg>
                            </span>
                            <img src="assets/images/users/avatar-3.png" alt="" class="w-12 sm:w-10 h-12 sm:h-10 rounded-full">
                        </div>
                        <div class="flex flex-col ">
                            <div class="text-lg mt-1 flex items-center font-medium">
                                <span class="text-gray-700 me-3 dark:text-slate-200">Ajuan 1</span>
                            </div>
                            <span class="text-sm text-gray-500 -mt-1">online</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">

                        <div class="dropdown inline-block relative">
                            <button data-fc-autoclose="both" data-fc-type="dropdown" class="dropdown-toggle px-3 py-1 text-sm font-medium text-gray-400 focus:outline-none hover:text-slate-800 focus:z-10 dark:text-gray-400 dark:hover:text-white" type="button">
                                <i data-lucide="more-horizontal" class="me-1 w-5 h-5"></i>
                            </button>
                            <!-- Dropdown menu -->
                            <div class="left-auto right-auto md:right-0 hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 border border-slate-700/10">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add to archive</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 text-red-500">Block</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto" data-simplebar>
                    <div class="chat-message">
                        <div class="flex items-end">
                            <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-2 items-start font-medium">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none border border-gray-100 bg-gray-50 text-gray-600 dark:border-slate-800 dark:bg-slate-700 dark:text-slate-400">Review 1</span> <button>To Respond</button></div>
                            </div>
                            <img src="assets/images/users/avatar-3.png" alt="My profile" class="w-8 h-8 rounded-full order-1">
                        </div>
                    </div>
                    <div class="chat-message">
                        <div class="flex items-end">
                            <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-2 items-start font-medium">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none border border-gray-100 bg-gray-50 text-gray-600 dark:border-slate-800 dark:bg-slate-700 dark:text-slate-400">Review 2</span></div>
                            </div>
                            <img src="assets/images/users/avatar-3.png" alt="My profile" class="w-8 h-8 rounded-full order-1">
                        </div>
                    </div>
                    <div class="chat-message">
                        <div class="flex items-end">
                            <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-2 items-start font-medium">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none border border-gray-100 bg-gray-50 text-gray-600 dark:border-slate-800 dark:bg-slate-700 dark:text-slate-400">Review 3</span></div>
                            </div>
                            <img src="assets/images/users/avatar-3.png" alt="My profile" class="w-8 h-8 rounded-full order-1">
                        </div>
                    </div>
                    <div class="chat-message">
                        <div class="flex items-end justify-end">
                            <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-1 items-end font-medium">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-500 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, tempora. Earum non aspernatur quas odio distinctio a debitis possimus! Ducimus aliquid laboriosam possimus veniam placeat ut, aliquam voluptatem sit ex!.</span></div>
                            </div>
                            <img src="assets/images/users/avatar-5.png" alt="My profile" class="w-8 h-8 rounded-full order-2">
                        </div>
                    </div>
                </div>
                <div class="border-t border-dashed border-gray-200 pt-4 mb-2 sm:mb-0 dark:border-slate-700">
                    <div class="relative flex">
                        <span class="absolute inset-y-0 flex items-center">
                            <button type="button" class="z-10 inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-400 hover:text-gray-500 focus:outline-none">
                                <i data-lucide="write" class="w-5 h-5  mx-auto"></i>
                            </button>
                        </span>
                        <input type="text" placeholder="Write your message!" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-400 pl-12 bg-gray-50 dark:bg-slate-700 rounded-md py-2 border border-gray-200 dark:border-slate-800">
                        <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                            <button type="button" class="inline-flex items-center justify-center rounded-md px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                                <i data-lucide="send" class="w-4 h-4  mx-auto"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--end card-->
    </div><!--end col-->
</div><!--end inner-grid-->

@endsection
