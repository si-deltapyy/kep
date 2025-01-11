
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">

    @if ($doc->isEmpty())
        <div class="mb-4 justify-center">
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium text-center text-red-600"><i data-lucide="ban" class="w-4 h-4 inline-block me-2"></i>Belum ada Penerbitan EC Document</h1>
            </div>
        </div>
    @else
        @foreach ($doc as $x)
        <div class="mb-4">
            <div>

                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium">{{$x->title}}</h1>
                <div class="mb-3 mt-3">
                <table>
                    <li>{{$x->doc_name}}</li>
                </table>
                </div>
                @if ($x->ec_status == 'Waiting Sign KPPM')
                <form action="{{ route('kppm.ec.download', $x->id) }}" method="POST">
                    @csrf
                    <button type="submit"lass="ml-2 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                        <i class="ti ti-plus me-1"></i>Download Untuk Menandatangani Dokumen</button>
                </form>v
                @elseif($x->ec_status == 'Process')
                <a href="" class="ml-2 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="download" class="w-4 h-4 inline-block me-2"></span>
                    Download
                </a>
                <a href="{{route('kppm.pengajuan.show', $x->doc_group)}}" class="ml-2 px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-primary-100 text-primary text-sm rounded hover:bg-primary-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="file-up" class="w-4 h-4 inline-block me-2"></span>
                    Upload Signed EC

                </a>
                @endif

                </div>
            </div>
        </div>

        @endforeach
    @endif

</div>
