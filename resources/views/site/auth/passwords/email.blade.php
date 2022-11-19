@extends('site.layouts.app-login')

@section('content')
    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="{{asset('assets/images/account/account-bg.jpg')}}">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <h2 class="title"><a href="{{route('index')}}">Cinema PLUS</a></h2>
                        <h6 class="text-center">{{__('msgs.Reset Password')}}</h6>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4">{{ __('msgs.Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" placeholder="{{__('msgs.Enter Your Email')}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('msgs.Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->

@endsection
