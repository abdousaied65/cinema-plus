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
                            <a class="btn pull-right btn-primary btn-md pull-right"
                               href="{{ route('admin.stars.create') }}"><i
                                    class="fa fa-plus"></i> {{trans('msgs.Add New Star')}} </a>

                            <h5 style="min-width: 300px;"
                                class="pull-left alert alert-sm alert-danger">{{trans('msgs.Show Trashed Star')}}</h5>
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
                                <th class="text-center">{{trans('msgs.Star Name')}} {{trans('msgs.English')}}</th>
                                <th class="text-center">{{trans('msgs.Star Name')}} {{trans('msgs.Arabic')}}</th>
                                <th class="text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($data as $key => $star)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $star->name }}</td>
                                    <td>{{ $star->name_ar }}</td>
                                    <td>
                                        <form class="d-inline" action="{{route('admin.stars.restore.trashed',$star->id)}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-md btn-success" title="restore">
                                                <i class="fa fa-refresh"></i> {{trans('msgs.Restore')}}
                                            </button>
                                        </form>
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
    </div>
@endsection
