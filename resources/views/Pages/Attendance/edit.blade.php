@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.edit_Attendance') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Attendance.index')}}" class="text-primary">{{trans('main_trans.Student_List') }}</a> / {{trans('main_trans.edit_Attendance') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-danger font-weight-bold ">{{ trans('main_trans.Today_Date') }} : {{ date('Y-m-d') }}</h5>
                        </div>
                        <div class="col-md-6">
{{--                            <!--- Direct to display filter form in En/Ar  -->--}}
{{--                            @if (App::getLocale() == 'en')--}}
{{--                                <form action="{{ route('Filter_date') }}" method="POST" style="float: right;">--}}
{{--                                    @else--}}
{{--                                        <form action="{{ route('Filter_date') }}" method="POST" style="float: left;">--}}
{{--                                            @endif--}}
{{--                                            {{ csrf_field() }}--}}
{{--                                            <select class="selectpicker btn btn-outline-primary font-weight-bold" name="date" required--}}
{{--                                                    onchange="this.form.submit()">--}}
{{--                                                <option value="" selected disabled class="font-weight-bold text-warning">{{ trans('main_trans.Search_By_date') }}</option>--}}
{{--                                                @foreach ($attendances as $attendance)--}}
{{--                                                    <option value="{{ $attendance->attendance_date }}">{{ $attendance->attendance_date }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <input type="hidden" name="section_id" value="{{ $students->first()->section_id }}">--}}
{{--                                        </form>--}}
{{--                                </form>--}}
                        </div>
                    </div>

                        <br><br>

                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-info">{{ trans('main_trans.name') }}</th>
                            <th class="alert-success">{{ trans('main_trans.email') }}</th>
                            <th class="alert-info">{{ trans('main_trans.gender') }}</th>
                            <th class="alert-success">{{ trans('main_trans.Grade') }}</th>
                            <th class="alert-info">{{ trans('main_trans.classrooms') }}</th>
                            <th class="alert-success">{{ trans('main_trans.section') }}</th>
                            <th class="alert-info">{{ trans('main_trans.Processes') }}</th>
                            <th class="alert-info">{{ trans('main_trans.Edit') }}</th>
                        </tr>
                        </thead>
                        <tbody class="font-weight-bold">
{{--                        @if (isset($details))--}}
{{--                            <?php $List_student = $details; ?>--}}
{{--                        @else--}}
{{--                            <?php $List_student = $students; ?>--}}
{{--                        @endif--}}
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->gender->Name }}</td>
                                <td>{{ $student->grade->Name }}</td>
                                <td>{{ $student->classroom->Name_Class }}</td>
                                <td>{{ $student->section->Name_Section }}</td>
                                <td>
                                    @if(isset($student->attendance()->where('attendance_date','=',date('Y-m-d'))->first()->student_id))
                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                            <input disabled {{ $student->attendance()->where('attendance_date',date('Y-m-d'))->first()->attendance_status === 1 ? 'checked' : '' }}
                                            class="leading-tight" type="radio" value="presence">
                                            <span class="text-success">{{ trans('main_trans.Present')}}</span>
                                        </label>

                                        <label class="ml-4 block text-gray-500 font-semibold">
                                            <input disabled {{ $student->attendance()->where('attendance_date',date('Y-m-d'))->first()->attendance_status === 0 ? 'checked' : '' }}
                                            class="leading-tight" type="radio" value="absent">
                                            <span class="text-danger">{{trans('main_trans.Absent')}}</span>
                                        </label>
                                    @endif
                                </td>
                                <td>
                                    @if(isset($student->attendance()->where('attendance_date','=',date('Y-m-d'))->first()->student_id))
                                        <button type="button" class="btn btn-outline-info btn-sm font-weight-bold" data-toggle="modal" data-target="#edit{{ $student->id }}">{{ trans('main_trans.Edit') }}</button>
                                    @else
                                        <button type="button" disabled class="btn btn-dark btn-sm font-weight-bold" title="{{trans('main_trans.EditM')}}">{{ trans('main_trans.Edit') }}</button>
                                    @endif
                                </td>
                            </tr>


                            @if(isset($student->attendance()->where('attendance_date','=',date('Y-m-d'))->first()->student_id))
                                <!-- edit_modal_Attendance -->
                                <div class="modal fade" id="edit{{ $student->attendance()->where('attendance_date','=',date('Y-m-d'))->first()->student_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    {{ trans('main_trans.edit_Attendance') }}
                                                </h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('Attendance.update','test')}}" method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4 class="text-primary font-weight-bold">{{trans('main_trans.name')}} : {{ $student->name }}</h4>
                                                        </div>

                                                        <div class="w-100"></div>
                                                        <div class="col mt-2 mb-2">
                                                            <div class="form-check">
                                                                <label class="form-check-label font-weight-bold" for="exampleCheck1">{{ trans('main_trans.Status') }}</label>
                                                                <br/>
                                                                @if ($student->attendance()->where('attendance_date',date('Y-m-d'))->first()->attendance_status === 1 )

                                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                        <input name="attendances" class="leading-tight" checked type="radio" value="presence">
                                                                        <span class="text-success">{{ trans('main_trans.Present')}}</span>
                                                                    </label>

                                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                                        <input name="attendances" class="leading-tight" type="radio" value="absent">
                                                                        <span class="text-danger">{{trans('main_trans.Absent')}}</span>
                                                                    </label>

                                                                @else
                                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                        <input name="attendances" class="leading-tight" type="radio" value="presence">
                                                                        <span class="text-success">{{ trans('main_trans.Present')}}</span>
                                                                    </label>

                                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                                        <input name="attendances" checked class="leading-tight" type="radio" value="absent">
                                                                        <span class="text-danger">{{trans('main_trans.Absent')}}</span>
                                                                    </label>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="id" value="{{ $student->attendance()->where('attendance_date',date('Y-m-d'))->first()->id}}">
                                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                    <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                                    <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                                    <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger font-weight-bold" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit" class="btn btn-success font-weight-bold">{{ trans('main_trans.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End edit_modal_Attendance -->
                            @endif

                        @endforeach
                        </tbody>
                        </table>

                    <br>
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
