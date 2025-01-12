@can('waiting-acception')
<div class="my-4">
    <h5 class="text-xxl font-semibold text-slate-700 dark:text-gray-400 mb-4">
    Harap menunggu Konfirmasi dari Admin KEP FKIP
    </h5>
    <p>Tunggu 1x24 Jam atau lebih cepat!</p>
</div>
@endcan

{{-- Alert Untuk Update profile --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <button type="button" role="button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 101.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z" />
            </svg>
        </button>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.alert [role="button"]').forEach(function (button) {
        button.addEventListener('click', function () {
            this.closest('.alert').remove();
        });
        });
    });
</script>


@can('update-profile')
<div class="my-4">
    <h5 class="text-xxl font-semibold text-slate-700 dark:text-gray-400 mb-4">
    Harap Lengkapi Profil Dahulu !
    </h5>
    <a href="{{route('user.profile.make', Auth::user()->id)}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
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
                @if ($profile->gender == 'laki-laki')
                <img
                    src="{{asset('assets/images/users/male.jpg')}}"
                    alt=""
                    class="rounded-full mx-auto inline-block"
                />
                @else
                    <img
                    src="{{asset('assets/images/users/female.jpg')}}"
                    alt=""
                    class="rounded-full mx-auto inline-block"
                />
                @endif


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
                    Approved <span class="text-slate-400">({{$jumDone}})</span>
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
                    Progress <span class="text-slate-400">({{$jumlahOnReview}})</span>
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
                    Perbaikan <span class="text-slate-400">({{$perbaikan}})</span>
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
                                $head1 = ['ID', 'Usulan', 'Status', 'Date'];
                                $data1 = $user->filter(function ($user) {
                                    return $user->doc_status === 'new-proposal';
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
                                        $user->id => '<form action="' . route('sekertaris.review.destroy', $user->id) . '" method="post" style="display:inline;">
                                            ' . csrf_field() .
                                            method_field('DELETE') . '
                                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                        </form>
                                        <a href="' . route('sekertaris.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
                                    ];
                                })->toArray();

                                $customColumns = [
                                    'doc_status' => function ($cell, $row) {
                                        switch ($cell) {
                                            //dark
                                            case 'new-proposal':
                                                return '<span class="bg-gray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">New Proposal</span>';
                                            //yellow
                                            case 'process':
                                                return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Process</span>';
                                            case 'on-review':
                                                return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">On Review</span>';
                                            //Green
                                            case 'approved':
                                                return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Approved</span>';
                                            case 'approved-with':
                                                return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded  ">Approved With</span>';
                                            case 'done':
                                                return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Done</span>';
                                            //Pink
                                            case 'resubmission':
                                                return '<span class="bg-pink-500/10 text-pink-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Resubmission</span>';
                                            case 'revised':
                                                return '<span class="bg-pink-500/10 text-pink-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Revised</span>';
                                            //Red
                                            case 'disapproved':
                                                return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Rejected</span>';

                                            default:
                                                return $cell;
                                        }
                                    }
                                ];
                            @endphp

                            <x-table
                                :head="$head1"
                                :data="$data1->toArray()"
                                :actionHeader="true"
                                :actionSelect="true"
                                :actionColumn="$actions1"
                                :customColumns="$customColumns"
                            />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
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
                                    $user->id => '<form action="' . route('sekertaris.review.destroy', $user->id) . '" method="post" style="display:inline;">
                                        ' . csrf_field() .
                                        method_field('DELETE') . '
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                    <a href="' . route('sekertaris.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
                                ];
                            })->toArray();
                            @endphp
                            <x-table
                                :head="$head1"
                                :data="$data1->toArray()"
                                :actionHeader="true"
                                :actionSelect="true"
                                :actionColumn="$actions1"
                                :customColumns="$customColumns"
                            />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
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
                                    $user->id => '<form action="' . route('sekertaris.review.destroy', $user->id) . '" method="post" style="display:inline;">
                                        ' . csrf_field() .
                                        method_field('DELETE') . '
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                    <a href="' . route('sekertaris.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
                                ];
                            })->toArray();
                            @endphp
                            <x-table
                                :head="$head1"
                                :data="$data1->toArray()"
                                :actionHeader="true"
                                :actionSelect="true"
                                :actionColumn="$actions1"
                                :customColumns="$customColumns"
                            />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
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
                                    $user->id => '<form action="' . route('sekertaris.review.destroy', $user->id) . '" method="post" style="display:inline;">
                                        ' . csrf_field() .
                                        method_field('DELETE') . '
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                    <a href="' . route('sekertaris.review.edit', $user->id) . '" class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>'
                                ];
                            })->toArray();
                            @endphp
                            <x-table
                                :head="$head1"
                                :data="$data1->toArray()"
                                :actionHeader="true"
                                :actionSelect="true"
                                :actionColumn="$actions1"
                                :customColumns="$customColumns"
                            />
                        </div>
                        <!--end div-->
                    </div>
                    <!--end div-->
                </div>
                <!--end grid-->
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
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Menunggu Konfirmasi Akun dari Admin KEP FKIP UNS</h3>
    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Waktu 1x24 Jam atau mungkin bisa lebih cepat</p>
</div>
</div>
@endcan
