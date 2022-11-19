<link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">
@if(App::getLocale() == 'ar')
    <link href="{{asset('admin-assets/rtl/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/css/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/rtl/css/datatables.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/rtl/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/rtl/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@else
    <link href="{{asset('admin-assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/css/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('admin-assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
@endif

<link href="{{asset('admin-assets/vendors/summernote/dist/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('admin-assets/css/pages/mailbox.css')}}" rel="stylesheet" />
<link href="{{asset('admin-assets/css/bd-wizard.css')}}" rel="stylesheet">

@if(App::getLocale() == 'ar')
    <link href="{{asset('admin-assets/css/main-rtl.css')}}" rel="stylesheet" />
@else
    <link href="{{asset('admin-assets/css/main.min.css')}}" rel="stylesheet" />
@endif
<style>
    i.la{
        font-size: 15px !important;
    }
    div#DataTables_Table_0_filter{
        text-align: left!important; float: left!important; display: inline!important;
    }
    div#DataTables_Table_0_length{
        text-align: right!important; float: right!important; display: inline!important;
    }
    select[name='DataTables_Table_0_length']{
        height: 40px!important; padding: 10px!important;
        margin-top: 20px;
    }
    table thead tr th ,table tbody tr td  {
        font-size: 13px !important;
    }
    button{cursor:pointer;}
    .disabled-item{
        color: #eee;
        pointer-events: none;
        background-color: #fff;
        border-color: #ddd;
        cursor: not-allowed !important;
    }
</style>
