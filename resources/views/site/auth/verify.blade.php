@extends('site.layouts.app-login')

@section('content')
   <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="{{asset('assets/images/account/account-bg.jpg')}}">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <h2 class="title"><a href="{{route('index')}}">Cinema PLUS</a></h2>
                        <h6 class="text-center">{{__('msgs.Verify Your Email Address')}}</h6>
                    </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('msgs.A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('msgs.Before proceeding, please check your email for a verification link.') }} <br>
                    {{ __('msgs.If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('msgs.click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->

@endsection
