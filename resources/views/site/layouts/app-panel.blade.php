<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema Plus</title>
    @include('site.layouts.common.css_links')
    <style>
        @font-face{
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }
        body,html {
            font-family: 'Cairo' !important;
        }
        i.fa {margin-right: 10px; margin-left: 10px;}
    </style>
</head>
<body>
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
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->
    @include('site.layouts.common.header')
    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col-12" style="min-height: 1200px !important;">
                @yield('panel')
            </div>
        </div>
    </div>
    @include('site.layouts.common.footer-min')
    @include('site.layouts.common.js_links')


</body>
</html>
