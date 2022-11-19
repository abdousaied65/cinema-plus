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

    .drop.show {
        left: -20px !important;
        width: 120px;
    }

    .drop.show a {
        width: auto !important;
    }

    .drop.show a i {
        margin-right: 10px;
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
                               href="{{ route('admin.shows.create') }}"><i
                                    class="fa fa-plus"></i> {{trans('msgs.Add New Show')}} </a>
                            <a class="btn pull-right btn-danger btn-md" style="margin-right: 20px"
                               href="{{ route('admin.shows.trashed') }}">
                                <i class="fa fa-eye"></i> {{trans('msgs.Show Trashed Shows')}} </a>
                            <h5 style="min-width: 300px;"
                                class="pull-left alert alert-sm alert-success">{{trans('msgs.Display All Shows')}}</h5>
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
                                <th class="text-center">{{trans('msgs.Movie Name')}}</th>
                                <th class="text-center">{{trans('msgs.Rooms')}} ( {{trans('msgs.Halls')}} )</th>
                                <th class="text-center">{{trans('msgs.Start Date')}}</th>
                                <th class="text-center">{{trans('msgs.End Date')}}</th>
                                <th class="text-center">{{trans('msgs.Show Days in a week')}}</th>
                                <th class="text-center">{{trans('msgs.Status')}}</th>
                                <th class="text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($shows as $show)
                                <tr class="text-center">
                                    <td>{{ ++$i }}</td>
                                    <td><a href="{{route('admin.movies.show',$show->movie->id)}}">
                                            @if(App::getLocale() == "ar")
                                                {{ $show->movie->name_ar }}
                                            @else
                                                {{ $show->movie->name }}
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        @foreach($show->rooms as $room)
                                            -
                                            @if(App::getLocale() == "ar")
                                                {{ $room->name_ar }}
                                            @else
                                                {{ $room->name }}
                                            @endif
                                        (
                                            @foreach($room->halls as $hall)
                                                @if(App::getLocale() == "ar")
                                                    {{ $hall->name_ar }}
                                                @else
                                                    {{ $hall->name }}
                                                @endif
                                                 -
                                            @endforeach
                                        )
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>{{$show->start_date}}</td>
                                    <td>{{$show->end_date}}</td>
                                    <td>
                                        @foreach($show->times as $time)
                                            {{trans('msgs.'.$time->day.'')}}  {{$time->time}} <br>
                                        @endforeach
                                    </td>
                                    <td>{{trans('msgs.'.$show->status.'')}}</td>
                                    <td>

                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i
                                                    class="fa fa-cogs"></i> {{trans('msgs.Actions')}} <i
                                                    class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu drop">
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{ route('admin.shows.changeStatus', $show->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                        @if($show->status == "On")
                                                            {{trans('msgs.Make it Soon')}}
                                                        @else
                                                            {{trans('msgs.Make it On')}}
                                                        @endif
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="modal-effect delete_show"
                                                       show_id="{{ $show->id }}"
                                                       show_name="{{ $show->movie->name }}" data-toggle="modal"
                                                       href="#modaldemo9"
                                                       title="Delete"><i
                                                            class="fa fa-trash"></i> {{trans('msgs.Delete')}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
            <div class="modal-dialog modal-dialog-centered" show="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Delete Show')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.shows.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('msgs.Are You Sure You Want To Delete')}} ?</p><br>
                            <input type="hidden" name="show_id" id="show_id" value="">
                            <input class="form-control" name="showname" id="showname" type="text" readonly>
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
        $('.delete_show').on('click', function () {
            var show_id = $(this).attr('show_id');
            var show_name = $(this).attr('show_name');
            $('.modal-body #show_id').val(show_id);
            $('.modal-body #showname').val(show_name);
        });
    });
</script>
