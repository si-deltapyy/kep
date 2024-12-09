

@extends('layouts.app')
@section('title')
<x-page-tittle :title="'Dashboard'" :slash1="'Users'" :slash2="'Dashboard'" :slash3="''"></x-page-tittle>
@endsection

@section('content')
@role('user')
@can('update-profile')
<div class="my-4">
    <h5 class="text-xxl font-semibold text-slate-700 dark:text-gray-400 mb-4">
    Harap Lengkapi Profil Dahulu !
    </h5>
    <a href="{{route('user.profile.index', Auth::user()->id)}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
        <i class="ti ti-plus me-1"></i>
        Update Profile
    </a>
</div>
@endcan
@can('done-profile')
<div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xl:col-span-3">
        <div class="">
            <div class="text-center">
            <img
                src="assets/images/users/male.jpg"
                alt=""
                class="rounded-full mx-auto inline-block"
            />
            <div class="my-4">
                <h5
                class="text-xxl font-semibold text-slate-700 dark:text-gray-400"
                >
                {{ $profile->name }}
                </h5>
                <span class="block font-medium text-slate-500"
                >{{ Auth::user()->roles[0]->name }}</span
                >
            </div>
            </div>
            <div
            class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4"
            >
            <div
                class="col-span-12 sm:col-span-12 md:col-span-5 text-end"
            >
                <span class="dark:text-slate-300">Email :</span>
            </div>
            <!--end col-->
            <div class="col-span-12 sm:col-span-12 md:col-span-7">
                <span class="dark:text-slate-400">{{ Auth::user()->email }}</span>
            </div>
            <!--end col-->
            <div
                class="col-span-12 sm:col-span-12 md:col-span-5 text-end"
            >
                <span class="dark:text-slate-300">Phone :</span>
            </div>
            <!--end col-->
            <div class="col-span-12 sm:col-span-12 md:col-span-7">
                <span class="dark:text-slate-400">{{ $profile->phone_number }}</span>
            </div>
            <!--end col-->
            <div
                class="col-span-12 sm:col-span-12 md:col-span-5 text-end"
            >
                <span class="dark:text-slate-300">Status :</span>
            </div>
            <!--end col-->
            <div class="col-span-12 sm:col-span-12 md:col-span-7">
                <span class="dark:text-slate-400">{{ $profile->status }}</span>
            </div>
            <!--end col-->
            <div
                class="col-span-12 sm:col-span-12 md:col-span-5 text-end"
            >
                <span class="dark:text-slate-300">Address :</span>
            </div>
            <!--end col-->
            <div class="col-span-12 sm:col-span-12 md:col-span-7">
                <span class="dark:text-slate-400"
                >{{ $profile->address }}</span
                >
            </div>
            <!--end col-->
            </div>
            <!--end grid-->
            <div
            class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
            ></div>
        </div>
    </div>
    <!--end col-->
    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">

        <div class="w-full relative mb-4">
            <div class="flex-auto p-0 md:p-4">
            <div
                class="mb-4 border-b border-gray-200 dark:border-slate-700"
                data-fc-type="tab"
            >
                <ul
                class="flex flex-wrap -mb-px text-sm font-medium text-center"
                aria-label="Tabs"
                >
                {{-- <li class="me-2" role="presentation"></li>
                    <button
                        class="inline-block p-4 rounded-t-lg border-b-2 lg:px-4 bg-primary text-white text-sm rounded hover:bg-primary-600 border border-primary-500"
                        onclick="window.location.href=
                        'index.html'
                        "
                    <a class="inline-block p-4 rounded-t-lg border-b-2 lg:px-4 bg-primary text-white text-sm rounded hover:bg-primary-600 border border-primary-500"
                    href="{{ route('ajuan.index') }}">Usulkan</a>
                </li> --}}
                <li class="me-2" role="presentation">
                    <button
                    class="inline-block p-4 rounded-t-lg border-b-2 active"
                    id="orders-tab"
                    data-fc-target="#orders"
                    type="button"
                    role="tab"
                    aria-controls="orders"
                    aria-selected="false"
                    >
                    New Proposal <span class="text-slate-400">({{$newProposal}})</span>
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="wishlist-tab"
                    data-fc-target="#wishlist"
                    type="button"
                    role="tab"
                    aria-controls="wishlist"
                    aria-selected="false"
                    >
                    Accept <span class="text-slate-400">(155)</span>
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="ratings-tab"
                    data-fc-target="#ratings"
                    type="button"
                    role="tab"
                    aria-controls="ratings"
                    aria-selected="false"
                    >
                    Rejected <span class="text-slate-400">(25)</span>
                    </button>
                </li>
                </ul>
            </div>

            <div id="myTabContent">
                <div
                class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20"
                id="orders"
                role="tabpanel"
                aria-labelledby="orders-tab"
                >
                <div class="grid grid-cols-1 p-0 md:p-4">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                            {{-- table --}}
                            <!-- resources/views/somepage.blade.php -->
                            @php
                            // Data
                            $head1 = ['ID', 'Usulan', 'Status', 'Date'];
                            $data1 = $user->map(function($user) {
                                return [
                                    'id' => $user->id,
                                    'title' => $user->title,
                                    'doc_status' => $user->doc_status,
                                    'created_at' => $user->created_at,
                                    ];
                            });

                            $actions1 = $user->mapWithKeys(function ($user) {
                                return [
                                    $user->id => '<form action="' . route('sekretariat.review.destroy', $user->id) . '" method="post" style="display:inline;">
                                        ' . csrf_field() .
                                        method_field('DELETE') . '
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                    <a href="' . route('sekretariat.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
                                ];
                            })->toArray();
                            @endphp
                            <x-table
                                :head="$head1"
                                :data="$data1->toArray()"
                                :actionHeader="true"
                                :actionSelect="true"
                                :actionColumn="$actions1"
                            />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
                <div class="flex justify-between mt-4">
                    <div class="self-center">
                    <p class="dark:text-slate-400">
                        Showing 1 - 20 of 1,524
                    </p>
                    </div>
                    <div class="self-center">
                    <ul class="inline-flex items-center -space-x-px">
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 ms-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-left"></i>
                        </a>
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >1</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            aria-current="page"
                            class="z-10 py-2 px-3 leading-tight text-brand-600 bg-brand-50 border border-brand-300 hover:bg-brand-100 hover:text-brand-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                            >2</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >3</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-right"></i>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
                <div
                class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800"
                id="wishlist"
                role="tabpanel"
                aria-labelledby="wishlist-tab"
                >
                <div class="grid grid-cols-1 p-0 md:p-4">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                            {{-- table --}}
                            <!-- resources/views/somepage.blade.php -->
                            @php
                            // Data
                            $head1 = ['ID', 'Usulan', 'Status', 'Date'];
                            $data1 = $user->map(function($user) {
                                return [
                                    'id' => $user->id,
                                    'title' => $user->title,
                                    'doc_status' => $user->doc_status,
                                    'created_at' => $user->created_at,
                                    ];
                            });

                            $actions1 = $user->mapWithKeys(function ($user) {
                                return [
                                    $user->id => '<form action="' . route('sekretariat.review.destroy', $user->id) . '" method="post" style="display:inline;">
                                        ' . csrf_field() .
                                        method_field('DELETE') . '
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                    <a href="' . route('sekretariat.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
                                ];
                            })->toArray();
                            @endphp
                            <x-table
                                :head="$head1"
                                :data="$data1->toArray()"
                                :actionHeader="true"
                                :actionSelect="true"
                                :actionColumn="$actions1"
                            />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
                <div class="flex justify-between mt-4">
                    <div class="self-center">
                    <p class="dark:text-slate-400">
                        Showing 1 - 20 of 1,524
                    </p>
                    </div>
                    <div class="self-center">
                    <ul class="inline-flex items-center -space-x-px">
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 ms-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-left"></i>
                        </a>
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >1</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            aria-current="page"
                            class="z-10 py-2 px-3 leading-tight text-brand-600 bg-brand-50 border border-brand-300 hover:bg-brand-100 hover:text-brand-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                            >2</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >3</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-right"></i>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
                <div
                class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800"
                id="ratings"
                role="tabpanel"
                aria-labelledby="ratings-tab"
                >
                <div class="grid grid-cols-1 p-0 md:p-4">
                    <div class="sm:-mx-6 lg:-mx-8">
                    <div
                        class="relative overflow-x-auto block w-full sm:px-6 lg:px-8"
                    >
                        <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-600/20">
                            <tr>
                            <th
                                scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                            >
                                Items
                            </th>
                            <th
                                scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                            >
                                Review
                            </th>
                            <th
                                scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                            >
                                Status
                            </th>
                            <th
                                scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                            >
                                Date
                            </th>
                            <th
                                scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                            >
                                Action
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 1 -->
                            <tr
                            class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40"
                            >
                            <td
                                class="p-3 text-sm font-medium whitespace-nowrap dark:text-white"
                            >
                                <div class="flex items-center">
                                <img
                                    src="assets/images/products/pro-5.png"
                                    alt=""
                                    class="me-2 h-8 inline-block"
                                />
                                <div class="self-center">
                                    <h5
                                    class="text-sm font-semibold text-slate-700 dark:text-gray-400"
                                    >
                                    Mannat Watch 3 Active
                                    </h5>
                                    <span
                                    class="block font-medium text-slate-500"
                                    >Latest Model 2023</span
                                    >
                                </div>
                                </div>
                            </td>
                            <td
                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                            >
                                <ul class="flex">
                                <li>
                                    <i
                                    class="icofont-star text-yellow-400"
                                    ></i>
                                </li>
                                <li>
                                    <i
                                    class="icofont-star text-yellow-400"
                                    ></i>
                                </li>
                                <li>
                                    <i
                                    class="icofont-star text-yellow-400"
                                    ></i>
                                </li>
                                <li>
                                    <i
                                    class="icofont-star text-yellow-400"
                                    ></i>
                                </li>
                                <li>
                                    <i
                                    class="icofont-star text-yellow-400"
                                    ></i>
                                </li>
                                </ul>
                            </td>

                            <td
                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                            >
                                <span
                                class="bg-green-600/5 text-green-600 text-[11px] font-medium px-2.5 py-0.5 rounded h-5"
                                >SUCCESS</span
                                >
                            </td>
                            <td
                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                            >
                                20 Feb 2023
                            </td>
                            <td
                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                            >
                                <a href="#"
                                ><i
                                    class="icofont-ui-edit text-lg text-gray-500 dark:text-gray-400"
                                ></i
                                ></a>
                                <a href="#"
                                ><i
                                    class="icofont-ui-delete text-lg text-red-500 dark:text-red-400"
                                ></i
                                ></a>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
                <div class="flex justify-between">
                    <div class="self-center">
                    <p class="dark:text-slate-400">
                        Showing 1 - 20 of 1,524
                    </p>
                    </div>
                    <div class="self-center">
                    <ul class="inline-flex items-center -space-x-px">
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 ms-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-left"></i>
                        </a>
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >1</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            aria-current="page"
                            class="z-10 py-2 px-3 leading-tight text-brand-600 bg-brand-50 border border-brand-300 hover:bg-brand-100 hover:text-brand-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                            >2</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            >3</a
                        >
                        </li>
                        <li>
                        <a
                            href="#"
                            class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >
                            <i class="icofont-simple-right"></i>
                        </a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@endcan
@endrole

@role('sekretariat')
sekre
@endrole

@role('reviewer')
rev
@endrole
@endsection
