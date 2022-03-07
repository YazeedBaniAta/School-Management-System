@extends('layouts/master')

@section('css')
    @toastr_css

@section('title')
    {{trans('main_trans.stage')}}
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('main_trans.add_Grade') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover table-bordered p-0 text-center font-weight-bold">
                            <thead class="alert-primary font-weight-bold text-dark">
                            <tr>
                                <th>#</th>
                                <th>{{trans('main_trans.Name')}}</th>
                                <th>{{trans('main_trans.Notes')}}</th>
                                <th>{{trans('main_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1; ?>
                            @foreach ($Grades as $Grade)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $Grade->Name }}</td>
                                    <td>{{ $Grade->Note }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Grade->id }}"
                                                title="{{ trans('main_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Grade->id }}"
                                                title="{{ trans('main_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <?php $count++; ?>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('main_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{route('Grade.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2 font-weight-bold">{{ trans('main_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control text-info font-weight-bold"
                                                                   value="{{$Grade->getTranslation('Name', 'ar')}}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $Grade->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2 font-weight-bold">{{ trans('main_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control text-info font-weight-bold"
                                                                   value="{{$Grade->getTranslation('Name', 'en')}}"
                                                                   name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('main_trans.Notes') }}
                                                            :</label>
                                                        <textarea class="form-control text-info font-weight-bold" name="Notes"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $Grade->Note }}</textarea>
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
                                <!-- /End edit_modal_Grade -->


                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('main_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Grade.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                   <label class="font-weight-bold text-warning font-xxl">{{ trans('main_trans.Warning_Grade') }}</label>
                                                    <br>
                                                    <label class="text-info">{{ trans('main_trans.stage_name') }} : {{ $Grade->Name  }}</label>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $Grade->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /End delete_modal_Grade -->

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('main_trans.add_Grade') }}
                        </h5>
                        <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Grade.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name"
                                           class="mr-sm-2 font-weight-bold">{{ trans('main_trans.stage_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="Name" class="form-control font-weight-bold" >
                                </div>
                                <div class="col">
                                    <label for="Name_en"
                                           class="mr-sm-2 font-weight-bold">{{ trans('main_trans.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control font-weight-bold" name="Name_en" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"
                                    for="exampleFormControlTextarea1">{{ trans('main_trans.Notes') }}
                                    :</label>
                                <textarea class="form-control font-weight-bold" name="Notes" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info font-weight-bold">{{ trans('main_trans.submit') }}</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger font-weight-bold"
                                data-dismiss="modal">{{ trans('main_trans.Close') }}</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- End_modal_Grade -->

    </div>
    <!-- row closed -->
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
