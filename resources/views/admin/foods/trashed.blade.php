@extends('admin.layouts.app-main')
@section('content')
    @if (session('success'))

        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-lg-12 margin-tb">
                        <a class="btn pull-right btn-primary btn-md" href="{{ route('admin.foods.create') }}">
                            <i class="fa fa-plus"></i> {{trans('msgs.Add New Food')}} </a>

                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-danger">{{trans('msgs.Show Trashed Foods')}}</h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-striped table-bordered zero-configuration" id="example-table"
                               style="text-align: center;">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0 text-center">#</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Name')}} {{trans('msgs.English')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Name')}} {{trans('msgs.Arabic')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Description')}} {{trans('msgs.English')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Description')}} {{trans('msgs.Arabic')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Category')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Image')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Price')}}</th>
                                <th class="wd-10p border-bottom-0 text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach ($data as $key => $food)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->name_ar }}</td>
                                    <td>{{ $food->description }}</td>
                                    <td>{{ $food->description_ar }}</td>
                                    <td>
                                        @if(App::getLocale() == 'ar')
                                            {{ $food->type->name_ar }}
                                        @else
                                            {{ $food->type->name }}
                                        @endif
                                    </td>
                                    <td><img data-toggle="modal" href="#modaldemo9" src="{{asset($food->image)}}"
                                             style="width:50px; height: 50px;cursor:pointer;"
                                             alt=""></td>
                                    <td>{{ $food->price }}</td>
                                    <td>
                                        <form class="d-inline"
                                              action="{{route('admin.foods.restore.trashed',$food->id)}}"
                                              method="POST">
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

        <!-- Modal effects -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Show food Picture')}}</h6>
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

    </div>

@endsection
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('img').on('click', function () {
            var image_larger = $('#image_larger');
            var path = $(this).attr('src');
            $(image_larger).prop('src', path);
        })
    });
</script>
