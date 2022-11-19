@extends('site.layouts.app-panel')
<style>
    i.fa-star {
        margin-right: 20px;
        margin-left: 20px;
    }

    .check {
        display: none;
        visibility: hidden;
    }

</style>
@section('panel')
    <!-- ==========Movie-Section========== -->
    <div class="seat-plan-section padding-bottom">
        <div class="container">

            <form action="{{route('choose.seats.s3','step-3')}}" method="get">
                <input type="hidden" name="ticket_price" value="{{$ticket_price}}" id="ticket_price">
                <input type="hidden" value="{{$show_id}}" name="show_id"/>
                <input type="hidden" value="{{$room_id}}" name="room_id"/>
                <input type="hidden" value="{{$hall_id}}" name="hall_id"/>
                <input type="hidden" value="{{$date}}" name="date"/>
                <input type="hidden" value="{{$day}}" name="day"/>
                <input type="hidden" value="{{$time}}" name="time"/>
                <div class="screen-area">
                    <h4 class="screen">screen</h4>
                    <div class="screen-thumb">
                        <img src="{{asset('assets/images/movie/screen-thumb.png')}}" alt="movie">
                    </div>
                    <h5 class="subtitle">Silver Plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area">
                            <li class="seat-line">
                                <span>G</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G1" class="check"/>
                                                <img class="@if(in_array('G1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G2" class="check"/>
                                                <img class="@if(in_array('G2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G3" class="check"/>
                                                <img class="@if(in_array('G3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G4" class="check"/>
                                                <img class="@if(in_array('G4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G5" class="check"/>
                                                <img class="@if(in_array('G5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G6" class="check"/>
                                                <img class="@if(in_array('G6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G7" class="check"/>
                                                <img class="@if(in_array('G7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G8" class="check"/>
                                                <img class="@if(in_array('G8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G9" class="check"/>
                                                <img class="@if(in_array('G9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G10" class="check"/>
                                                <img class="@if(in_array('G10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G11" class="check"/>
                                                <img class="@if(in_array('G11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G12" class="check"/>
                                                <img class="@if(in_array('G12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G13" class="check"/>
                                                <img class="@if(in_array('G13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="G14" class="check"/>
                                                <img class="@if(in_array('G14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('G14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>G</span>
                            </li>
                            <li class="seat-line">
                                <span>F</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F1" class="check"/>
                                                <img class="@if(in_array('F1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F2" class="check"/>
                                                <img class="@if(in_array('F2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F3" class="check"/>
                                                <img class="@if(in_array('F3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F4" class="check"/>
                                                <img class="@if(in_array('F4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F5" class="check"/>
                                                <img class="@if(in_array('F5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F6" class="check"/>
                                                <img class="@if(in_array('F6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F7" class="check"/>
                                                <img class="@if(in_array('F7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F8" class="check"/>
                                                <img class="@if(in_array('F8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F9" class="check"/>
                                                <img class="@if(in_array('F9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F10" class="check"/>
                                                <img class="@if(in_array('F10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F11" class="check"/>
                                                <img class="@if(in_array('F11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F12" class="check"/>
                                                <img class="@if(in_array('F12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F13" class="check"/>
                                                <img class="@if(in_array('F13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="F14" class="check"/>
                                                <img class="@if(in_array('F14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('F14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>F</span>
                            </li>
                        </ul>
                    </div>
                    <h5 class="subtitle">silver plus</h5>
                    <div class="screen-wrapper">
                        <ul class="seat-area">
                            <li class="seat-line">
                                <span>E</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E1" class="check"/>
                                                <img class="@if(in_array('E1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E2" class="check"/>
                                                <img class="@if(in_array('E2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E3" class="check"/>
                                                <img class="@if(in_array('E3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E4" class="check"/>
                                                <img class="@if(in_array('E4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E5" class="check"/>
                                                <img class="@if(in_array('E5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E6" class="check"/>
                                                <img class="@if(in_array('E6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E7" class="check"/>
                                                <img class="@if(in_array('E7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E8" class="check"/>
                                                <img class="@if(in_array('E8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E9" class="check"/>
                                                <img class="@if(in_array('E9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E10" class="check"/>
                                                <img class="@if(in_array('E10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E11" class="check"/>
                                                <img class="@if(in_array('E11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E12" class="check"/>
                                                <img class="@if(in_array('E12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E13" class="check"/>
                                                <img class="@if(in_array('E13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="E14" class="check"/>
                                                <img class="@if(in_array('E14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('E14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>E</span>
                            </li>
                            <li class="seat-line">
                                <span>D</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D1" class="check"/>
                                                <img class="@if(in_array('D1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D2" class="check"/>
                                                <img class="@if(in_array('D2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D3" class="check"/>
                                                <img class="@if(in_array('D3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D4" class="check"/>
                                                <img class="@if(in_array('D4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D5" class="check"/>
                                                <img class="@if(in_array('D5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D6" class="check"/>
                                                <img class="@if(in_array('D6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D7" class="check"/>
                                                <img class="@if(in_array('D7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D8" class="check"/>
                                                <img class="@if(in_array('D8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D9" class="check"/>
                                                <img class="@if(in_array('D9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D10" class="check"/>
                                                <img class="@if(in_array('D10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D11" class="check"/>
                                                <img class="@if(in_array('D11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D12" class="check"/>
                                                <img class="@if(in_array('D12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D13" class="check"/>
                                                <img class="@if(in_array('D13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="D14" class="check"/>
                                                <img class="@if(in_array('D14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('D14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>D</span>
                            </li>
                            <li class="seat-line">
                                <span>C</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C1" class="check"/>
                                                <img class="@if(in_array('C1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C2" class="check"/>
                                                <img class="@if(in_array('C2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C3" class="check"/>
                                                <img class="@if(in_array('C3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C4" class="check"/>
                                                <img class="@if(in_array('C4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C5" class="check"/>
                                                <img class="@if(in_array('C5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C6" class="check"/>
                                                <img class="@if(in_array('C6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C7" class="check"/>
                                                <img class="@if(in_array('C7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C8" class="check"/>
                                                <img class="@if(in_array('C8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C9" class="check"/>
                                                <img class="@if(in_array('C9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C10" class="check"/>
                                                <img class="@if(in_array('C10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C11" class="check"/>
                                                <img class="@if(in_array('C11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C12" class="check"/>
                                                <img class="@if(in_array('C12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C13" class="check"/>
                                                <img class="@if(in_array('C13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="C14" class="check"/>
                                                <img class="@if(in_array('C14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('C14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>C</span>
                            </li>
                            <li class="seat-line">
                                <span>B</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B1" class="check"/>
                                                <img class="@if(in_array('B1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B2" class="check"/>
                                                <img class="@if(in_array('B2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B3" class="check"/>
                                                <img class="@if(in_array('B3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B4" class="check"/>
                                                <img class="@if(in_array('B4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B5" class="check"/>
                                                <img class="@if(in_array('B5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B6" class="check"/>
                                                <img class="@if(in_array('B6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B7" class="check"/>
                                                <img class="@if(in_array('B7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B8" class="check"/>
                                                <img class="@if(in_array('B8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B9" class="check"/>
                                                <img class="@if(in_array('B9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B10" class="check"/>
                                                <img class="@if(in_array('B10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B11" class="check"/>
                                                <img class="@if(in_array('B11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B12" class="check"/>
                                                <img class="@if(in_array('B12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B13" class="check"/>
                                                <img class="@if(in_array('B13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="B14" class="check"/>
                                                <img class="@if(in_array('B14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('B14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>B</span>
                            </li>
                            <li class="seat-line">
                                <span>A</span>
                                <ul class="seat--area">
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A1" class="check"/>
                                                <img class="@if(in_array('A1',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A1',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A2" class="check"/>
                                                <img class="@if(in_array('A2',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A2',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A3" class="check"/>
                                                <img class="@if(in_array('A3',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A3',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A4" class="check"/>
                                                <img class="@if(in_array('A4',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A4',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A5" class="check"/>
                                                <img class="@if(in_array('A5',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A5',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A6" class="check"/>
                                                <img class="@if(in_array('A6',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A6',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A7" class="check"/>
                                                <img class="@if(in_array('A7',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A7',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A8" class="check"/>
                                                <img class="@if(in_array('A8',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A8',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A9" class="check"/>
                                                <img class="@if(in_array('A9',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A9',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A10" class="check"/>
                                                <img class="@if(in_array('A10',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A10',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="front-seat">
                                        <ul>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A11" class="check"/>
                                                <img class="@if(in_array('A11',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A11',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A12" class="check"/>
                                                <img class="@if(in_array('A12',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A12',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A13" class="check"/>
                                                <img class="@if(in_array('A13',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A13',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                            <li class="single-seat">
                                                <input type="checkbox" name="seats[]" value="A14" class="check"/>
                                                <img class="@if(in_array('A14',$oldseats)) booked @else seat @endif"
                                                     @if(in_array('A14',$oldseats))
                                                     src="{{asset('assets/images/movie/booked.png')}}"
                                                     @else
                                                     src="{{asset('assets/images/movie/seat01.png')}}"
                                                     @endif
                                                     alt="seat">
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <span>A</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="proceed-book">
                    <div class="proceed-to-book" @if(App::getLocale() == "ar") dir="rtl" @else dir="ltr" @endif >
                        <div class="book-item">
                            <span>{{trans('msgs.You have Choosed Seats')}} : </span>
                            <h4 class="title seats_names"></h4>
                        </div>
                        <div class="book-item">
                            <span>{{trans('msgs.Total Price')}}</span>
                            <h3 class="title total_price"></h3>
                        </div>
                        <div class="book-item">
                            <button type="submit" class="btn btn-block btn-danger"
                                    style="border-radius: 10px;padding: 5px;height: 40px;">
                                {{trans('msgs.Confirm')}} <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <input type="hidden" value="{{asset('assets/images/movie/seat01.png')}}" id="seat">
    <input type="hidden" value="{{asset('assets/images/movie/seat01-checked.png')}}" id="seat-checked">
    <!-- ==========Movie-Section========== -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.seat').on('click', function () {
                var check = $(this).parent().find('.check');
                var img = $('#seat').val();
                var ticket_price = $('#ticket_price').val();
                var img_checked = $('#seat-checked').val();
                if (check.is(":checked")) {
                    $(this).attr("src", img);
                    check.prop('checked', false);
                } else {
                    $(this).attr("src", img_checked);
                    check.prop('checked', true);
                }
                var seats = [];
                $.each($("input[name='seats[]']:checked"), function () {
                    seats.push($(this).val());
                });
                var seats_length = seats.length;
                var total_price = ticket_price * seats_length;
                $('.seats_names').html(seats.join(" , "));
                $('.total_price').html(total_price);
            });
        });
    </script>

@endsection

