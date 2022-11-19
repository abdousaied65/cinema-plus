@extends('admin.layouts.app-login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="brand">
                <a class="link text-white" href="{{route('index')}}">
                    <img src="{{asset('images/logo.png')}}" style="width:80%" />
                </a>
            </div>
            <div class="card">
                <div class="card-header text-center">{{ __('msgs.Confirm Password') }}</div>

                <div class="card-body">
                    <p class="text-center">{{ __('msgs.Please confirm your password before continuing.') }}</p>

                    <form method="POST" action="{{ route('admin.password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('msgs.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('msgs.Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('msgs.Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
