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
    @if (session('success'))
        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif
    <div class="row mailbox">
        <div class="col-lg-3 col-md-4">
            <a class="btn btn-info btn-block text-white" href="{{route('admin.contacts.compose')}}"><i
                    class="fa fa-edit"></i> {{trans('msgs.Compose')}} </a><br>
            <h6 class="m-t-10 m-b-10">{{trans('msgs.FOLDERS')}}</h6>
            <ul class="list-group list-group-divider inbox-list">
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.index')}}"><i class="fa fa-inbox"></i> {{trans('msgs.Inbox')}} <i
                            class="fa fa-circle text-warning"></i>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.sent')}}"><i class="fa fa-envelope-o"></i> {{trans('msgs.Sent')}} <i
                            class="fa fa-circle text-info"></i></a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.important')}}"><i
                            class="fa fa-star-o"></i> {{trans('msgs.Important')}} <i
                            class="fa fa-circle text-success"></i>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.trashed')}}"><i class="fa fa-trash-o"></i> {{trans('msgs.Trash')}}
                        <i
                            class="fa fa-circle text-danger"></i></a>
                </li>
            </ul>
        </div>

        <div class="col-lg-9 col-md-8">
            <div class="ibox" id="mailbox-container">
                <div class="mailbox-header d-flex justify-content-between">
                    <h5 class="inbox-title">{{trans('msgs.Compose')}}</h5>
                </div>
                <div class="mailbox-body">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('admin.contacts.send')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{trans('msgs.To')}} : </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="to" required placeholder="example@gmail.com">
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
