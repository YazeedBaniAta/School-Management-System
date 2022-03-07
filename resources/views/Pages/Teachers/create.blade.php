@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.Add_Teacher') }}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   <a href="{{route('Teachers.index')}}">{{ trans('main_trans.List_Teachers') }} </a> / {{ trans('main_trans.Add_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: #d4edda;">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('Teachers.store')}}" method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <h6 class="font-weight-bold text-primary" for="title">{{trans('main_trans.Email')}}</h6>
                                        <input type="email" name="email" class="form-control" style="border-radius: 10px;">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <h6 class="font-weight-bold text-primary" for="title">{{trans('main_trans.Password')}}</h6>
                                        <input type="password" name="password" class="form-control" style="border-radius: 10px;">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>


                                <div class="form-row">
                                    <div class="col">
                                        <h6 class="font-weight-bold text-primary" for="title">{{trans('main_trans.Name_Teachers_ar')}}</h6>
                                        <input type="text" name="Name_ar" class="form-control" style="border-radius: 10px;">
                                        @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <h6 class="font-weight-bold text-primary" for="title">{{trans('main_trans.Name_Teachers_en')}}</h6>
                                        <input type="text" name="Name_en" class="form-control" style="border-radius: 10px;">
                                        @error('Name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <h6 class="font-weight-bold text-primary" for="inputCity">{{trans('main_trans.specialization')}}</h6>
                                        <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                            <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                            @foreach($specializations as $specialization)
                                                <option value="{{$specialization->id}}">{{$specialization->Name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <h6 class="font-weight-bold text-primary" for="inputState">{{trans('main_trans.Gender')}}</h6>
                                        <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                            <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <h6 class="font-weight-bold text-primary" for="title">{{trans('main_trans.Joining_Date')}}</h6>
                                        <div class='input-group date'>
                                            <input class="form-control" type="text"  style="border-radius: 10px;" id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd" >
                                        </div>
                                        @error('Joining_Date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <h6 class="font-weight-bold text-primary" for="exampleFormControlTextarea1">{{trans('main_trans.Address_Teacher')}}</h6>
                                    <textarea class="form-control" name="Address" style="border-radius: 10px;"
                                              id="exampleFormControlTextarea1" rows="4"></textarea>
                                    @error('Address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-outline-success btn-lg pull-right">{{trans('main_trans.submit')}}</button>
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
