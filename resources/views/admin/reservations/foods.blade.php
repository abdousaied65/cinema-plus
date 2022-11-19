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
                            <h5 style="min-width: 300px;"
                                class="pull-left alert alert-sm alert-success">{{trans('msgs.Foods Reservations')}}</h5>
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
                                <th class="text-center">{{trans('msgs.Member Name')}}</th>
                                <th class="text-center">{{trans('msgs.Food Name')}}</th>
                                <th class="text-center">{{trans('msgs.Quantity')}}</th>
                                <th class="text-center">{{trans('msgs.Unit Price')}}</th>
                                <th class="text-center">{{trans('msgs.Quantity Price')}}</th>
                                <th class="text-center">{{trans('msgs.Status')}}</th>
                                <th class="text-center">{{trans('msgs.Created at')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($foods as $food)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $food->user->name }}</td>

                                    @if(App::getLocale() == "ar")
                                        <td>{{ $food->food->name_ar }}</td>
                                    @else
                                        <td>{{ $food->food->name }}</td>
                                    @endif
                                    <td>{{ $food->quantity }}</td>
                                    <td>{{ $food->unit_price }}</td>
                                    <td>{{ $food->quantity_price }}</td>
                                    <td>
                                        @if($food->status == "0")
                                            <span class="badge badge-danger">{{trans('msgs.Not Paid')}}</span>
                                        @else
                                            <span class="badge badge-success">{{trans('msgs.Paid')}}</span>
                                        @endif
                                    </td>
                                    <td>{{ $food->created_at }}</td>

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
