@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.EditFees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Fees.index')}}">{{trans('main_trans.Fees')}}</a> / {{trans('main_trans.EditFees')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <form action="{{route('Fees.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="font-weight-bold" for="inputEmail4">{{trans('main_trans.name_ar')}}</label>
                                <input type="text" value="{{$fee->getTranslation('title','ar')}}" name="title_ar" class="form-control">
                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">
                                @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label class="font-weight-bold" for="inputEmail4">{{trans('main_trans.name_en')}}</label>
                                <input type="text" value="{{$fee->getTranslation('title','en')}}" name="title_en" class="form-control">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}
                                    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>


                            <div class="form-group col">
                                <label class="font-weight-bold" for="inputEmail4">{{trans('main_trans.money')}}</label>
                                <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
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
                                <label for="inputState">{{trans('main_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    @foreach($Grades as $Grade)
                                        <option value="{{ $Grade->id }}" {{$Grade->id == $fee->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
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
                                <label for="inputZip">{{trans('main_trans.classrooms')}}</label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">
                                    <option value="{{$fee->Classroom_id}}">{{$fee->classroom->Name_Class}}</option>
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
                                <label for="inputZip">{{trans('main_trans.academic_year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    @php
                                        $current_year = date("Y")
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ' '}}>{{ $year }}</option>
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
                                <label  for="inputZip">{{trans('main_trans.Fees_Type')}}</label>
                                <select class="custom-select mr-sm-2" name="Fees_type">
                                    <option selected>
                                       @if($fee->Fees_type == 1)
                                        <option selected value="1">{{trans('main_trans.Fees_Type_1')}}</option>
                                        @else
                                        <option selected value="2">{{trans('main_trans.Fees_Type_2')}}</option>
                                        @endif
                                    </option>
                                    <option disabled>...{{trans('main_trans.Choose')}}...</option>
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
                            <label for="inputAddress">{{trans('main_trans.Notes')}}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$fee->description}}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">{{trans('main_trans.submit')}}</button>
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
