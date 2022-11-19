<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> CINEMA PLUS </title>
    @include('admin.layouts.common.css_links')
    <style>
        @font-face{
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }
        body,html{
            font-family: 'Cairo' !important;
        }
        i.la {
            font-size: 15px !important;
        }
        div#DataTables_Table_0_filter {
            text-align: left !important;
            float: left !important;
            display: inline !important;
        }
        div#DataTables_Table_0_length {
            text-align: right !important;
            float: right !important;
            display: inline !important;
        }
        select[name='DataTables_Table_0_length'] {
            height: 40px !important;
            padding: 10px !important;
            margin-top: 20px;
        }
        .bootstrap-select > .dropdown-toggle {
            height: 35px;
        }


        select.form-control {
            padding: 0 5px !important;
        }
         .visitors-table tbody tr td:last-child {
             display: flex;
             align-items: center;
         }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }
        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #3498db;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #3498db;
        }
    </style>
</head>
<body class="fixed-navbar"
@if(App::getLocale() == 'ar')
dir="rtl" style="text-align: right"
@endif
>
    <div class="page-wrapper">
        @include('admin.layouts.common.header')
        @include('admin.layouts.common.ul_sidebar')
        <div class="content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
            @include('admin.layouts.common.footer')
        </div>
    </div>

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>

    @include('admin.layouts.common.js_links')
</body>
</html>
