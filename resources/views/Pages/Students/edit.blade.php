@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Student_Edit')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a> / {{trans('main_trans.Student_Edit')}}
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
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{route('Students.update','test')}}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <h6 class="font-weight-bold" style="font-family: 'Cairo', sans-serif;color: blue">{{trans('main_trans.personal_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$Students->id}}">

                                <label>{{trans('main_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                <input value="{{$Students->getTranslation('name','ar')}}" type="text" name="name_ar"  class="form-control">
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('main_trans.name_en')}} : <span class="text-danger">*</span></label>
                                <input value="{{$Students->getTranslation('name','en')}}" class="form-control" name="name_en" type="text" >
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('main_trans.email')}} : </label>
                                <input type="email" value="{{ $Students->email }}" name="email" class="form-control" >
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('main_trans.password')}} :</label>
                                <input value="{{$Students->password}}" type="password" name="password" class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">{{trans('main_trans.gender')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($Genders as $Gender)
                                        <option value="{{$Gender->id}}" {{$Gender->id == $Students->gender_id ? 'selected' : ""}}>{{ $Gender->Name }}</option>
                                    @endforeach
                                </select>
                                @error('gender_id')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">{{trans('main_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($nationals as $nal)
                                        <option value="{{ $nal->id }}" {{$nal->id == $Students->nationalitie_id ? 'selected' : ""}}>{{ $nal->Name }}</option>
                                    @endforeach
                                </select>
                                @error('nationalitie_id')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">{{trans('main_trans.blood_type')}} : </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($bloods as $bg)
                                        <option value="{{ $bg->id }}" {{$bg->id == $Students->blood_id ? 'selected' : ""}}>{{ $bg->Name }}</option>
                                    @endforeach
                                </select>
                                @error('blood_id')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>{{trans('main_trans.Date_of_Birth')}}  :</label>
                                <input class="form-control" type="text" value="{{$Students->Date_Birth}}" id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                @error('Date_Birth')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <h6 class="font-weight-bold" style="font-family: 'Cairo', sans-serif;color: blue">{{trans('main_trans.Student_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Grade_id">{{trans('main_trans.Grade')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}" {{$Grade->id == $Students->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
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

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="Classroom_id">{{trans('main_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option value="{{$Students->Classroom_id}}">{{$Students->classroom->Name_Class}}</option>
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

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="section_id">{{trans('main_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{$Students->section_id}}"> {{$Students->section->Name_Section}}</option>
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

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="parent_id">{{trans('main_trans.parent')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}" {{ $parent->id == $Students->parent_id ? 'selected' : ""}}>{{ $parent->Name_Father }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('main_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $Students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-outline-success btn-lg pull-right" type="submit">{{trans('main_trans.submit')}}</button>
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
    <script>

        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('main_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });

        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled >{{trans('main_trans.Choose')}}...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
