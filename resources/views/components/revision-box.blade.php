@props(['namaReviewer', 'reviewerID',  'tanggal', 'action'])

<a href="{{ $action }}" class="btn btn-primary">
    <li class="text-slate-500 hover:bg-slate-50 dark:hover:bg-slate-700 dark:hover:text-slate-200 p-3 rounded-md">
        <div class="grid grid-cols-12">
            <div class="col-span-3 md:col-span-2 lg:col-span-2 xl:col-span-1">
                <label class="custom-checkbox mb-0 self-center">
                    <input type="checkbox" checked />
                    <i class="icofont-star text-[20px] text-slate-400 -mt-1 unchecked"></i>
                    <i class="icofont-star text-[20px] -mt-1 text-yellow-400 checked"></i>
                </label>
            </div>
            <div class="col-span-12 md:col-span-3 lg:col-span-2 xl:col-span-2">
                <a href="#" class="">
                    <span class="truncate">{{ $namaReviewer }}</span>
                </a>
            </div>
            <div class="col-span-8 md:col-span-6 lg:col-span-7 xl:col-span-8 hidden md:block pr-10">
                <a href="#" class="">
                <p class="truncate"> {{$reviewerID}} </p>
                </a>
            </div>
            <div class="col-span-3 md:col-span-1 lg:col-span-1 xl:col-span-1 text-right">
                <span class="text-sm text-slate-500">{{ $tanggal }}</span>
            </div>
        </div>
    </li>
</a>
