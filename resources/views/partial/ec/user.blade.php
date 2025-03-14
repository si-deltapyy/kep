
<div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-9">

    @if ($doc->isEmpty())
        <div class="mb-4 justify-center">
            <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                <h1 class="font-medium text-center text-red-600"><i data-lucide="ban" class="w-4 h-4 inline-block me-2"></i>Belum ada Penerbitan EC Document</h1>
            </div>
        </div>
    @else
        @if($usDoc->ec_status == 'Distribute')
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
                        @if($x->ec_status == 'Distribute')
                        <a href="{{route('user.ajuan.index')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                            <i class="ti ti-plus me-1"></i>
                            <span data-lucide="arrow-left" class="w-4 h-4 inline-block me-2"></span>
                            Kembali

                        </a>
                        <a href="{{ route('user.ec.previewPDF', ['id' => $x->id]) }}" target="blank"
                            class='px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white'>Preview</a>
                        @endif
                        </div>
                    </div>
                </div>

                @endforeach
        @else
            <div class="mb-4 justify-center">
                <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-700/20">
                    <h1 class="font-medium text-center text-slate-400"><i data-lucide="ban" class="w-4 h-4 inline-block me-2"></i>Dalam Proses Penerbitan EC Document</h1>
                </div>
            </div>
        @endif
    @endif

</div>
