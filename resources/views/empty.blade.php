@extends('layouts/master')

@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')

@section('PageTitle')
    {{trans('main_trans.stage')}}
@stop
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                $path = Storage::path('file.jpg')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

@section('js')
@endsection
