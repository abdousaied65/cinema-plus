@extends('site.layouts.app-main')
<style>
    p.under_slide_text {
        font-size: 20px;
        color: #000;
    }
    select.form-control {
        margin-top: 20px;
        padding: 0px;
    }
    .box-image{
        width:100%; height: 250px;
    }
    .box-image img{
        width: 100%; height: 100%;
    }
    .box h6{line-height: 1.5;font-size: 16px; font-weight: normal;}

    div.thumb {
        margin: 0 auto;
    }
</style>
@section('content')
    <!-- ==========Banner-Section========== -->
    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view">
                    <img class="d-block w-100" src="{{asset('images/slide3.jpg')}}"
                         alt="First slide">
                    <div class="mask rgba-black-light"></div>
                </div>
            </div>
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <img class="d-block w-100" src="{{asset('images/slide2.jpg')}}"
                         alt="Second slide">
                    <div class="mask rgba-black-strong"></div>
                </div>
            </div>
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <img class="d-block w-100" src="{{asset('images/slide1.jpg')}}"
                         alt="Third slide">
                    <div class="mask rgba-black-slight"></div>
                </div>
            </div>
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!-- ==========Banner-Section========== -->
    <section class="under-slide">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="under_slide_text m-3 p-5 @if(App::getLocale()=='ar') text-right @else text-left @endif"
                       @if(App::getLocale()=='ar') dir="rtl" @else dir="ltr" @endif>
                        @if(App::getLocale()=='ar')
                            صحتك وسلامتك تأتي في صدارة أولوياتنا ويمكننا أن نؤكد لك أننا اتخذنا جميع
                            الاحتياطات اللازمة لضمان حصولك على تجربة مريحة وآمنة

                        @else
                            Your health and safety is our top priority and we can assure you that we have
                            taken all necessary precautions to ensure you have a comfortable and safe
                            experience
                        @endif

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Main-Section========== -->
    <section class="movie-section padding-top bg-two">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-lg-12">
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h3 class="title">{{trans('msgs.Movies')}} ( {{trans('msgs.Now Showing')}} )</h3>
                            <a class="view-all" href="{{route('now.showing')}}">{{trans('msgs.View All')}}</a>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            @foreach($some_shows as $show)
                                <div class="col-sm-12 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{route('show.details',$show->id)}}">
                                                <img src="{{asset($show->movie->movie_pic)}}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0 text-center">
                                                <a href="{{route('show.details',$show->id)}}">
                                                    @if(App::getLocale()=="ar")
                                                        {{$show->movie->name_ar}}
                                                    @else
                                                        {{$show->movie->name}}
                                                    @endif
                                                </a>
                                            </h5>
                                            <div class="details text-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Main-Section========== -->

    <!-- ==========Movie-Main-Section========== -->
    <section class="movie-section padding-top bg-two">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-lg-12">
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h3 class="title">{{trans('msgs.Movies')}} ( {{trans('msgs.Soon')}} )</h3>
                            <a class="view-all" href="{{route('showing.soon')}}">{{trans('msgs.View All')}}</a>
                        </div>
                        <div class="row mb-30-none justify-content-center">
                            @foreach($soon_shows as $show)
                                <div class="col-sm-12 col-lg-4">
                                    <div class="movie-grid">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{route('show.details',$show->id)}}">
                                                <img src="{{asset($show->movie->movie_pic)}}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title m-0 text-center">
                                                <a href="{{route('show.details',$show->id)}}">
                                                    @if(App::getLocale()=="ar")
                                                        {{$show->movie->name_ar}}
                                                    @else
                                                        {{$show->movie->name}}
                                                    @endif
                                                </a>
                                            </h5>
                                            <div class="details text-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Main-Section========== -->

    <!-- ==========Movie-Main-Section========== -->
    <section class="movie-section bg-two">
        <div class="container">
            <div class="row flex-wrap-reverse justify-content-center">
                <div class="col-lg-12">
                    <div class="row mt-3 mb-5 p-2 justify-content-center">
                        <div class="box col-lg-4 p-4 col-sm-12">
                            <div class="box-image">
                                <img src="{{asset('assets/images/intro/1.jpg')}}" alt="">
                            </div>
                            <h5 class="box-title text-center mt-2 mb-2">
                                {{trans('msgs.Awe-Inspiring Images')}}
                            </h5>
                            <h6 class="@if(App::getLocale() == "ar") text-right @else text-left @endif">
                                @if(App::getLocale()=="ar")
                                    نقاوة الصورة، والتفاصيل وكبر الشاشة
                                    ّ أكثر من مجرد يجعلن من تجربة
                                    مشاهدة فيلم. عملية تحضيرنا للفيلم
                                    ّ تحول كل لقطة بالكامل وتعزز من
                                    قربها للواقع أكثر من أي تجربة مريت
                                    بها في السينما .
                                @else
                                    Clarity, detail, and scale make IMAX
                                    more than just a movie. Our remastering
                                    process completely transforms every frame,
                                    drawing you into something as close to
                                    reality as you have ever experienced in a
                                    cinema.
                                    @endif
                            </h6>
                        </div>
                        <div class="box col-lg-4 p-4 col-sm-12">
                            <div class="box-image">
                                <img src="{{asset('assets/images/intro/2.jpg')}}" alt="">
                            </div>
                            <h5 class="box-title text-center mt-2 mb-2">
                                {{trans('msgs.Heart-Pounding Audio')}}
                            </h5>
                            <h6 class="@if(App::getLocale() == "ar") text-right @else text-left @endif">
                                @if(App::getLocale()=="ar")
                                    ضبط نظام الصوت بإتقان بالاضافة إلى
                                    ّسماعات ٍ موجهة بدقة متناهية تضمن
                                    لك سماع كل نبرة بكل صفاوة داخل
                                    ّ قاعة السينما المجهزة لتضمن لك
                                    التجربة الأمثل لك
                                @else
                                    The combination of perfectly tuned,
                                    integrated sound system and precise
                                    speaker orientation ensures
                                    you can hear every note as clearly
                                    as ever, all inside a cinema that has
                                    been customized for an optimal experience.
                                @endif
                            </h6>
                        </div>
                        <div class="box col-lg-4 p-4 col-sm-12">
                            <div class="box-image">
                                <img src="{{asset('assets/images/intro/3.jpg')}}" alt="">
                            </div>
                            <h5 class="box-title text-center mt-2 mb-2">
                                {{trans('msgs.Sublime Seating')}}
                            </h5>
                            <h6 class="@if(App::getLocale() == "ar") text-right @else text-left @endif">
                                @if(App::getLocale()=="ar")
                                    قم بحجز مقعدك الفخم القابل لالنحناء
                                    واسترخي في مساحتك الواسعة
                                @else
                                    Reserve your plush recliner in
                                    PRIME at AMC and relax completely
                                    into spacious seating
                                    @endif
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Main-Section========== -->

    <!-- ==========Speaker-Single========== -->
    <section class="about-section" @if(App::getLocale() == "ar") dir="rtl" @else dir="ltr" @endif>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12 mb-5">
                    <div class="event-about-content @if(App::getLocale() == "ar") text-right @else text-left @endif ">
                        <h2><i class="fa fa-square" style="font-size: 16px;"></i> {{trans('msgs.Latest Technology')}}
                        </h2>
                        <h5 class="p-3">
                            @if(App::getLocale() == "ar")
                                تجربة سينمائية تدخلك في عالم الخيال ! تم تصميم كل عنصر ليمنحك تجربة مذهلة خيالية
                                لتتمتع بسحر الفيلم في كل مرة
                            @else
                                A cinematic experience that puts you in the world of imagination! Each element
                                is designed to give you a fantastically amazing experience so you can enjoy the
                                magic of the movie every time
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Speaker-Single========== -->
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
