@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.AddFees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Fees.index')}}">{{trans('main_trans.Fees')}}</a> / {{trans('main_trans.AddFees')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: darkturquoise;">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="post" action="{{ route('Fees.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold" style="color: black;" for="inputEmail4">{{trans('main_trans.name_ar')}}</label>
                                <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                                @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label class="font-weight-bold" style="color: black;" for="inputEmail4">{{trans('main_trans.name_en')}}</label>
                                <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>


                            <div class="form-group col">
                                <label class="font-weight-bold" style="color: black;" for="inputEmail4">{{trans('main_trans.money')}}</label>
                                <input type="text" value="{{ old('amount') }}" name="amount" class="form-control">
                                @error('amount')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                        </div>


                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold" style="color: black;" for="inputState">{{trans('main_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
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
                                <label class="font-weight-bold" style="color: black;" for="inputZip">{{trans('main_trans.classrooms')}}</label>
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
                            <div class="form-group col">
                                <label class="font-weight-bold" style="color: black;" for="inputZip">{{trans('main_trans.academic_year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label class="font-weight-bold" style="color: black;" for="inputZip">{{trans('main_trans.Fees_Type')}}</label>
                                <select class="custom-select mr-sm-2" name="Fees_type">
                                    <option selected disabled>...{{trans('main_trans.Choose')}}...</option>
                                    <option value="1">{{trans('main_trans.Fees_Type_1')}}</option>
                                    <option value="2">{{trans('main_trans.Fees_Type_2')}}</option>
                                </select>
                                @error('Fees_type')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" style="color: black;" for="inputAddress">{{trans('main_trans.Notes')}}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-dark font-weight-bold">{{trans('main_trans.submit')}}</button>
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
@endsection
