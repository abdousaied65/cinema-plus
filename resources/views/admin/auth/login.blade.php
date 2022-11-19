@extends('admin.layouts.app-login')
@section('content')

<div class="content">
    <div class="brand">
        <a class="link text-white" href="{{route('index')}}">
            <img src="{{asset('images/logo.png')}}" style="width:80%" />
        </a>
    </div>
    <form id="login-form" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <h1 class="login-title">{{__('msgs.Login To Dashboard')}}</h1>
        <div class="form-group">
            <label for="type" class="col-md-12 text-center"> {{__('msgs.Choose Your Role')}} </label>
            <select class="form-control @error('type') is-invalid @enderror" required name="type">
                <option selected="" value="">{{__('msgs.Choose Your Role')}}</option>
                <option value="admin">Admin</option>
            </select>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>


        <div class="form-group">
            <label for="email" class="col-md-12 text-center"> {{__('msgs.Email')}} </label>
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('msgs.Email')}}" name="email" required value="{{old('email')}}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-md-12 text-center"> {{__('msgs.Password')}} </label>
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input class="form-control @error('password') is-invalid @enderror" type="password" required name="password"
                       placeholder="{{__('msgs.Password')}}" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group d-flex justify-content-between">
            <label class="ui-checkbox ui-checkbox-info">
                <input type="checkbox" name="remember" checked>
                <span class="input-span"></span>
                {{__('msgs.remember password')}}
            </label>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                        {{ __('msgs.Forgot Your Password?') }}
                    </a>
                @endif
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block" type="submit">{{__('msgs.Login')}}</button>
        </div>
    </form>
</div>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
@endsection
