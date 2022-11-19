@extends('site.layouts.app-main')
<style>

</style>
@section('content')

    <!-- ==========Banner-Section========== -->
    <section class="details-banner" style="color: #1687a7 !important; margin-bottom: 200px;">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="{{asset($show->movie->movie_pic)}}" alt="movie">
                </div>
                <div class="details-banner-content offset-lg-3">
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
                    @foreach($show->movie->stars as $star)
                        <a class="btn btn-sm btn-danger" style="border-radius: 10px;" href="javascript:void();">
                            @if(App::getLocale() == "ar")
                                {{$star->name_ar}}
                            @else
                                {{$star->name}}
                            @endif
                        </a>
                    @endforeach
                    <div class="social-and-duration mt-3">
                        <div class="duration-area">
                            <div class="item">
                                <i class="fas fa-calendar-alt"></i><span>{{trans('msgs.Showing :')}} {{trans('msgs.'.$show->status.'')}}</span>
                            </div>
                        </div>
                    </div>
                    @if($show->status == "On")
                        <div class="text-center" style="margin:20px auto !important;">
                            <a role="buuton" href="{{route('show.ticket.plan',$show->id)}}" class="btn text-white btn-danger w-25 btn-lg"><i
                                    class="fa fa-ticket"></i> {{trans('msgs.Book Now')}} </a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->
@endsection
