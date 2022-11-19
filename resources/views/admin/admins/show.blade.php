@extends('admin.layouts.app-main')
<!-- Internal Data table css -->
<style>
    i.la {
        font-size: 15px !important;
    }
</style>
@section('content')
    <div class="row text-center">
        <div class="col-lg-10 m-5 p-1">
            <p class="alert alert-info alert-sm text-center"> {{trans('msgs.Display admin Data')}} </p>
            <a class="btn btn-primary" href="{{ route('admin.admins.index') }}"> {{trans('msgs.Back')}} </a>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Name')}} :</strong>
                {{ $admin->name }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Email')}} :</strong>
                {{ $admin->email }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Status')}} :</strong>
                {{ trans('msgs.'.$admin->Status.'') }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Role')}} :</strong>
                {{ $admin->type }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> {{trans('msgs.Privilege')}} :</strong>
                @if(!empty($admin->getRoleNames()))
                    @foreach($admin->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
