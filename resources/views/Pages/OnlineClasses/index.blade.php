@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Online_classes')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Online_classes')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body bg-dark">
                                <center>
                                    <label class="text-white font-weight-bold">{{trans('main_trans.Online_classes')}}</label>
                                </center>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('online_classes.create')}}" class="btn btn-success btn-lg btn-block" role="button"
                       aria-pressed="true">{{trans('main_trans.AddNewOnlineClass')}}</a><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{trans('main_trans.stage_name')}}</th>
                                <th>{{trans('main_trans.Name_Class')}}</th>
                                <th>{{trans('main_trans.Name_Section')}}</th>
                                <th>{{trans('main_trans.Name_Teachers')}}</th>
                                <th>{{trans('main_trans.ClassTitle')}}</th>
                                <th>{{trans('main_trans.StartDate')}}</th>
                                <th>{{trans('main_trans.ClassTime')}}</th>
                                <th>{{trans('main_trans.ClassLink')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($online_classes as $online_classe)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$online_classe->grade->Name}}</td>
                                    <td>{{ $online_classe->classroom->Name_Class }}</td>
                                    <td>{{$online_classe->section->Name_Section}}</td>
                                    <td>{{$online_classe->user->name}}</td>
                                    <td>{{$online_classe->topic}}</td>
                                    <td>{{$online_classe->start_at}}</td>
                                    <td>{{$online_classe->duration}}</td>
                                    <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">{{trans('main_trans.JoinNow')}}</a></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Deleted Online Class -->
                                <div class="modal fade" id="Delete_receipt{{$online_classe->meeting_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.Delete')}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('online_classes.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$online_classe->meeting_id}}">
                                                    <h3 class="text-warning"> {{ trans('main_trans.Warning_Grade') }}</h3>
                                                    <h6 class="font-weight-bold">{{trans('main_trans.ClassTitle')}} : {{$online_classe->topic}}</h6>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/End Deleted Online Class -->

                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
