<div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
    <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
            <div class="flex-auto p-4">
                <div class="flex justify-between xl:gap-x-2 items-cente">
                    <div class="self-center">
                        <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">On Review</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $jumlahOnReview }}</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="book-open-check" class=" h-16 w-16 stroke-primary-500/30"></i>
                    </div>
                </div>

            </div><!--end card-body-->
            <div class="flex-auto p-0 overflow-hidden">
                <div class="flex mb-0 h-full">
                    <div class="w-full">
                        <div class="apexchart-wrapper">
                            <div id="review_chart" class="chart-gutters"></div>
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
                        <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Requested User</p>
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $jumlahReq }}</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="bell-ring" class=" h-16 w-16 stroke-green/30"></i>
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
                        <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $jumlahAjuan }}</h3>
                    </div>
                    <div class="self-center">
                        <i data-lucide="file-input" class=" h-16 w-16 stroke-yellow-500/30"></i>
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

<div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900   rounded-md w-full relative">
            <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-4 px-4 dark:text-slate-300/70">
                <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">Laporan User</h4>
            </div><!--end header-title-->
            <div class="grid grid-cols-1 p-4">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                        <table class="w-full">
                            <thead class="bg-brand-400/10 dark:bg-slate-700/20">
                                <tr>
                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Nama
                                    </th>
                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Email
                                    </th>
                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Status Verifikasi Email
                                    </th>
                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Tanggal Mendaftar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- 1 -->
                                @foreach ($userReq as $x)
                                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                    <td class="p-3 text-base  text-gray-600 whitespace-nowrap dark:text-gray-400">
                                        {{$x->name}}
                                    </td>
                                    <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$x->email}}
                                    </td>
                                    <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        @if (is_null($x->email_verified_at))
                                            <span class="text-red-500">Belum Verifikasi</span>
                                        @else
                                            <span class="text-green-500">Terverifikasi</span>
                                        @endif
                                    </td>
                                    <td class="p-3 text-base text-gray-700 whitespace-nowrap dark:text-gray-400">
                                        <span class="font-semibold">{{$x->created_at}}</span>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
    <div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
        <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900   rounded-md w-full relative">
            <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-4 px-4 dark:text-slate-300/70">
                <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">Pengajuan</h4>
             </div><!--end header-title-->
            <div class="grid grid-cols-1 p-4">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                        <table class="w-full">
                            <thead class="bg-brand-400/10 dark:bg-slate-700/20">
                                <tr>
                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Judul Ajuan
                                    </th>
                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Tanggal Pengajuan
                                    </th>

                                    <th scope="col" class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                        Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ajuan as $d)
                                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                    <td class="p-3 text-base font-medium whitespace-nowrap dark:text-white">
                                        {{$d->title}}
                                    </td>
                                    <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$d->created_at}}
                                    </td>
                                    <td class="p-3 text-base text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        @if ($d->doc_status == 'new-proposal')
                                            <span class="focus:outline-none text-[12px] bg-gray-600/10 text-yellow-300 dark:text-yellow-300 rounded font-medium py-1 px-2">Belum Diproses</span>
                                        @elseif ($d->doc_status == 'disapproved')
                                            <span class="focus:outline-none text-[12px] bg-gray-600/10 text-red-700 dark:text-red-600 rounded font-medium py-1 px-2">Ditolak</span>
                                        @else
                                            <span class="focus:outline-none text-[12px] bg-gray-600/10 text-blue-700 dark:text-blue-600 rounded font-medium py-1 px-2">Sedang Diproses</span>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end card-body-->
        </div> <!--end card-->
    </div><!--end col-->
</div><!--end inner-grid-->



@push('pages-script')
<script>
//graph review
try{
  var options = {



    chart: {
        height:80,
        animations: {
            enabled: false
        },
        sparkline: {
            enabled: true
        },
        dropShadow: {
          enabled: true,
          top: 12,
          left: 0,
          bottom: 0,
          right: 0,
          blur: 2,
          color: "rgba(132, 145, 183, 0.3)",
          opacity: 0.35,
        },
        type:"bar"
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: "rounded",
            columnWidth: "40%"
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"]
    },
    colors: ["#5C3DC3"],
    series: {!! json_encode($series) !!},
    xaxis: {
        ategories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        crosshairs: {
            show: false,
        },
    },
    fill: {
        opacity: 0.9
    },

    tooltip: {
        y: {
            formatter:function(val) {
                return" "+val+" "
            },
        },
    }

 }
var chart = new ApexCharts(
    document.querySelector("#review_chart"),
    options
  );

  chart.render();
}catch(err){}

</script>

@endpush
