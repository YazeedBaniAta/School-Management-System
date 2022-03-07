@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Quizzes_List')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Quizzes_List')}}
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
                            <div class="card-body alert-secondary">
                                <center>
                                    <label class="text-primary font-xxl font-weight-bold">{{trans('main_trans.Quizzes_List')}}</label>
                                </center>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('Quizzes.create')}}" class="btn btn-outline-info btn-lg font-weight-bold" role="button"
                       aria-pressed="true">{{trans('main_trans.Add_Quiz')}}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead class="alert-danger">
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.Quiz_name')}}</th>
                                <th>{{trans('main_trans.Name_Teacher')}}</th>
                                <th>{{trans('main_trans.Study_Grade')}}</th>
                                <th>{{trans('main_trans.Study_Class')}}</th>
                                <th>{{trans('main_trans.section')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quizzes as $quiz)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$quiz->name}}</td>
                                    <td>{{$quiz->teacher->Name}}</td>
                                    <td>{{$quiz->grade->Name}}</td>
                                    <td>{{$quiz->classroom->Name_Class}}</td>
                                    <td>{{$quiz->section->Name_Section}}</td>
                                    <td>
                                        <a href="{{route('Quizzes.edit',$quiz->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('main_trans.Edit')}}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_quiz{{ $quiz->id }}" title="{{trans('main_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Delete_Quiz -->
                                <div class="modal fade" id="delete_quiz{{$quiz->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('Quizzes.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                        class="modal-title" id="exampleModalLabel">{{trans('main_trans.Delete_Quiz')}}</h5>
                                                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class="text-warning"> {{ trans('main_trans.Warning_Grade') }}</h3>
                                                    <h6 class="font-weight-bold">{{trans('main_trans.Quiz_name')}} : {{$quiz->name}}</h6>
                                                    <input type="hidden" name="id" value="{{$quiz->id}}">
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
                                <!-- /End Delete_Quiz -->
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
