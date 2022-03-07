<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
        {{trans('main_trans.Dashboard_title')}}
    @endsection

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts/head')
    @livewireStyles
</head>

<body>

    <div class="wrapper">

        <!-- preloader -->
        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        <!--/End preloader -->

    @include('layouts/main-header')

    @include('layouts/main-sidebar')


        <!--===== Main content =====-->
    @if (auth('web')->check())
        @include('Dashboard.Admin-dashboard')
    @elseif(auth('student')->check())
        @include('Dashboard.Student-dashboard')
    @elseif(auth('teacher')->check())
        @include('Dashboard.Teacher-dashboard')
    @elseif(auth('parent')->check())
        @include('Dashboard.Parent-dashboard')
    @endif
        <!--=====/End Main content =====-->

    </div>

    <!--=================================
 footer -->

    @include('layouts/footer-scripts')
    @livewireScripts
    @stack('scripts')

</body>

</html>
