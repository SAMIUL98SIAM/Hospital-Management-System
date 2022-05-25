<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="copyright" content="MACode ID, https://macodeid.com/">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="{{asset('user/assets/css/maicons.css')}}">

        <link rel="stylesheet" href="{{asset('user/assets/css/bootstrap.css')}}">

        <link rel="stylesheet" href="{{asset('user/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

        <link rel="stylesheet" href="{{asset('user/assets/vendor/animate/animate.css')}}">

        <link rel="stylesheet" href="{{asset('user/assets/css/theme.css')}}">

        <!-- Izitoast --->
        <link rel="stylesheet" href="{{asset('admin/izitoast/css/iziToast.css')}}">
        <!-- Izitoast /-->
        @stack('css')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <!-- Back to top button -->
        <div class="back-to-top"></div>
        @include('layouts.user.partials.header')
        <main class="py-4">
            @yield('content')
        </main>
        <div class="page-section banner-home bg-image" style="background-image: url({{asset('user/assets/img/banner-pattern.svg')}});">
            <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="{{asset('user/assets/img/mobile_app.png')}}" alt="">
                </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="{{asset('user/assets/img/google_play.svg')}}" alt=""></a>
                <a href="#" class="ml-2"><img src="{{asset('user/assets/img/app_store.svg')}}" alt=""></a>
                </div>
            </div>
            </div>
        </div> <!-- .banner-home -->
        @include('layouts.user.partials.footer')
    </body>
    <script src="{{asset('user/assets/js/jquery-3.5.1.min.js')}}"></script>

    <script src="{{asset('user/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('user/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('user/assets/vendor/wow/wow.min.js')}}"></script>

    <script src="{{asset('user/assets/js/theme.js')}}"></script>
    <!-- Izitoast --->
    <script src="{{asset('admin/izitoast/js/iziToast.js')}}"></script>
    <!-- Izitoast/ -->
    @include('vendor.lara-izitoast.toast')
</html>
