@extends('admin.layouts.app-main')
<style>
    .mailbox i.fa {
        font-size: 15px !important;
        margin-left: 10px;
        margin-right: 10px;
    }
    .mailbox a {
        color: #333;
    }
    .note-editable{
        min-height: 200px!important;
    }
    .tooltip {
        font-family: 'Cairo' !important;
    }
</style>
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">

            <strong>{{__('msgs.Errors')}} :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif
    <div class="row mailbox">
        <div class="col-lg-12 col-md-12">
            <div class="ibox" id="mailbox-container">
                <div class="mailbox-header d-flex justify-content-between">
                    <h5 class="inbox-title">{{trans('msgs.Compose')}}</h5>
                </div>
                <div class="mailbox-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.subscribes.send')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{trans('msgs.To')}} : </label>
                            <div class="col-sm-10">
                                <select data-live-search="true" required data-style="btn-info"
                                        title="{{trans('msgs.Choose Emails')}}"
                                        class="form-control selectpicker w-25" multiple name="to[]">
                                    @foreach($emails as $email)
                                        <option selected value="{{$email->subscribe_email}}">{{$email->subscribe_email}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{trans('msgs.Subject')}} : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="subject" required>
                            </div>
                        </div>
                        <textarea class="form-control" id="summernote" required name="message">
                        </textarea>
                        <button class="btn btn-info m-t-20" type="submit">{{trans('msgs.Compose')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
