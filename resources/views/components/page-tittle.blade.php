<div class="xl:w-full">
    <div class="flex flex-wrap">
        <div class="flex items-center py-4 w-full">
            <div class="w-full">
                <div class="">
                    <div class="flex flex-wrap justify-between">
                        <div class="items-center">
                            <h1 class="font-medium text-3xl block dark:text-slate-100">
                                {{ $title }}
                            </h1>
                            <ol class="list-reset flex text-sm">
                                <li>
                                    <a href="#" class="text-gray-500 dark:text-slate-400">{{ $slash1 }}</a>
                                </li>
                                <li>
                                    <span class="text-gray-500 dark:text-slate-400 mx-2">/</span>
                                </li>
                                <li class="text-gray-500 dark:text-slate-400">{{ $slash2 }}</li>
                                <li>
                                    <span class="text-gray-500 dark:text-slate-400 mx-2">/</span>
                                </li>
                                <li class="text-primary-500 hover:text-primary-600 dark:text-primary-400">{{ $slash3 }}</li>
                            </ol>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="today-date border inline-block border-primary-500/60 dark:border-primary-500/60 text-primary-500 bg-transparent px-5 py-1 "
                            >
                                <input
                                    type="text"
                                    class="dash_date border-0 focus:border-0 focus:outline-none"
                                    readonly
                                    disabled
                                    required=""
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
