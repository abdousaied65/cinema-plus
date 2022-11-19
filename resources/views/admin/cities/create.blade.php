@extends('admin.layouts.app-main')
<style>

</style>
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>{{__('msgs.Errors')}} :</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">

                <div class="col-12">
                    <a class="btn btn-primary btn-md pull-right" href="{{ route('admin.cities.index') }}">{{__('msgs.Back')}}</a>
                    <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success"> {{__('msgs.Add New City')}}</h5>
                </div>
                <div class="clearfix"></div>
                <br>
                {!! Form::open(array('route' => 'admin.cities.store','method'=>'POST')) !!}
                <div class="main-content-label mg-b-5">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <p> {{__('msgs.City Name')}} : {{__('msgs.English')}}</p>
                                {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <p> {{__('msgs.City Name')}} : {{__('msgs.Arabic')}}</p>
                                {!! Form::text('name_ar', null, array('class' => 'form-control','required')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-info">{{__('msgs.Confirm')}}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
