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
    {{trans('main_trans.Questions_List')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body alert-secondary">
                                <center>
                                    <label class="text-primary font-xxl font-weight-bold">{{trans('main_trans.Questions_List')}}</label>
                                </center>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('questions.create')}}" class="btn btn-primary btn-block font-weight-bold" role="button" aria-pressed="true">{{trans('main_trans.Add_Questions')}}</a><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                            <thead class="bg-dark text-white font-weight-bold">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{trans('main_trans.Question')}}</th>
                                <th scope="col">{{trans('main_trans.Answers')}}</th>
                                <th scope="col">{{trans('main_trans.right_answer')}}</th>
                                <th scope="col">{{trans('main_trans.Score')}}</th>
                                <th scope="col">{{trans('main_trans.Quiz_name')}}</th>
                                <th scope="col">{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$question->title}}</td>
                                    <td>{{$question->answers}}</td>
                                    <td>{{$question->right_answer}}</td>
                                    <td>{{$question->score}}</td>
                                    <td>{{$question->quizze->name}}</td>
                                    <td>
                                        <a href="{{route('questions.edit',$question->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('main_trans.Edit')}}"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_question{{ $question->id }}" title="{{trans('main_trans.Delete')}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- Delete Questions -->
                                <div class="modal fade" id="delete_question{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('questions.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                        class="modal-title" id="exampleModalLabel">{{trans('main_trans.Delete_Questions')}}</h5>
                                                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 class="text-warning"> {{ trans('main_trans.Warning_Grade') }}</h3>
                                                    <h6 class="font-weight-bold">{{trans('main_trans.Quiz_name')}} : {{$question->quizze->name}}</h6>
                                                    <input type="hidden" name="id" value="{{$question->id}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /End Delete Questions -->

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
