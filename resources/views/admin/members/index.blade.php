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
                        <a class="btn pull-right btn-primary btn-md" href="{{ route('admin.members.create') }}">
                            <i class="fa fa-plus"></i> {{trans('msgs.Add New Member')}} </a>

                        <a class="btn pull-right btn-danger btn-md" style="margin-right: 20px"
                           href="{{ route('admin.members.trashed') }}">
                            <i class="fa fa-eye"></i> {{trans('msgs.Show Trashed Members')}} </a>
                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-success">{{trans('msgs.Display All Members')}}</h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-striped table-bordered zero-configuration" id="example-table"
                               style="text-align: center;">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0 text-center">#</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Name')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Email')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Email Verified At')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Status')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Phone Number')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Member Picture')}}</th>
                                <th class="wd-10p border-bottom-0 text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach ($data as $key => $member)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->email_verified_at }}</td>
                                    <td><span
                                            class="badge @if($member->status == 'active') badge-success @else badge-danger @endif">{{trans('msgs.'.$member->status.'')}}</span>
                                    </td>
                                    <td>{{$member->phone}}</td>
                                    <td><img data-toggle="modal" href="#modaldemo9" src="{{asset($member->avatar)}}"
                                             style="width:50px; height: 50px;cursor:pointer;"
                                             alt=""></td>
                                    <td>
                                        <a href="{{ route('admin.members.edit', $member->id) }}"
                                           class="btn btn-md btn-info"
                                           title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.members.changeStatus', $member->id) }}"
                                           class="btn btn-md btn-warning"
                                           @if($member->status == "active")
                                           title="{{trans('msgs.Lock')}}"
                                           @else
                                           title="{{trans('msgs.Unlock')}}"
                                            @endif
                                            >
                                            @if($member->status == "active")
                                                <i class="fa fa-ban"></i>
                                            @else
                                                <i class="fa fa-unlock"></i>
                                            @endif
                                        </a>
                                        <a class="modal-effect btn btn-md btn-danger delete_member"
                                           member_id="{{ $member->id }}"
                                           member_name="{{ $member->name }}" data-toggle="modal" href="#modaldemo8"
                                           title="delete"><i
                                                class="fa fa-trash"></i></a>

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
                            style="font-family: 'Cairo'; ">{{trans('msgs.Show Member Picture')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img id="image_larger" alt="image" style="width: 100%; "/>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Delete Member')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.members.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('msgs.Are You Sure You Want To Delete')}} ?</p><br>
                            <input type="hidden" name="member_id" id="member_id" value="">
                            <input class="form-control" name="member_name" id="member_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('msgs.Cancel')}}</button>
                            <button type="submit" class="btn btn-danger">{{trans('msgs.Confirm')}}</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.delete_member').on('click', function () {
            var member_id = $(this).attr('member_id');
            var name = $(this).attr('member_name');
            $('.modal-body #member_id').val(member_id);
            $('.modal-body #member_name').val(name);
        });
        $('img').on('click', function () {
            var image_larger = $('#image_larger');
            var path = $(this).attr('src');
            $(image_larger).prop('src', path);
        })
    });
</script>
