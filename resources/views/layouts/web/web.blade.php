<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php header('Access-Control-Allow-Origin: *'); ?>

    <title>PROXYXYOU</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    {{--
    <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}"> --}}
    <meta name="msapplication-TileImage" content="{{asset('assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('assets/js/config.js')}}"></script>
    <script src="{{asset('vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{asset('vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <link href="{{asset('vendors/glightbox/glightbox.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tom-select/1.6.2/css/tom-select.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tom-select/1.6.2/esm/tom-select.min.js"></script>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">


    {{-- Datatable CSS--}}
    <link rel="stylesheet" href="{{asset('assets/css/dataTables/dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables/fixedHeader.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/snackbar/js-snackbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/snackbar/js-snackbar.min.css')}}">



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    {{-- Datatable Js--}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables/dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables/fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables/responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2@11.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    {{-- TomSelect --}}
    <link href="{{asset('assets/css/tom-select.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/tom-select.complete.min.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <script src="{{asset('assets/js/snackbar/js-snackbar.js')}}"></script>
    <script src="{{asset('assets/js/snackbar/js-snackbar.min.js')}}"></script>


    @yield('head')
    <style>
        section {
            padding-top: 2rem !important;
        }

        .extra-top-margin {
            margin-top: 13rem !important;
        }
    </style>
</head>

<body class="bg-[#EFEFEF]">
    <main class="main" id="top">
        @include('layouts.web._partials.header')
        @include('layouts.web._partials.navbar')
        <div class="content web-content">
            @include('layouts.common.alert_for_web')
            @yield('content')
        </div>
        @include('layouts.web._partials.footer')
    </main>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{asset('vendors/is/is.min.js')}}"></script>
    <script src="{{asset('vendors/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('vendors/list.js/list.min.js')}}"></script>
    <script src="{{asset('vendors/glightbox/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.navbar-toggler').on('click',function(){
                $('.navbar-collapse').toggleClass('d-none');
                $(".web-content").toggleClass('extra-top-margin');
            });
        });
    </script>

    @yield('scripts')
</body>