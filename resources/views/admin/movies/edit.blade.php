@extends('admin.layouts.app-main')
<style>
    textarea {
        resize: none !important;
    }
</style>
@section('content')
    <!-- main-content closed -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{trans('msgs.Errors')}} :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right"
                           href="{{ route('admin.movies.index') }}">{{trans('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success">
                            {{trans('msgs.Edit Movie')}}
                        </h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('admin.movies.update',$movie->id)}}" enctype="multipart/form-data"
                          method="post">
                        {{csrf_field()}}
                        @method('PATCH')
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> {{trans('msgs.Name')}} : {{trans('msgs.English')}} <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control mg-b-20" value="{{$movie->name}}"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> {{trans('msgs.Name')}} : {{trans('msgs.Arabic')}} <span class="text-danger">*</span></label>
                                    <input class="form-control mg-b-20" value="{{$movie->name_ar}}"
                                           data-parsley-class-handler="#lnWrapper" name="name_ar" required=""
                                           type="text">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{trans('msgs.Story')}} : {{trans('msgs.English')}} <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" required name="story" id=""
                                          rows="5">{{$movie->story}}</textarea>

                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{trans('msgs.Story')}} : {{trans('msgs.Arabic')}} <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" required name="story_ar" id=""
                                          rows="5">{{$movie->story_ar}}</textarea>

                            </div>
                        </div>
                        <br>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Genres')}}</label>
                                <select data-live-search="true" required data-style="btn-info"
                                        title="{{trans('msgs.Choose Genres')}}"
                                        class="form-control selectpicker" multiple name="genre_id[]">
                                    @foreach($all_genres as $genre)
                                        <option value="{{$genre->id}}"
                                        @if(in_array($genre->id,$genres))
                                            selected
                                        @endif
                                        >
                                        @if(App::getLocale() == 'ar')
                                            {{$genre->name_ar}}
                                        @else
                                            {{$genre->name}}
                                        @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Stars')}}</label>
                                <select data-live-search="true" required data-style="btn-info"
                                        title="{{trans('msgs.Choose Stars')}}"
                                        class="form-control selectpicker" multiple name="star_id[]">
                                    @foreach($all_stars as $star)
                                        <option value="{{$star->id}}"
                                                @if(in_array($star->id,$stars))
                                                selected
                                            @endif
                                        >
                                            @if(App::getLocale() == 'ar')
                                                {{$star->name_ar}}
                                            @else
                                                {{$star->name}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 mb-2">
                                <label for=""> {{__('msgs.Movie Picture')}} </label>
                                <input type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                       id="file"
                                       name="movie_pic" class="form-control"> <br>
                                <label for="" class="d-block"> {{__('msgs.Picture Preview')}} </label>
                                <img id="pic" src="{{asset($movie->movie_pic)}}" style="width: 100px; height:100px;"/>
                            </div>


                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-info pd-x-20" type="submit">{{trans('msgs.Confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
