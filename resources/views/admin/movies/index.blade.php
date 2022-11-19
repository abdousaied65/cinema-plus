@extends('admin.layouts.app-main')
@section('content')
    @if (session('success'))

        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-lg-12 margin-tb">
                        <a class="btn pull-right btn-primary btn-md" href="{{ route('admin.movies.create') }}">
                            <i class="fa fa-plus"></i> {{trans('msgs.Add New Movie')}} </a>

                        <a class="btn pull-right btn-danger btn-md" style="margin-right: 20px"
                           href="{{ route('admin.movies.trashed') }}">
                            <i class="fa fa-eye"></i> {{trans('msgs.Show Trashed Movies')}} </a>
                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-success">{{trans('msgs.Display All Movies')}}</h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-striped table-bordered zero-configuration" id="example-table"
                               style="text-align: center;">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0 text-center">#</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Name')}} {{trans('msgs.English')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Name')}} {{trans('msgs.Arabic')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Story')}} {{trans('msgs.English')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Story')}} {{trans('msgs.Arabic')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Genres')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Stars')}}</th>
                                <th class="wd-15p border-bottom-0 text-center">{{trans('msgs.Movie Picture')}}</th>
                                <th class="wd-10p border-bottom-0 text-center">{{trans('msgs.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp

                            @foreach ($data as $key => $movie)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $movie->name }}</td>
                                    <td>{{ $movie->name_ar }}</td>
                                    <td>{{ $movie->story }}</td>
                                    <td>{{ $movie->story_ar }}</td>
                                    <td>
                                        @php
                                            $last = $movie->genres->keys()->last();
                                        @endphp
                                        @foreach($movie->genres as $key => $genre)
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
                                    </td>
                                    <td>
                                        @php
                                            $last = $movie->stars->keys()->last();
                                        @endphp
                                        @foreach($movie->stars as $key => $star)
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
                                    </td>
                                    <td><img data-toggle="modal" href="#modaldemo9" src="{{asset($movie->movie_pic)}}"
                                             style="width:50px; height: 50px;cursor:pointer;"
                                             alt=""></td>
                                    <td>
                                        <a href="{{ route('admin.movies.show', $movie->id) }}"
                                           class="btn btn-md btn-success"
                                           title="show"><i class="fa fa-eye"></i></a>

                                        <a href="{{ route('admin.movies.edit', $movie->id) }}"
                                           class="btn btn-md btn-info"
                                           title="edit"><i class="fa fa-edit"></i></a>
                                        <a class="modal-effect btn btn-md btn-danger delete_movie"
                                           movie_id="{{ $movie->id }}"
                                           movie_name="{{ $movie->name }}" data-toggle="modal" href="#modaldemo8"
                                           title="delete"><i
                                                class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Modal effects -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">{{trans('msgs.Show Movie Picture')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img id="image_larger" alt="image" style="width: 100%; "/>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-colse"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">{{trans('msgs.Delete Movie')}}</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.movies.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('msgs.Are You Sure You Want To Delete')}} ?</p><br>
                            <input type="hidden" name="movie_id" id="movie_id" value="">
                            <input class="form-control" name="movie_name" id="movie_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{trans('msgs.Cancel')}}</button>
                            <button type="submit" class="btn btn-danger">{{trans('msgs.Confirm')}}</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.delete_movie').on('click', function () {
            var movie_id = $(this).attr('movie_id');
            var name = $(this).attr('movie_name');
            $('.modal-body #movie_id').val(movie_id);
            $('.modal-body #movie_name').val(name);
        });
        $('img').on('click', function () {
            var image_larger = $('#image_larger');
            var path = $(this).attr('src');
            $(image_larger).prop('src', path);
        })
    });
</script>
