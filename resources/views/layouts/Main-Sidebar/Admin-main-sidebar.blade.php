
<!-- Admin sidebar -->
<ul class="nav navbar-nav side-menu" id="sidebarnav">
    <!-- menu item Dashboard-->
    <li>
        <a href="{{url('/dashboard')}}">
            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
            </div>
            <div class="clearfix"></div>
        </a>
    </li>
    <!-- menu title -->
    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{trans('main_trans.Components')}} </li>

    <!-- Grades-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
            <div class="pull-left"><i class="fas fa-school"></i><span
                    class="right-nav-text">{{trans('main_trans.stage')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="elements" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('Grade.index')}}">{{trans('main_trans.stages_List')}}</a></li>
        </ul>
    </li>

    <!-- Class Room-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
            <div class="pull-left"><i class="fa fa-building"></i><span
                    class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}} </a> </li>
        </ul>
    </li>

    <!-- Sections-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
            <div class="pull-left"><i class="ti-pie-chart"></i><span
                    class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="chart" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('Sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
        </ul>
    </li>

    <!-- Subject List-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subject">
            <div class="pull-left"><i class="ti-pie-chart"></i><span
                    class="right-nav-text">{{trans('main_trans.Subjects')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="subject" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('subjects.index')}}">{{trans('main_trans.subject_list')}}</a></li>
        </ul>
    </li>

    <!-- Teachers-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                                    {{trans('main_trans.Teachers')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Form" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
        </ul>
    </li>

    <!-- Students-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
        <ul id="students-menu" class="collapse">
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.Student_information')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                <ul id="Student_information" class="collapse">
                    <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                    <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                <ul id="Students_upgrade" class="collapse">
                    <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                    <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                <ul id="Graduate students" class="collapse">
                    <li> <a href="{{route('Graduated.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                    <li> <a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                </ul>
            </li>
        </ul>
    </li>

    <!-- Parents -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
            <div class="pull-left"><i class="fas fa-user-tie"></i>
                <span class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="table" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
        </ul>
    </li>

    <!-- Accounts -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">
                                    {{trans('main_trans.Accounts')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('Fees.index')}}">{{trans('main_trans.Fees')}}</a> </li>
            <li> <a href="{{route('Fees_Invoices.index')}}">{{trans('main_trans.FeesStudents')}}</a> </li>
            <li> <a href="{{route('receipt_students.index')}}">{{trans('main_trans.receipt_students')}}</a> </li>
            <li> <a href="{{route('ProcessingFees.index')}}">{{trans('main_trans.P_F')}}</a> </li>
            <li> <a href="{{route('Payment_students.index')}}">{{trans('main_trans.Payment')}}</a> </li>
        </ul>
    </li>

    <!-- Attendance -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance">
            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Attendance" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('Attendance.index')}}">{{trans('main_trans.Student_List')}}</a> </li>
        </ul>
    </li>

    <!-- Exams -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams">
            <div class="pull-left"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Exams" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('Exams.index')}}">{{trans('main_trans.Exam_List')}}</a> </li>
            <li> <a href="{{route('Quizzes.index')}}">{{trans('main_trans.Quizzes_List')}}</a> </li>
            <li> <a href="{{route('questions.index')}}">{{trans('main_trans.Questions_List')}}</a> </li>
        </ul>
    </li>

    <!-- library -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library">
            <div class="pull-left"><i class="fas fa-book"></i><span
                    class="right-nav-text">{{trans('main_trans.library')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="library" class="collapse" data-parent="#sidebarnav">
            <li> <a href="lockscreen.html">Lock screen</a> </li>
        </ul>
    </li>

    <!-- Online Classes -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Online_classes">
            <div class="pull-left"><i class="fas fa-video"></i><span
                    class="right-nav-text">{{trans('main_trans.Online_classes')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Online_classes" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{route('online_classes.index')}}">{{trans('main_trans.directConnection')}}</a> </li>
        </ul>
    </li>

    <!-- System -->
    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{trans('main_trans.System_list')}} </li>
    <!-- /System-->

    <!-- Settings -->
    <li>
        <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>
    </li>

    <!-- Users -->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users">
            <div class="pull-left"><i class="fas fa-users"></i><span
                    class="right-nav-text">{{trans('main_trans.Users')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Users" class="collapse" data-parent="#sidebarnav">
            <li> <a href="lockscreen.html">Lock screen</a> </li>
        </ul>
    </li>

</ul>
<!-- /End Admin sidebar -->
