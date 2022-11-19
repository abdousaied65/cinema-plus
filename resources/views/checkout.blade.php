@extends('site.layouts.app-panel')
<style>
    i.flaticon-lock {
        color: #fff;
    }

    .check {
        display: none;
        visibility: hidden;
    }
    input{
        border-color: #fff!important; color: #fff !important;

    }
    input::placeholder{
        color: #fff !important;
    }
    ul li a {
        color: #fff;
    }
</style>
@section('panel')
    @if (session('success'))
        <div class="alert alert-danger fade show text-center">
            {{ session('success') }}
        </div>
    @endif
    <!-- ==========Movie-Section========== -->
    <div class="movie-facility">
        <div class="container">
            <form class="payment-card-form" action="{{route('checkout.credit-card')}}" method="post"
                  id="payment-form">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-widget checkout-card mb-0">
                            <h5 class="title text-center m-2"> {{trans('msgs.Payment Options')}} </h5>
                            <ul class="payment-option text-center justify-content-center">
                                <li class="active">
                                    <a class="card_choose" href="javascript:;">
                                        <input type="radio" name="payment_option" checked value="Master Card" class="check"/>
                                        <img src="{{asset('assets/images/payment/card.png')}}" alt="payment">
                                        <span>Master Card</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="card_choose" href="javascript:;">
                                        <input type="radio" name="payment_option" value="Mada Pay" class="check"/>
                                        <img src="{{asset('assets/images/payment/mada.png')}}" alt="payment">
                                        <span>Mada Pay</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="card_choose" href="javascript:;">
                                        <input type="radio" name="payment_option" value="Visa Card" class="check"/>
                                        <img src="{{asset('assets/images/payment/card.png')}}" alt="payment">
                                        <span>Visa Card</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="card_choose" href="javascript:;">
                                        <input type="radio" name="payment_option" value="PayPal" class="check"/>
                                        <img src="{{asset('assets/images/payment/paypal.png')}}" alt="payment">
                                        <span>PayPal</span>
                                    </a>
                                </li>
                            </ul>
                            <h6 class="subtitle text-center w-100">{{trans('msgs.Enter Your Card Details')}}</h6>
                            <div class="row">
                                <div class="form-group col-lg-6 d-inline pull-left">
                                    <label for="card1">{{trans('msgs.Card Number')}}</label>
                                    <input type="text" name="card_number" required id="card1">
                                </div>
                                <div class="form-group col-lg-6 d-inline pull-right">
                                    <label for="card2"> {{trans('msgs.Name on the Card')}}</label>
                                    <input type="text" name="name_on_card" required id="card2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 d-inline pull-left">
                                    <label for="card3">{{trans('msgs.Expiration')}}</label>
                                    <input type="text" name="expiration" required id="card3" placeholder="MM/YY">
                                </div>
                                <div class="form-group col-lg-6 d-inline pull-right">
                                    <label for="card4">CVV</label>
                                    <input type="text" name="cvv" required id="card4" placeholder="CVV">
                                </div>
                            </div>


                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value=""/>
                            <div class="form-group mt-3 mb-3">
                                <button type="submit"
                                        class="btn btn-sm btn-danger"> {{trans('msgs.Make Payment')}} <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="booking-summery bg-one">
                            <h4 class="title"> {{trans('msgs.Booking Summary')}} </h4>
                            <ul class=""
                                @if(App::getLocale() =="ar")
                                dir="rtl"
                                @else
                                dir="ltr"
                                @endif
                                style="padding-top: 0px;">
                                @php
                                    $cart = array();
                                @endphp
                                @foreach($reservations as $reservation)
                                    <li>
                                        <a href="#">
                                            {{$reservation->seat->seat}} (1 * {{$reservation->seat->ticket_price}})
                                            @php array_push($cart,$reservation->seat->ticket_price) @endphp
                                        </a>
                                    </li>
                                @endforeach
                                @foreach($reseve_foods as $reseve_food)
                                    <li>
                                        <a href="#">
                                            @if(App::getLocale() == "ar")

                                                {{$reseve_food->food->name_ar}}
                                            @else
                                                {{$reseve_food->food->name}}
                                            @endif
                                            ({{$reseve_food->quantity}} * {{$reseve_food->unit_price}} )
                                            @php array_push($cart,$reseve_food->quantity_price) @endphp
                                        </a>
                                    </li>
                                @endforeach

                                @foreach($reseve_gifts as $reseve_gift)
                                    <li>
                                        <a href="{{route('checkout')}}">
                                            @if(App::getLocale() == "ar")

                                                {{trans('msgs.gift') .' '. $reseve_gift->gift->name_ar}}
                                            @else
                                                {{$reseve_gift->gift->name}}
                                            @endif
                                            (1 * {{$reseve_gift->gift->gift_price}} )
                                            @php array_push($cart,$reseve_gift->gift->gift_price) @endphp
                                        </a>
                                    </li>
                                @endforeach
                                <li class="dropdown-divider"></li>
                                <input type="hidden" value="{{array_sum($cart)}}" name="amount"/>
                                <li class="text-center"><a href="#">{{trans('msgs.Total Price')}}
                                        : {{array_sum($cart)}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ==========Movie-Section========== -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.card_choose').on('click', function () {
                var check = $(this).find('.check');
                if (check.is(":checked")) {
                    check.prop('checked', false);
                } else {
                    $(this).parent().parent().find('.active').removeClass('active');
                    $(this).parent().addClass('active');
                    check.prop('checked', true);
                }
            });
        });
    </script>
@endsection
