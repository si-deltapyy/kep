@can('update-password')
    <div class="modal animate-ModalSlide" id="modal-primary">
        <div class="relative w-auto pointer-events-none sm:max-w-lg sm:my-0 sm:mx-auto z-[99] flex items-center h-[calc(100%-3.5rem)]">
            <div class="relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-800 bg-clip-padding rounded">
                <!-- Header Modal -->
                <div class="flex shrink-0 items-center justify-between py-2 px-4 rounded-t border-b border-solid dark:border-gray-700 bg-slate-800">
                    <h6 class="mb-0 leading-4 text-base font-semibold text-slate-300 mt-0" id="modalLabel">Ubah Password</h6>
                </div>

                <!-- Body Modal -->
                <div class="relative flex-auto p-4 text-slate-600 dark:text-gray-300 leading-relaxed">
                    <p>Harap Mengganti <strong>Password</strong> dahulu dengan syarat:</p>
                    <li class=" text-gray-400"><i>Minimal 8 Karakter</i></li>
                    <li class=" text-gray-400"><i>Harus ada huruf kecil dan angka</i></li>
                    <br>
                    <form action="{{ route('reviewer.update-password') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password Baru</label>
                            <input type="password"
                                class="form-control w-full px-3 py-2 border rounded-lg dark:bg-slate-700 dark:border-gray-600 dark:text-gray-300 @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Masukkan Password Baru">
                            @error('password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end p-3 rounded-b border-t border-dashed dark:border-gray-700">
                            <button type="submit"
                                    class="inline-block focus:outline-none text-primary-500 hover:bg-primary-500 hover:text-white bg-transparent border border-gray-200 dark:text-primary-500 dark:hover:text-white dark:border-gray-700 dark:hover:bg-primary-500 text-sm font-medium py-1 px-3 rounded">
                                <i class="fas fa-key mr-1"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcan

@can('done-password')
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
@endcan