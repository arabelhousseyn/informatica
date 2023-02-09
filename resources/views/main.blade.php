<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}-@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/slick-1.8.0/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">

    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/css/bootstrap4/popper.js')}}"></script>
    <script src="{{asset('assets/css/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('assets/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('assets/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('assets/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/plugins/slick-1.8.0/slick.js')}}"></script>
    <script src="{{asset('assets/plugins/easing/easing.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    @if(Route::is('main'))
        <script src="{{asset('assets/js/custom.js')}}"></script>
    @endif
</head>
<body class="antialiased">
@if(session()->has('orderConfirmed'))
    @if(session()->get('orderConfirmed') == 'order-user-' . auth()->user()->id)
        <div class="alert alert-success alert-dismissible" role="alert">
            <h4 class="alert-heading">{{__('app.well')}}</h4>
            <p>{{__('app.messageSuccess')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div style="visibility: hidden;">
            {{session()->remove('orderConfirmed')}}
        </div>
    @endif
@endif
<div class="super_container">
    <!-- Header -->
@include('layouts.header')

<!-- Banner -->
@include('layouts.banner')

@yield('content')


<!-- Footer -->
    @include('layouts.footer')
</div>
</body>

</html>
