@extends('layouts.layout')
@section('content')
<div class="main-content main-content-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{route('home')}}">خانه</a>
                        </li>
                        <li class="trail-item trail-end active">
                            درباره ما
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">درباره ما</h3>
                    <div class="page-main-content">

                        <div class="header-banner banner-image">

                            <div class="banner-wrap">
                                <img src="/assets/images/about.jpg" style="height: 100%; width:400px; position:absolute; left:0; z-index:2">

                                <div class="banner-header">
                                    <div class="col-lg-5 col-md-offset-7">

                                        <div class="content-inner">

                                            <h2 class="title">
                                                لیست جدید <br/> برای شما
                                            </h2>
                                            <div class="sub-title">
                                                آخرین اخبار از املاک <br/>
                                                خبرنامه آلفا.
                                            </div>
                                            <a href="#" class="teamo-button button">عضویت</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4">
                                <div class="teamo-iconbox  layout1">
                                    <div class="iconbox-inner">
                                        <div class="icon-item">
                                            <span class="placeholder-text">01</span>
                                            <span class="icon flaticon-rocket-ship"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                                ثبت آگهی رایگان
                                            </h4>
                                            {{-- <div class="text">
                                                Free Delivery on all order from EU with price more than $90.00
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-lg-offset-1">
                                <div class="teamo-iconbox  layout1">
                                    <div class="iconbox-inner">
                                        <div class="icon-item">
                                            <span class="placeholder-text">02</span>
                                            <span class="icon flaticon-return"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                         روش ثبت ساده
                                            </h4>
                                            {{-- <div class="text">
                                                30 Days money back guarantee no question asked!
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-lg-offset-1">
                                <div class="teamo-iconbox  layout1">
                                    <div class="iconbox-inner">
                                        <div class="icon-item">
                                            <span class="placeholder-text">03</span>
                                            <span class="icon flaticon-padlock"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                                پشتیبانی آنلاین
                                            </h4>
                                            {{-- <div class="text">
                                                We’re here to support to you 24/7. Let’s shopping now!
                                            </div> --}}
                                        </div>
                                    </div>
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