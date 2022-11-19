@extends('site.layouts.app-panel')
<style>
    i.flaticon-lock {
        color: #fff;
    }

    .checkout-widget {
        width: 100%;
    }

    .checkout-widget .payment-option li a {
        width: 100% !important;
        height: 100% !important;
    }

    .check {
        display: none;
        visibility: hidden;
    }
    ul li a {
        color: #fff;
    }
</style>
@section('panel')
    @if (session('success'))
        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif
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

    <!-- course section -->
    <section class="course-section pb-0">
        <div class="section-header-3">
            <h2 class="title">{{trans('msgs.Send Gifts With Us')}}</h2>
            <p>{{trans('msgs.you can send gifts to your relatives easily')}}</p>
        </div>
        <form action="{{route('gifts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">{{trans('msgs.Sender Name')}} : </label>
                        <input required readonly value="{{Auth::user()->name}}" type="text" class="form-control" name="sender_name"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">{{trans('msgs.Sender Email')}} : </label>
                        <input required type="email" readonly value="{{Auth::user()->email}}" class="form-control"
                               name="sender_email"/>
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <p class="text-center alert alert-sm alert-danger w-50 mt-2 mb-2 p-2">{{trans('msgs.Recipient Details')}}</p>
            </div>

            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name">{{trans('msgs.Recipient Name')}} : </label>
                        <input required type="text" class="form-control" name="recipient_name"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="email">{{trans('msgs.Recipient Email')}} : </label>
                        <input required type="email" class="form-control" name="recipient_email"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="email">{{trans('msgs.Recipient Mobile Number')}} : </label>
                        <input required type="text" class="form-control" name="recipient_number"/>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">{{trans('msgs.Message')}} : </label>
                        <textarea name="message" rows="7" class="form-control" style="resize: none;"></textarea>
                    </div>
                </div>
            </div>

            <div class="row col-12">
                <p class="text-center alert alert-sm alert-dark w-50 mt-2 mb-2 p-2">{{trans('msgs.Gifts')}}</p>
            </div>

            <div class="row col-12 mt-5">
                <div class="checkout-widget checkout-card">
                    <ul class="payment-option text-center">
                        @foreach($gifts as $gift)
                            <li class="col-lg-4">

                                <a class="card_choose" href="javascript:;">
                                    @if(App::getLocale() == "ar")
                                        <div class="mb-2">
                                            <h6 class="mb-3">{{$gift->name_ar}}</h6>
                                            <h6 class="mb-2">{{$gift->description_ar}}</h6>
                                        </div>
                                    @else
                                        <div class="mb-2">
                                            <h6 class="mb-3">{{$gift->name}}</h6>
                                            <h6 class="mb-2">{{$gift->description}}</h6>
                                        </div>
                                    @endif
                                    <input type="radio" name="card_id" value="{{$gift->id}}" class="check"/>
                                    <img src="{{asset($gift->image)}}" alt="payment"/>

                                </a>

                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-sm btn-success text-center"
                            style="padding: 5px; height: 40px; width: 25%; margin:35px auto;"><i
                            class="fa fa-check"></i>{{trans('msgs.Send Gift and Make Payment')}}</button>
                </div>
            </div>
        </form>
    </section>
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
