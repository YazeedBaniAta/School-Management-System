@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.subject_list')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.subject_list')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('subjects.create')}}" class="btn btn-outline-info font-weight-bold" role="button" aria-pressed="true">{{trans('main_trans.Add_subject')}}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.Subject_name')}}</th>
                                <th>{{trans('main_trans.Study_Grade')}}</th>
                                <th>{{trans('main_trans.Study_Class')}}</th>
                                <th>{{trans('main_trans.Name_Teacher')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody class="font-weight-bold">
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->grade->Name}}</td>
                                    <td>{{$subject->classroom->Name_Class}}</td>
                                    <td>{{$subject->teacher->Name}}</td>
                                    <td>
                                        <a href="{{route('subjects.edit',$subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('main_trans.Edit')}}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="{{trans('main_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Delete_Subject -->
                                <div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('subjects.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.Delete_Subject')}}</h5>
                                                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="text-primary font-weight-bold "> {{ trans('main_trans.Warning_Grade') }}</h4>
                                                    <h6 class="font-weight-bold text-dark">{{trans('main_trans.Subject_name')}} : {{$subject->name}}</h6>
                                                    <input type="hidden" name="id" value="{{$subject->id}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /End Delete_Subject -->

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
