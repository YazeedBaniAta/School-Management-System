@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.Student_details')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a> /  {{trans('main_trans.Student_details')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                   role="tab" aria-controls="home-02"
                                   aria-selected="true">{{trans('main_trans.Student_details')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                   role="tab" aria-controls="profile-02"
                                   aria-selected="false">{{trans('main_trans.Attachments')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                 aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{trans('main_trans.name')}}</th>
                                        <td class="text-primary font-weight-bold">" {{ $Student->name }} "</td>
                                        <th scope="row">{{trans('main_trans.email')}}</th>
                                        <td class="text-primary font-weight-bold">" {{$Student->email}} "</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('main_trans.gender')}}</th>
                                        <td class="text-primary font-weight-bold">" {{$Student->gender->Name}} "</td>
                                        <th scope="row">{{trans('main_trans.Nationality')}}</th>
                                        <td class="text-primary font-weight-bold">" {{$Student->Nationality->Name}} "</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('main_trans.Grade')}}</th>
                                        <td class="text-primary font-weight-bold">" {{ $Student->grade->Name }} "</td>
                                        <th scope="row">{{trans('main_trans.classrooms')}}</th>
                                        <td class="text-primary font-weight-bold">" {{$Student->classroom->Name_Class}} "</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('main_trans.section')}}</th>
                                        <td class="text-primary font-weight-bold">" {{$Student->section->Name_Section}} "</td>
                                        <th scope="row">{{trans('main_trans.Date_of_Birth')}}</th>
                                        <td class="text-primary font-weight-bold">" {{ $Student->Date_Birth}} "</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{trans('main_trans.parent')}}</th>
                                        <td class="text-primary font-weight-bold">" {{ $Student->myparent->Name_Father}} "</td>
                                        <th scope="row">{{trans('main_trans.academic_year')}}</th>
                                        <td class="text-primary font-weight-bold">" {{ $Student->academic_year }} "</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- This code to display images -->
                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="file">{{trans('main_trans.Attachments')}} : </label>
                                            <input type="file" accept="image/*" name="photos[]" multiple required>
                                            <input type="hidden" name="student_email" value="{{$Student->email}}">
                                            <input type="hidden" name="student_id" value="{{$Student->id}}">
                                            <button type="submit" class="btn btn-info btn-sm font-weight-bold float-right">{{trans('main_trans.AddImage')}}</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <table class="table mt-2 center-aligned-table mb-0 table table-hover"
                                       style="text-align:center">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">{{trans('main_trans.filename')}}</th>
                                        <th scope="col">{{trans('main_trans.created_at')}}</th>
                                        <th scope="col">{{trans('main_trans.Processes')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Student->images as $attachment)
                                        <tr style='text-align:center;vertical-align:middle'>
                                            <td>{{$loop->iteration}}</td>
                                            <td><img class="img-fluid" src="{{URL::asset('attachments/students/'.$Student->email.'/'.$attachment->filename)}}" style="width: 150px;height: 100px;"></td>
                                            <td>{{$attachment->created_at->diffForHumans()}}</td>
                                            <td colspan="2">
                                                <a class="btn btn-outline-info btn-sm" href="{{url('Download_attachment')}}/{{ $attachment->imageable->email }}/{{$attachment->filename}}"
                                                   role="button"><i class="fas fa-download"></i>&nbsp; {{trans('main_trans.Download')}}</a>

                                                <button type="button" class="btn btn-outline-danger btn-sm mr-2" data-toggle="modal" data-target="#Delete_img{{ $attachment->id }}"
                                                        title="{{ trans('main_trans.Delete') }}">{{trans('main_trans.Delete')}}</button>
                                            </td>
                                        </tr>

                                        <!-- Deleted Image Student -->
                                        <div class="modal fade" id="Delete_img{{$attachment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('main_trans.Delete_attachment')}}</h5>
                                                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('Delete_attachment')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$attachment->id}}">

                                                            <input type="hidden" name="student_email" value="{{$attachment->imageable->email}}">
                                                            <input type="hidden" name="student_id" value="{{$attachment->imageable->id}}">
                                                            <input type="hidden" name="filename" value="{{$attachment->filename}}">

                                                            <h5 style="font-family: 'Cairo', sans-serif;">{{trans('main_trans.Delete_attachment_tilte')}}</h5>
                                                            <img class="img-fluid mb-3" src="{{URL::asset('attachments/students/'.$Student->email.'/'.$attachment->filename)}}" style="width: 200px;height: 150px;">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main_trans.Close')}}</button>
                                                                <button type="submit"  class="btn btn-danger">{{trans('main_trans.Delete')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /End Deleted Image Student -->

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /End This code to display images -->

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
