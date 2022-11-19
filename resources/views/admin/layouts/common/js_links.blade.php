@if(App::getLocale() == 'ar')
    <script src="{{asset('admin-assets/rtl/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/vendors/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/js/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/js/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/js/app.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/rtl/js/jquery.steps.min.js')}}" type="text/javascript"></script>

@else
    <script src="{{asset('admin-assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/app.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-assets/js/jquery.steps.min.js')}}" type="text/javascript"></script>
@endif
<script src="{{asset('admin-assets/vendors/summernote/dist/summernote.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/js/bd-wizard.js')}}" type="text/javascript"></script>
<!-- JQUERY STEP -->
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
        });
    });
    $(".alert.alert-success.alert-dismissable").fadeTo(2000, 5000).slideUp(500);
    $(function() {
        $('#summernote').summernote();
        $('.note-popover').css({
            'display': 'none'
        });
    })
</script>
