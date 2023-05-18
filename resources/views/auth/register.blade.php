<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <?php header('Access-Control-Allow-Origin: *'); ?>

    <title>{{ config('app.name', 'Proxy IP') }}</title>

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
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">


    {{-- Datatable CSS--}}
    <link rel="stylesheet" href="{{asset('assets/css/dataTables/dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables/fixedHeader.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables/responsive.dataTables.min.css')}}">



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
    @yield('head')
</head>

<body class="bg-[#EFEFEF]">
    <main class="main" id="top">
        @include('layouts.common.alert_for_web')
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
            </script>
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4 btn"
                        href="/"><img class="me-2" src="{{asset('images/logo.png')}}" alt="" width="58" />
                        <span class="font-sans-serif fw-bolder fs-5 d-inline-block text-green">Proxy IP</span></a>
                    <div class="card">
                        @include('layouts.common.alert')
                        <div class="card-body p-4 p-sm-5">
                            <div class="row flex-between-center mb-2">
                                <div class="col-auto">
                                    <h5>Register</h5>
                                </div>
                                <div class="col-auto fs--1 text-600"><span class="mb-0 undefined">Have an
                                        account?</span> <span><a href="{{route('user.login')}}">Login</a></span>
                                </div>
                            </div>
                            <form action="{{route('user.register')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="name" autocomplete="on" required
                                        placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" id="email-address" name="email" type="email"
                                        autocomplete="email" required placeholder="Email address" />
                                </div>
                                <div class="row gx-2">
                                    <div class="mb-3 col-sm-6"><input class="form-control" type="password"
                                            autocomplete="on" required name="password" placeholder="Password">
                                    </div>
                                    <div class="mb-3 col-sm-6"><input class="form-control" type="password"
                                            autocomplete="on" required name="password_confirmation"
                                            placeholder="Confirm Password"></div>
                                </div>
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" required name="checkbox" type="checkbox"
                                                id="basic-register-checkbox"><label class="form-label"
                                                for="basic-register-checkbox">I accept the <a href="#!">terms </a>and <a
                                                    href="#!">privacy
                                                    policy</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-green d-block w-100 mt-3" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    @yield('scripts')
</body>