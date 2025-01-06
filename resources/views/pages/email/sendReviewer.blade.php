{{-- <!DOCTYPE html>
<html>
<head>
    <title>KEP FKIP</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

    <a href="http://127.0.0.1:8000/reviewer/pengajuan">lihat Ajuan</a>
    </p>

    <p>Thank you</p>
</body>
</html> --}}





<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>KEP FKIP</title>
        <meta  name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta  content="Tailwind Multipurpose Admin & Dashboard Template"  name="description"/>
        <meta content="" name="Mannatthemes" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico" />

        <!-- Css -->
        <!-- Main Css -->
        <link rel="stylesheet" href="{{asset('assets/libs/icofont/icofont.min.css')}}">
        <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/css/tailwind.min.css')}}">

    </head>

    <body data-layout-mode="light"  data-sidebar-size="default" data-theme-layout="vertical" class="bg-[#EEF0FC] dark:bg-gray-900">

        <div class="ltr:flex flex-1 rtl:flex-row-reverse">
            <div class="page-wrapper relative ltr:ml-auto rtl:mr-auto rtl:ml-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
                <div class="xl:w-full  min-h-[calc(100vh-152px)] relative pb-14">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
                            <div class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40  rounded-md w-full relative">
                                <div class="flex-auto p-4">
                                    <div class="flex flex-wrap">
                                        <div class="w-full md:w-1/2 mb-4 md:mb-0 print:w-1/2">
                                            <div class="flex items-center">
                                                <div class="rounded">
                                                    <img class="w-9 h-9 overflow-hidden object-cover rounded object-center" src="{{asset('assets/images/logo-fkip-uns-fkip.png')}}" alt="logo" />
                                                </div>
                                                <div class="ms-3">
                                                    <div class="cursor-pointer hover:text-gray-900 focus:text-gray-500 text-gray-800 dark:text-gray-100 focus:outline-none">
                                                        <h5 class=" font-bold text-[18px] dark:text-slate-300">KEP FKIP</h5>
                                                    </div>
                                                    <p class="focus:outline-none text-gray-500 dark:text-gray-400 text-sm font-medium">Universitas Sebelas Maret</p>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="w-full md:w-1/2 print:w-1/2">
                                            <div class="text-left md:text-right print:text-right">
                                                <p class="text-gray-500 text-sm font-medium mb-0">Jl. Ir Sutami No.36 A, Kentingan, </p>
                                                <p class="text-gray-500 text-sm font-medium mb-0">Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</p>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end grid-->
                                </div><!--end card-body-->
                                <div class="flex-auto p-4">
                                    <div class="flex flex-wrap mb-4">
                                        <div class="w-full md:w-1/3 self-center mb-4 md:mb-0 print:w-1/3">
                                            <h6 class="font-medium dark:text-slate-400 text-sm mb-1">{{ $mailData['title'] }}</h6>
                                        </div><!--end col-->

                                        <div class="w-full md:w-1/3 print:w-1/3">
                                            <div class="dark:text-slate-400">
                                                <address class="text-sm">
                                                    {{ $mailData['body'] }}
                                                </address>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end grid-->
                                    <div class="border-b border-dashed border-slate-200 my-5 dark:border-slate-700"></div>
                                    <div class="relative overflow-x-auto  flex flex-wrap sm:rounded-lg">
                                        <div class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <p class="text-gray-500 text-sm font-medium mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, praesentium explicabo dolores a nobis laboriosam saepe quaerat at, modi harum quibusdam ea, tenetur voluptas assumenda similique iusto nemo odio suscipit?
                                            Porro officia assumenda vitae veniam aut ipsa fugit vel, fuga aliquid beatae in obcaecati rem quasi doloribus, non et iure! Incidunt totam, architecto dicta sed perspiciatis quo soluta repellendus quisquam!
                                            Molestias, facilis necessitatibus aspernatur explicabo et quaerat deleniti quis exercitationem velit amet iure veniam fugit facere odio cum aut ratione incidunt alias cupiditate enim animi accusantium ipsum nisi! Iste, enim.
                                            Quae voluptatibus itaque, eveniet obcaecati vel aspernatur quisquam tempora corporis. Amet numquam, dignissimos voluptatum facilis dolores autem ducimus. Officiis sapiente qui doloribus quasi voluptatum adipisci commodi asperiores, rerum alias deleniti!</p>
                                        </div>
                                    </div>
                                    <div class="border-b border-dashed border-slate-200 my-5 dark:border-slate-600"></div>

                                    <button class=" px-4 py-2 lg:px-4 bg-brand-500  text-white text-base  transition hover:bg-brand-500 hover:text-white border border-brand border-dashed font-medium mb-2 print:hidden" >
                                        Dashboard
                                    </button>
                                </div>
                            </div> <!--end card-->
                        </div><!--end col-->
                    </div><!--end inner-grid-->
                    <!-- footer -->



                </div><!--end container-->
            </div><!--end page-wrapper-->
        </div><!--end /div-->


        <!-- JAVASCRIPTS -->
        <!-- <div class="menu-overlay"></div> -->
        <script src="{{asset('assets/libs/lucide/umd/lucide.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('assets/libs/@frostui/tailwindcss/frostui.js')}}"></script>

        <script src="{{asset('assets/js/app.js')}}"></script>
        <!-- JAVASCRIPTS -->
    </body>
</html>
