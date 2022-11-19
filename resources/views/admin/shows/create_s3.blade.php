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
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-dark">
                            {{trans('msgs.Determine the times of the days')}}
                        </h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('admin.shows.store_S3','test')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="show_id" value="{{$show_id->id}}">
                        <div class="row mb-4">
                            @foreach($show_id->days as $day)
                                <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label class="form-label">
                                        {{trans('msgs.'.$day.'')}}
                                    </label>
                                    <select data-live-search="true" required data-style="btn-danger"
                                            title="{{trans('msgs.Choose Times')}}" data-actions-box="true"
                                            class="form-control selectpicker" multiple name="time[][{{$day}}]">
                                        @foreach($times as $time)
                                            <option value="{{$time->time}}">
                                                {{$time->time}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
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
