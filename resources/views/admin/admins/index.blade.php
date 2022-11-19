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
                        @can('add admin')
                            <a class="btn pull-right btn-primary btn-md" href="{{ route('admin.admins.create') }}">
                                <i class="fa fa-plus"></i> {{trans('msgs.Add New admin')}} </a>

                            <a class="btn pull-right btn-danger btn-md" style="margin-right: 20px"
                               href="{{ route('admin.admins.trashed') }}">
                                <i class="fa fa-eye"></i> {{trans('msgs.Show Trashed Admins')}} </a>
                        @endcan
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success">{{trans('msgs.Display All admins')}}</h5>
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
                                <th class="wd-20p border-bottom-0 text-center">{{trans('msgs.Email')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Status')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Role')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Privilege')}}</th>
                                <th class="wd-10p border-bottom-0 text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach ($data as $key => $admin)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @if ($admin->Status == 'active')
                                            <span class="badge badge-success">
                                                    {{trans('msgs.'.$admin->Status.'') }}
                                                </span>
                                        @elseif ($admin->Status == 'suspended' || $admin->Status == 'blocked')
                                            <span class="badge badge-danger">
                                                    {{ $admin->Status }}
                                                </span>
                                        @elseif ($admin->Status == 'waiting')
                                            <span class="badge badge-warning">
                                                    {{ $admin->Status }}
                                                </span>
                                        @elseif ($admin->Status == 'trial')
                                            <span class="badge badge-info">
                                                    {{ $admin->Status }}
                                                </span>
                                        @else
                                            <span class="badge badge-primary">
                                                    {{ $admin->Status }}
                                                </span>
                                        @endif
                                    </td>
                                    <td>{{$admin->type}}</td>
                                    <td>
                                        @if (!empty($admin->getRoleNames()))
                                            @foreach ($admin->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('show admin')
                                            <a href="{{ route('admin.admins.show', $admin->id) }}"
                                               class="btn btn-md btn-success"
                                               title="show"><i class="fa fa-eye"></i></a>

                                        @endcan

                                        @can('edit admin')
                                            <a href="{{ route('admin.admins.edit', $admin->id) }}"
                                               class="btn btn-md btn-info"
                                               title="edit"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('delete admin')
                                            @if (!in_array("super admin",$admin->role_name ))
                                                <a class="modal-effect btn btn-md btn-danger delete_admin"
                                                   admin_id="{{ $admin->id }}"
                                                   email="{{ $admin->email }}" data-toggle="modal" href="#modaldemo8"
                                                   title="delete"><i
                                                        class="fa fa-trash"></i></a>
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
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">{{trans('msgs.Delete admin')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.admins.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('msgs.Are You Sure You Want To Delete')}} ?</p><br>
                            <input type="hidden" name="admin_id" id="admin_id" value="">
                            <input class="form-control" name="email" id="email" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('msgs.Cancel')}}</button>
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
        $('.delete_admin').on('click', function () {
            var admin_id = $(this).attr('admin_id');
            var email = $(this).attr('email');
            $('.modal-body #admin_id').val(admin_id);
            $('.modal-body #email').val(email);
        });
    });
</script>
