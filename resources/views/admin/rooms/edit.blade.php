@extends('admin.layouts.app-main')
<style>

</style>
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">

            <strong>{{trans('msgs.Errors')}} : </strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($room, ['method' => 'PATCH','route' => ['admin.rooms.update', $room->id]]) !!}
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right"
                           href="{{ route('admin.rooms.index') }}">{{trans('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-success">{{trans('msgs.Edit')}}
                            {
                            @if(App::getLocale() == 'ar')
                                {{ $room->name_ar }}
                            @else
                                {{ $room->name }}
                            @endif
                            } {{trans('msgs.room')}}</h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="main-content-label mg-b-5">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <p>{{trans('msgs.City Name')}} :</p>
                                <select name="city_id" class="form-control" required>
                                    <option value="">{{trans('msgs.Choose City')}}</option>
                                    @foreach($cities as $city)
                                        <option
                                            @if($city->id == $room->city_id)
                                                selected
                                            @endif
                                            value="{{$city->id}}">{{$city->name}} -- {{$city->name_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <p>{{trans('msgs.Room Name')}} {{trans('msgs.English')}} :</p>
                                <input type="text" value="{{$room->name}}" name="name"
                                       placeholder="{{trans('msgs.Name')}}"
                                       class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <p>{{trans('msgs.Room Name')}} {{trans('msgs.Arabic')}} :</p>
                                <input type="text" value="{{$room->name_ar}}" name="name_ar"
                                       placeholder="{{trans('msgs.Name')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <p>{{trans('msgs.Address')}} {{trans('msgs.English')}} :</p>
                                <input type="text" value="{{$room->address}}" name="address"
                                       placeholder="{{trans('msgs.Address')}}"
                                       class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <p>{{trans('msgs.Address')}} {{trans('msgs.Arabic')}} :</p>
                                <input type="text" value="{{$room->address_ar}}" name="address_ar"
                                       placeholder="{{trans('msgs.Address')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-md btn-success text-center">{{trans('msgs.Confirm')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
    {!! Form::close() !!}
@endsection
