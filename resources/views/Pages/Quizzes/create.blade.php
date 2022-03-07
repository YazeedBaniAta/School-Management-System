@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Add_Quiz')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Quizzes.index')}}" class="text-primary">{{trans('main_trans.Quizzes_List')}}</a> / {{trans('main_trans.Add_Quiz')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: #9E7777;">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" style="background-color: #6F4C5B;">
                               <center>
                                   <label class="font-xxl text-white">{{trans('main_trans.Add_Quiz')}}</label>
                               </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" style="background-color: #DEBA9D;">
                                @if(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session()->get('error') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="col-xs-12">
                                    <div class="col-md-12">
                                        <br>
                                        <form action="{{route('Quizzes.store')}}" method="post" autocomplete="off">
                                            @csrf

                                            <div class="form-row">

                                                <div class="col">
                                                    <label class="text-dark font-weight-bold" for="title">{{trans('main_trans.Name_Quiz_in_ar')}} : <span class="text-danger">*</span></label>
                                                    <input type="text" name="Name_ar" class="form-control" value="{{old('Name_ar')}}">
                                                    @error('Name_ar')
                                                    <div class="alert alert-danger">{{ $message }}
                                                        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="col">
                                                    <label class="text-dark font-weight-bold" for="title">{{trans('main_trans.Name_Quiz_in_en')}} : <span class="text-danger">*</span></label>
                                                    <input type="text" name="Name_en" class="form-control" value="{{old('Name_en')}}">
                                                    @error('Name_en')
                                                    <div class="alert alert-danger">{{ $message }}
                                                        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-row">

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-dark font-weight-bold" for="Grade_id">{{trans('main_trans.S_name')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="subject_id" value="{{old('subject_id')}}">
                                                            <option selected disabled>..{{trans('main_trans.Choose')}}..</option>
                                                            @foreach($subjects as $subject)
                                                                <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subject_id')
                                                        <div class="alert alert-danger">{{ $message }}
                                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-dark font-weight-bold" for="Grade_id">{{trans('main_trans.Name_Teacher')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="teacher_id">
                                                            <option selected disabled>..{{trans('main_trans.Choose')}}..</option>
                                                            @foreach($teachers as $teacher)
                                                                <option  value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('teacher_id')
                                                        <div class="alert alert-danger">{{ $message }}
                                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-dark font-weight-bold" for="Grade_id">{{trans('main_trans.Grade')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                                            <option selected disabled>..{{trans('main_trans.Choose')}}..</option>
                                                            @foreach($grades as $grade)
                                                                <option  value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('Grade_id')
                                                        <div class="alert alert-danger">{{ $message }}
                                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-dark font-weight-bold" for="Classroom_id">{{trans('main_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="Classroom_id">

                                                        </select>
                                                        @error('Classroom_id')
                                                        <div class="alert alert-danger">{{ $message }}
                                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="text-dark font-weight-bold" for="section_id">{{trans('main_trans.section')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="section_id">

                                                        </select>
                                                        @error('section_id')
                                                        <div class="alert alert-danger">{{ $message }}
                                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn btn-primary font-weight-bold" type="submit">{{trans('main_trans.submit')}}</button>
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
