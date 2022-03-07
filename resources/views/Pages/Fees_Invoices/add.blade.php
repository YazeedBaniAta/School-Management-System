@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Add_Fees_Invoices')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a> / {{trans('main_trans.Add_Fees_Invoices')}} "{{$student->name}}"
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: black;">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class=" row mb-30" action="{{ route('Fees_Invoices.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Fees">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name" class="text-white font-weight-bold mr-sm-2">{{trans('main_trans.name')}} : <span class="text-danger">*</span></label>
{{--                                                <input readonly class="font-weight-bold form-control" name="student_id" value="{{$student->name}}">--}}
                                                <select class="fancyselect" name="student_id" required>
                                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="text-white font-weight-bold mr-sm-2">{{trans('main_trans.Fees_Type')}} : <span class="text-danger">*</span></label>
                                                <div class="box">
                                                    <select class="fancyselect" name="fee_id" required>
                                                        <option selected disabled>-- {{trans('main_trans.Choose')}} --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="text-white font-weight-bold mr-sm-2">{{trans('main_trans.money')}} : <span class="text-danger">*</span></label>
                                                <div class="box">
                                                    <select class="fancyselect" name="amount" required>
                                                        <option selected disabled>-- {{trans('main_trans.Choose')}} --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="description" class="text-white font-weight-bold mr-sm-2">{{trans('main_trans.FeesDesc')}} : <span class="text-danger">*</span></label>
                                                <div class="box">
                                                    <input type="text" class="form-control" name="description" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="Name_en" class="text-white font-weight-bold mr-sm-2">{{ trans('main_trans.Processes') }}</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('main_trans.Delete') }}"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ trans('main_trans.add_row') }}"/>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="Grade_id" value="{{$student->Grade_id}}">
                                <input type="hidden" name="Classroom_id" value="{{$student->Classroom_id}}">
                                <button type="submit" class="font-weight-bold btn btn-info btn-lg float-right">{{ trans('main_trans.submit') }}</button>
                            </div>
                        </div>
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
