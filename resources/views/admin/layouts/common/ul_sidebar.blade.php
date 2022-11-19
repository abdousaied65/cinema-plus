<style>
    ul.metismenu li{
        border-bottom: 1px solid #444;
    }
    ul.metismenu li ul li{
        border-bottom: 0;
    }
</style>
<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar" style="overflow-y: scroll;">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                @if (isset(Auth::user()->profile->profile_pic) && !empty(Auth::user()->profile->profile_pic) )
                    <img style="width:64px;height: 64px; border-radius: 100%;"
                         src="{{asset(Auth::user()->profile->profile_pic)}}" alt="avatar"><i></i>
                @else
                    <img style="width:64px;height: 64px; border-radius: 100%;"
                         src="{{asset('admin-assets/img/admin-avatar.png')}}" alt="avatar"><i></i>
                @endif
            </div>
            <div class="admin-info">
                <div class="font-strong">{{Auth::user()->name}}</div>
                @if(!empty(Auth::user()->getRoleNames()))
                    @foreach(Auth::user()->getRoleNames() as $v)
                        <label class="badge badge-secondary">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="{{ Request::is('*home*') ? 'active' : '' }}">
                <a class="{{ Request::is('*home*') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                    <i class="sidebar-item-icon fa fa-dashboard"></i>
                    <span class="nav-label">
                        {{__('msgs.Dashboard')}}
                    </span>
                </a>
            </li>
            <li class="heading text-center">{{__('msgs.FEATURES')}}</li>
            @can('admins list','privileges list')
                <li class="{{ Request::is('*admins*', '*roles*') ? 'active' : '' }}">
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-sign-in"></i>
                        <span class="nav-label">
                    {{__('msgs.Admins')}}
                    </span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse {{ Request::is('*admins*', '*roles*') ? 'in' : '' }}">
                        @can('add admin')
                            <li>
                                <a class="{{ Request::is('*admins/create') ? 'active' : '' }}"
                                   href="{{ route('admin.admins.create') }}"><i
                                        class="fa fa-plus"></i> {{__('msgs.Add New Admin')}} </a>
                            </li>
                        @endcan
                        @can('admins list')
                            <li>
                                <a class="{{ Request::is('*admins') ? 'active' : '' }}"
                                   href="{{ route('admin.admins.index') }}"><i
                                        class="fa fa-list"></i> {{__('msgs.Admins List')}} ( {{$admins->count()}} ) </a>
                            </li>
                        @endcan
                        @can('add privilege')
                            <li>
                                <a class="{{ Request::is('*roles/create') ? 'active' : '' }}"
                                   href="{{ route('admin.roles.create') }}"><i
                                        class="fa fa-plus"></i> {{__('msgs.Add New Privilege')}} </a>
                            </li>
                        @endcan
                        @can('privileges list')
                            <li>
                                <a class="{{ Request::is('*roles') ? 'active' : '' }}"
                                   href="{{ route('admin.roles.index') }}"><i
                                        class="fa fa-list"></i> {{__('msgs.Privileges List')}}</a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            <li class="{{ Request::is('*genres*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-list-alt"></i>
                    <span class="nav-label">
                {{__('msgs.Genres')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*genres*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*genres/create') ? 'active' : '' }}"
                           href="{{ route('admin.genres.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Genre')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*genres') ? 'active' : '' }}"
                           href="{{ route('admin.genres.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Genres List')}}  ( {{$genres->count()}} ) </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('*stars*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-user-secret"></i>
                    <span class="nav-label">
                {{__('msgs.Stars')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*stars*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*stars/create') ? 'active' : '' }}"
                           href="{{ route('admin.stars.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Star')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*stars') ? 'active' : '' }}"
                           href="{{ route('admin.stars.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Stars List')}}  ( {{$stars->count()}} ) </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('*movies*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-movie-o"></i>
                    <span class="nav-label">
                {{__('msgs.Movies')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*movies*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*movies/create') ? 'active' : '' }}"
                           href="{{ route('admin.movies.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Movie')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*movies') ? 'active' : '' }}"
                           href="{{ route('admin.movies.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Movies List')}}  ( {{$movies->count()}} ) </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('*cities*','*rooms*','*halls*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-map-marker"></i>
                    <span class="nav-label">
                {{__('msgs.Cities')}} - {{__('msgs.Rooms')}} - {{__('msgs.Halls')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*cities*','*rooms*','*halls*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*cities/create') ? 'active' : '' }}"
                           href="{{ route('admin.cities.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New City')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*cities') ? 'active' : '' }}"
                           href="{{ route('admin.cities.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Cities List')}}  ( {{$cities->count()}} ) </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*rooms/create') ? 'active' : '' }}"
                           href="{{ route('admin.rooms.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Room')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*rooms') ? 'active' : '' }}"
                           href="{{ route('admin.rooms.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Rooms List')}}   ( {{$rooms->count()}} ) </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*halls/create') ? 'active' : '' }}"
                           href="{{ route('admin.halls.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Hall')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*halls') ? 'active' : '' }}"
                           href="{{ route('admin.halls.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Halls List')}}   ( {{$halls->count()}} ) </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Request::is('*members*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">
                {{__('msgs.Members')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*members*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*members/create') ? 'active' : '' }}"
                           href="{{ route('admin.members.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Member')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*members') ? 'active' : '' }}"
                           href="{{ route('admin.members.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Members List')}}   ( {{$users->count()}} ) </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Request::is('*contacts*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope-open"></i>
                    <span class="nav-label">
                {{__('msgs.Contacts')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*contacts*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*contacts') ? 'active' : '' }}"
                           href="{{ route('admin.contacts.index') }}"><i
                                class="fa fa-envelope-open"></i> {{__('msgs.Contacts List')}}   ( {{$contacts->count()}} ) </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*contacts-compose') ? 'active' : '' }}"
                           href="{{ route('admin.contacts.compose') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Compose')}} </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('*subscribes*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope-open"></i>
                    <span class="nav-label">
                {{__('msgs.Subscribes')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*subscribes*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*subscribes') ? 'active' : '' }}"
                           href="{{ route('admin.subscribes.index') }}"><i
                                class="fa fa-envelope-open"></i> {{__('msgs.Subscribes List')}}   ( {{$subscribes->count()}} ) </a>
                    </li>

                    <li>
                        <a class="{{ Request::is('*subscribes-compose') ? 'active' : '' }}"
                           href="{{ route('admin.subscribes.compose') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Compose To Subscribes')}} </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('*foods','*foods/create') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-cutlery"></i>
                    <span class="nav-label">
                {{__('msgs.Foods & Drinks')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*foods','*foods/create') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*foods/create') ? 'active' : '' }}"
                           href="{{ route('admin.foods.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Food')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*foods') ? 'active' : '' }}"
                           href="{{ route('admin.foods.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Foods List')}}   ( {{$foods->count()}} ) </a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('*shows*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-film"></i>
                    <span class="nav-label">
                {{__('msgs.Shows')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*shows*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*shows/create') ? 'active' : '' }}"
                           href="{{ route('admin.shows.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Show')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*shows') ? 'active' : '' }}"
                           href="{{ route('admin.shows.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Shows List')}}   ( {{$shows->count()}} ) </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Request::is('*tickets-reservations','*foods-reservations','*payments') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-ticket"></i>
                    <span class="nav-label">
                {{__('msgs.Reservations')}} && {{trans('msgs.Payments')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*tickets-reservations*','*foods-reservations','*payments') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*tickets-reservations') ? 'active' : '' }}"
                           href="{{ route('admin.reservations.tickets') }}"><i
                                class="fa fa-ticket"></i> {{__('msgs.Tickets Reservations')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*foods-reservations') ? 'active' : '' }}"
                           href="{{ route('admin.reservations.foods') }}"><i
                                class="fa fa-cutlery"></i> {{__('msgs.Foods Reservations')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*payments') ? 'active' : '' }}"
                           href="{{ route('admin.payments.index') }}"><i
                                class="fa fa-money"></i> {{__('msgs.Payments')}} </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Request::is('*gifts*') ? 'active' : '' }}">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-gift"></i>
                    <span class="nav-label">
                {{__('msgs.Gifts')}}
                </span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Request::is('*gifts*') ? 'in' : '' }}">
                    <li>
                        <a class="{{ Request::is('*gifts/create') ? 'active' : '' }}"
                           href="{{ route('admin.gifts.create') }}"><i
                                class="fa fa-plus"></i> {{__('msgs.Add New Gift')}} </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('*gifts') ? 'active' : '' }}"
                           href="{{ route('admin.gifts.index') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Gifts List')}} </a>
                    </li>

                    <li>
                        <a class="{{ Request::is('*sent-gifts') ? 'active' : '' }}"
                           href="{{ route('admin.gifts.sent') }}"><i
                                class="fa fa-list"></i> {{__('msgs.Gifts Sent From Members')}} </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
