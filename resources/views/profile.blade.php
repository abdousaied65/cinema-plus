@extends('site.layouts.app-panel')
<style>

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
            <h2 class="title">{{trans('msgs.Profile Details')}}</h2>
            <p>{{trans('msgs.you can change your basic info anytime')}}</p>
        </div>
        <form action="{{route('profile.edit',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">{{trans('msgs.Name')}} : </label>
                        <input required type="text" value="{{$user->name}}" class="form-control" name="name"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">{{trans('msgs.Email')}} : </label>
                        <input required type="email" value="{{$user->email}}" class="form-control" name="email"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password">{{trans('msgs.Password')}} : </label>
                        <input required type="password" class="form-control" name="password"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="confirm-password">{{trans('msgs.Confirm Password')}} : </label>
                        <input required type="password" class="form-control" name="confirm-password"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">{{trans('msgs.Phone Number')}} : </label>
                        <input value="{{$user->phone}}" required type="text" class="form-control" name="phone"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for=""> {{__('msgs.Profile Picture')}} </label>
                        <input type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="file"
                               name="avatar" class="form-control">

                        <label for="" class="d-block"> {{__('msgs.Picture Preview')}} </label>
                        <img id="pic" src="{{asset($user->avatar)}}"
                             style="width: 100px; height:100px;"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-sm btn-success text-center"
                            style="padding: 5px; height: 40px; width: 25%; margin:35px auto;"><i
                            class="fa fa-check"></i>{{trans('msgs.Confirm')}}</button>
                </div>
            </div>
        </form>
    </section>
    <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#reset-btn').on('click', function () {
                var $image = $('#pic');
                $image.removeAttr('src').replaceWith($image.clone());
            });
        });
    </script>
@endsection
