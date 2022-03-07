@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Exam_List')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Exam_List')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('Exams.create')}}" class="btn btn-outline-info font-weight-bold" role="button"
                       aria-pressed="true">{{trans('main_trans.Add_Exam')}}</a><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead class="alert-primary">
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.Exam_name')}}</th>
                                <th>{{trans('main_trans.Term')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody class="font-weight-bold">
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$exam->name}}</td>
                                    <td>{{$exam->term}}</td>
                                    <td>
                                        <a href="{{route('Exams.edit',$exam->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('main_trans.Edit')}}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_exam{{ $exam->id }}" title="{{trans('main_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Delete_Exam-->
                                <div class="modal fade" id="delete_exam{{$exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('Exams.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.DeleteExam')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class="text-warning"> {{ trans('main_trans.Warning_Grade')}} </h3>
                                                    <h6 class="font-weight-bold">{{trans('main_trans.Exam_name')}} : {{$exam->name}}</h6>
                                                    <input type="hidden" name="id" value="{{$exam->id}}">
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
                                <!-- /End Delete_Exam-->

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
