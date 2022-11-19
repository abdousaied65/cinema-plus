<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema Plus</title>
    @include('site.layouts.common.css_links')
    <style>
        @font-face {
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }
        i.fa {margin-right: 10px; margin-left: 10px;}
        body, html {
            font-family: 'Cairo' !important;
        }
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
@if (session('success'))
    <div class="alert alert-success alert-sm alert-dismissable fade show"
         style="z-index: 99999;position:fixed;text-align: center; width: 100%; padding:5px;">
        <button class="close pull-right text-right d-inline w-auto" data-dismiss="alert" aria-label="Close">×</button>
        <p class="pull-left text-center d-inline w-auto">{{ session('success') }}</p>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-sm alert-dismissable fade show"
         style="z-index: 99999;position:fixed;text-align: center; width: 100%; padding:5px;">
        <button class="close pull-right text-right d-inline w-auto" data-dismiss="alert" aria-label="Close">×</button>
        <p class="pull-left text-center d-inline w-auto">{{ session('error') }}</p>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger alert-sm alert-dismissable fade show"
         style="z-index: 99999;position:fixed;text-align: center; width: 100%; padding:5px;">
        <button aria-label="Close" class="close pull-right text-right d-inline w-auto" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <p class="pull-left text-center d-inline w-auto">{{  $error }}</p>
            @endforeach
        </ul>
    </div>
@endif
<!-- ==========Overlay========== -->
@include('site.layouts.common.header')
@yield('content')

@include('site.layouts.common.footer')
@include('site.layouts.common.js_links')
</body>
</html>
