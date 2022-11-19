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
                               href="{{ route('admin.gifts.create') }}"><i
                                    class="fa fa-plus"></i> {{trans('msgs.Add New Gift')}} </a>
                            <a class="btn pull-right btn-danger btn-md" style="margin-right: 20px"
                               href="{{ route('admin.gifts.trashed') }}">
                                <i class="fa fa-eye"></i> {{trans('msgs.Show Trashed Gifts')}} </a>
                            <h5 style="min-width: 300px;"
                                class="pull-left alert alert-sm alert-success">{{trans('msgs.Display All Gifts')}}</h5>
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
                                <th class="text-center">{{trans('msgs.Gift Name')}} {{trans('msgs.English')}}</th>
                                <th class="text-center">{{trans('msgs.Gift Name')}} {{trans('msgs.Arabic')}}</th>
                                <th class="text-center">{{trans('msgs.Description')}} {{trans('msgs.English')}}</th>
                                <th class="text-center">{{trans('msgs.Description')}} {{trans('msgs.Arabic')}}</th>
                                <th class="text-center">{{trans('msgs.Expiration Date')}}</th>
                                <th class="text-center">{{trans('msgs.Gift Price')}}</th>
                                <th class="text-center">{{trans('msgs.Gift Image')}}</th>
                                <th class="text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($gifts as $key => $gift)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $gift->name }}</td>
                                    <td>{{ $gift->name_ar }}</td>
                                    <td>{{ $gift->description }}</td>
                                    <td>{{ $gift->description_ar }}</td>
                                    <td>{{ $gift->expiration_date }}</td>
                                    <td>{{ $gift->gift_price }}</td>

                                    <td><img data-toggle="modal" href="#modaldemo8" src="{{asset($gift->image)}}"
                                             style="width:50px; height: 50px;cursor:pointer;"
                                             alt=""></td>
                                    <td>
                                        <a class="btn btn-primary btn-md"
                                           href="{{ route('admin.gifts.edit', $gift->id) }}"><i
                                                class="fa fa-pencil"></i> {{trans('msgs.Edit')}} </a>

                                        <a class="modal-effect btn btn-md btn-danger delete_gift"
                                           gift_id="{{ $gift->id }}"
                                           gift_name="{{ $gift->name }}" data-toggle="modal" href="#modaldemo9"
                                           title="Delete"><i
                                                class="fa fa-trash"></i> {{trans('msgs.Delete')}}
                                        </a>
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
