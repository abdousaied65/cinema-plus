@extends('site.layouts.app-panel')
<style>
    i.fa-star {
        margin-right: 20px;
        margin-left: 20px;
    }

    .container .row .col-12 {
        min-height: 100px !important;
    }
</style>
@section('panel')
    <!-- ==========Banner-Section========== -->
    <section class="details-banner hero-area seat-plan-banner">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-content style-two">
                    @if(App::getLocale() == "ar")
                        <h3 class="title">{{$show->movie->name_ar}}</h3>
                        <div class="tags">
                            <a href="javascript:;">{{$room->name_ar}}</a>
                            <i class="fa fa-star"></i>
                            <a href="javascript:;">{{$hall->name_ar}}</a>
                        </div>
                    @else
                        <h3 class="title">{{$show->movie->name}}</h3>
                        <div class="tags">
                            <a href="javascript:;">{{$room->name}}</a>
                            <i class="fa fa-star"></i>
                            <a href="javascript:;">{{$hall->name}}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Page-Title========== -->
    <section class="page-title">
        <div class="container">
            <form action="{{route('choose.seats.s2','step-2')}}" method="get">
                <input type="hidden" value="{{$show_id}}" name="show_id" />
                <input type="hidden" value="{{$room_id}}" name="room_id" />
                <input type="hidden" value="{{$hall_id}}" name="hall_id" />
                <input type="hidden" value="{{$date}}" name="date" />
                <input type="hidden" value="{{$day}}" name="day" />
                <div class="row">
                    <div class="col-lg-6 col-sm-12 text-center d-inline" style="margin-bottom: 20px;">
                        <a href="{{URL::previous()}}" class="btn btn-danger mt-4">
                            <i style="margin-right: 20px;" class="fa fa-arrow-left"></i> {{trans('msgs.Back')}}
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-12 text-center d-inline" style="margin-bottom: 20px;">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label for="times">{{trans('msgs.'.$day.'')}} - {{$date}}</label>
                                    <select id="times" name="time" class="form-control">
                                        <option value="">{{trans('msgs.Choose Time')}}</option>
                                        @foreach($times as $time)
                                            <option value="{{$time}}">{{$time}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <button class="btn btn-sm btn-success text-center"
                                        style=" height: 40px; width: 150px; padding: 0;margin-left: 40px;margin-top: 30px; ">
                                    <i class="fa fa-check"> {{trans('msgs.Confirm')}} </i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ==========Page-Title========== -->
@endsection

