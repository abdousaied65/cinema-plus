@extends('admin.layouts.app-main')
<style type="text/css">

</style>
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right"
                           href="{{ route('admin.movies.index') }}">{{trans('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-dark">
                            {{trans('msgs.Add New Show')}}
                        </h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('admin.shows.store','test')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <div class="row mb-4">
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Movies')}}</label>
                                <select data-live-search="true" required data-style="btn-info"
                                        title="{{trans('msgs.Choose Movie')}}"
                                        class="form-control selectpicker" name="movie_id">
                                    @foreach($movies as $movie)
                                        <option value="{{$movie->id}}">
                                            @if(App::getLocale() == 'ar')
                                                {{$movie->name_ar}}
                                            @else
                                                {{$movie->name}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Rooms')}}</label>
                                <select data-live-search="true" required data-style="btn-danger"
                                        title="{{trans('msgs.Choose Room')}}" data-actions-box="true"
                                        class="form-control selectpicker" multiple name="room_id[]">
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">
                                            @if(App::getLocale() == 'ar')
                                                {{$room->name_ar}} --
                                                {{$room->city->name_ar}}
                                            @else
                                                {{$room->name}} --
                                                {{$room->city->name}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.It will be available starting from')}}</label>
                                @php
                                    $date = new DateTime('now');
                                    $date->modify('+1 day');
                                    $tomorrow = $date->format('Y-m-d');
                                @endphp
                                <input type="date" value="{{$tomorrow}}" class="form-control" name="start_date"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.It will be ending at')}}</label>
                                @php
                                    $date = new DateTime('now');
                                    $date->modify('last day of next month');
                                    $last_day = $date->format('Y-m-d');
                                @endphp
                                <input type="date" value="{{$last_day}}" class="form-control" name="end_date"/>
                            </div>

                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Show Days in a week')}}</label>
                                <select name="days[]" class="form-control selectpicker" multiple data-live-search="true"
                                        required data-style="btn-success"
                                        title="{{trans('msgs.Choose Days')}}">
                                    <option value="Saturday">{{trans('msgs.Saturday')}}</option>
                                    <option value="Sunday">{{trans('msgs.Sunday')}}</option>
                                    <option value="Monday">{{trans('msgs.Monday')}}</option>
                                    <option value="Tuesday">{{trans('msgs.Tuesday')}}</option>
                                    <option value="Wednesday">{{trans('msgs.Wednesday')}}</option>
                                    <option value="Thursday">{{trans('msgs.Thursday')}}</option>
                                    <option value="Friday">{{trans('msgs.Friday')}}</option>
                                </select>
                            </div>
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Status')}}</label>
                                <select required class="form-control" name="status">
                                    <option value="">{{trans('msgs.Choose Status')}}</option>
                                    <option value="On">{{trans('msgs.On')}}</option>
                                    <option value="Soon">{{trans('msgs.Soon')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-outline-success btn-lg" type="submit">{{trans('msgs.Next')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
