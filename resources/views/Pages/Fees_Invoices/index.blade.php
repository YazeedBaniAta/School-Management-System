@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.FeesInvoices')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
  <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a> / {{trans('main_trans.FeesInvoices')}}
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
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead>
                            <tr class="alert-success font-weight-bold">
                                <th>#</th>
                                <th>{{trans('main_trans.name')}}</th>
                                <th>{{trans('main_trans.Fees_Type')}}</th>
                                <th>{{trans('main_trans.money')}}</th>
                                <th>{{trans('main_trans.Grade')}}</th>
                                <th>{{trans('main_trans.classrooms')}}</th>
                                <th>{{trans('main_trans.FeesDesc')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Fee_invoices as $Fee_invoice)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$Fee_invoice->student->name}}</td>
                                    <td>{{$Fee_invoice->fees->title}}</td>
                                    <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                    <td>{{$Fee_invoice->grade->Name}}</td>
                                    <td>{{$Fee_invoice->classroom->Name_Class}}</td>
                                    <td>{{$Fee_invoice->description}}</td>
                                    <td>
                                        <a href="{{route('Fees_Invoices.edit',$Fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('main_trans.Edit') }}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$Fee_invoice->id}}" title="{{trans('main_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Deleted Fees Student -->
                                <div class="modal fade" id="Delete_Fee_invoice{{$Fee_invoice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.Deleted_Fess')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Fees_Invoices.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$Fee_invoice->id}}">
                                                    <h5 class="font-weight-bold text-danger" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Warning_Section')}}</h5>
                                                    <label class="font-weight-bold text-info">{{trans('main_trans.name')}} : {{$Fee_invoice->student->name}}</label>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-danger">{{trans('main_trans.submit')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Deleted Fees Student -->

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
