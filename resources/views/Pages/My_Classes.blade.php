@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.title_page_Class') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.title_page_Class') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{--############### to display any error ###################--}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
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

                <button type="button" class="button x-small font-weight-bold" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('main_trans.add_class') }}
                </button>


                <!--- Direct to display filter form in En/Ar  -->
                @if (App::getLocale() == 'en')
                    <form action="{{ route('Filter_Classes') }}" method="POST" style="float: right;">
                @else
                    <form action="{{ route('Filter_Classes') }}" method="POST" style="float: left;">
                @endif
                    {{ csrf_field() }}
                    <select class="selectpicker btn btn-outline-primary p-2 font-weight-bold"  name="Grade_id" required
                            onchange="this.form.submit()">
                        <option value="" selected disabled class="font-weight-bold text-warning">{{ trans('main_trans.Search_By_Grade') }}</option>
                        @foreach ($Grades as $Grade)
                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                        @endforeach
                    </select>
                </form>
                </form>

                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table font-weight-bold table-hover table-sm table-bordered p-0" data-page-length="10" style="text-align: center; border-color: #00B5AD;" >
                        <thead class="bg-dark text-white font-weight-bold">
                        <tr>
                            <th>{{ trans('main_trans.Check_All') }}
                                <input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" />
                            </th>
                            <th>#</th>
                            <th>{{ trans('main_trans.Name_class') }}</th>
                            <th>{{ trans('main_trans.Name_Grade') }}</th>
                            <th>{{ trans('main_trans.Processes') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($details))
                            <?php $List_Classes = $details; ?>
                        @else
                            <?php $List_Classes = $My_Classes; ?>
                        @endif
                            <?php $count = 0; ?>
                            @foreach ($List_Classes as $My_Class)
                                <tr>
                                    <?php $count++; ?>
                                    <td><input type="checkbox"  value="{{ $My_Class->id }}" class="box1" ></td>
                                    <td>{{ $count }}</td>
                                    <td>{{ $My_Class->Name_Class }}</td>
                                    <td>{{ $My_Class->Grades->Name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $My_Class->id }}"
                                                title="{{ trans('main_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $My_Class->id }}"
                                                title="{{ trans('main_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Class -->
                                <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('main_trans.edit_class') }}
                                                </h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Name_class') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control font-weight-bold" style="color: #6da3dd;"
                                                                   value="{{ $My_Class->getTranslation('Name_Class', 'ar') }}" required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $My_Class->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control ont-weight-bold" style="color: #6da3dd;"
                                                                   value="{{ $My_Class->getTranslation('Name_Class', 'en') }}"
                                                                   name="Name_class_en" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('main_trans.Name_Grade') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                                id="exampleFormControlSelect1" name="Grade_id">
                                                            <option value="{{ $My_Class->Grades->id }}" class="font-weight-bold" style="color: #6da3dd;">
                                                                {{ $My_Class->Grades->Name }}
                                                            </option>
                                                            @foreach ($Grades as $Grade)
                                                                <option class="font-weight-bold" value="{{ $Grade->id }}">
                                                                    {{ $Grade->Name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <br><br>
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
                                <!-- /End edit_modal_Class -->


                                <!-- delete_modal_Class -->
                                <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('main_trans.delete_class') }}
                                                </h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classrooms.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <label class="font-weight-bold text-warning font-xxl">{{ trans('main_trans.Warning_Grade') }}</label>
                                                    <br>
                                                    <label class="text-info">{{ trans('main_trans.Name_class') }} : {{ $My_Class->Name_Class  }}</label>
                                                    <br>
                                                    <label class="text-info">{{ trans('main_trans.stage_name') }} : {{$My_Class->Grades->Name  }}</label>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $My_Class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary font-weight-bold"
                                                                data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger font-weight-bold">{{ trans('main_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End delete_modal_Class -->


                            @endforeach
                    </table>

                    <button type="button" class="btn btn-outline-danger font-weight-bold mt-2" id="btn_delete_all">
                        {{ trans('main_trans.Multi_Delete') }}
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('main_trans.add_class') }}
                    </h5>
                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Name_class') }}
                                                    :</label>
                                                <input class="form-control font-weight-bold" type="text" name="Name" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                       class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control font-weight-bold" type="text" name="Name_class_en" />
                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2 font-weight-bold">{{ trans('main_trans.Name_Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect font-weight-bold" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                       class="mr-sm-2">
                                                    </label>
                                                <input class="btn btn-danger btn-block mt-1 p-3 font-weight-bold" data-repeater-delete
                                                       type="button" value="{{ trans('main_trans.delete_row') }}" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="btn btn-info mt-2 mb-4 font-weight-bold" data-repeater-create type="button" value="{{ trans('main_trans.add_row') }}"/>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                    <button type="submit"
                                            class="btn btn-success">{{ trans('main_trans.submit_class') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /End add_modal_class -->

</div>

<!-- Delete_Multi_Class_together -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.delete_class') }}
                </h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('Multi_Delete') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label class="font-weight-bold text-warning font-xxl">{{ trans('main_trans.Warning_Grade') }}</label>
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold"
                            data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger font-weight-bold">{{ trans('main_trans.Delete_G') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /End Delete_Multi_Class_together -->


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render


<script type="text/javascript">

    $(function() {
        $("#btn_delete_all").click(function() {
            let selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show');
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>
@endsection
