@extends('site.layouts.app-main')
<style>
    p.under_slide_text {
        font-size: 20px;
        color: #000;
    }
    .product-label {
        position: absolute;
        top: 15px;
        left: 15px;
    }

    .product-label > span {
        border: 2px solid;
        padding: 2px 10px;
        font-size: 12px;
    }

    .product-label > span.soon {
        background-color: #006800;
        border-color: #006800;
        color: #FFF;
    }

    select.form-control {
        margin-top: 20px;
        padding: 0px;
    }

    .box-image {
        width: 100%;
        height: 250px;
    }

    .box-image img {
        width: 100%;
        height: 100%;
    }

    .box h6 {
        line-height: 1.5;
        font-size: 16px;
        font-weight: normal;
    }

    div.thumb {
        margin: 0 auto;
    }
</style>
@section('content')

    <!-- ==========Ticket-Search========== -->
    <section class="search-ticket-section" style="margin-top: 150px;">
        <div class="container">
            <div class="search-tab bg_img">
                <div class="row align-items-center mb--20">
                    <div class="col-lg-12 mb-20">
                        <div class="search-ticket-header text-center">
                            <h6 class="category">{{trans('msgs.welcome to Cinema Plus')}}</h6>
                            <h3 class="title">{{trans('msgs.what are you looking for')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="tab-area">
                    <div class="tab-item active">
                        <form class="ticket-search-form" @if(App::getLocale() == "ar") dir="rtl" @else dir="ltr"
                              @endif  method="get"
                              action="{{route('filter.soon.movies.by.search')}}">

                            <div class="form-group">
                                <div class="thumb">
                                    <img src="{{asset('assets/images/ticket/city.png')}}" alt="ticket">
                                </div>
                                <span class="type">{{trans('msgs.city')}}</span>
                                <select required name="city_id" id="city_id" class="form-control">
                                    <option value="">{{trans('msgs.Choose City')}}</option>
                                    @foreach($cities as $city)
                                        @if(App::getLocale() == "ar")
                                            <option value="{{$city->id}}">{{$city->name_ar}}</option>
                                        @else
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="thumb">
                                    <img src="{{asset('assets/images/ticket/cinema.png')}}" alt="ticket">
                                </div>
                                <span class="type">{{trans('msgs.room')}}</span>
                                <select required name="room_id" id="room_id" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="thumb">
                                    <img src="{{asset('assets/images/ticket/date.png')}}" alt="ticket">
                                </div>
                                <span class="type">{{trans('msgs.Date')}}</span>
                                <select required name="date" class="form-control">
                                    <option value="">{{trans('msgs.Choose Date')}}</option>
                                    <option value="{{date("Y-m-d")}}">{{date("Y-m-d")}}</option>
                                    <option
                                        value="{{date("Y-m-d", strtotime("+1 day"))}}">{{date("Y-m-d", strtotime("+1 day"))}}</option>
                                    <option
                                        value="{{date("Y-m-d", strtotime("+2 day"))}}">{{date("Y-m-d", strtotime("+2 day"))}}</option>
                                    <option
                                        value="{{date("Y-m-d", strtotime("+3 day"))}}">{{date("Y-m-d", strtotime("+3 day"))}}</option>
                                    <option
                                        value="{{date("Y-m-d", strtotime("+4 day"))}}">{{date("Y-m-d", strtotime("+4 day"))}}</option>
                                </select>
                            </div>
                            <div class="form-group large" style="margin-top: 30px">
                                <button type="submit" class="btn btn-block btn-success btn-lg" style="margin-top: 30px; height: 40px;"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Ticket-Search========== -->

    <!-- ==========Movie-Section========== -->
    <section class="movie-section padding-top padding-bottom">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-3">
                    <div class="widget-1 widget-check">
                        <div class="widget-header">
                            <h5 class="m-title">{{trans('msgs.Filter By')}}</h5>
                            <a href="{{route('showing.soon')}}" class="clear-check">{{trans('msgs.Clear All')}}</a>
                        </div>
                        <div class="widget-1-body">
                            <form action="{{route('filter.soon.movies.by.genre')}}" method="GET">
                                <h6 class="subtitle">{{trans('msgs.Genres')}}</h6>
                                <div class="check-area mb-3">
                                    @foreach($genres as $genre)
                                        <div class="form-group">
                                            <input type="checkbox"
                                                   @if(isset($all_genres))
                                                   @if(in_array($genre->id,$all_genres))
                                                   checked
                                                   @endif
                                                   @endif
                                                   value="{{$genre->id}}" name="genre[]"
                                                   id="genre_{{$genre->id}}"><label for="genre_{{$genre->id}}">
                                                @if(App::getLocale() == "ar")
                                                    {{$genre->name_ar}}
                                                @else
                                                    {{$genre->name}}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-sm btn-block btn-success"
                                        style="height: 40px">{{trans('msgs.Confirm')}} </button>
                            </form>

                        </div>
                    </div>
                    <div class="widget-1 widget-check">
                        <div class="widget-1-body">
                            <form action="{{route('filter.soon.movies.by.star')}}" method="GET">
                                <h6 class="subtitle">{{trans('msgs.Stars')}}</h6>
                                <div class="check-area mb-3">
                                    @foreach($stars as $star)
                                        <div class="form-group">
                                            <input type="checkbox"
                                                   @if(isset($all_stars))
                                                   @if(in_array($star->id,$all_stars))
                                                   checked
                                                   @endif
                                                   @endif
                                                   value="{{$star->id}}" name="star[]"
                                                   id="star_{{$star->id}}"><label for="star_{{$star->id}}">
                                                @if(App::getLocale() == "ar")
                                                    {{$star->name_ar}}
                                                @else
                                                    {{$star->name}}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-sm btn-block btn-success"
                                        style="height: 40px">{{trans('msgs.Confirm')}} </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 mb-50 mb-lg-0">
                    <div class="filter-tab tab">
                        <div class="filter-area">
                            <div class="filter-main">
                                <div class="row mb-10 p-2 text-right">
                                    <p class="pull-right">{{trans('msgs.Showing Soon Movies')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-area">
                            <div class="tab-item active">
                                <div class="row mb-10 justify-content-center">
                                    @if (!$showing_soon_shows->isEmpty())
                                        @foreach($showing_soon_shows as $show)
                                            <div class="col-sm-6 col-lg-4">
                                                <div class="movie-grid">
                                                    <div class="movie-thumb c-thumb">

                                                        <a href="{{route('show.details',$show->id)}}">
                                                            <img src="{{asset($show->movie->movie_pic)}}" alt="movie">
                                                            <div class="product-label">
                                                                <span class="soon">{{trans('msgs.Showing Soon')}}</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="movie-content bg-one">
                                                        <h5 class="title m-0 text-center">
                                                            <a href="{{route('show.details',$show->id)}}" style="font-size: 18px;">
                                                                @if(App::getLocale()=='ar')
                                                                    {{$show->movie->name_ar}}
                                                                @else
                                                                    {{$show->movie->name_ar}}
                                                                @endif
                                                            </a>
                                                        </h5>
                                                        <div class="details text-center" style="font-size: 13px;">
                                                            <div class="genre">
                                                                <span>{{trans('msgs.Movie Genres')}} : </span>
                                                                @php
                                                                    $last = $show->movie->genres->keys()->last();
                                                                @endphp
                                                                @foreach($show->movie->genres as $key => $genre)
                                                                    @if(App::getLocale()=='ar')
                                                                        @if($key == $last)
                                                                            {{$genre->name_ar}}
                                                                        @else
                                                                            {{$genre->name_ar}} -
                                                                        @endif
                                                                    @else
                                                                        @if($key == $last)
                                                                            {{$genre->name}}
                                                                        @else
                                                                            {{$genre->name}} -
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="star">
                                                                <span>{{trans('msgs.Movie Stars')}} : </span>
                                                                @php
                                                                    $last = $show->movie->stars->keys()->last();
                                                                @endphp
                                                                @foreach($show->movie->stars as $key => $star)
                                                                    @if(App::getLocale()=='ar')
                                                                        @if($key == $last)
                                                                            {{$star->name_ar}}
                                                                        @else
                                                                            {{$star->name_ar}} -
                                                                        @endif
                                                                    @else
                                                                        @if($key == $last)
                                                                            {{$star->name}}
                                                                        @else
                                                                            {{$star->name}} -
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="alert w-100 alert-success alert-sm p-1 m-5 text-center">
                                            {{trans('msgs.No Showing Movies')}}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <span @if(App::getLocale()=="ar") dir="rtl"
                                  class="text-center" @else @endif>{{ $showing_soon_shows->withQueryString()->links() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Section========== -->

@endsection

<script src="{{asset('assets/js/jquery.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#city_id').on('change', function () {
            var city_id = $(this).val();
            city_id = parseInt(city_id);
            $('#room_id').load('/city/loadDetails/' + city_id);
        });
    });
</script>
