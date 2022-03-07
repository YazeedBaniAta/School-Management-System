@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_Graduate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_Graduate')}} <i class="fas fa-user-graduate"></i>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10"style="text-align: center">
                            <thead>
                            <tr class="bg-dark text-white font-weight-bold">
                                <th>#</th>
                                <th>{{trans('main_trans.name')}}</th>
                                <th>{{trans('main_trans.email')}}</th>
                                <th>{{trans('main_trans.gender')}}</th>
                                <th>{{trans('main_trans.Grade')}}</th>
                                <th>{{trans('main_trans.classrooms')}}</th>
                                <th>{{trans('main_trans.section')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody class="text-dark">
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->gender->Name}}</td>
                                    <td>{{$student->grade->Name}}</td>
                                    <td>{{$student->classroom->Name_Class}}</td>
                                    <td>{{$student->section->Name_Section}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}">{{trans('main_trans.BackStudent')}}</button>
                                        <button type="button" class="btn btn-outline-danger btn-sm ml-1" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{trans('main_trans.Deleted_Student')}}"><i class="fa fa-trash"></i></button>

                                    </td>
                                </tr>

                                <!-- Return Student -->
                                <div class="modal fade" id="Return_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.BackStudent')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Graduated.update','test')}}" method="post" autocomplete="off">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$student->id}}">

                                                    <h4 class="text-center text-warning font-weight-bold" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Graduated_canceled')}}</h4>
                                                    <label class="font-weight-bold text-info">{{trans('main_trans.name')}} : {{$student->name}}</label>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-info">{{trans('main_trans.BackStudent')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Return Student -->

                                <!-- Deleted inFormation Student -->
                                <div class="modal fade" id="Delete_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.Deleted_Student')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Graduated.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden" name="id" value="{{$student->id}}">

                                                    <h4 class="text-danger text-center font-weight-bold" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Deleted_Student_tilte')}}</h4>
                                                    <label class="font-weight-bold text-info">{{trans('main_trans.name')}} : {{$student->name}}</label>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-danger">{{trans('main_trans.submit')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Deleted inFormation Student -->

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
