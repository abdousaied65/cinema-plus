<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="shortcut icon" href="{{asset('images/logo-min.png')}}" type="image/x-icon">
    <title>CINEMA PLUS Login</title>
    <style>
        @font-face{
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }
        body,html{
            font-family: 'Cairo';
        }
        i.fa {margin-right: 10px; margin-left: 10px;}
    </style>
</head>
<body
    @if(App::getLocale() == 'ar')
    dir="rtl" style="text-align: right;"
    @else
    dir="ltr" style="text-align: left;"
    @endif
>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
     @yield('content')

    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/odometer.min.js')}}"></script>
    <script src="{{asset('assets/js/viewport.jquery.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
