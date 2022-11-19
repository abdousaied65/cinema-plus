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

    {!! Form::model($star, ['method' => 'PATCH','route' => ['admin.stars.update', $star->id]]) !!}
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right"
                           href="{{ route('admin.stars.index') }}">{{trans('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;"
                            class="pull-left alert alert-sm alert-success">{{trans('msgs.Edit')}}
                            {
                            @if(App::getLocale() == 'ar')
                                {{ $star->name_ar }}
                            @else
                                {{ $star->name }}
                            @endif
                            } {{trans('msgs.star')}}</h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="main-content-label mg-b-5">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <p>{{trans('msgs.Star Name')}} {{trans('msgs.English')}} :</p>
                                <input type="text" value="{{$star->name}}" name="name"
                                       placeholder="{{trans('msgs.Name')}}" required
                                       class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <p>{{trans('msgs.Star Name')}} {{trans('msgs.Arabic')}} :</p>
                                <input type="text" value="{{$star->name_ar}}" name="name_ar"
                                       placeholder="{{trans('msgs.Name')}}" required
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
