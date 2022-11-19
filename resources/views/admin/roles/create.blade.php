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
                    <a class="btn btn-primary btn-md pull-right" href="{{ route('admin.roles.index') }}">{{__('msgs.Back')}}</a>
                    <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success"> {{__('msgs.Add New Privilege')}}</h5>
                </div>
                <div class="clearfix"></div>
                <br>
                {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
                <div class="main-content-label mg-b-5">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <p> {{__('msgs.Privilege Name')}} : {{__('msgs.English')}}</p>
                                {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <p> {{__('msgs.Privilege Name')}} : {{__('msgs.Arabic')}}</p>
                                {!! Form::text('name_ar', null, array('class' => 'form-control','required')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-3 p-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="true">
                            @if(App::getLocale() == "ar")
                                المستخدمين
                            @else
                                Admins
                            @endif
                        </a>
                        <a class="nav-link" id="v-pills-privilege-tab" data-toggle="pill" href="#v-pills-privilege" role="tab" aria-controls="v-pills-privilege" aria-selected="false">
                            @if(App::getLocale() == "ar")
                                الصلاحيات
                            @else
                                Privileges
                            @endif
                        </a>
                        <a class="nav-link" id="v-pills-reservation-tab" data-toggle="pill" href="#v-pills-reservation" role="tab" aria-controls="v-pills-reservation" aria-selected="false">
                            @if(App::getLocale() == "ar")
                                الحجوزات
                            @else
                                Reservations
                            @endif
                        </a>
                    </div>
                    <div class="tab-content p-5" id="v-pills-tabContent" style="border-left: 1px solid #ddd;">
                        <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                            @foreach($permission as $value)
                                @if($value->key == "admin")
                                    <label style="font-size: 16px;">
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        @if(App::getLocale() == "ar")
                                            {{ $value->name_ar }}
                                        @else
                                            {{$value->name}}
                                        @endif
                                    </label>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-privilege" role="tabpanel" aria-labelledby="v-pills-privilege-tab">
                            @foreach($permission as $value)
                                @if($value->key == "privilege")
                                    <label style="font-size: 16px;">
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        @if(App::getLocale() == "ar")
                                            {{ $value->name_ar }}
                                        @else
                                            {{$value->name}}
                                        @endif
                                    </label>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="v-pills-reservation" role="tabpanel" aria-labelledby="v-pills-reservation-tab">
                            @foreach($permission as $value)
                                @if($value->key == "reservation")
                                    <label style="font-size: 16px;">
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        @if(App::getLocale() == "ar")
                                            {{ $value->name_ar }}
                                        @else
                                            {{$value->name}}
                                        @endif
                                    </label>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="button" id="check_all" class="btn btn-danger"> {{__('msgs.Select All')}}  </button>
                        <button type="submit" class="btn btn-info">{{__('msgs.Confirm')}}</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- main-content closed -->
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $('#check_all').click(function() {
        $('input[type=checkbox]').prop('checked', true);
    });
</script>
@endsection
