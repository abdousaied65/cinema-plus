@extends('site.layouts.app-login')
<style>
    .form-group label {
        color: #1687a7 !important;
    }

    a {
        color: #1687a7 !important;
    }

    .account-area .social-icons li a {
        border-color: #1687a7;
    }

    .account-area .social-icons li a.active {
        border-color: #1687a7;
    }
</style>
@section('content')
    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="{{asset('assets/images/account/account-bg.jpg')}}">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <h2 class="title"><a href="{{route('index')}}">Cinema PLUS</a></h2>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger alert-sm fade show text-center" style="padding: 5px !important;
                        font-size: 14px; ">
                            <i class="fa fa-warning"></i> {{ session('error') }}
                        </div>
                    @endif
                    <form class="account-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email2">{{__('msgs.Email')}}<span>*</span></label>
                            <input name="email" type="email" placeholder="{{__('msgs.Enter Your Email')}}" id="email2"
                                   required
                                   value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label for="pass3">{{__('msgs.Password')}}<span>*</span></label>
                            <input type="password" placeholder="{{__('msgs.Password')}}" id="pass3" name="password"
                                   required>
                        </div>

                        <div class="form-group checkgroup">
                            <div class="col-lg-6">
                                <input style="display: inherit;" type="checkbox" name="remember" id="bal2" checked>
                                <label style="margin: 0 30px" for="bal2">{{__('msgs.remember password')}}</label>
                            </div>
                            <div class="col-lg-6">
                                @if (Route::has('password.request'))
                                    <a
                                        @if(App::getLocale() == "ar")
                                        style="float: left; text-align: left ; "
                                        @else
                                        style="float: right; text-align: right ; "
                                        @endif
                                        href="{{ route('password.request') }}"
                                        class="forget-pass">{{ __('msgs.Forgot Your Password?') }}</a>
                                @endif
                            </div>
                            {{--                            <label style="text-align: right!important;direction: rtl!important;" for="bal2">{{__('msgs.remember password')}}</label>--}}

                        </div>

                        <button type="submit" class="btn btn-md btn-success"
                                style="background: #1687a7;color: #fff;border-color: #1687a7;">{{__('msgs.log in')}}</button>

                    </form>
                    <div class="option">
                        {{__('msgs.Do not have an account?')}} <a
                            href="{{route('register')}}">{{__('msgs.sign up now')}}</a>
                    </div>
                    <div class="or"><span>{{__('msgs.Or')}}</span></div>
                    <ul class="social-icons">
                        <li>
                            <a href="{{route('login.facebook')}}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login.github')}}" class="active">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('login.google')}}">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->

@endsection
