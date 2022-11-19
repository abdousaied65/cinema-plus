@extends('site.layouts.app-panel')
<style>
    .rooms {
        width: 25%;
        background: #1687a7;
        color: #fff;
        float: left;
        display: inline;
        border: 1px solid #11326f;
        padding: 10px;
        font-size: 20px;
        text-align: center;
    }
    select.form-control {
        padding: 0;
    }
    .halls {
        width: 75%;
        background: #1687a7;
        color: #fff;
        float: right;
        display: inline;
        border: 1px solid #11326f;
        padding: 10px;
        font-size: 20px;
        text-align: center;
    }
    .movie-schedule .item {
        color: #fff;
    }
    .movie-schedule .item a {
        background: maroon;
        color: #fff;
        width: 100px;
        height: auto;
        padding: 5px;
        text-align: center;
        display: inline;
        float: left;
        text-align: center;
        margin: 10px;
        font-size: 15px;
    }
</style>
@section('panel')
    <!-- ==========Window-Warning-Section========== -->
    <section class="window-warning inActive">
        <div class="lay"></div>
        <div class="warning-item">
            <form action="{{route('choose.seats','step-1')}}" method="get">

                <input type="hidden" name="show_id" id="show_id" value="{{$show->id}}"/>
                <input type="hidden" name="room_id" id="room_id" value=""/>
                <input type="hidden" name="hall_id" id="hall_id" value=""/>
                <h6 class="subtitle">{{trans('msgs.Choose Date')}}</h6>
                <h4 class="title mt-2">{{trans('msgs.Select Your Seats')}}</h4>
                <div class="thumb">
                    <img src="{{asset('assets/images/movie/seat-plan.png')}}" alt="movie">
                </div>
                <div class="row">
                    <div class="col-lg-6 pull-left">
                        <label for="date">{{trans('msgs.Date')}}</label>
                        <select required name="date" id="date" class="form-control">
                            <option value="">{{trans('msgs.Choose Date')}}</option>
                            @foreach($show->show_days as $day)
                                <option value="{{$day->date}}">{{trans('msgs.'.$day->day.'')}} ( {{date("Y-m-d", strtotime($day->date))}} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 pull-right">
                        <button type="submit" class="btn btn-block btn-sm btn-danger"
                                style="padding:10px;height: 40px;margin-top: 35px; ">
                            {{trans('msgs.Select Your Seats')}}<i class="fas fa-angle-right" style="margin: 0 20px"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ==========Window-Warning-Section========== -->

    <!-- ==========Banner-Section========== -->
    <section class="details-banner hero-area" style="margin-bottom: 0px;">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content">
                    <h3 class="title">
                        @if(App::getLocale() == "ar")
                            {{$show->movie->name_ar}}
                        @else
                            {{$show->movie->name}}
                        @endif
                    </h3>
                    <div class="tags">
                        @foreach($show->movie->genres as $genre)
                            <a href="javascript:void();">
                                @if(App::getLocale() == "ar")
                                    {{$genre->name_ar}}
                                @else
                                    {{$genre->name}}
                                @endif
                            </a>
                        @endforeach
                    </div>

                    <div class="tags">
                        @foreach($show->movie->stars as $star)
                            <a href="javascript:void();">
                                @if(App::getLocale() == "ar")
                                    {{$star->name_ar}}
                                @else
                                    {{$star->name}}
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->
    <!-- ==========Movie-Section========== -->
    <div class="ticket-plan-section padding-bottom padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="rooms text-center">
                        {{trans('msgs.Rooms')}}
                    </div>
                    <div class="halls text-center">
                        {{trans('msgs.Halls')}}
                    </div>
                    <div class="clearfix"></div>
                    <ul class="seat-plan-wrapper" style="background: #1687a7;">
                        @foreach($rooms as $room)
                            <li>
                                <div class="movie-name" style="width:25%">
                                    <div class="location-icon" style="margin: 5px;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <a href="javascript:void();" class="name text-center">
                                        @if(App::getLocale()=="ar")
                                            {{$room->city->name_ar}}
                                            <br>
                                            {{$room->name_ar}}
                                        @else
                                            {{$room->city->name}}
                                            <br>
                                            {{$room->name}}
                                        @endif
                                    </a>
                                </div>
                                <div class="movie-schedule" style="width: 75%">
                                    <div class="item">
                                        @php
                                            $halls_unique = $room->halls->unique();
                                        @endphp
                                        @foreach($halls_unique as $hall)
                                            @if(App::getLocale() == "ar")
                                                <a class="choose_day" room_id="{{$room->id}}" hall_id="{{$hall->id}}"
                                                   href="javascript:;">{{$hall->name_ar}}</a>
                                            @else
                                                <a class="choose_day" room_id="{{$room->id}}" hall_id="{{$hall->id}}"
                                                   href="javascript:;">{{$hall->name}}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.choose_day').on('click', function () {
                var room_id = $(this).attr('room_id');
                var hall_id = $(this).attr('hall_id');
                $('#room_id').val(room_id);
                $('#hall_id').val(hall_id);
            })
        })
    </script>
@endsection

