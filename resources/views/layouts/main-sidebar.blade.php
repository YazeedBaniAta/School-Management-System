<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">

                @if (auth('web')->check())
                    @include('layouts.Main-Sidebar.Admin-main-sidebar')
                @elseif(auth('student')->check())
                    @include('layouts.Main-Sidebar.Student-main-sidebar')
                @elseif(auth('teacher')->check())
                    @include('layouts.Main-Sidebar.Teacher-main-sidebar')
                @elseif(auth('parent')->check())
                    @include('layouts.Main-Sidebar.Parent-main-sidebar')
                @endif

            </div>
        </div>
        <!-- Left Sidebar End-->

