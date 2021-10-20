<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ledthanhdat.vn/html/teamo/home3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Jun 2021 10:29:38 GMT -->
<head>
    <title>املاک</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/chosen.min.css">
    <link rel="stylesheet" href="/assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="/assets/css/lightbox.min.css">
    <link rel="stylesheet" href="/assets/js/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="/assets/css/jquery.scrollbar.min.css">
    <link rel="stylesheet" href="/assets/css/mobile-menu.css">
    <link rel="stylesheet" href="/assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="home" style="direction: rtl">

   

    <header class="header style7">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <div class="header-message">
                         خوش آمدید!
                    </div>
                </div>
                <div class="top-bar-right">
                    {{-- <div class="header-language">
                        <div class="teamo-language teamo-dropdown">
                            <a href="#" class="active language-toggle" data-teamo="teamo-dropdown">
                                    <span>
                                        English (USD)
                                    </span>
                            </a>
                            <ul class="teamo-submenu">
                                <li class="switcher-option">
                                    <a href="#">
                                            <span>
                                                French (EUR)
                                            </span>
                                    </a>
                                </li>
                                <li class="switcher-option">
                                    <a href="#">
                                            <span>
                                                Japanese (JPY)
                                            </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <ul class="header-user-links">
                        {{-- <li>
                            <a href="{{route('authentication')}}"> login | register</a>
                        </li> --}}
                    </ul>
                   
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-header">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="/assets/images/leaf.png" alt="img" style="height: 80px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                        <div class="block-search-block">
                            <form class="form-search form-search-width-category">
                                <div class="form-content">
                                    <div class="category">
                                        <select title="cate" data-placeholder="All Categories" class="chosen-select"
                                                tabindex="1">
                                            <option value="United States">فروش</option>
                                            <option value="United Kingdom">اجاره</option>
                                        </select>
                                    </div>
                                    <div class="inner">
                                        <input type="text" class="input" name="s" value="" placeholder="جستجو">
                                    </div>
                                    <button class="btn-search" type="submit">
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                        <div class="header-control">
                            {{-- <div class="block-minicart teamo-mini-cart block-header teamo-dropdown">
                                <a href="javascript:void(0);" class="shopcart-icon" data-teamo="teamo-dropdown">
                                    Cart
                                    <span class="count">
                                        0
                                        </span>
                                </a>
                                <div class="no-product teamo-submenu">
                                    <p class="text">
                                        You have
                                        <span>
                                                 0 item(s)
                                            </span>
                                        in your bag
                                    </p>
                                </div>
                            </div> --}}
                            
                            @if(Cookie::get('user_id') == null)
                            <div class="block-account block-header teamo-dropdown">
                                <a href="javascript:void(0);" data-teamo="teamo-dropdown">
                                    <span class="flaticon-user"></span>
                                </a>
                                <div class="header-account teamo-submenu">
                                    <div class="header-user-form-tabs">
                                        <ul class="tab-link">
                                            <li class="active">
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">ورود</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">ثبت نام</a>
                                            </li>
                                        </ul>
                                        <div class="tab-container">
                                            <div id="header-tab-login" class="tab-panel active">
                                                <form method="post" class="login form-login" action="{{route('login')}}" method="post">
                                                    @csrf
                                                    <p class="form-row form-row-wide">
                                                        <input type="mobile" name="mobile" placeholder="شماره همراه" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" name="password" class="input-text" placeholder="رمز عبور">
                                                    </p>
                                                    <p class="form-row">
                                                        <label class="form-checkbox">
                                                            <input type="checkbox" class="input-checkbox">
                                                            <span>
                                                                    مرا بخاطر بسپار
                                                                </span>
                                                        </label>
                                                        <input type="submit" class="button" value="Login">
                                                    </p>
                                                    <p class="lost_password">
                                                        <a href="#">فراموشی رمز عبور؟</a>
                                                    </p>
                                                </form>
                                            </div>
                                            <div id="header-tab-rigister" class="tab-panel">
                                                <form method="post" class="register form-register" action="{{route('register')}}" method="post">
                                                    @csrf
                                                    <p class="form-row form-row-wide">
                                                        <input type="mobile" name="mobile" placeholder="شماره همره" class="input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" name="password" class="input-text" placeholder="رمز عبور">
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="submit" class="button" value="ثبت نام">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-container">
            <div class="container">
                <div class="header-nav-wapper main-menu-wapper">
                    <div class="vertical-wapper block-nav-categori">
                        <div class="block-title">
                            <span class="icon-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            
                            </span>
                            <span class="text">مشاور املاک</span>
                        </div>
                        {{-- <div class="block-content verticalmenu-content">
                            <ul class="teamo-nav-vertical vertical-menu teamo-clone-mobile-menu">
                                <li class="menu-item">
                                    <a href="#" class="teamo-menu-item-title" title="New Arrivals">New Arrivals</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Hot Sale" href="#" class="teamo-menu-item-title">Hot Sale</a>
                                </li>
                                <li class="menu-item menu-item-has-children">
                                    <a title="Accessories" href="#" class="teamo-menu-item-title">Accessories</a>
                                    <span class="toggle-submenu"></span>
                                    <ul role="menu" class=" submenu">
                                        <li class="menu-item">
                                            <a title="Audio" href="#" class="teamo-item-title">Audio</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Cacti" href="#" class="teamo-item-title">Cacti</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="New Arrivals" href="#" class="teamo-item-title">New Arrivals</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Accessories" href="#" class="teamo-item-title">Accessories</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Storage" href="#" class="teamo-item-title">Storage</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a title="Cacti" href="#" class="teamo-menu-item-title">Cacti</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Palms" href="#" class="teamo-menu-item-title">Palms</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Ferns" href="#" class="teamo-menu-item-title">Ferns</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Hanging plants" href="#" class="teamo-menu-item-title">Hanging plants</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Variegated" href="#" class="teamo-menu-item-title">Variegated</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="header-nav">
                        <div class="container-wapper">
                            <ul class="teamo-clone-mobile-menu teamo-nav main-menu " id="menu-main-menu">
                                <li class="menu-item">
                                    <a href="{{route('home')}}" class="teamo-menu-item-title" title="Home">خانه</a>
                                    {{-- <span class="toggle-submenu"></span>
                                    <ul class="submenu">
                                        <li class="menu-item">
                                            <a href="{{route('home')}}">Home 01</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('home')}}">Home 02</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('home')}}">Home 03</a>
                                        </li>
                                    </ul> --}}
                                </li>
                        
                                {{-- <li class="menu-item  menu-item-has-children item-megamenu">
                                    <a href="#" class="teamo-menu-item-title" title="Pages">Pages</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu mega-menu menu-page">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                                <div class="teamo-custommenu default">
                                                    <h2 class="widgettitle">Shop Pages</h2>
                                                    <ul class="menu">
                                                        <li class="menu-item">
                                                            <a href="shoppingcart.html">Shopping Cart</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="checkout.html">Checkout</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="contact.html">Contact us</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="404page.html">404</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="login.html">Login/Register</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                                <div class="teamo-custommenu default">
                                                    <h2 class="widgettitle">Product</h2>
                                                    <ul class="menu">
                                                        <li class="menu-item">
                                                            <a href="productdetails-fullwidth.html">Product Fullwidth</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="productdetails-leftsidebar.html">Product left
                                                                sidebar</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="productdetails-rightsidebar.html">Product right
                                                                sidebar</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                        
                              
                                    @userAccess(Cookie::get('user_id'))
                                        <li class="menu-item">
                                            <a href="{{route('advertise', ['user_id'=>Cookie::get('user_id')])}}" class="teamo-menu-item-title" title="myAdv">آگهی های من</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('showRegisterAdvertisementForm')}}" class="teamo-menu-item-title" title="register">ثبت آگهی</a>
                                        </li>
                                        
                                    @endUserAccess
                                        
                                    @adminAccess(Cookie::get('user_id'))
                                        <li class="menu-item">
                                            <a href="{{route('showRegisterAdvertisementForm')}}" class="teamo-menu-item-title" title="register">ثبت آگهی</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('users')}}" class="teamo-menu-item-title" title="users">کاربران</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{route('orders')}}" class="teamo-menu-item-title" title="orders">درخواست ها</a>
                                        </li>
                                    @endAdminAccess
                                        
                                    <li class="menu-item">
                                        <a href="{{route('about')}}" class="teamo-menu-item-title" title="About">درباره ما</a>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="/assets/images/leaf.png" width="40px" height="40px" alt="img">
                    </a>
                    @if(Cookie::get('user_id') == null)
        <span class="block-account block-header teamo-dropdown" style="margin-right: 20px;">
            <a href="javascript:void(0);" data-teamo="teamo-dropdown">
                <span class="flaticon-user"></span>
            </a>
            <div class="header-account teamo-submenu">
                <div class="header-user-form-tabs">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login-mobile">ورود</a>
                        </li>
                        <li>
                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister-mobile">ثبت نام</a>
                        </li>
                    </ul>
                    <div class="tab-container">
                        <div id="header-tab-login-mobile" class="tab-panel active">
                            <form method="post" class="login form-login" action="{{route('login')}}" method="post">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <input type="mobile" name="mobile" placeholder="شماره همراه" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <input type="password" name="password" class="input-text" placeholder="رمز عبور">
                                </p>
                                <p class="form-row">
                                    <label class="form-checkbox">
                                        <input type="checkbox" class="input-checkbox">
                                        <span>
                                                بخاطر بسپار مرا
                                            </span>
                                    </label>
                                    <input type="submit" class="button" value="ورود">
                                </p>
                                <p class="lost_password">
                                    <a href="#">رمز عبور را فراموش کرده ام؟</a>
                                </p>
                            </form>
                        </div>
                        <div id="header-tab-rigister-mobile" class="tab-panel">
                            <form method="post" class="register form-register" action="{{route('register')}}" method="post">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <input type="mobile" name="mobile" placeholder="شماره همراه" class="input-text">
                                </p>
                                <p class="form-row form-row-wide">
                                    <input type="password" name="password" class="input-text" placeholder="رمز عبور">
                                </p>
                                <p class="form-row">
                                    <input type="submit" class="button" value="ثبت نام">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        @endif
                </div>
            </div>
            <div class="item item mobile-search-box has-sub">
                <a href="#">
                            <span class="icon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="header-searchform-box">
                        <form class="header-searchform">
                            <div class="searchform-wrap">
                                <input type="text" class="search-input" placeholder="کلمه مورد نظر را وارد کنید...">
                                <input type="submit" class="submit button" value="جستجو">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item mobile-settings-box has-sub">
                <a href="#">
                            <span class="icon">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="block-sub-item">
                        <h5 class="block-item-title">Currency</h5>
                        <form class="currency-form teamo-language">
                            <ul class="teamo-language-wrap">
                                <li class="active">
                                    <a href="#">
                                                <span>
                                                    English (USD)
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span>
                                                    French (EUR)
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                                <span>
                                                    Japanese (JPY)
                                                </span>
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item menu-bar">
                <a class="mobile-navigation  menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    
                    
                </a>
            </div>
            
        </div>
        
    </div>
    @yield('content')
    {{-- <div class="instagram-wrapp">
        <div>
            <h3 class="custommenu-title-blog">
                <i class="flaticon-instagram" aria-hidden="true"></i>
                Instagram Feed
            </h3>
            <div class="teamo-instagram">
                <div class="instagram owl-slick equal-container"
                     data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":false, "infinite":true, "speed":800, "rows":1}'
                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":5}},{"breakpoint":"1200","settings":{"slidesToShow":4}},{"breakpoint":"992","settings":{"slidesToShow":3}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":2}}]'>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-1.jpg" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-2.jpg" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-3.jpg" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-4.jpg" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-5.jpg" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <footer class="footer style7">
        <div class="container">
            <div class="container-wapper">
                <div class="row">
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-md hidden-lg">
                        <div class="teamo-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">اشتراک خبر نامه</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    با  عضویت در خبرنامه از آخرین اخبار املاک باخبر شوید
                                </div>
                                <input type="email" class="input-text email email-newsletter"
                                       placeholder="ایمیل را وارد کنید">
                                <button class="button btn-submit submit-newsletter">عضویت</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="teamo-custommenu default">
                            <h2 class="widgettitle">دسترسی سریع</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="{{route('home')}}">خانه</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">فروش و اجاره آپارتمان</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">فروش باغ وباغچه</a>
                                </li>
                            
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs">
                        <div class="teamo-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">اشتراک خبر نامه</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    با  عضویت در خبرنامه از آخرین اخبار املاک باخبر شوید
                                </div>
                                <input type="email" class="input-text email email-newsletter"
                                       placeholder="ایمیل را وارد کنید">
                                <button class="button btn-submit submit-newsletter">عضویت</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="teamo-custommenu default">
                            <h2 class="widgettitle">اطلاعات</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">درباره ما</a>
                                </li>
                        
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-end">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="teamo-socials">
                                <ul class="socials">
                                    <li>
                                        <a href="#" class="social-item" target="_blank">
                                            <i class="icon fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-item" target="_blank">
                                            <i class="icon fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-item" target="_blank">
                                            <i class="icon fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="coppyright">
                                
                                <a href="#"></a>
                                . کلیه حقوق محفوظ است
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- <div class="footer-device-mobile">
        <div class="wapper">
            <div class="footer-device-mobile-item device-home">
                <a href="{{route('home')}}">
                        <span class="icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                    Home
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-wishlist">
                <a href="#">
                        <span class="icon">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </span>
                    Wishlist
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-cart">
                <a href="#">
                        <span class="icon">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            <span class="count-icon">
                                0
                            </span>
                        </span>
                    <span class="text">Cart</span>
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-user">
                <a href="login.html">
                        <span class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    Account
                </a>
            </div>
        </div>
    </div> --}}
    <a href="#" class="backtotop">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/jquery.plugin-countdown.min.js"></script>
    <script src="/assets/js/jquery-countdown.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/magnific-popup.min.js"></script>
    <script src="/assets/js/isotope.min.js"></script>
    <script src="/assets/js/jquery.scrollbar.min.js"></script>
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/js/mobile-menu.js"></script>
    <script src="/assets/js/chosen.min.js"></script>
    <script src="/assets/js/slick.js"></script>
    <script src="/assets/js/jquery.elevateZoom.min.js"></script>
    <script src="/assets/js/jquery.actual.min.js"></script>
    <script src="/assets/js/fancybox/source/jquery.fancybox.js"></script>
    <script src="/assets/js/lightbox.min.js"></script>
    <script src="/assets/js/owl.thumbs.min.js"></script>
    <script src="/assets/js/jquery.scrollbar.min.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
    <script src="/assets/js/frontend-plugin.js"></script>
    </body>
    
    <!-- Mirrored from ledthanhdat.vn/html/teamo/home3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Jun 2021 10:29:38 GMT -->
    </html>