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
 <style>
  .card-title {
   font-size: 1.5rem;
   font-weight: 500;
   line-height: 1.2;
   color: #212529;
   text-align: center;
   padding: 1.5rem 1.5rem 0;
  }

  .card-text {
   font-size: 1rem;
   font-weight: 400;
   line-height: 1.5;
   color: #212529;
   text-align: center;
   padding: 1.5rem 1.5rem 0;
  }

  .btn-yellow {
   background-color: #FFC107;
   color: rgb(0, 0, 0);
   border-color: #000000 3px solid;
   border-radius: 0.25rem;
   padding: 0.5rem 1rem;
   font-size: 1rem;
   font-weight: 600;
  }

  .btn-yellow:hover {
   background-color: #1f9846;
   color: rgb(255, 255, 255);
   border-color: #1f9846 3px solid;
   transition: all 0.5s ease-in-out;
  }
 </style>
</head>

<body class="bg-[#EFEFEF]">
 <main class="main" id="top">
  <div class="container" data-layout="container">
   <div class="row flex-center mt-5">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4 btn" href="/"><img
       class="me-2" src="{{asset('images/logo.png')}}" alt="" width="58" />
      <span class="font-sans-serif fw-bolder fs-5 d-inline-block text-green">Proxy IP</span></a>
     <div class="card">
      @include('layouts.common.alert')
      <div class="card-title">Thanks for signing up!</div>
      <div class="card-body">
       <p class="mb-4 card-text">We've sent you an email with a link to activate your account. If you don't see it,
        check your
        spam
        folder.</p>
       {{-- two btn --}}
       <div class="d-grid gap-2">
        <a class="btn btn-yellow" href="https://mail.google.com/mail" target="_blank">Verify Email Now</a>
        <a class="btn btn-primary" href="/">Home</a>
       </div>


       {{-- alert --}}
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