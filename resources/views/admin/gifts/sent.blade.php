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
                                class="pull-left alert alert-sm alert-success">{{trans('msgs.Gifts Sent From Members')}}</h5>
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
                                <th class="text-center">{{trans('msgs.Sender Name')}}</th>
                                <th class="text-center">{{trans('msgs.Sender Email')}}</th>
                                <th class="text-center">{{trans('msgs.Recipient Name')}}</th>
                                <th class="text-center">{{trans('msgs.Recipient Email')}}</th>
                                <th class="text-center">{{trans('msgs.Recipient Mobile Number')}}</th>
                                <th class="text-center">{{trans('msgs.Message')}}</th>
                                <th class="text-center">{{trans('msgs.Gift Name')}}</th>
                                <th class="text-center">{{trans('msgs.Gift Price')}}</th>
                                <th class="text-center">{{trans('msgs.Status')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($data as $gift)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $gift->user->name }}</td>
                                    <td>{{ $gift->user->email }}</td>
                                    <td>{{ $gift->recipient_name }}</td>
                                    <td>{{ $gift->recipient_email }}</td>
                                    <td>{{ $gift->recipient_number }}</td>
                                    <td>{{ $gift->message }}</td>
                                    <td>{{ $gift->gift->name }}</td>
                                    <td>{{ $gift->gift->gift_price }}</td>
                                    <td>
                                        @if($gift->status == "0")
                                            <span class="badge badge-danger">{{trans('msgs.Not Paid')}}</span>
                                        @else
                                            <span class="badge badge-success">{{trans('msgs.Paid')}}</span>
                                        @endif
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
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Gift Image')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img id="image_larger" alt="image" style="width: 100%; "/>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-colse"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal effects -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" gift="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Delete Gift')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.gifts.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('msgs.Are You Sure You Want To Delete')}} ?</p><br>
                            <input type="hidden" name="gift_id" id="gift_id" value="">
                            <input class="form-control" name="giftname" id="giftname" type="text" readonly>
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
        $('.delete_gift').on('click', function () {
            var gift_id = $(this).attr('gift_id');
            var gift_name = $(this).attr('gift_name');
            $('.modal-body #gift_id').val(gift_id);
            $('.modal-body #giftname').val(gift_name);
        });

        $('img').on('click', function () {
            var image_larger = $('#image_larger');
            var path = $(this).attr('src');
            $(image_larger).prop('src', path);
        })
    });
</script>
