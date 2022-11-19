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
        <div class="col-lg-12 col-md-12">
            <div class="ibox p-3" id="mailbox-container">
                    <div class="mailbox-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="d-none d-lg-block inbox-title ml-3"><i
                                    class="fa fa-envelope-o m-r-5"></i> {{trans('msgs.Subscribes List')}} ({{$data->total()}})
                            </h5>
                            <div class="mail-search w-50">
                                <form class="d-inline" action="{{ route('admin.subscribes.index') }}" method="get">
                                    <div class="input-group">
                                        <input dir="ltr" class="form-control text-left" type="text" value="{{ request()->query('search') }}"
                                               name="search" placeholder="{{trans('msgs.Search Email')}}"/>
                                        <div class="input-group-btn">
                                            <button type="submit" formaction="{{ route('admin.subscribes.index') }}" class="btn btn-info"
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
                                            <button formaction="{{route('admin.subscribes.make.as.destroy')}}" type="submit"
                                                class="btn btn-default btn-sm" data-toggle="tooltip"
                                                data-original-title="{{trans('msgs.Delete')}}"><i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-sm alert-danger m-3 text-center w-100">{{trans('msgs.No Subscribes')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mailbox clf">
                        <table class="table table-hover table-inbox" id="table-inbox">
                            <tbody class="rowlinkx" data-link="row">
                            @foreach($data as $email)
                                <tr>
                                    <td class="check-cell rowlink-skip" style="padding: 10px 25px;">
                                        <label class="ui-checkbox ui-checkbox-info check-single ">
                                            <input name="emails[]" value="{{$email->id}}"
                                                   class="mail-check" type="checkbox">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td> {{$email->subscribe_email}} </td>
                                    <td class="text-right"
                                        style="width: 20%;">{{$email->created_at->diffForHumans()}}</td>
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
