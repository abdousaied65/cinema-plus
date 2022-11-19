@extends('admin.layouts.app-main')
<style>

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
                        <a class="btn btn-primary btn-md pull-right" href="{{ route('admin.members.index') }}">{{trans('msgs.Back')}}</a>
                        <h5 style="min-width: 300px;" class="pull-left alert alert-sm alert-success">
                            {{trans('msgs.Add New Member')}}
                        </h5>
                    </div>
                </div>
                <div class="card-body p-1 m-1">
                    <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2"
                          action="{{route('admin.members.store','test')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="">
                            <div class="row mg-b-20">
                                <div class="parsley-input col-md-6" id="fnWrapper">
                                    <label> {{trans('msgs.Name')}} <span class="text-danger">*</span></label>
                                    <input class="form-control mg-b-20"
                                           data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                </div>

                                <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                    <label> {{trans('msgs.Email')}} : <span class="text-danger">*</span></label>
                                    <input class="form-control  mg-b-20" style="text-align: left;direction:ltr;"
                                           data-parsley-class-handler="#lnWrapper" name="email" required=""
                                           type="email">
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{trans('msgs.Password')}}: <span class="text-danger">*</span></label>
                                <input class="form-control  mg-b-20" style="text-align: left;direction:ltr;"
                                       data-parsley-class-handler="#lnWrapper"
                                       name="password" required="" type="password">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> {{trans('msgs.Confirm Password')}}: <span class="text-danger">*</span></label>
                                <input class="form-control  mg-b-20" style="text-align: left;direction:ltr;"
                                       data-parsley-class-handler="#lnWrapper"
                                       name="confirm-password" required="" type="password">
                            </div>
                        </div>
                        <br>

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label"> {{trans('msgs.Status')}} </label>
                                <select name="status" id="select-beast"
                                        class="form-control">
                                    <option value="active">{{trans('msgs.active')}}</option>
                                    <option value="blocked">{{trans('msgs.blocked')}}</option>
                                </select>
                            </div>
                            <div class="parsley-input col-md-3 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label class="form-label"> {{trans('msgs.Phone Number')}} </label>
                                <input type="text" name="phone" class="form-control" />
                            </div>
                            <div class="col-lg-6 mb-2">
                                <label for=""> {{__('msgs.Member Picture')}} </label>
                                <input type="file" required oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="file"
                                       name="avatar" class="form-control"> <br>
                                <label for="" class="d-block"> {{__('msgs.Picture Preview')}} </label>
                                <img id="pic"style="width: 100px; height:100px;"/>
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
