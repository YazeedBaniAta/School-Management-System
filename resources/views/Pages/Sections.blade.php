@extends('layouts/master')

@section('css')
    @toastr_css

@section('title')
    {{trans('main_trans.List_sections')}}
@stop
@endsection
@section('page-header')

@section('PageTitle')
    {{trans('main_trans.title_page_Section')}}
@stop
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" style="background-color: darkturquoise;">
                    <a class="button x-small font-weight-bold" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('main_trans.add_section') }}</a>


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
                                <a href="#" class="acd-heading bg-info text-white font-weight-bold">{{ $Grade->Name }}</a>
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
                                                                <th>{{ trans('main_trans.Name_Section') }}
                                                                </th>
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
                                                                    <td>{{ $list_Sections->classRoom_table->Name_Class }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($list_Sections->Status === 1)
                                                                            <label
                                                                                class="badge badge-success">{{ trans('main_trans.Status_Section_AC') }}</label>
                                                                        @else
                                                                            <label
                                                                                class="badge badge-danger">{{ trans('main_trans.Status_Section_No') }}</label>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="#"
                                                                           class="btn btn-outline-info btn-sm"
                                                                           data-toggle="modal"
                                                                           data-target="#edit{{ $list_Sections->id }}">{{ trans('main_trans.Edit') }}</a>
                                                                        <a href="#"
                                                                           class="btn btn-outline-danger btn-sm"
                                                                           data-toggle="modal"
                                                                           data-target="#delete{{ $list_Sections->id }}">{{ trans('main_trans.Delete') }}</a>
                                                                    </td>
                                                                </tr>

                                                                <!--Edit Sections -->
                                                                <div class="modal fade" id="edit{{ $list_Sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg"
                                                                         role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    style="font-family: 'Cairo', sans-serif;"
                                                                                    id="exampleModalLabel">
                                                                                    {{ trans('main_trans.edit_Section') }}
                                                                                </h5>
                                                                                <button type="button"
                                                                                        class="close text-danger"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('Sections.update', 'test') }}" method="POST">
                                                                                    {{ method_field('patch') }}
                                                                                    {{ csrf_field() }}
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label
                                                                                                for="Name_Section_Ar"
                                                                                                class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Section_name_ar') }}
                                                                                                :</label>
                                                                                            <input type="text"
                                                                                                   name="Name_Section_Ar"
                                                                                                   class="form-control font-weight-bold text-info"
                                                                                                   value="{{ $list_Sections->getTranslation('Name_Section', 'ar') }}">
                                                                                        </div>
                                                                                        <div class="col mt-1">
                                                                                            <label for="Name"
                                                                                                   class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Section_name_en') }}
                                                                                                :</label>
                                                                                            <input type="text"
                                                                                                   name="Name_Section_En"
                                                                                                   class="form-control font-weight-bold text-info"
                                                                                                   value="{{ $list_Sections->getTranslation('Name_Section', 'en') }}">
                                                                                            <input id="id"
                                                                                                   type="hidden"
                                                                                                   name="id"
                                                                                                   class="form-control"
                                                                                                   value="{{ $list_Sections->id }}">
                                                                                        </div>
                                                                                        <br>
                                                                                        <div
                                                                                            class="w-100"></div>
                                                                                        <div class="col mt-1">
                                                                                            <label
                                                                                                for="inputName"
                                                                                                class="control-label font-weight-bold">{{ trans('main_trans.Name_Grade') }}</label>
                                                                                            <select
                                                                                                name="Grade_id"
                                                                                                class="custom-select font-weight-bold text-info"
                                                                                                onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    class="font-weight-bold text-info"
                                                                                                    value="{{ $Grade->id }}">  {{ $Grade->Name }} </option>
                                                                                                @foreach ($list_Grades as $list_Grade)
                                                                                                    <option
                                                                                                        value="{{ $list_Grade->id }}">  {{ $list_Grade->Name }} </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div
                                                                                            class="w-100"></div>
                                                                                        <div class="col mt-1">
                                                                                            <label
                                                                                                for="inputName"
                                                                                                class="control-label font-weight-bold">{{ trans('main_trans.Name_Class') }}</label>
                                                                                            <select
                                                                                                name="Class_id"
                                                                                                class="custom-select font-weight-bold text-info">
                                                                                                <option
                                                                                                    class="font-weight-bold text-info"
                                                                                                    value="{{ $list_Sections->classRoom_table->id }}">
                                                                                                    {{ $list_Sections->classRoom_table->Name_Class }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div
                                                                                            class="w-100"></div>
                                                                                        <div class="col mt-1">
                                                                                            <label
                                                                                                for="inputName" class="font-weight-bold control-label">{{ trans('main_trans.Name_Teacher') }}</label>
                                                                                            <select multiple
                                                                                                    name="teacher_id[]"
                                                                                                    class="form-control"
                                                                                                    id="exampleFormControlSelect2">
                                                                                                @foreach($list_Sections->Teachers as $teacher)
                                                                                                    <option
                                                                                                        selected
                                                                                                        class="text-primary font-weight-bold font-italic"
                                                                                                        value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                                @endforeach
                                                                                                <option value=""
                                                                                                        selected
                                                                                                        disabled>{{ trans('main_trans.Select_Teacher') }}</option>
                                                                                                @foreach($Teachers as $teacher)
                                                                                                    <option
                                                                                                        value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>

                                                                                        <br>
                                                                                        <div class="w-100"></div>
                                                                                        <div class="col mt-3 mb-3">
                                                                                            <div class="form-check">
                                                                                                <label class="form-check-label font-weight-bold" for="exampleCheck1">{{ trans('main_trans.Status') }}</label>
                                                                                                <br/>
                                                                                                @if ($list_Sections->Status === 1)
                                                                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                                                        <input name="Status" checked class="leading-tight" type="radio" value="presence">
                                                                                                        <span class="text-success font-weight-bold">{{ trans('main_trans.Status_Section_AC')}}</span>
                                                                                                    </label>

                                                                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                                                                        <input name="Status" class="leading-tight" type="radio" value="absent">
                                                                                                        <span class="text-danger font-weight-bold">{{trans('main_trans.Status_Section_No')}}</span>
                                                                                                    </label>
                                                                                                @else
                                                                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                                                        <input name="Status" class="leading-tight" type="radio" value="presence">
                                                                                                        <span class="text-success font-weight-bold">{{ trans('main_trans.Status_Section_AC')}}</span>
                                                                                                    </label>

                                                                                                    <label class="ml-4 block text-gray-500 font-semibold">
                                                                                                        <input name="Status" checked class="leading-tight" type="radio" value="absent">
                                                                                                        <span class="text-danger font-weight-bold">{{trans('main_trans.Status_Section_No')}}</span>
                                                                                                    </label>
                                                                                                @endif

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-danger"
                                                                                                data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                                                        <button type="submit"
                                                                                                class="btn btn-success">{{ trans('main_trans.submit') }}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /End Edit Sections -->


                                                                <!-- delete_modal_Sections -->
                                                                <div class="modal fade" id="delete{{ $list_Sections->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                    class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    {{ trans('main_trans.delete_Section') }}
                                                                                </h5>
                                                                                <button type="button"
                                                                                        class="close text-danger"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('Sections.destroy', 'test') }}"
                                                                                    method="post">
                                                                                    {{ method_field('Delete') }}
                                                                                    @csrf
                                                                                    <label
                                                                                        class="font-weight-bold text-warning font-xxl">{{ trans('main_trans.Warning_Grade') }}</label>
                                                                                    <br>
                                                                                    <label
                                                                                        class="text-info">{{ trans('main_trans.Name_Section') }}
                                                                                        : {{ $list_Sections->Name_Section  }}</label>
                                                                                    <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_Sections->id }}">
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                                                        <button type="submit"
                                                                                                class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /End delete_modal_Sections -->
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



                    <!--Add Sections -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                            id="exampleModalLabel">
                                            {{ trans('main_trans.add_section') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('Sections.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row mb-30">
                                                <div class="col">
                                                    <label for="Name_Section_Ar"
                                                           class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Section_name_ar') }}
                                                        :</label>
                                                    <input type="text" name="Name_Section_Ar"
                                                           class="form-control font-weight-bold">
                                                </div>

                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Section_name_en') }}
                                                        :</label>
                                                    <input type="text" name="Name_Section_En"
                                                           class="form-control font-weight-bold">
                                                </div>
                                                <br>
                                                <div class="w-100"></div>
                                                <div class="col">
                                                    <label for="inputName"
                                                           class="control-label font-weight-bold">{{ trans('main_trans.Name_Grade') }}</label>
                                                    <select name="Grade_id" class="custom-select">
                                                    {{--                                                    onchange="console.log($(this).val())">--}}
                                                    <!--placeholder-->
                                                        <option value="" selected
                                                                disabled>{{ trans('main_trans.Select_Grade') }}
                                                        </option>
                                                        @foreach ($list_Grades as $list_Grade)
                                                            <option
                                                                value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="w-100"></div>
                                                <div class="col">
                                                    <label for="inputName"
                                                           class="control-label font-weight-bold">{{ trans('main_trans.Name_Class') }}</label>
                                                    <select name="Class_id" class="custom-select">

                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="inputName"
                                                           class="control-label font-weight-bold">{{ trans('main_trans.Name_Teachers') }}</label>
                                                    <select multiple name="teacher_id[]" class="custom-select">
                                                        <!--placeholder-->
                                                        <option value="" selected
                                                                disabled>{{ trans('main_trans.Select_Teacher') }}</option>
                                                        @foreach ($Teachers as $Teacher)
                                                            <option value="{{ $Teacher->id }}"> {{ $Teacher->Name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger font-weight-bold"
                                                        data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                <button type="submit"
                                                        class="btn btn-success font-weight-bold">{{ trans('main_trans.submit') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /End Add Sections-->

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
                let Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            //console.log(data);
                            $.each(data, function (key_id, value) {
                                $('select[name="Class_id"]').append('<option value="' + key_id + '">' + value + '</option>');
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
