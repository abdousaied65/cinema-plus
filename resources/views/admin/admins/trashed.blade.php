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
                        @endcan
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-danger">
                            {{trans('msgs.Display All Deleted admins')}}
                        </h5>
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
                                            <span class="label text-success d-flex">
                                                    <div class="dot-label bg-success ml-1"></div>{{trans('msgs.'.$admin->Status.'')  }}
                                                </span>
                                        @elseif ($admin->Status == 'suspended')
                                            <span class="label text-danger d-flex">
                                                    <div class="dot-label bg-warning ml-1"></div>{{trans('msgs.'.$admin->Status.'')  }}
                                                </span>
                                        @else
                                            <span class="label text-danger d-flex">
                                                    <div class="dot-label bg-danger ml-1"></div>{{trans('msgs.'.$admin->Status.'')  }}
                                                </span>
                                        @endif

                                    </td>
                                    <td>{{$admin->type}}</td>
                                    <td>
                                        @if(!empty($admin->getRoleNames()))
                                            @foreach($admin->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    <td>
                                        @can('delete admin')
                                        @if(!in_array("super admin",$admin->role_name))
                                                <form class="d-inline" action="{{route('admin.restore.trashed',$admin->id)}}" method="POST">
                                                   @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-md btn-success" title="restore">
                                                       <i class="fa fa-refresh"></i> {{trans('msgs.Restore')}}
                                                   </button>
                                                </form>
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
    </div>
@endsection
