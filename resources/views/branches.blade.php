@extends('site.layouts.app-main')
<style>
    .zoom {
        text-align: center;
        padding: 10px;line-height: 2;
        transition: transform .5s;
        width: 80%;
        height: 200px;
        margin: 0 auto;
    }

    .zoom h6 {
        margin-top: 30px;
        margin-bottom: 30px;
        color: #fff !important;
        transition: margin-top 0.5s;
    }

    .zoom span {
        visibility: hidden;
        color: #fff !important;
        opacity: 0; margin-top: 30px;
        transition: visibility 0.5s, opacity 0.5s linear;
    }

    .zoom:hover {
        -ms-transform: scale(1.25); /* IE 9 */
        -webkit-transform: scale(1.25); /* Safari 3-8 */
        transform: scale(1.25);
    }

    .zoom:hover h6 {
        margin-top: 20px;
    }

    .zoom:hover span {
        visibility: visible;
        opacity: 1;
    }
</style>
@section('content')
    <!-- ==========Banner-Section========== -->
    <section class="main-page-header">
        <div class="container">
            <div class="speaker-banner-content">
                <h2 class="title">{{trans('msgs.Branches')}}</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('index')}}">
                            {{trans('msgs.Home')}}
                        </a>
                    </li>
                    <li>
                        {{trans('msgs.Branches')}}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Speaker-Single========== -->
    <section class="about-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12 mb-2">
                    @foreach($cities as $city)
                        <div class="p-2 mb-2">
                            <p class="alert alert-danger alert-sm text-center"
                               style="border-radius: 0; background: darkcyan; border-color: darkcyan;  color: #fff; font-size: 22px; ">
                                @if(App::getLocale()=='ar')
                                    {{$city->name_ar}}
                                @else
                                    {{$city->name}}
                                @endif
                            </p>
                            <div class="row text-center">
                                @php $i = 0; @endphp
                                @foreach($city->rooms as $room)
                                    <div class="col-lg-3">
                                        @php
                                        $my_array = array("f14668","6b011f","ff75a0","11698e","19456b","16c79a","eb5e0b","1687a7","91091e","822659");
                                        @endphp
                                        <div class="zoom m-5" style="background: #{{$my_array[$i]}};">
                                            <h6>
                                                @if(App::getLocale()=='ar')
                                                    {{$room->name_ar}}
                                                @else
                                                    {{$room->name}}
                                                @endif
                                            </h6>
                                            <span>
                                                @if(App::getLocale()=='ar')
                                                    {{$room->address_ar}}
                                                @else
                                                    {{$room->address}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Speaker-Single========== -->
@endsection
