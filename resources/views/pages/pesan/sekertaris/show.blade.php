

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
                            <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300 active" id="Inbox-tab" data-fc-target="#Inbox" type="button" role="tab" aria-controls="Inbox" aria-selected="false"><i class="icofont-email me-1 text-xl -mt-1"></i>Mail</button>
                        </li>
                        <li class="me-2" role="presentation col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1">
                            <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300" id="UserChat-tab" data-fc-target="#UserChat" type="button" role="tab" aria-controls="UserChat" aria-selected="false"><i class="icofont-ui-text-chat me-1 text-xl -mt-1"></i>Chat</button>
                        </li>
                        <li class="me-2" role="presentation col-span-1 md:col-span-1 lg:col-span-1 xl:col-span-1">
                            <button class="flex items-center w-full py-3 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-b-transparent hover:text-gray-600 hover:border-b-transparent dark:text-gray-400 dark:hover:text-gray-300" id="Meeting-tab" data-fc-target="#Meeting" type="button" role="tab" aria-controls="Meeting" aria-selected="false"><i class="icofont-video-cam me-1 text-xl -mt-1"></i>Meeting</button>
                        </li>
                    </ul>
                </div>
            </div><!--end header-title-->
            <div class="flex-auto p-4">
                <div id="EmailBox">
                    <div class="" id="Inbox" role="tabpanel" aria-labelledby="Inbox-tab">
                        <div class="">
                            <button data-fc-type="modal" data-fc-target="compose_msg"  class="px-3 py-2 lg:px-4 block text-center w-full mb-4 bg-primary-500 text-white text-sm font-semibold rounded hover:bg-primary-600">Compose</button>
                            <a href="javascript:void(0)" class="list-group-item border-0 text-primary  font-medium p-2 rounded-md bg-slate-50 dark:bg-slate-700 dark:text-slate-300 active flex justify-between">
                                <span class="">
                                    <i class="text-lg icofont-inbox me-2"></i>Inbox
                                </span>
                                <span class="focus:outline-none text-[11px] bg-green-500/10 text-green-700 dark:text-green-600 rounded font-medium py-1 px-2">8</span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-star me-2"></i>Starred </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-wall-clock me-2"></i>Snoozed </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-tag me-2"></i>Important </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-location-arrow me-2"></i>Sent </a>
                            <a href="javascript:void(0)" class="list-group-item border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex justify-between">
                                <span>
                                    <i class="text-lg icofont-file-alt me-2"></i>Draft
                                </span>
                                <span class="focus:outline-none text-[11px] bg-slate-400/10 text-slate-700 dark:text-slate-400 rounded font-medium py-1 px-2">2</span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-calendar me-2"></i>Scheduled </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-confounded me-2"></i>Spam </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-mail me-2"></i>All Mail </a>
                            <a href="javascript:void(0)" class="list-group-item block border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700"> <i class="text-lg icofont-trash me-2"></i>Trash </a>
                        </div>
                        <a href="" class="font-medium text-base my-5 block dark:text-slate-200">Labels +</a>
                        <div>
                            <a href="javascript:void(0)" class="list-group-item border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex justify-between">
                                <span>
                                    <i class="text-lg icofont-file-alt me-2"></i>Theme Support
                                </span>
                                <span class="focus:outline-none border border-cyan-500 bg-cyan-500 text-white rounded-full w-3 h-3 justify-center items-center self-center flex text-center"><i class="icofont-caret-right text-[10px]"></i></span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex justify-between">
                                <span>
                                    <i class="text-lg icofont-briefcase me-2"></i>Freelance
                                </span>
                                <span class="focus:outline-none border border-yellow-400 bg-yellow-400 text-white rounded-full w-3 h-3 justify-center items-center self-center flex text-center"><i class="icofont-caret-right text-[10px]"></i></span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex justify-between">
                                <span>
                                    <i class="text-lg icofont-brand-whatsapp me-2"></i>Social
                                </span>
                                <span class="focus:outline-none border border-purple-400 bg-purple-400 text-white rounded-full w-3 h-3 justify-center items-center self-center flex text-center"><i class="icofont-caret-right text-[10px]"></i></span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex justify-between">
                                <span>
                                    <i class="text-lg icofont-users me-2"></i>Friends
                                </span>
                                <span class="focus:outline-none border border-pink-500 bg-pink-500 text-white rounded-full w-3 h-3 justify-center items-center self-center flex text-center"><i class="icofont-caret-right text-[10px]"></i></span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item border-0 p-2 text-slate-500 rounded-md  hover:text-slate-500 dark:hover:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 flex justify-between">
                                <span>
                                    <i class="text-lg icofont-home me-2"></i>Family
                                </span>
                                <span class="focus:outline-none border border-green-500 bg-green-500 text-white rounded-full w-3 h-3 justify-center items-center self-center flex text-center"><i class="icofont-caret-right text-[10px]"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="hidden" id="UserChat" role="tabpanel" aria-labelledby="UserChat-tab">
                        <div id="accordion-collapse" data-fc-type="accordion">
                            <h2 id="accordion-collapse-heading-1" data-fc-type="collapse">
                                <button type="button" class=" p-4 w-full font-medium text-left text-gray-500 rounded-t-md border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-toggle='collapse' href="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                    <div class="relative">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <i class="icofont-search z-[1]"></i>
                                        </div>
                                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Name, Email or Phone">
                                    </div>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="" aria-labelledby="accordion-collapse-heading-1">
                              <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <div class="flex items-center mb-3">
                                    <div class="w-8 h-8 rounded">
                                        <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-3.png" alt="logo" />
                                    </div>
                                    <div class="ms-2">
                                        <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Donald Gonzalez</h5></a>
                                        <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">Ontario, Canada</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-3">
                                    <div class="w-8 h-8 rounded">
                                        <img class="w-full h-full overflow-hidden object-cover rounded object-center" src="assets/images/users/avatar-2.png" alt="logo" />
                                    </div>
                                    <div class="ms-2">
                                        <a tabindex="0" class="cursor-pointer hover:text-gray-500 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none focus:underline"><h5 class=" font-medium text-sm">Ronald Young</h5></a>
                                        <p tabindex="0" class="focus:outline-none text-gray-500 dark:text-gray-400 text-xs font-medium">New york, USA</p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-3">
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
                            <h2 id="accordion-collapse-heading-2"  data-fc-type="collapse">
                              <button type="button" class="flex justify-between items-center p-4 w-full font-medium text-left text-gray-500 border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-toggle='collapse' href="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                <span><i class="icofont-users me-2"></i>Create Space</span>
                                <i class="icofont-simple-up" data-accordion-icon></i>
                              </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                              <div class="p-4 border border-b-0 border-gray-200 dark:border-gray-700">
                               <span class="text-slate-500 uppercase">Add Data</span>
                              </div>
                            </div>
                            <h2 id="accordion-collapse-heading-3"  data-fc-type="collapse">
                              <button type="button" class="flex justify-between items-center p-4 w-full font-medium text-left text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"  data-toggle='collapse' href="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                <span><i class="icofont-speech-comments me-2"></i>Message Requests</span>
                                <i class="icofont-simple-up" data-accordion-icon></i>
                              </button>
                            </h2>
                            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                              <div class="p-4 border border-t-0 border-gray-200 dark:border-gray-700 rounded-b-lg">
                                <span class="text-slate-500 uppercase">Add Data</span>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="Meeting" role="tabpanel" aria-labelledby="Meeting-tab">
                        <div class="gap-4 grid grid-cols-2">
                            <button class="col-span-1 text-blue-700 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 text-sm
                                font-medium py-1 w-full">
                                New Meeting
                            </button>
                            <button class="col-span-1 text-blue-700 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 text-sm
                            font-medium py-1 w-full">
                                Join a Meeting
                            </button>
                        </div>
                        <h6 class="uppercase text-slate-600 mt-4 text-sm font-medium">My Meeting</h6>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
    <div class="sm:col-span-12  md:col-span-12 lg:col-span-9 xl:col-span-9 ">
        <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
            <div class="p-4 grid grid-cols-12 gap-4">
                <div class="space-x-1 col-span-12 sm:col-span-9 md:col-span-8 lg:col-span-8 order-1 md:order-1">
                    <div class="inline-block relative -ms-1">
                        <label class="custom-label block dark:text-slate-300 relative -top-1">
                            <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                              <input type="checkbox" class="hidden">
                              <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                            </div>
                        </label>
                    </div>
                    <div class="inline-flex rounded-md" role="group">
                        <button type="button" class="py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <i class="icofont-inbox text-base"></i>
                        </button>
                        <button type="button" class="py-1 px-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                          <i class="icofont-exclamation text-base"></i>
                        </button>
                        <button type="button" class="py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            <i class="icofont-trash text-base"></i>
                        </button>
                    </div>
                    <div class="dropdown inline-block relative">
                        <button data-fc-autoclose="both" data-fc-type="dropdown" class=" py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" type="button">
                            <i class="icofont-folder me-1 text-base"></i>
                            <i class="icofont-chevron-down text-sm ms-auto"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="right-auto md:right-0 hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 border border-slate-700/10">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Update</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Social</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Team Manage</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Dropdown menu -->
                    <div class="dropdown inline-block relative">
                        <button data-fc-autoclose="both" data-fc-type="dropdown" class=" py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" type="button">
                            <i class="icofont-tag me-1 text-base"></i>
                            <i class="icofont-chevron-down text-sm ms-auto"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="right-auto md:right-0 hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 border border-slate-700/10">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Update</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Social</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Team Manage</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Dropdown menu -->
                    <!-- Dropdown menu -->
                    <div class="dropdown inline-block relative">
                        <button data-fc-autoclose="both" data-fc-type="dropdown" class=" py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" type="button">
                            <i class="icofont-plus text-base"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="right-auto md:right-0 hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 border border-slate-700/10">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mark as read</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mark as Important</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add to Tasks</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add Star</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mute</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="me-auto md:ms-auto md:me-0 text-right inline-block col-span-12  sm:col-span-3 md:col-span-4 lg:col-span-4 order-2 md:order-2">
                    <!-- Dropdown menu -->
                    <div class="dropdown inline-block relative">
                        <button data-fc-autoclose="both" data-fc-type="dropdown" class="py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" type="button">
                            <i class="icofont-question text-base"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="left-auto right-auto md:right-0  text-left hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 border border-slate-700/10">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mark as read</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mark as Important</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add to Tasks</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add Star</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mute</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Dropdown menu -->
                    <div class="inline-block relative">
                        <button data-fc-autoclose="both" data-fc-type="dropdown" class="dropdown-toggle py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" type="button">
                            <i class="icofont-ui-settings text-base"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="left-auto right-auto md:right-0 text-left hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 border border-slate-700/10">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mark as read</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mark as Important</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add to Tasks</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Add Star</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Mute</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!--end card-header-->
            <div class="card-body">
                <ul class="">
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" checked />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">me, Susanna (7)</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> <span class="focus:outline-none border border-orange-300 dark:border-orange-400/60 text-[11px] bg-orange-500/10 text-orange-500 rounded font-medium py-0.5 px-2 me-1">Freelance</span>Since you asked... and i'm
                                    inconceivably bored at the train station &nbsp;–&nbsp;
                                    <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 6</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Hello &nbsp;–&nbsp; <span class="teaser">Trip home from 🎉 Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 5</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 dark:text-slate-200 hover:bg-slate-50 bg-white dark:bg-slate-700 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md unread">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden" checked>
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Web Support Dennis</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Re: New mail settings &nbsp;–&nbsp;
                                    <span class="">Will you answer him asap?</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 5</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden" checked>
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Me, peter</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"><span class="focus:outline-none border border-cyan-300 dark:border-cyan-500 text-[11px] bg-cyan-500/10 text-cyan-500 rounded font-medium py-0.5 px-2 me-1">Support</span> Off on Thursday &nbsp;–&nbsp;
                                    <span class="">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 4</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"><span class="focus:outline-none border border-blue-300 dark:border-blue-500 text-[11px] bg-blue-500/10 text-blue-500 rounded font-medium py-0.5 px-2 me-1">Social</span> This Week's Top Stories &nbsp;–&nbsp;
                                     <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 3</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Hello &nbsp;–&nbsp; <span class="teaser">Trip home from Colombo has been arranged, then Jenna will 🎁 come get me from Stockholm. :)</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 3</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" checked/>
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Web Support Dennis</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Re: New mail settings &nbsp;–&nbsp;
                                    <span class="">Will you answer him asap? 👌</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 2</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden" checked>
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Me, peter</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"><span class="focus:outline-none border border-cyan-300 dark:border-cyan-500 text-[11px] bg-cyan-500/10 text-cyan-500 rounded font-medium py-0.5 px-2 me-1">Support</span> Off on Thursday &nbsp;–&nbsp;
                                     <span class="">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span></p>
                                 </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 2</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"><span class="focus:outline-none border border-blue-300 dark:border-blue-500 text-[11px] bg-blue-500/10 text-blue-500 rounded font-medium py-0.5 px-2 me-1">Social</span> This Week's Top Stories &nbsp;–&nbsp;
                                     <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 1</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Hello &nbsp;–&nbsp; <span class="teaser">🏏 Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 1</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">me, Susanna (7)</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"> <span class="focus:outline-none border border-orange-300 dark:border-orange-400/60 text-[11px] bg-orange-500/10 text-orange-500 rounded font-medium py-0.5 px-2 me-1">Freelance</span>Since you asked... and i'm
                                    inconceivably bored at the train station &nbsp;–&nbsp;
                                    <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 6</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Hello &nbsp;–&nbsp; <span class="teaser">Trip home from 🎉 Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 5</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden" checked>
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Web Support Dennis</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Re: New mail settings &nbsp;–&nbsp;
                                    <span class="">Will you answer him asap?</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 5</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Me, peter</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"><span class="focus:outline-none border border-cyan-300 dark:border-cyan-500 text-[11px] bg-cyan-500/10 text-cyan-500 rounded font-medium py-0.5 px-2 me-1">Support</span> Off on Thursday &nbsp;–&nbsp;
                                     <span class="">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 4</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"><span class="focus:outline-none border border-blue-300 dark:border-blue-500 text-[11px] bg-blue-500/10 text-blue-500 rounded font-medium py-0.5 px-2 me-1">Social</span> This Week's Top Stories &nbsp;–&nbsp;
                                     <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 3</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Hello &nbsp;–&nbsp;
                                       <span class="teaser">Trip home from Colombo has been arranged, then Jenna will 🎁 come get me from Stockholm. :)
                                       </span>
                                    </p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 3</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Web Support Dennis</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"> Re: New mail settings &nbsp;–&nbsp;
                                    <span class="">Will you answer him asap? 👌</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 2</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Me, peter</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                    <p class="truncate"><span class="focus:outline-none border border-cyan-300 dark:border-cyan-500 text-[11px] bg-cyan-500/10 text-cyan-500 rounded font-medium py-0.5 px-2 me-1">Support</span> Off on Thursday &nbsp;–&nbsp;
                                     <span class="">Eff that place, you might as well stay here with us instead! Sent from my iPhone 4 &gt; 4 mar 2014 at 5:55 pm</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 2</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate"><span class="focus:outline-none border border-blue-300 dark:border-blue-500 text-[11px] bg-blue-500/10 text-blue-500 rounded font-medium py-0.5 px-2 me-1">Social</span> This Week's Top Stories &nbsp;–&nbsp;
                                    <span class="teaser">Our top pick for you on Medium this week The Man Who Destroyed America’s Ego</span></p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 1</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
                        <div class="grid grid-cols-12">
                            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                                <div class="inline-block me-4 relative top-1">
                                    <label class="custom-label block dark:text-slate-300 relative -top-1">
                                        <div class="bg-white dark:bg-slate-700  border border-slate-200 dark:border-slate-600 w-6 h-6  inline-block leading-6 text-center -mb-[6px]">
                                          <input type="checkbox" class="hidden">
                                          <i class="icofont-check hidden text-[20px] text-brand-500 dark:text-brand-400"></i>
                                        </div>
                                    </label>
                                </div>
                                <label class="custom-checkbox mb-0 self-center">
                                    <input type="checkbox" />
                                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                                </label>
                            </div>
                            <div class="col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
                                <a href="#" class="">
                                    <span class="truncate">Peter, me</span>
                                </a>
                            </div>
                            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                                <a href="#" class="">
                                   <p class="truncate">
                                       Hello &nbsp;–&nbsp;
                                       <span class="teaser">🏏 Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                                <span class="text-sm text-slate-500">Mar. 1</span>
                            </div>
                        </div>
                    </li><!--end /li-->
                </ul><!--end /ul-->
            </div><!--end card-body-->
        </div> <!--end card-->
        <div class="flex justify-between mt-4">
            <div class="self-center">
                <p class="dark:text-slate-400">Showing 1 - 20 of 1,524</p>
            </div>
            <div class="self-center">
                <div class="inline-flex rounded-md" role="group">
                    <button type="button" class="py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-r-0 border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <i class="icofont-simple-left text-base"></i>
                    </button>
                    <button type="button" class="py-1 px-2 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        <i class="icofont-simple-right text-base"></i>
                    </button>
                </div>
            </div>
        </div>
    </div><!--end col-->
</div><!--end inner-grid-->

<style>
    .hidden {
    display: none;
}

</style>





<script>
    function showCard(cardId) {
        const cards = document.querySelectorAll('.card-content');
        cards.forEach(card => card.classList.add('hidden'));
        const selectedCard = document.getElementById(cardId);
        if (selectedCard) {
            selectedCard.classList.remove('hidden');
        }
    }
</script>


@endsection
