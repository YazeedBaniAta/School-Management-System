@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                    <div class="card-body" style="background-color: #082032;">
                        <div class="col-md-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body" style="background-color: #2C394B;">
                                    <center>
                                        <label class="text-white font-xxl">{{trans('main_trans.add_student')}}</label>
                                    </center>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body" style="background-color: #334756;">
                                    @if(session()->has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session()->get('error') }}</strong>
                                            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <form method="post"  action="{{ route('Students.store') }}" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <h5 class="font-weight-bold text-warning" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.personal_information')}}</h5><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold text-white">{{trans('main_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                                    <input  type="text" name="name_ar" value="{{old('name_ar')}}"  class="form-control" style="border-radius: 10px;">
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
                                                    <label class="font-weight-bold text-white">{{trans('main_trans.name_en')}} : <span class="text-danger">*</span></label>
                                                    <input  class="form-control" style="border-radius: 10px;" name="name_en" value="{{old('name_en')}}" type="text" >
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
                                                    <label class="font-weight-bold text-white">{{trans('main_trans.email')}} : </label>
                                                    <input type="email"  name="email" class="form-control" value="{{old('email')}}" style="border-radius: 10px;">
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
                                                <div class="form-group inputContainer">
                                                    <label class="font-weight-bold text-white">{{trans('main_trans.password')}} :</label>
                                                    <i class="fa fa-key icon clickIcon" style="cursor: pointer;" title="{{trans('main_trans.ShowPassword')}}"></i>
                                                    <input id="password" type="password" name="password" class="form-control" value="{{old('password')}}" style="border-radius: 10px;">
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
                                                    <label for="gender" class="font-weight-bold text-white">{{trans('main_trans.gender')}} : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="gender_id">
                                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                        @foreach($Genders as $Gender)
                                                            <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
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
                                                    <label for="nal_id" class="font-weight-bold text-white">{{trans('main_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="nationalitie_id">
                                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                        @foreach($nationals as $nal)
                                                            <option  value="{{ $nal->id }}">{{ $nal->Name }}</option>
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
                                                    <label for="bg_id" class="font-weight-bold text-white">{{trans('main_trans.blood_type')}} : </label>
                                                    <select class="custom-select mr-sm-2" name="blood_id">
                                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                        @foreach($bloods as $bg)
                                                            <option value="{{ $bg->id }}">{{ $bg->Name }}</option>
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
                                                    <label class="font-weight-bold text-white">{{trans('main_trans.Date_of_Birth')}}  :</label>
                                                    <input class="form-control" type="text"  id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
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

                                        <h5 class="font-weight-bold text-warning" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Student_information')}}</h5><br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="font-weight-bold text-white" for="Grade_id">{{trans('main_trans.Grade')}} : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                        @foreach($Grades as $G)
                                                            <option  value="{{ $G->id }}">{{ $G->Name }}</option>
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
                                                    <label class="font-weight-bold text-white" for="Classroom_id">{{trans('main_trans.classrooms')}} : <span class="text-danger">*</span></label>
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

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="font-weight-bold text-white" for="section_id">{{trans('main_trans.section')}} : </label>
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

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="font-weight-bold text-white" for="parent_id">{{trans('main_trans.parent')}} : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="parent_id">
                                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                        @foreach($parents as $parent)
                                                            <option value="{{ $parent->id }}">{{ $parent->Name_Father }}</option>
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
                                                    <label class="font-weight-bold text-white" for="academic_year">{{trans('main_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="academic_year">
                                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                        @php
                                                            $current_year = date("Y");
                                                        @endphp
                                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                            <option value="{{ $year}}">{{ $year }}</option>
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

                                        <h5 class="font-weight-bold text-warning" style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Attachments')}}</h5><br/>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="file" accept="image/*" name="photos[]" multiple>
                                            </div>
                                        </div>



                                        <button class="btn float-right btn-lg text-white" style="background-color: #FF4C29;" type="submit">{{trans('main_trans.submit')}}</button>
                                    </form>
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


    <script>
        //To show and hid password
        $(document).ready(function () {
            $('.clickIcon').on('click', function (){
                if($('#password').attr('type') === 'password'){
                    $('#password').attr('type','text')
                }else{
                    $('#password').attr('type','password')
                }
            });
        });

    </script>

{{--    //there is code in javascript footer belong to this page--}}

@endsection
