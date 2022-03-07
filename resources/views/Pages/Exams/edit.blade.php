@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Edit_Exam')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Exams.index')}}" class="text-primary">{{trans('main_trans.Exam_List')}}</a> / {{trans('main_trans.Edit_Exam')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

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
                            <form action="{{route('Exams.update','test')}}" method="post">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.Name_Exam_in_ar')}} : <span class="text-danger">*</span></label>
                                        <input type="text" name="Name_ar" class="form-control" value="{{ $exam->getTranslation('name', 'ar') }}">
                                        @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.Name_Exam_in_en')}} : <span class="text-danger">*</span></label>
                                        <input type="text" name="Name_en" class="form-control" value="{{ $exam->getTranslation('name', 'en') }}">
                                        @error('Name_en')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.Term')}} : <span class="text-danger">*</span></label>
                                        <input type="number" name="term" class="form-control" value="{{$exam->term}}">
                                        @error('term')
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
                                        <label class="font-weight-bold" for="academic_year">{{trans('main_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                            @php
                                                $current_year = 2019;
                                            @endphp
                                            @for($year=$current_year; $year<=$current_year +3 ;$year++)
                                                <option value="{{$year}}" {{$year == $exam->academic_year ?'selected':''}}>{{ $year }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{$exam->id}}">
                                <button class="btn btn-success mb-4 font-weight-bold" type="submit">{{trans('main_trans.submit')}}</button>
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
