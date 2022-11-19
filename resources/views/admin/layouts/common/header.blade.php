<!-- START HEADER-->
<header class="header">
    <div class="page-brand">
        <a class="link" href="{{route('admin.home')}}">
                    <span class="brand justify-content-center">
                        <img src="{{asset('images/logo.png')}}" class="img-responsive " style="width: 80%;" alt="">
                        <span class="brand-tip"></span>
                    </span>
            <span class="brand-mini">
                <img src="{{asset('images/logo-min.png')}}" class="img-responsive " style="width: 100%;" alt="">
            </span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="fa fa-bars"></i></a>
            </li>

        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            @if(Auth::user()->Status == "active")
                <li class="dropdown dropdown-inbox">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 25px;color: maroon"><i
                            class="fa fa-language"></i>
                    </a>
                    <ul class="dropdown-menu" style="height: auto">
                        <li>
                            <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                English
                            </a>
                            <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                العربية
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-inbox">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i>
                        <span class="badge badge-primary envelope-badge">{{$unread_messages->count()}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                        <li class="dropdown-menu-header">
                            <div>
                                <span><strong>{{$unread_messages->count()}}</strong> {{trans('msgs.Unread Messages')}} </span>
                                <a class="pull-right"
                                   href="{{route('admin.contacts.index')}}">{{trans('msgs.View All')}}</a>
                            </div>
                        </li>
                        <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                            <div>
                                @foreach($unread_messages as $msg)
                                    <a class="list-group-item" href="{{route('admin.contacts.show',$msg->id)}}"
                                       style="color: #000; ">
                                        <div class="media">
                                            <div class="media-img">
                                                <img src="{{asset('images/guest.png')}}"/>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-strong"></div>
                                                {{$msg->name}}<small
                                                    class="text-muted float-right">{{$msg->created_at->diffForHumans()}}</small>
                                                <div class="font-13">{{$msg->message}} ..</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    @if (isset(Auth::user()->profile->profile_pic) && !empty(Auth::user()->profile->profile_pic) )
                        <img src="{{asset(Auth::user()->profile->profile_pic)}}" alt="avatar"><i></i>
                    @else
                        <img src="{{asset('admin-assets/img/admin-avatar.png')}}" alt="avatar"><i></i>
                    @endif
                    <span></span>{{Auth::user()->name}}<i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin.profile.edit',Auth::user()->id) }}"><i
                            class="fa fa-user"></i>{{__('msgs.Profile')}}</a>
                   <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i> {{__('msgs.Logout')}}
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
<!-- END HEADER-->

