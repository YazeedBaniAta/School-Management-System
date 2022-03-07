@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(count($promotions) > 1)
                        <button type="button" class="btn btn-danger font-weight-bold" data-toggle="modal" data-target="#Delete_all">
                            {{trans('main_trans.BackALL')}}</button>
                        <br><br>
                    @endif

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="10" style="text-align: center">
                            <thead>
                            <tr>
                                <th class="alert-info">#</th>
                                <th class="alert-info">{{trans('main_trans.name')}}</th>
                                <th class="alert-danger">{{trans('main_trans.Old_Grade')}}</th>
                                <th class="alert-danger">{{trans('main_trans.academic_year')}}</th>
                                <th class="alert-danger">{{trans('main_trans.Old_Classrooms')}}</th>
                                <th class="alert-danger">{{trans('main_trans.Old_Section')}}</th>
                                <th class="alert-success">{{trans('main_trans.NewGrade')}}</th>
                                <th class="alert-success">{{trans('main_trans.New_academic_year')}}</th>
                                <th class="alert-success">{{trans('main_trans.NewClassrooms')}}</th>
                                <th class="alert-success">{{trans('main_trans.NewSection')}}</th>
                                <th class="alert-info">{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($promotions as $promotion)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$promotion->student->name}}</td>
                                    <td>{{$promotion->f_grade->Name}}</td>
                                    <td>{{$promotion->from_academic_year}}</td>
                                    <td>{{$promotion->f_classroom->Name_Class}}</td>
                                    <td>{{$promotion->f_section->Name_Section}}</td>
                                    <td>{{$promotion->t_grade->Name}}</td>
                                    <td>{{$promotion->to_academic_year}}</td>
                                    <td>{{$promotion->t_classroom->Name_Class}}</td>
                                    <td>{{$promotion->t_section->Name_Section}}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                data-target="#Delete_one{{$promotion->id}}">{{trans('main_trans.BackStudent')}}</button>
                                    </td>
                                </tr>

                                <!-- Deleted inFormation Student -->
                                <div class="modal fade" id="Delete_all" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">{{trans('main_trans.BackALL')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Promotion.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden" name="page_id" value="1">
                                                    <h4 class="text-warning font-weight-bold"
                                                        style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.BackAll_M')}}</h4>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button
                                                            class="btn btn-danger">{{trans('main_trans.submit')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End Deleted inFormation Student -->

                                <!-- Deleted inFormation Student -->
                                <div class="modal fade" id="Delete_one{{$promotion->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">{{trans('main_trans.BackStudent')}}</h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Promotion.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$promotion->id}}">
                                                    <h4 class="text-warning font-weight-bold"
                                                        style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.BackStudent_M')}}</h4>
                                                    <label
                                                        class="text-info font-weight-bold">{{trans('main_trans.name')}}
                                                        : {{$promotion->student->name}}</label>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                        <button
                                                            class="btn btn-danger">{{trans('main_trans.submit')}}</button>
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
