@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('teacher_trans.No.of_student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('teacher_trans.No.of_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                       aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
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
                            <tbody>
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
                                        <div class="dropdown show">
                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                               role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                {{trans('main_trans.Processes')}}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item alert-warning font-weight-bold" href="{{route('Students.show',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;{{ trans('main_trans.Student_details')}}</a>
                                                <a class="dropdown-item alert-success font-weight-bold" href="{{route('Students.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{trans('main_trans.Edit') }}</a>
                                                <a class="dropdown-item alert-primary font-weight-bold" href="{{route('Fees_Invoices.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;{{trans('main_trans.Add_Fees_Invoices')}}&nbsp;</a>
                                                <a class="dropdown-item alert-info font-weight-bold" href="{{route('receipt_students.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{trans('main_trans.Add_receipt_students')}}</a>
                                                <a class="dropdown-item alert-warning font-weight-bold" href="{{route('ProcessingFees.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{trans('main_trans.P_F')}}</a>
                                                <a class="dropdown-item alert-info font-weight-bold" href="{{route('Payment_students.show',$student->id)}}"><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;{{trans('main_trans.AddPayment')}}</a>
                                                <a class="dropdown-item alert-dark font-weight-bold" data-target="#Graduate_Student{{ $student->id }}" data-toggle="modal" href="#Graduate_Student{{ $student->id }}"><i style="color: #1e70bf;" class="fas fa-user-graduate"></i>&nbsp;{{ trans('main_trans.GraduatesStudent') }}</a>
                                                <a class="dropdown-item alert-danger font-weight-bold" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="#Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;{{ trans('main_trans.Delete') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
                                                <form action="{{route('Students.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$student->id}}">

                                                    <h5 class="text-warning" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Deleted_Student_tilte')}}</h5>
                                                    <label class="text-info font-weight-bold">{{trans('main_trans.name')}} : {{$student->name}}</label>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-danger">{{trans('main_trans.Delete')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Deleted inFormation Student -->

                                <!-- Graduate Student -->
                                <div class="modal fade" id="Graduate_Student{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.GraduatesStudent')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Graduate_Student')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$student->id}}">

                                                    <h4 class="text-success font-weight-bold" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.GraduatesStudent_M')}}</h4>
                                                    <label class="text-info font-weight-bold">{{trans('main_trans.name')}} : {{$student->name}}</label>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-outline-info">{{trans('main_trans.GraduatesStudent')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Graduate Student -->


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
