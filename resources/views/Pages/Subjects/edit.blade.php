@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Edit_subject')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('subjects.index')}}" class="text-primary">{{trans('main_trans.subject_list')}}</a> / {{trans('main_trans.Edit_subject')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body alert-secondary">

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
                            <form action="{{route('subjects.update','test')}}" method="post" autocomplete="off">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.subject_name_Ar')}}</label>
                                        <input type="text" name="Name_ar" value="{{ $subject->getTranslation('name', 'ar') }}" class="form-control">
                                        @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                        <input type="hidden" name="id" value="{{$subject->id}}">
                                    </div>
                                    <div class="col">
                                        <label class="font-weight-bold" for="title">{{trans('main_trans.subject_name_En')}}</label>
                                        <input type="text" name="Name_en" value="{{ $subject->getTranslation('name', 'en') }}" class="form-control">
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
                                        <label class="font-weight-bold" for="inputState">{{trans('main_trans.Study_Grade')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                            <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}" {{$grade->id == $subject->grade_id ?'selected':''}}>{{$grade->Name }}</option>
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
                                        <label class="font-weight-bold" for="inputState">{{trans('main_trans.Study_Class')}}</label>
                                        <select name="Classroom_id" class="custom-select my-1 mr-sm-2">
                                            <option value="{{ $subject->classroom->id }}">{{ $subject->classroom->Name_Class }}</option>
                                        </select>
                                        @error('Classroom_id')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label class="font-weight-bold" for="inputState">{{trans('main_trans.Name_Teacher')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->Name}}</option>
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
                                <button class="btn btn-success font-weight-bold" type="submit">{{trans('main_trans.submit')}}</button>
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
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
