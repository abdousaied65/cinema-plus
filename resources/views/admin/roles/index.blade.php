@extends('admin.layouts.app-main')
<!-- Internal Data table css -->
<style>
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
</style>
@section('content')
    @if (session('success'))

        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            @can('add privilege')
                                <a class="btn pull-right btn-primary btn-md pull-right"
                                   href="{{ route('admin.roles.create') }}"><i
                                        class="fa fa-plus"></i> {{trans('msgs.Add New Privilege')}} </a>
                            @endcan
                            <h5 style="min-width: 300px;"
                                class="pull-left alert alert-sm alert-success">{{trans('msgs.Display All Privileges')}}</h5>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-md-nowrap table-hover " id="example-table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{trans('msgs.Privilege Name')}} {{trans('msgs.English')}}</th>
                                <th class="text-center">{{trans('msgs.Privilege Name')}} {{trans('msgs.Arabic')}}</th>
                                <th class="text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($roles as $key => $role)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->name_ar }}</td>
                                    <td>
                                        @can('show privilege')
                                            <a class="btn btn-success btn-md"
                                               href="{{ route('admin.roles.show', $role->id) }}"><i
                                                    class="fa fa-eye"></i> {{trans('msgs.Show')}} </a>
                                        @endcan

                                        @can('edit privilege')
                                            <a class="btn btn-primary btn-md"
                                               href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                    class="fa fa-pencil"></i> {{trans('msgs.Edit')}} </a>
                                        @endcan

                                        @can('delete privilege')
                                            @if ($role->name != 'super admin')
                                                <a class="modal-effect btn btn-md btn-danger delete_role"
                                                   role_id="{{ $role->id }}"
                                                   role_name="{{ $role->name }}" data-toggle="modal" href="#modaldemo9"
                                                   title="Delete"><i
                                                        class="fa fa-trash"></i> {{trans('msgs.Delete')}} </a>
                                            @endif
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        <!-- Modal effects -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Delete Privilege')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.roles.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('msgs.Are You Sure You Want To Delete')}} ?</p><br>
                            <input type="hidden" name="role_id" id="role_id" value="">
                            <input class="form-control" name="rolename" id="rolename" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('msgs.Cancel')}}</button>
                            <button type="submit" class="btn btn-danger">{{trans('msgs.Confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.delete_role').on('click', function () {
            var role_id = $(this).attr('role_id');
            var role_name = $(this).attr('role_name');
            $('.modal-body #role_id').val(role_id);
            $('.modal-body #rolename').val(role_name);
        });
    });
</script>
