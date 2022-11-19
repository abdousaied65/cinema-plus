@extends('site.layouts.app-main')
<style>

</style>
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif

    <!-- course section -->
    <section class="course-section spad padding-top pb-0">
        <div class="section-header-3">
            <h2 class="title">{{trans('msgs.we have foods & drinks')}}</h2>
            <p>{{trans('msgs.Prebook Your Meal and Save More')}}</p>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a role="button" href="{{route('checkout')}}" class="btn btn-lg btn-danger" style="width: 200px;">
                    <i class="fa fa-arrow-right"></i>
                    {{trans('msgs.Continue Checkout')}}</a>
            </div>
        </div>
        <div class="course-warp">
            <ul class="course-filter controls">
                <li class="control active" data-filter="all">{{trans('msgs.All')}}</li>
                @foreach($foods_types as $food_type)
                    <li class="control" data-filter=".{{$food_type->name}}">
                        @if(App::getLocale()=='ar')
                            {{$food_type->name_ar}}
                        @else
                            {{$food_type->name}}
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="row course-items-area mb-5">
                @foreach($foods as $food)
                    <div class="mix col-lg-3 col-md-4 col-sm-6 {{$food->type->name}}">
                        <div class="course-item" style="border:1px solid #bbb;">
                            <div class="course-thumb set-bg" data-setbg="{{asset($food->image)}}">
                                <div class="price">{{trans('msgs.Price')}} : {{$food->price}}</div>
                            </div>
                            <div class="course-info">
                                <div class="course-text text-center">
                                    <h5>
                                        @if(App::getLocale()=='ar')
                                            {{$food->name_ar}}
                                        @else
                                            {{$food->name}}
                                        @endif
                                    </h5>
                                    <p class="mt-2 mb-2">
                                        @if(App::getLocale()=='ar')
                                            {{$food->description_ar}}
                                        @else
                                            {{$food->description}}
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="{{route('reserve.foods')}}" class="d-inline" method="get">
                                            <div class="col-6" style="float: left; display: inline">
                                                <div class="form-group ">
                                                    <input name="quantity" min="1" required type="number" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="col-6 " style="float: right; display: inline">
                                                <div class="form-group" style="">
                                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id"/>
                                                    <input type="hidden" value="{{$food->id}}" name="food_id"/>
                                                    <input type="hidden" value="{{$food->price}}" name="unit_price"/>
                                                    <button type="submit" @if(App::getLocale() == "ar") dir="rtl"
                                                            @else dir="ltr" @endif style="padding: 5px;height: 35px;"
                                                            class="btn btn-sm btn-danger"><i class="fa fa-plus"></i>
                                                        {{trans('msgs.Add')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>
    <!-- course section end -->

@endsection
