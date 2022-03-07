@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Questions_List')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('questions.index')}}" class="text-primary">{{trans('main_trans.Questions_List')}}</a> / {{trans('main_trans.Questions_List')}} :<span class="text-danger">{{$question->title}}</span>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: #5E454B;">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" style="background-color: #F3F0D7;">
                                <center>
                                    <label class="font-xxl text-dark">{{trans('main_trans.Edit_Questions')}}</label>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body" style="background-color: #CEE5D0;">
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
                                        <form action="{{ route('questions.update','test') }}" method="post" autocomplete="off">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-row">

                                                <div class="col">
                                                    <label class="font-weight-bold text-dark" for="title">{{trans('main_trans.Question_name_AR')}} : <span class="text-danger">*</span></label>
                                                    <input type="text" name="title_ar" id="input-name" class="form-control form-control-alternative" value="{{$question->getTranslation('title','ar')}}">
                                                    <input type="hidden" name="id" value="{{$question->id}}">
                                                </div>
                                                <div class="col">
                                                    <label class="font-weight-bold text-dark" for="title">{{trans('main_trans.Question_name_en')}} : <span class="text-danger">*</span></label>
                                                    <input type="text" name="title_en" id="input-name" class="form-control form-control-alternative" value="{{$question->getTranslation('title','en')}}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-row">
                                                <div class="col">
                                                    <label class="font-weight-bold text-dark" for="title">{{trans('main_trans.Answers')}} : <span class="text-danger">*</span></label>
                                                    <textarea name="answers" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$question->answers}}</textarea>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-row">
                                                <div class="col">
                                                    <label class="font-weight-bold text-dark" for="title">{{trans('main_trans.right_answer')}} : <span class="text-danger">*</span></label>
                                                    <input type="text" name="right_answer" id="input-name" class="form-control form-control-alternative" value="{{$question->right_answer}}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="quizzes_id">{{trans('main_trans.Quiz_name')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="quizzes_id">
                                                            <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                            @foreach($quizzes as $quizze)
                                                                <option value="{{ $quizze->id }}" {{$quizze->id == $question->quizze_id ? 'selected':'' }} >{{ $quizze->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold text-dark" for="Grade_id">{{trans('main_trans.Score')}} : <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="score">
                                                            <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                            <option value="5" {{$question->score == 5 ? 'selected':''}}>5</option>
                                                            <option value="10" {{$question->score == 10 ? 'selected':''}}>10</option>
                                                            <option value="15" {{$question->score == 15 ? 'selected':''}}>15</option>
                                                            <option value="20" {{$question->score == 20 ? 'selected':''}}>20</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary btn-block btn-lg" type="submit">{{trans('main_trans.submit')}}</button>
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
