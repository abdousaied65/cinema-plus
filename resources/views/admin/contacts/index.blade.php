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

    .tooltip {
        font-family: 'Cairo' !important;
    }
</style>
@section('content')
    <div class="row mailbox">
        <div class="col-lg-3 col-md-4">
            <a class="btn btn-info btn-block text-white" href="{{route('admin.contacts.compose')}}"><i
                    class="fa fa-edit"></i> {{trans('msgs.Compose')}} </a><br>
            <h6 class="m-t-10 m-b-10">{{trans('msgs.FOLDERS')}}</h6>
            <ul class="list-group list-group-divider inbox-list">
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.index')}}"><i class="fa fa-inbox"></i> {{trans('msgs.Inbox')}} ({{$data->total()}}) <i
                            class="fa fa-circle text-warning"></i>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.sent')}}"><i class="fa fa-envelope-o"></i> {{trans('msgs.Sent')}} <i
                            class="fa fa-circle text-info"></i></a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.important')}}"><i class="fa fa-star-o"></i> {{trans('msgs.Important')}} <i
                            class="fa fa-circle text-success"></i>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('admin.contacts.trashed')}}"><i class="fa fa-trash-o"></i> {{trans('msgs.Trash')}} <i
                            class="fa fa-circle text-danger"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="ibox p-3" id="mailbox-container">
                    <div class="mailbox-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="d-none d-lg-block inbox-title ml-3"><i
                                    class="fa fa-envelope-o m-r-5"></i> {{trans('msgs.Inbox')}} ({{$data->total()}})
                            </h5>
                            <div class="mail-search w-50">
                                <form class="d-inline" action="{{ route('admin.contacts.index') }}" method="get">
                                    <div class="input-group">
                                        <input dir="ltr" class="form-control text-left" type="text" value="{{ request()->query('search') }}"
                                               name="search" placeholder="{{trans('msgs.Search Email')}}"/>
                                        <div class="input-group-btn">
                                            <button type="submit" formaction="{{ route('admin.contacts.index') }}" class="btn btn-info"
                                                    style="border-radius: 0;">{{trans('msgs.Search')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between inbox-toolbar p-t-20">
                            @if(($data)->count() >0)
                                <div class="d-flex" style="padding: 10px;">
                                    <label class="ui-checkbox ui-checkbox-info check-single p-t-5">
                                        <input type="checkbox" id="check_all" data-select="all">
                                        <span class="input-span"></span>
                                    </label>
                                    <div id="inbox-actions" class="m-l-20 m-r-20">
                                        <form class="d-inline" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button formaction="{{route('admin.contacts.make.as.read')}}" type="submit"
                                                class="btn btn-default btn-sm" data-toggle="tooltip"
                                                data-original-title="{{trans('msgs.Mark as read')}}"><i
                                                class="fa fa-eye"></i>
                                        </button>
                                        <button formaction="{{route('admin.contacts.make.as.important')}}" type="submit"
                                                class="btn btn-default btn-sm" data-toggle="tooltip"
                                                data-original-title="{{trans('msgs.Mark as important')}}"><i
                                                class="fa fa-star-o"></i></button>
                                        <button formaction="{{route('admin.contacts.make.as.destroy')}}" type="submit"
                                                class="btn btn-default btn-sm" data-toggle="tooltip"
                                                data-original-title="{{trans('msgs.Delete')}}"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-sm alert-danger m-3 text-center w-100">{{trans('msgs.No Messages')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mailbox clf">
                        <table class="table table-hover table-inbox" id="table-inbox">
                            <tbody class="rowlinkx" data-link="row">
                            @foreach($data as $msg)
                                <tr>
                                    <td class="check-cell rowlink-skip">
                                        <label class="ui-checkbox ui-checkbox-info check-single">
                                            <input name="messages[]" value="{{$msg->id}}"
                                                   class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="@if($msg->status == 1) text-muted @elseif($msg->status == 2) text-success  @endif"
                                           href="{{route('admin.contacts.show',$msg->id)}}">{{$msg->name}}
                                            <br> <small>{{$msg->email}}</small>
                                            <br> <small>{{$msg->phone}}</small>
                                        </a>
                                    </td>
                                    <td class="mail-message @if($msg->status == 1) text-muted @elseif($msg->status == 2) text-success  @endif">
                                        {{$msg->message}} ...
                                    </td>
                                    <td>@if($msg->status == 0) <i
                                            class="fa fa-circle text-warning"></i> @elseif($msg->status == 2) <i
                                            class="fa fa-circle text-success d-inline"></i><i
                                            class="fa fa-star-o d-inline text-success"></i> @endif</td>
                                    <td class="text-right @if($msg->status == 1) text-muted @elseif($msg->status == 2) text-success  @endif"
                                        style="width: 20%;">{{$msg->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <span @if(App::getLocale()=="ar") dir="rtl" class="text-right pull-right" @else dir="ltr"
                              class="text-left pull-left"  @endif> {{trans('msgs.Show Results')}} : {{ $data->total() }}</span>
                        <span @if(App::getLocale()=="ar") dir="rtl"
                              class="text-right pull-left" @else @endif>{{ $data->withQueryString()->links() }}</span>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- main-content closed -->
    <script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
    <script>
        $('#check_all').click(function () {
            $('input[type=checkbox]').prop('checked', true);
        });
    </script>
@endsection
