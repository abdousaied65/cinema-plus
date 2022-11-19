@extends('admin.layouts.app-main')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if($user->Status == 'blocked' || $user->Status == 'suspended')
        <div class="row row-sm justify-content-center">
            <div class="card col-10 justify-content-center m-3 p-2">
                <div class="card-header">
                    <div class="card-title text-center alert alert-sm alert-danger">
                        <i class="fa fa-thumbs-o-up" style="margin-right: 20px; font-size: 20px;"></i>
                        Welcome <b>{{$user->name}}</b>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="m-3 " style="line-height: 1.5em;">You Are Now Stopped Due To Technical Issue </h3>
                        <h4 class="m-3">please contact The Support Team now to solve This issue</h4>
                        <a role="button" class="btn btn-md btn-danger m-3" href="#">
                            <i class="fa fa-envelope"></i>
                            Click here to send a ticket</a>
                    </div>
                </div>
            </div><!-- end of card -->
        </div><!-- end of row -->
    @elseif($user->Status == 'waiting')
        <div class="row row-sm justify-content-center">
            <div class="card col-10 justify-content-center m-3 p-2">
                <div class="card-header">
                    <div class="card-title text-center alert alert-sm alert-warning">
                        <i class="fa fa-thumbs-o-up" style="margin-right: 20px; font-size: 20px;"></i>
                        Welcome <b>{{$user->name}}</b>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="m-3 " style="line-height: 1.5em;">You are now waiting for the site administration <br> to accept your
                            application to start <b> Free Trial </b> </h3>
                        <h4 class="m-3">please contact them now to accept it as soon as possible</h4>
                        <a role="button" class="btn btn-md btn-warning m-3" href="#">
                            <i class="fa fa-envelope"></i>
                            Click here to send a message</a>
                    </div>
                </div>
            </div><!-- end of card -->
        </div><!-- end of row -->
    @elseif($user->Status == 'trial')
        <div class="row row-sm justify-content-center">
            <div class="card col-10 justify-content-center m-3 p-2">
                <div class="card-header">
                    <div class="card-title text-center alert alert-sm alert-success">
                        <i class="fa fa-thumbs-o-up" style="margin-right: 20px; font-size: 20px;"></i>
                        Welcome <b>{{$user->name}}</b>
                    </div>
                    <div class="card-body text-center">
                        <h3 class="m-3 " style="line-height: 1.5em;">You are now enjoying the <b> Free Trial </b> </h3>
                    </div>
                </div>
            </div><!-- end of card -->
        </div><!-- end of row -->
    @else
    @if(in_array("super admin",$user->role_name) || in_array("admin",$user->role_name))
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">201</h2>
                                <div class="m-b-5">NEW ORDERS</div>
                                <i class="ti-shopping-cart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-info color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">1250</h2>
                                <div class="m-b-5">UNIQUE VIEWS</div>
                                <i class="ti-bar-chart widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">$1570</h2>
                                <div class="m-b-5">TOTAL INCOME</div>
                                <i class="fa fa-money widget-stat-icon"></i>
                                <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">108</h2>
                                <div class="m-b-5">NEW USERS</div>
                                <i class="ti-user widget-stat-icon"></i>
                                <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
