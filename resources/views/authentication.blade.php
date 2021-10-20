@extends('layouts.layout')
@section('content')
<div class="main-content main-content-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            احراز هویت
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">
                        احراز هویت

                    </h3>
                    <div class="customer_login">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">ورود با حساب کاربری</h5>
                                    @error('login')
                                        it has ewrrro
                                    @enderror
                                    <form class="login" action="{{route('login')}}" method="post">
                                        @csrf
                                        {{-- <div class="social-account">
                                            <h6 class="title-social">Login with social account</h6>
                                            <a href="#" class="mxh-item facebook">
                                                <i class="icon fa fa-facebook-square" aria-hidden="true"></i>
                                                <span class="text">FACEBOOK</span>
                                            </a>
                                            <a href="#" class="mxh-item twitter">
                                                <i class="icon fa fa-twitter" aria-hidden="true"></i>
                                                <span class="text">TWITTER</span>
                                            </a>
                                        </div> --}}
                                        <p class="form-row form-row-wide">
                                            <label class="text">شماره همراه</label>
                                            <input title="موبایل" name="mobile" type="text" class="input-text">
                                        </p>
                                        <p class="form-row form-row-wide">
                                            <label class="text">رمز عبور</label>
                                            <input title="password" name="password" type="password" class="input-text">
                                        </p>
                                        <p class="lost_password">
                                            <span class="inline">
                                                <input type="checkbox" id="cb1">
                                                <label for="cb1" class="label-text">Remember me</label>
                                            </span>
                                            <a href="#" class="forgot-pw">Forgot password?</a>
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" class="button-submit" value="ورود">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="login-item">
                                    <h5 class="title-login">ثبت نام</h5>
                                    <form class="register" action="{{route('register')}}" method="POST">
                                        @csrf
                                        <p class="form-row form-row-wide">
                                            <label class="text">شماره همراه</label>
                                            <input title="text" name="mobile" class="input-text">
                                        </p>
                                        
                                        <p class="form-row form-row-wide">
                                            <label class="text">رمز عبور</label>
                                            <input title="pass" name="passsword" type="password" class="input-text">
                                        </p>
                                        <p class="form-row">
                                            <span class="inline">
                                                <input type="checkbox" id="cb2">
                                                <label for="cb2" class="label-text">I agree to <span>Terms & Conditions</span></label>
                                            </span>
                                        </p>
                                        <p class="">
                                            <input type="submit" class="button-submit" value="ثبت نام">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection