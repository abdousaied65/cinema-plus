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
                                class="pull-left alert alert-sm alert-success">{{trans('msgs.Payments')}}</h5>
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
                                <th class="text-center">{{trans('msgs.Payment Options')}}</th>
                                <th class="text-center">{{trans('msgs.Card Number')}}</th>
                                <th class="text-center">{{trans('msgs.Name on the Card')}}</th>
                                <th class="text-center">{{trans('msgs.Expiration')}}</th>
                                <th class="text-center">{{trans('msgs.CVV')}}</th>
                                <th class="text-center">{{trans('msgs.Amount')}}</th>
                                <th class="text-center">{{trans('msgs.Created at')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($payments as $payment)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>{{ $payment->payment_option }}</td>
                                    <td>{{ $payment->card_number }}</td>
                                    <td>{{ $payment->name_on_card }}</td>
                                    <td>{{ $payment->expiration }}</td>
                                    <td>{{ $payment->cvv }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->created_at }}</td>
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
