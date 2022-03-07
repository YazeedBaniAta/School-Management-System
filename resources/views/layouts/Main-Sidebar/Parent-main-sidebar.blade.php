<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{trans('main_trans.Components')}} </li>

        <!--  Exam -->
        <li>
            <a href="{{route('settings.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text"> {{trans('main_trans.Exams')}} </span></a>
        </li>

        <!-- System -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{trans('main_trans.System_list')}} </li>
        <!-- /System-->

        <!-- Settings-->
        <li>
            <a href="{{route('settings.index')}}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{trans('main_trans.Profile')}}</span></a>
        </li>


    </ul>
</div>
