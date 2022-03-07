@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Add_subject')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   <a href="{{route('subjects.index')}}" class="text-primary">{{trans('main_trans.subject_list')}}</a> / {{trans('main_trans.Add_subject')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body alert-primary">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="text-danger close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('subjects.store')}}" method="post" autocomplete="off">
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.subject_name_Ar')}} : <span class="text-danger">*</span></label>
                                        <input type="text" name="Name_ar" value="{{old('Name_ar')}}" class="form-control">
                                        @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.subject_name_En')}} : <span class="text-danger">*</span></label>
                                        <input type="text" name="Name_en" value="{{old('Name_en')}}" class="form-control">
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
                                    <div class="form-group col">
                                        <label class="font-weight-bold" for="inputState">{{trans('main_trans.Study_Grade')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                            <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->Name}}</option>
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

                                    <div class="form-group col">
                                        <label class="font-weight-bold" for="inputState">{{trans('main_trans.Study_Class')}} : <span class="text-danger">*</span></label>
                                        <select name="Classroom_id" class="custom-select my-1 mr-sm-2"></select>
                                        @error('Classroom_id')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="form-group col">
                                        <label class="font-weight-bold" for="inputState">{{trans('main_trans.Name_Teacher')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
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
                                <button class="btn btn-info  font-weight-bold" type="submit">{{trans('main_trans.submit')}}</button>
                            </form>
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
