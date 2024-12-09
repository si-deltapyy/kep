

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
                            Approved <span class="text-slate-400">(155)</span>
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
                            Progress <span class="text-slate-400">(25)</span>
                            </button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="cek-tab"
                            data-fc-target="#cek"
                            type="button"
                            role="tab"
                            aria-controls="cek"
                            aria-selected="false"
                            >
                            Perbaikan <span class="text-slate-400">(25)</span>
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
                                    $data1 = $user->filter(function ($user) {
                                        return $user->doc_status === 'new-proposal'; // Filter hanya doc_status 'approved'
                                    })->map(function ($user) {
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
                                    $data1 = $user->filter(function ($user) {
                                        return $user->doc_status === 'approved'; // Filter hanya doc_status 'approved'
                                    })->map(function ($user) {
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
                                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                    {{-- table --}}
                                    <!-- resources/views/somepage.blade.php -->
                                    @php
                                    // Data
                                    $head1 = ['ID', 'Usulan', 'Status', 'Date'];
                                    $data1 = $user->filter(function ($user) {
                                        return $user->doc_status === 'on-review'; // Filter hanya doc_status 'approved'
                                    })->map(function ($user) {
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
                        <div
                        class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800"
                        id="cek"
                        role="tabpanel"
                        aria-labelledby="cek-tab"
                        >
                        <div class="grid grid-cols-1 p-0 md:p-4">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                    {{-- table --}}
                                    <!-- resources/views/somepage.blade.php -->
                                    @php
                                    // Data
                                    $head1 = ['ID', 'Usulan', 'Status', 'Date'];
                                    $data1 = $user->filter(function ($user) {
                                        return $user->doc_status === 'revised' ||
                                            $user->doc_status === 'resubmission' ||
                                            $user->doc_status === 'disapproved'; // Filter hanya doc_status 'approved'
                                    })->map(function ($user) {
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
    @can('approved')
    <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
        <div class="ml-5">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Menunggu Konfirmasi Akun dari Sekretariat KEP FKIP UNS</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Waktu 1x24 Jam atau mungkin bisa lebih cepat</p>
        </div>
    </div>
    @endcan
@endrole

@role('sekretariat')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
        <!-- Card Jumlah Ajuan -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
            <div class="p-4 bg-primary-500/10 rounded-full text-primary-500 dark:bg-primary-400/20 dark:text-primary-400">
                <span data-lucide="file-input" class="w-10 h-10 inline-block "></span>
            </div>
            <div class="ml-5">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Jumlah Ajuan</h3>
                <p class="mt-2 text-3xl font-bold text-primary-500 dark:text-primary-400">{{ $jumlahAjuan }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Ajuan yang telah diajukan.</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
            <div class="p-4 bg-purple-500/10 rounded-full text-purple-500 dark:bg-purple-400/20 dark:text-purple-400">
                <span data-lucide="book-open-check" class="w-10 h-10 inline-block "></span>
            </div>
            <div class="ml-5">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">On Review</h3>
                <p class="mt-2 text-3xl font-bold text-purple-500 dark:text-purple-400">{{ $jumlahOnReview }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Dokumen dalam proses</p>
            </div>
        </div>

        <!-- Card Jumlah User -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
            <div class="p-4 bg-green-500/10 rounded-full text-green-500 dark:bg-green-400/20 dark:text-green-400">
                <span data-lucide="user-check" class="w-10 h-10 inline-block "></span>
            </div>
            <div class="ml-5">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Reviewer</h3>
                <p class="mt-2 text-3xl font-bold text-green-500 dark:text-green-400">{{ $jumlahUser }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Reviewer</p>
            </div>
        </div>

        <!-- Card Jumlah Dokumen -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex items-center dark:bg-gray-800">
            <div class="p-4 bg-yellow-500/10 rounded-full text-yellow-500 dark:bg-yellow-400/20 dark:text-yellow-400">
                <span data-lucide="bell-ring" class="w-10 h-10 inline-block "></span>
            </div>
            <div class="ml-5">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Requested User</h3>
                <p class="mt-2 text-3xl font-bold text-yellow-500 dark:text-yellow-400">{{ $jumlahReq }}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Dokumen yang tersedia.</p>
            </div>
        </div>

    </div>
@endrole

@role('reviewer')
<div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
    <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-cente">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">Total Document</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">14253</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="shopping-cart" class=" h-16 w-16 stroke-primary-500/30"></i>
                    </div>
                </div>

            </div><!--end card-body-->
            <div class="flex-auto p-0 overflow-hidden">
                <div class="flex mb-0 h-full">
                    <div class="w-full">
                        <div class="apexchart-wrapper">
                            <div id="apex_column1" class="chart-gutters"></div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end inner-grid-->
    </div><!--end col-->
    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-cente">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">New Document</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">532</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="users" class=" h-16 w-16 stroke-green/30"></i>
                    </div>
                </div>
            </div><!--end card-body-->
            <div class="flex-auto p-0 overflow-hidden">
                <div class="flex mb-0 h-full">
                    <div class="w-full">
                        <div class="apexchart-wrapper">
                            <div id="dash_spark_1" class="chart-gutters"></div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end inner-grid-->
    </div><!--end col-->
    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-cente">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Total Pengajuan</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">78</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="gem" class=" h-16 w-16 stroke-yellow-500/30"></i>
                    </div>
                </div>
            </div><!--end card-body-->
            <div class="flex-auto p-0 overflow-hidden">
                <div class="grid grid-cols-12">
                    <div class="col-span-6">
                        <div id="ana_device" class="apex-charts"></div>
                    </div><!--end col-->
                    <div class="col-span-6">
                        <ol class="list-none list-inside">
                            <li class="-mt-1 text-slate-700 dark:text-slate-400 text-sm"><i class="icofont-caret-right text-primary-500 text-lg"></i> Diajukan</li>
                            <li class="-mt-1 text-slate-700 dark:text-slate-400 text-sm"><i class="icofont-caret-right text-green-500 text-lg"></i> Diterima</li>
                            <li class="-mt-1 text-slate-700 dark:text-slate-400 text-sm"><i class="icofont-caret-right text-red-500 text-lg"></i> Ditolak</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end grid-->
            </div><!--end card-body-->
        </div> <!--end inner-grid-->
    </div>

</div> <!--end grid-->

<div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
    <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-8 xl:col-span-8">
        <div class="w-full relative mb-4">
            <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-3 px-4 dark:text-slate-300/70">
                <div class="flex-none md:flex">
                    <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">Grafik Ajuan</h4>
                    <div class="dropdown inline-block">
                        <button data-fc-autoclose="both" data-fc-type="dropdown" class="dropdown-toggle px-3 py-1 text-xs font-medium text-gray-500 focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-50 hover:text-slate-800 focus:z-10 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            This Month
                            <i class="fas fa-chevron-down text-xs ml-2"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="right-auto md:right-0 hidden z-10 w-28 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Last Week</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Last Month</a>
                            </li>
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">This Year</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-auto p-4">
                <div id="crm-dash" class="apex-charts mt-5"></div>
            </div><!--end card-body-->
        </div> <!--end inner-grid-->
    </div><!--end col-->
</div> <!--end grid-->
@endrole

@endsection
