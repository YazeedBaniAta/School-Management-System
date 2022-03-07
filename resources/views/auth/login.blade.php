@extends('layouts.app')


@section('content')
<div class="wrapper">
    <section class="height-100vh d-flex align-items-center page-section-ptb login">
        @if($type == 'student')
            <img class="img-fluid w-100 h-100" style="position: absolute;" src="{{asset('assets/images/bg/S_Login.png')}}">
        @elseif($type == 'teacher')
            <img class="img-fluid w-100 h-100" style="position: absolute;" src="{{asset('assets/images/bg/T_Login.jpg')}}">
        @elseif($type == 'parent')
            <img class="img-fluid w-100 h-100" style="position: absolute;" src="{{asset('assets/images/bg/P_Login.png')}}">
        @else
            <img class="img-fluid w-100 h-100" style="position: absolute;" src="{{asset('assets/images/bg/bg-login.jpg')}}">
        @endif
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">

                    @if($type == 'student')
                        <div class="col-lg-4 col-md-6 login-fancy-bg bg-dark">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">Hello Student</h2>
                            <p class="mb-20 text-white">To Login To your account you need the username and password ,
                                if you forget your password plz click on

                                <a class="text-white font-weight-bold" href="#">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li>
                                    <span class="text-white" href="#">&copy; {{trans('main_trans.Copyright')}} <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>.</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    @elseif($type == 'teacher')
                        <div class="col-lg-4 col-md-6 login-fancy-bg bg-primary">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">Hello Teacher</h2>
                            <p class="mb-20 text-white">To Login To your account you need the username and password ,
                                if you forget your password plz click on

                                <a class="text-white font-weight-bold" href="#">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li>
                                    <span class="text-white" href="#">&copy; {{trans('main_trans.Copyright')}} <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>.</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    @elseif($type == 'parent')
                        <div class="col-lg-4 col-md-6 login-fancy-bg bg-success">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">Hello Parent</h2>
                            <p class="mb-20 text-white">To Login To your account you need the username and password ,
                                if you forget your password plz click on

                                <a class="text-white font-weight-bold" href="#">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li>
                                    <span class="text-white" href="#">&copy; {{trans('main_trans.Copyright')}} <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>.</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    @else
                        <div class="col-lg-4 col-md-6 login-fancy-bg bg-info">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">Hello Admin</h2>
                            <p class="mb-20 text-white">To Login To your Website you need the username and password ,
                                if you forget your password plz click on

                                <a class="text-white font-weight-bold" href="#">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li>
                                    <span class="text-white" href="#">&copy; {{trans('main_trans.Copyright')}} <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>.</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    @endif

                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        @if($type == 'student')
                            <h3 style="font-family: cursive" class="mb-30 font-weight-bold">LogIn Students Page</h3>
                        @elseif($type == 'parent')
                            <h3 style="font-family: cursive" class="mb-30 text-success font-weight-bold">LogIn Parents Page</h3>
                        @elseif($type == 'teacher')
                            <h3 style="font-family: cursive" class="mb-30 text-primary font-weight-bold">LogIn Teachers Page</h3>
                        @else
                            <h3 style="font-family: cursive" class="mb-30 text-info font-weight-bold">LogIn Admin Page</h3>
                        @endif


                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="font-weight-bold mb-10" for="name">{{ __('E-Mail Address') }} :<span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <input type="hidden" value="{{$type}}" name="type">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="font-weight-bold mb-10" for="Password">{{ __('Password') }} :<span class="text-danger">*</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="two" id="two" />
                                    <label class="font-weight-bold" for="two">{{ __('Remember Me') }}</label>
                                    <button class="btn btn-primary btn-block font-weight-bold"><span>LogIn</span><i class="fa fa-check"></i></button>
                                </div>
                            </div>

                        </form>

                            <a class="font-weight-bold float-right" style="color:#84ba3f;" href="#">
                                {{ __('Forgot Your Password?') }}
                            </a>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@stop
