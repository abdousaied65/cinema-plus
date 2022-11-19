@extends('admin.layouts.app-main')
<!-- Internal Data table css -->
<style>
    i.la {
        font-size: 15px !important;
    }
</style>
@section('content')
    <div class="row text-center">
        <div class="col-lg-10 m-5 p-1">
            <p class="alert alert-info alert-sm text-center"> {{trans('msgs.Display movie Data')}} </p>
            <a class="btn btn-primary" href="{{ route('admin.movies.index') }}"> {{trans('msgs.Back')}} </a>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Name')}} : {{trans('msgs.English')}}</strong>
                {{ $movie->name }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Name')}} : {{trans('msgs.Arabic')}}</strong>
                {{ $movie->name_ar }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Story')}} : {{trans('msgs.English')}}</strong>
                {{ $movie->story }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Story')}} : {{trans('msgs.Arabic')}}</strong>
                {{ $movie->story_ar }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Genres')}} :</strong>
                @if(!empty($movie->genres))
                    @foreach($movie->genres as $genre)
                        @if(App::getLocale()=='ar')
                            <label class="badge badge-success">{{ $genre->name_ar }}</label>
                        @else
                            <label class="badge badge-success">{{ $genre->name }}</label>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Stars')}} :</strong>
                @if(!empty($movie->stars))
                    @foreach($movie->stars as $star)
                        @if(App::getLocale()=='ar')
                            <label class="badge badge-success">{{ $star->name_ar }}</label>
                        @else
                            <label class="badge badge-success">{{ $star->name }}</label>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong class="d-block"> {{trans('msgs.Movie Picture')}} :</strong>
                <img src="{{asset($movie->movie_pic)}}" style="width: 400px; " alt="">
            </div>
        </div>
    </div>
@endsection
