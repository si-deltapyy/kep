
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
                <a href="{{route('admin.ec.reqSign', $x->id)}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-right" class="w-4 h-4 inline-block me-2"></span>
                    Request Sign KPPM
                </a>
                @elseif($x->ec_status == 'Signed')
                <a href="{{route('admin.ec.publish', $x->id)}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-right" class="w-4 h-4 inline-block me-2"></span>
                    Publish to User
                </a>
                @elseif($x->ec_status == 'Process')
                <a href="#" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white" disabled>
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-right" class="w-4 h-4 inline-block me-2"></span>
                    Waiting....
                </a>
                @else
                <a href="{{route('admin.pengajuan.index')}}" class="px-2 py-1 bg-primary-500/10 border border-transparent collapse:bg-green-100 text-primary text-sm rounded hover:bg-blue-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="arrow-left" class="w-4 h-4 inline-block me-2"></span>
                    Kembali

                </a>
                <a href="{{route('user.ajuan.index')}}" class="ml-2 px-2 py-1 bg-green-500/10 border border-transparent collapse:bg-green-100 text-green text-sm rounded hover:bg-green-600 hover:text-white">
                    <i class="ti ti-plus me-1"></i>
                    <span data-lucide="download" class="w-4 h-4 inline-block me-2"></span>
                    Download

                </a>
                @endif
                
                </div>
            </div>
        </div>

        @endforeach
    @endif
    
</div>