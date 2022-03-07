@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Edit_Quiz')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Quizzes.index')}}" class="text-primary">{{trans('main_trans.Quizzes_List')}}</a> / {{trans('main_trans.Edit_Quiz')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: #EEEEEE;">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" style="background-color: #BD4B4B;">
                                <center>
                                    <label class="text-white font-xxl">{{trans('main_trans.Edit_Quiz')}} : {{$quiz->name}}</label>
                                </center>
                            </div>
                        </div>
                    </div>


                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" style="background-color: #EFB7B7;">
                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <br>
                                        <form action="{{route('Quizzes.update','test')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">

                                                <div class="col">
                                                    <label class="font-weight-bold text-dark" for="title">{{trans('main_trans.Name_Quiz_in_ar')}}</label>
                                                    <input type="text" name="Name_ar" value="{{$quiz->getTranslation('name','ar')}}" class="form-control">
                                                    <input type="hidden" name="id" value="{{$quiz->id}}">
                                                </div>

                                                <div class="col">
                                                    <label class="font-weight-bold text-dark" for="title">{{trans('main_trans.Name_Quiz_in_en')}}</label>
                                                    <input type="text" name="Name_en" value="{{$quiz->getTranslation('name','en')}}" class="form-control">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="Grade_id">{{trans('main_trans.S_name')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="subject_id">
                                                            @foreach($subjects as $subject)
                                                                <option value="{{ $subject->id }}" {{$subject->id == $quiz->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="Grade_id">{{trans('main_trans.Name_Teacher')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="teacher_id">
                                                            @foreach($teachers as $teacher)
                                                                <option  value="{{ $teacher->id }}" {{$teacher->id == $quiz->teacher_id ? "selected":""}}>{{ $teacher->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="Grade_id">{{trans('main_trans.Grade')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                                            @foreach($grades as $grade)
                                                                <option  value="{{ $grade->id }}" {{$grade->id == $quiz->grade_id ? "selected":""}}>{{ $grade->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="Classroom_id">{{trans('main_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="Classroom_id">
                                                            <option value="{{$quiz->classroom_id}}">{{$quiz->classroom->Name_Class}}</option>                                            </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="section_id">{{trans('main_trans.section')}} : </label>
                                                        <select class="custom-select mr-sm-2" name="section_id">
                                                            <option value="{{$quiz->section_id}}">{{$quiz->section->Name_Section}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <button class="btn btn-success font-weight-bold" type="submit">{{trans('main_trans.submit')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
