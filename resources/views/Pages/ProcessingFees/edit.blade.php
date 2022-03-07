@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Edit_Processing_Fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
   <a class="text-primary" href="{{route('ProcessingFees.index')}}">{{trans('main_trans.Processing_Fees')}}</a> / {{trans('main_trans.Edit_Processing_Fees')}}<label style="color: red">"{{$ProcessingFee->student->name}}"</label>
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

                    <form action="{{route('ProcessingFees.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">{{trans('main_trans.money')}} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="Debit" value="{{$ProcessingFee->amount}}"
                                           type="number" required>
                                    <input type="hidden" name="student_id" value="{{$ProcessingFee->student->id}}">
                                    <input type="hidden" name="id" value="{{$ProcessingFee->id}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">{{trans('main_trans.FeesDesc')}} : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                              rows="3">{{$ProcessingFee->description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-outline-success font-weight-bold" type="submit">{{trans('main_trans.submit')}}</button>
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
