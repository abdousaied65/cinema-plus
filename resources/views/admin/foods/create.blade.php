@extends('admin.layouts.app-main')
<style>
    textarea {
        resize: none !important;
    }
</style>
@section('content')
    <!-- main-content closed -->
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

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-right"
                           href="{{ route('admin.foods.index') }}">{{trans('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success">
                            {{trans('msgs.Add New Food')}}
                        </h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('admin.foods.store','test')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> {{trans('msgs.Name')}} : {{trans('msgs.English')}} <span
                                            class="text-danger">*</span></label>
                                    <input dir="ltr" class="form-control mg-b-20 text-left"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> {{trans('msgs.Name')}} : {{trans('msgs.Arabic')}} <span class="text-danger">*</span></label>
                                    <input dir="rtl" class="form-control mg-b-20 text-right"
                                           data-parsley-class-handler="#lnWrapper" name="name_ar" required=""
                                           type="text">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{trans('msgs.Description')}} : {{trans('msgs.English')}} <span
                                        class="text-danger">*</span></label>
                                <textarea dir="ltr" class="form-control text-left" required name="description" id=""
                                          rows="5"></textarea>

                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{trans('msgs.Description')}} : {{trans('msgs.Arabic')}} <span
                                        class="text-danger">*</span></label>
                                <textarea dir="rtl" class="form-control text-right" required name="description_ar" id=""
                                          rows="5"></textarea>

                            </div>
                        </div>
                        <br>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label">{{trans('msgs.Category')}}</label>
                                <select data-live-search="true" required data-style="btn-info"
                                        title="{{trans('msgs.Choose Category')}}"
                                        class="form-control selectpicker" name="type_id">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">
                                            @if(App::getLocale() == 'ar')
                                                {{$type->name_ar}}
                                            @else
                                                {{$type->name}}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 mb-2">
                                <label for=""> {{__('msgs.Image')}} </label>
                                <input type="file" required oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                       id="file"
                                       name="image" class="form-control"> <br>
                                <label for="" class="d-block"> {{__('msgs.Picture Preview')}} </label>
                                <img id="pic" style="width: 100px; height:100px;"/>
                            </div>

                            <div class="col-lg-4 mb-2">
                                <label for=""> {{__('msgs.Price')}} </label>
                                <input type="text" required name="price" class="form-control"> <br>
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-info pd-x-20" type="submit">{{trans('msgs.Confirm')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
