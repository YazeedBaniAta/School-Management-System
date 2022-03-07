@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.List_Teachers')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.List_Teachers')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <a href="{{route('Teachers.create')}}" class="btn btn-outline-primary font-weight-bold" role="button"
                       aria-pressed="true">{{ trans('main_trans.Add_Teacher') }}</a><br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0"
                               data-page-length="10"
                               style="text-align: center">
                            <thead class="text-white font-weight-bold bg-dark">
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.Name_Teacher')}}</th>
                                <th>{{trans('main_trans.Gender')}}</th>
                                <th>{{trans('main_trans.Joining_Date')}}</th>
                                <th>{{trans('main_trans.specialization')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody class="text-dark font-weight-bold">
                            <?php $i = 0; ?>
                            @foreach($All_Teacher as $Teacher)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{$Teacher->Name}}</td>
                                    <td>{{$Teacher->genders->Name}}</td>
                                    <td>{{$Teacher->Joining_Date}}</td>
                                    <td>{{$Teacher->specializations->Name}}</td>
                                    <td>
                                        <a href="{{route('Teachers.edit',$Teacher->id)}}" class="btn btn-outline-info btn-sm" title="{{ trans('main_trans.Edit') }}" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="{{ trans('main_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete_Teacher{{$Teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('Teachers.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.Delete_Teacher') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="font-weight-bold text-warning font-xxl">{{ trans('main_trans.Warning_Grade') }}</label>                                                    <input type="hidden" name="id"  value="{{$Teacher->id}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('main_trans.Delete')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /End delete_modal_Grade -->

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
