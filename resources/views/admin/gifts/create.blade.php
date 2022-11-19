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
                        <a class="btn btn-primary btn-md pull-right"
                           href="{{ route('admin.gifts.index') }}">{{__('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-success"> {{__('msgs.Add New Gift')}}</h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <form action="{{route('admin.gifts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="main-content-label mg-b-5">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Gift Name')}} : {{__('msgs.English')}}</p>
                                        {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Gift Name')}} : {{__('msgs.Arabic')}}</p>
                                        {!! Form::text('name_ar', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Gift Price')}}</p>
                                        {!! Form::text('gift_price', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Description')}} : {{__('msgs.English')}}</p>
                                        {!! Form::text('description', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Description')}} : {{__('msgs.Arabic')}}</p>
                                        {!! Form::text('description_ar', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Expiration Date')}}</p>
                                        {!! Form::date('expiration_date', null, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Gift Image')}}</p>
                                        <input type="file" required oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="file"
                                               name="image" class="form-control"> <br>
                                        <label for="" class="d-block"> {{__('msgs.Picture Preview')}} </label>
                                        <img id="pic"style="width: 100px; height:100px;"/>
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
