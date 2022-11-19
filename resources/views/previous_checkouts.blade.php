@extends('site.layouts.app-panel')
<style>
    i.flaticon-lock {
        color: #fff;
    }
    .checkout-widget{
        background: darkgrey !important;
        font-size: 13px !important;
    }
    .table{
        font-size: 13px !important;
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
                    <div class="col-lg-12 col-sm-12">
                        <div class="checkout-widget checkout-card mb-0">
                            <h6 class="text-center m-1"> {{trans('msgs.Previous Tickets & Foods Reservations')}}  </h6>
                            <div class="table-responsive" dir="rtl">
                                <table class="table mg-b-0 text-md-nowrap table-hover " id="example-table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{trans('msgs.Movie Name')}}</th>
                                    <th class="text-center">{{trans('msgs.Room Name')}}</th>
                                    <th class="text-center">{{trans('msgs.Hall Name')}}</th>
                                    <th class="text-center">{{trans('msgs.Day')}}</th>
                                    <th class="text-center">{{trans('msgs.Date')}}</th>
                                    <th class="text-center">{{trans('msgs.Time')}}</th>
                                    <th class="text-center">{{trans('msgs.Seat')}}</th>
                                    <th class="text-center">{{trans('msgs.Ticket Price')}}</th>
                                    <th class="text-center">{{trans('msgs.Status')}}</th>
                                    <th class="text-center">{{trans('msgs.Created at')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($tickets as $ticket)
                                    <tr class="text-center">
                                        <td>{{ ++$i }}</td>

                                        @if(App::getLocale() == "ar")
                                            <td>{{ $ticket->seat->show->movie->name_ar }}</td>
                                            <td>{{ $ticket->seat->room->name_ar }}</td>
                                            <td>{{ $ticket->seat->hall->name_ar }}</td>
                                        @else
                                            <td>{{ $ticket->seat->show->movie->name }}</td>
                                            <td>{{ $ticket->seat->room->name }}</td>
                                            <td>{{ $ticket->seat->hall->name }}</td>
                                        @endif

                                        <td>{{trans('msgs.'.$ticket->seat->day.'')}}</td>
                                        <td>{{ $ticket->seat->date }}</td>
                                        <td>{{ $ticket->seat->time }}</td>
                                        <td>{{ $ticket->seat->seat }}</td>
                                        <td>{{ $ticket->seat->ticket_price }}</td>
                                        <td>
                                            @if($ticket->status == "0")
                                                <span class="badge badge-danger"> {{trans('msgs.Not Paid')}}</span>
                                            @else
                                                <span class="badge badge-success">{{trans('msgs.Paid')}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $ticket->seat->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                <table class="table mg-b-0 text-md-nowrap table-hover " id="example-table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">{{trans('msgs.Food Name')}}</th>
                                        <th class="text-center">{{trans('msgs.Quantity')}}</th>
                                        <th class="text-center">{{trans('msgs.Unit Price')}}</th>
                                        <th class="text-center">{{trans('msgs.Quantity Price')}}</th>
                                        <th class="text-center">{{trans('msgs.Status')}}</th>
                                        <th class="text-center">{{trans('msgs.Created at')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($foods as $food)
                                        <tr class="text-center">
                                            <td>{{ ++$i }}</td>
                                            @if(App::getLocale() == "ar")
                                                <td>{{ $food->food->name_ar }}</td>
                                            @else
                                                <td>{{ $food->food->name }}</td>
                                            @endif
                                            <td>{{ $food->quantity }}</td>
                                            <td>{{ $food->unit_price }}</td>
                                            <td>{{ $food->quantity_price }}</td>
                                            <td>
                                                @if($food->status == "0")
                                                    <span class="badge badge-danger">{{trans('msgs.Not Paid')}}</span>
                                                @else
                                                    <span class="badge badge-success">{{trans('msgs.Paid')}}</span>
                                                @endif
                                            </td>
                                            <td>{{ $food->created_at }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
