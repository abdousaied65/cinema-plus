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
                           href="{{ route('admin.halls.index') }}">{{__('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-success"> {{__('msgs.Edit Hall')}}</h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <form action="{{route('admin.halls.update',$hall->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="main-content-label mg-b-5">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Hall Name')}} : {{__('msgs.English')}}</p>
                                        {!! Form::text('name', $hall->name, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Hall Name')}} : {{__('msgs.Arabic')}}</p>
                                        {!! Form::text('name_ar', $hall->name_ar, array('class' => 'form-control','required')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <p> {{__('msgs.Ticket Price')}}</p>
                                        {!! Form::text('ticket_price', $hall->ticket_price, array('class' => 'form-control','required')) !!}
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
