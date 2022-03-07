@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
     {{trans('main_trans.Attendance')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.title_page')}} : <label class="text-primary">{{trans('main_trans.Attendance')}}</label>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: #f3f7f7;">

                    <!-- To display any error -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none;">{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="accordion gray plus-icon round mt-4">
                        @foreach ($Grades as $Grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading bg-secondary text-white font-weight-bold">{{ $Grade->Name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table text-center table-hover center-aligned-table mb-0 table-bordered font-weight-bold">
                                                            <thead>
                                                            <tr class="bg-dark text-white font-weight-bold">
                                                                <th>#</th>
                                                                <th>{{ trans('main_trans.Name_Section')}}</th>
                                                                <th>{{ trans('main_trans.Name_Class') }}</th>
                                                                <th>{{ trans('main_trans.Status') }}</th>
                                                                <th>{{ trans('main_trans.Processes') }}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($Grade->Sections as $list_Sections)
                                                                <tr>
                                                                    <td>{{ $loop->index+1 }}</td>
                                                                    <td>{{ $list_Sections->Name_Section }}</td>
                                                                    <td>{{ $list_Sections->classRoom_table->Name_Class }}</td>
                                                                    <td>
                                                                        @if ($list_Sections->Status === 1)
                                                                            <label class="badge badge-success">{{ trans('main_trans.Status_Section_AC') }}</label>
                                                                        @else
                                                                            <label class="badge badge-danger">{{ trans('main_trans.Status_Section_No') }}</label>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('Attendance.show',$list_Sections->id)}}" class="btn btn-outline-primary text-dark font-weight-bold " role="button" aria-pressed="true" title="{{trans('main_trans.Attendance_List')}}">{{trans('main_trans.Student_List')}}</a>
                                                                        <a href="{{route('Attendance.edit',$list_Sections->id)}}" class="btn btn-outline-warning text-dark font-weight-bold " role="button" aria-pressed="true" title="{{trans('main_trans.edit_Attendance')}}">{{trans('main_trans.Student_List')}}</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
