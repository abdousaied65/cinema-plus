<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> CINEMA PLUS </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo-min.png')}}" type="image/png">
    <link href="{{asset('admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin-assets/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('admin-assets/css/main.css')}}" rel="stylesheet"/>
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('admin-assets/css/pages/auth-light.css')}}" rel="stylesheet"/>
    <style>
        @font-face {
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }

        body, html {
            font-family: 'Cairo';
        }

        i.la {
            font-size: 15px !important;
        }

        select.form-control {
            padding: 0 5px !important;
        }
    </style>
</head>
<body class="bg-dark"

      @if(App::getLocale() == 'ar')
      dir="rtl" style="text-align: right;"
      @else
      dir="ltr" style="text-align: left;"
    @endif
>
<div id="app">
    <main class="">
        @yield('content')
    </main>
</div>
<script src="{{asset('admin-assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS -->
<script src="{{asset('admin-assets/vendors/jquery-validation/dist/jquery.validate.min.js')}}"
        type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('admin-assets/js/app.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#login-form').validate({
            errorClass: "help-block",
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            highlight: function (e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight: function (e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
        });
    });
</script>
</body>
</html>
