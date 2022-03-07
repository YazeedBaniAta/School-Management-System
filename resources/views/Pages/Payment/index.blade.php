@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Payment')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a class="text-primary" href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a> / {{trans('main_trans.Payment')}}
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
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               style="text-align: center">
                            <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{trans('main_trans.name')}}</th>
                                <th>{{trans('main_trans.money')}}</th>
                                <th>{{trans('main_trans.FeesDesc')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payment_students as $payment_student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$payment_student->student->name}}</td>
                                    <td>{{ number_format($payment_student->amount, 2) }}</td>
                                    <td>{{$payment_student->description}}</td>
                                    <td>
                                        <a href="{{route('Payment_students.edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Deleted Payment Student -->
                                <div class="modal fade" id="Delete_receipt{{$payment_student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.DeleteP')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Payment_students.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$payment_student->id}}">
                                                    <h5 class="font-weight-bold text-danger" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Warning_Section')}}</h5>
                                                    <label class="font-weight-bold text-primary">{{trans('main_trans.name')}} : {{$payment_student->student->name}}</label>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-danger">{{trans('main_trans.Delete')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Deleted Payment Student -->

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
