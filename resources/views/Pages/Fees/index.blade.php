@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Fees')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <a href="{{route('Fees.create')}}" class="btn btn-primary font-weight-bold" role="button"
                       aria-pressed="true">{{trans('main_trans.AddFees')}}</a>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{trans('main_trans.FeesName')}}</th>
                                <th>{{trans('main_trans.money')}}</th>
                                <th>{{trans('main_trans.Grade')}}</th>
                                <th>{{trans('main_trans.classrooms')}}</th>
                                <th>{{trans('main_trans.academic_year')}}</th>
                                <th>{{trans('main_trans.Notes')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody class="font-weight-bold">
                            @foreach($fees as $fee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$fee->title}}</td>
                                    <td>{{ number_format($fee->amount, 2) }}</td>
                                    <td>{{$fee->grade->Name}}</td>
                                    <td>{{$fee->classroom->Name_Class}}</td>
                                    <td>{{$fee->year}}</td>
                                    <td>{{$fee->description}}</td>
                                    <td>
                                        <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{ trans('main_trans.Edit') }}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('main_trans.Delete') }}"><i class="fa fa-trash"></i></button>
{{--                                        <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye" title="{{ trans('main_trans.Show_Fees_Details') }}"></i></a>--}}

                                    </td>
                                </tr>

                                <!-- Deleted Fess Process -->
                                <div class="modal fade" id="Delete_Fee{{$fee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.Deleted_Fess')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Fees.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$fee->id}}">
                                                    <h5 class="text-danger font-weight-bold text-center" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Warning_Section')}}</h5>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button  class="btn btn-danger">{{trans('main_trans.Delete')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Deleted Fess Process -->

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
