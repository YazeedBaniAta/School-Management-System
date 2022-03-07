

<!-- Admin dashboard -->
<div class="content-wrapper">
    <!-- page-title -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{trans('main_trans.Dashboard_page')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                </ol>
            </div>
        </div>
    </div>
    <!-- /End page-title -->

    <!-- widgets -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-graduate fa-3x"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text font-weight-bold">{{trans('main_trans.No.of_student')}}</p>
                            <h4>{{\App\Models\Student::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <a href="{{route('Students.index')}}" target="_blank"><i class="far fa-eye text-success mr-1" aria-hidden="true"></i><span class="text-primary font-weight-bold">{{trans('main_trans.show_details')}}</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text font-weight-bold">{{trans('main_trans.No.of_teacher')}}</p>
                            <h4>{{\App\Models\Teachers::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <a href="{{route('Teachers.index')}}" target="_blank"><i class="far fa-eye text-success mr-1" aria-hidden="true"></i><span class="text-primary font-weight-bold">{{trans('main_trans.show_details')}}</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text font-weight-bold">{{trans('main_trans.No.of_classroom')}}</p>
                            <h4>{{\App\Models\Classroom::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <a href="{{route('online_classes.index')}}" target="_blank"><i class="far fa-eye text-success mr-1" aria-hidden="true"></i><span class="text-primary font-weight-bold">{{trans('main_trans.show_details')}}</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-school highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text font-weight-bold">{{trans('main_trans.No.of_grade')}}</p>
                            <h4>{{\App\Models\Grade::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <a href="{{route('Grade.index')}}" target="_blank"><i class="far fa-eye text-success mr-1" aria-hidden="true"></i><span class="text-primary font-weight-bold">{{trans('main_trans.show_details')}}</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /End widgets-->

    <!-- last process in system -->
    <div class="row">
        <div  style="height: 400px;" class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="tab nav-border" style="position: relative;">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block w-100">
                                <h5 style="font-family: system-ui" class="card-title">{{trans('main_trans.lastProcess')}}</h5>
                            </div>
                            <div class="d-block d-md-flex nav-tabs-custom">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                           href="#students" role="tab" aria-controls="students"
                                           aria-selected="true">{{trans('main_trans.students')}}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                           role="tab" aria-controls="teachers" aria-selected="false">{{trans('main_trans.Teachers')}}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                           role="tab" aria-controls="fee_invoices" aria-selected="false">{{trans('main_trans.Accounts')}}
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">

                            {{--students Table--}}
                            <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="bg-dark font-weight-bold text-white">
                                            <th>#</th>
                                            <th>{{trans('main_trans.name')}}</th>
                                            <th>{{trans('main_trans.Email')}}</th>
                                            <th>{{trans('main_trans.gender')}}</th>
                                            <th>{{trans('main_trans.Grade')}}</th>
                                            <th>{{trans('main_trans.classrooms')}}</th>
                                            <th>{{trans('main_trans.section')}}</th>
                                            <th>{{trans('main_trans.created_at')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-weight-bold">
                                        @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->classroom->Name_Class}}</td>
                                            <td>{{$student->section->Name_Section}}</td>
                                            <td class="text-success">{{$student->created_at}}</td>
                                            @empty
                                            <td class="alert-danger" colspan="8">{{trans('main_trans.noInformation')}}</td>
                                        </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--teachers Table--}}
                            <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="bg-dark font-weight-bold text-white">
                                            <th>#</th>
                                            <th>{{trans('main_trans.Name_Teacher')}}</th>
                                            <th>{{trans('main_trans.gender')}}</th>
                                            <th>{{trans('main_trans.Joining_Date')}}</th>
                                            <th>{{trans('main_trans.specialization')}}</th>
                                            <th>{{trans('main_trans.created_at')}}</th>
                                        </tr>
                                        </thead>

                                        @forelse(\App\Models\Teachers::latest()->take(5)->get() as $teacher)
                                        <tbody class="font-weight-bold">
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$teacher->Name}}</td>
                                            <td>{{$teacher->genders->Name}}</td>
                                            <td>{{$teacher->Joining_Date}}</td>
                                            <td>{{$teacher->specializations->Name}}</td>
                                            <td class="text-success">{{$teacher->created_at}}</td>
                                            @empty
                                            <td class="alert-danger" colspan="8">{{trans('main_trans.noInformation')}}</td>
                                        </tr>
                                        </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>

                            {{--fees Table--}}
                            <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="bg-dark font-weight-bold text-white">
                                            <th>#</th>
                                            <th>{{trans('main_trans.feesDate')}}</th>
                                            <th>{{trans('main_trans.name')}}</th>
                                            <th>{{trans('main_trans.classrooms')}}</th>
                                            <th>{{trans('main_trans.Grade')}}</th>
                                            <th>{{trans('main_trans.Fees_Type')}}</th>
                                            <th>{{trans('main_trans.money')}}</th>
                                            <th>{{trans('main_trans.created_at')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-weight-bold">
                                        @forelse(\App\Models\Fees_invoices::latest()->take(10)->get() as $section)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$section->invoice_date}}</td>
                                            <td>{{$section->student->name}}</td>
                                            <td>{{$section->grade->Name}}</td>
                                            <td>{{$section->classroom->Name_Class}}</td>
                                            <td>{{$section->fees->title}}</td>
                                            <td>{{$section->amount}}</td>
                                            <td class="text-success">{{$section->created_at}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="alert-danger" colspan="9">{{trans('main_trans.noInformation')}}</td>
                                        </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /End last process in system -->

    <!-- Calendar -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card h-100">
                <div class="card-body">
                    <livewire:calendar />
                </div>
            </div>
        </div>
    </div>
    <!-- /End Calendar -->

    @include('layouts/footer')
</div>
<!-- /End Admin dashboard -->
