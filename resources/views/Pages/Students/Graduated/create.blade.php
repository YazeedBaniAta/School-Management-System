@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_Graduate')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_Graduate')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: aliceblue;">

                    @if (Session::has('error_Graduated'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_Graduated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{route('Graduated.store')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark" for="inputState">{{trans('main_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label class="font-weight-bold text-dark" for="Classroom_id">{{trans('main_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                </select>
                            </div>

                            <div class="form-group col">
                                <label class="font-weight-bold text-dark" for="section_id">{{trans('main_trans.section')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mt-2">{{trans('main_trans.submit')}}</button>
                    </form>

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
