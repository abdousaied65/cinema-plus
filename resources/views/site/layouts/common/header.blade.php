<!-- ==========Header-Section========== -->
<header class="header-section header-active">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{route('index')}}">
                    <img src="{{asset('images/logo.png')}}" alt="logo">
                </a>
            </div>
            <ul class="menu"
                @if(App::getLocale() =="ar")
                dir="rtl"
                @else
                dir="ltr"
                @endif
            >
                <li>
                    <a href="{{route('index')}}" class="{{ Request::is('/') ? 'active' : '' }}">{{__('msgs.Home')}}</a>
                </li>
                <li>
                    <a href="{{route('about')}}"
                       class="{{ Request::is('about') ? 'active' : '' }}"> {{__('msgs.About')}}</a>
                </li>
                <li>
                    <a href="{{route('contact')}}"
                       class="{{ Request::is('contact') ? 'active' : '' }}">{{__('msgs.Contact Us')}}</a>
                </li>
                <li>
                    <a href="javascript:void()">
                        {{trans('msgs.Pages')}}
                        <ul class="submenu"
                            @if(App::getLocale() =="ar")
                            dir="rtl"
                            @else
                            dir="ltr"
                            @endif

                            style="padding-top: 0px;">
                            <li>
                                <a href="{{route('now.showing')}}" class="active">{{trans('msgs.Now Showing')}}</a>
                            </li>
                            <li>
                                <a href="{{route('showing.soon')}}" class="active">{{trans('msgs.Soon')}}</a>
                            </li>
                            <li>
                                <a href="{{route('foods')}}" class="active">{{trans('msgs.Foods & Drinks')}}</a>
                            </li>
                            <li>
                                <a href="{{route('branches')}}" class="active">{{trans('msgs.Branches')}}</a>
                            </li>
                            <li>
                                <a href="{{route('gifts')}}" class="active">{{trans('msgs.Gift')}}</a>
                            </li>
                            @auth()
                                <li>
                                    <a href="{{route('checkout')}}"
                                       class="active">{{trans('msgs.Current Reservation')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('previous-checkouts')}}"
                                       class="active">{{trans('msgs.Previous Reservations')}}</a>
                                </li>
                            @endauth
                        </ul>
                    </a>
                </li>
                @guest
                    <li>
                        <a href="{{ route('login') }}"><i class="ion-log-in fa-2x"></i></a>
                    </li>
                @else
                    <li>
                        <a href="javascript:;">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{route('home')}}"><i
                                        class="fa fa-tachometer-alt"></i> {{__('msgs.Dashboard')}}</a>
                            </li>
                            <li>
                                <a href="{{route('profile',Auth::user()->id)}}"><i
                                        class="fa fa-users-cog"></i> {{__('msgs.Profile')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i> {{ __('msgs.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void()">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                            <ul class="submenu"
                                @if(App::getLocale() =="ar")
                                dir="rtl"
                                @else
                                dir="ltr"
                                @endif
                                style="padding-top: 0px;">
                                @php
                                    $cart = array();
                                @endphp
                                @foreach($reservations as $reservation)
                                    <li>
                                        <a href="{{route('checkout')}}">
                                            {{$reservation->seat->seat}} (1 * {{$reservation->seat->ticket_price}})
                                            @php array_push($cart,$reservation->seat->ticket_price) @endphp
                                        </a>
                                    </li>
                                @endforeach
                                @foreach($reseve_foods as $reseve_food)
                                    <li>
                                        <a href="{{route('checkout')}}">
                                            @if(App::getLocale() == "ar")

                                                {{$reseve_food->food->name_ar}}
                                            @else
                                                {{$reseve_food->food->name}}
                                            @endif
                                            ({{$reseve_food->quantity}} * {{$reseve_food->unit_price}} )
                                            @php array_push($cart,$reseve_food->quantity_price) @endphp
                                        </a>
                                    </li>
                                @endforeach

                                @foreach($reseve_gifts as $reseve_gift)
                                    <li>
                                        <a href="{{route('checkout')}}">
                                            @if(App::getLocale() == "ar")

                                                {{trans('msgs.gift') .' '. $reseve_gift->gift->name_ar}}
                                            @else
                                                {{$reseve_gift->gift->name}}
                                            @endif
                                            (1 * {{$reseve_gift->gift->gift_price}} )
                                            @php array_push($cart,$reseve_gift->gift->gift_price) @endphp
                                        </a>
                                    </li>
                                @endforeach
                                <li class="dropdown-divider"></li>
                                <li><a href="{{route('checkout')}}">{{trans('msgs.Total Price')}}
                                        : {{array_sum($cart)}}</a></li>
                            </ul>
                        </a>
                    </li>
                @endguest

                @if(App::getLocale() == 'ar')
                    <li>
                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">En</a>
                    </li>
                @else
                    <li>
                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">Ar</a>
                    </li>
                @endif
            </ul>
            <div class="header-bar d-lg-none text-black-50">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
<!-- ==========Header-Section========== -->
