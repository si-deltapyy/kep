<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>KEP FKIP UNS</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Css -->
    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/icofont/icofont.min.css') }}" />
    <link
    href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}"
    type="text/css"
    rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.min.css') }}" />

  </head>

  <body
    data-layout-mode="light"
    data-sidebar-size="default"
    data-theme-layout="vertical"
    class="bg-[#EEF0FC] dark:bg-gray-900"
  >

    @include('layouts.left-bar')
    @include('layouts.top-bar')

    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
      <div
        class="page-wrapper relative ltr:ms-auto rtl:me-auto rtl:ms-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300"
      >
      @yield('title')



        <div class="xl:w-full min-h-[calc(100vh-138px)] relative pb-14">
          @yield('content')
          <!--end grid-->
          @include('layouts.footer')

        </div>
        <!--end container-->
      </div>
      <!--end page-wrapper-->
    </div>
    <!--end /div-->

    <!-- JAVASCRIPTS -->
    <!-- <div class="menu-overlay"></div> -->
    <script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@frostui/tailwindcss/frostui.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- JAVASCRIPTS -->
  </body>
</html>

