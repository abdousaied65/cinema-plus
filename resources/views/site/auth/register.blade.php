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
                    <form class="account-form" action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name1">{{__('msgs.Name')}}<span>*</span></label>
                            <input type="text" name="name" placeholder="{{__('msgs.Enter Your Name')}}" id="name1"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="email1">{{__('msgs.Email')}}<span>*</span></label>
                            <input type="email" name="email" placeholder="{{__('msgs.Enter Your Email')}}" id="email1"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="pass1">{{__('msgs.Password')}}<span>*</span></label>
                            <input type="password" name="password" placeholder="{{__('msgs.Password')}}" id="pass1"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="pass2">{{__('msgs.Confirm Password')}}<span>*</span></label>
                            <input type="password" name="password_confirmation" placeholder="{{__('msgs.Password')}}"
                                   id="pass2" required>
                        </div>
                        <button type="submit" class="btn btn-md btn-success"
                                style="background: #1687a7;color: #fff;border-color: #1687a7;">{{__('msgs.Sign Up')}}</button>

                    </form>
                    <div class="option">
                        {{__('msgs.Already have an account?')}} <a href="{{route('login')}}">{{__('msgs.Login')}}</a>
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
