@extends('admin.layouts.app-main')
<style>
</style>
@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>{{trans('msgs.Errors')}} :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-md" href="{{ route('admin.admins.index') }}">{{trans('msgs.Back')}}</a>
                    </div>
                    <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success">
                        {{trans('msgs.Edit Existing Admin')}}
                    </h5>
                    <div class="clearfix"></div>
                </div>
                <br>
                {!! Form::model($admin, ['method' => 'PATCH','route' => ['admin.admins.update', $admin->id]]) !!}
                <div class="">

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6" id="fnWrapper">
                            <label> {{trans('msgs.Name')}} : <span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>  {{trans('msgs.Email')}} : <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                        </div>
                    </div>

                </div>
                <br>
                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{trans('msgs.Password')}} : <span class="tx-danger">*</span></label>
                        {!! Form::password('password', array('class' => 'form-control','required')) !!}
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>  {{trans('msgs.Confirm Password')}} : <span class="tx-danger">*</span></label>
                        {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                    </div>
                </div>
                <br>
                <div class="row mg-b-20">
                    <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label class="form-label"> {{trans('msgs.Status')}} </label>
                        <select name="Status" id="select-beast" class="form-control">
                            <option value="active"
                                @if ($admin->Status == 'active')
                                    selected
                                @endif
                            > {{trans('msgs.active')}}  </option>

                            <option value="blocked"
                                    @if ($admin->Status == 'blocked')
                                    selected
                                @endif
                            > {{trans('msgs.blocked')}} </option>

                        </select>
                    </div>

                    <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{trans('msgs.Privilege')}} </label>
                        {!! Form::select('role_name[]', $roles,$adminRole,
                                    array('required','class' => 'selectpicker form-control','multiple','data-live-search' => 'true','data-style'=>'btn-info'
                                    ,'title' => trans('msgs.Choose Privileges'),)
                                )
                                !!}
                    </div>

                    <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label> {{trans('msgs.Role')}} </label>
                        <select name="type" id="type" class="form-control">
                            <option @if($admin->type == 'admin')
                                    selected
                                    @endif
                                    value="admin">Admin</option>
                        </select>
                    </div>

                </div>
                <br>
                <div class="mg-t-30">
                    <button class="btn btn-info btn-md pd-x-20" type="submit"> {{trans('msgs.Update')}} </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- main-content closed -->
@endsection
