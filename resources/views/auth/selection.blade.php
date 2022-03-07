@extends('layouts.app')


@section('content')
    <div class="wrapper">
        <section class="height-100vh d-flex align-items-center page-section-ptb login">
            <img class="img-fluid w-100 h-100" style="position: absolute;" src="{{asset('assets/images/bg/BASchool.jpg')}}">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="font-weight-bold text-center text-primary">Choose how to login</h3>
                            <div class="form-inline mt-3">
                                <a class="btn btn-default col-lg-3" title="Student" href="{{route('login.show','student')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/student.png')}}">
                                    <h5 class="font-weight-bold text-info py-2">Student LogIn</h5>
                                </a>
                                <a class="btn btn-default col-lg-3" title="Parent" href="{{route('login.show','parent')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/parent.png')}}">
                                    <h5 class="font-weight-bold text-info py-2">Parent LogIn</h5>
                                </a>
                                <a class="btn btn-default col-lg-3" title="Teacher" href="{{route('login.show','teacher')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                    <h5 class="font-weight-bold text-info py-2">Teacher LogIn</h5>
                                </a>
                                <a class="btn btn-default col-lg-3" title="Admin" href="{{route('login.show','admin')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                    <h5 class="font-weight-bold text-info py-2">Admin LogIn</h5>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@stop
