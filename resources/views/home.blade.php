@extends('layouts.layout')
@section('content')
<div class="main-content">
    <div class="fullwidth-template">
        <div class="home-slider style1 rows-space-30">
            <div class="container">
                    <div class="slider-item style2">

                        <div class="slider-inner equal-element">
                            <img src="/assets/images/bannerTop.jpg" style="height: 100%; width:600px; position:absolute; left:0">

                            <div class="slider-infor">
                                <h5 class="title-small">
                                    سریع ترین امکان در خرید و فروش!
                                </h5>
                                <h3 class="title-big" style="color: #1cacbb;">
                                    سایت املاک <span>ثبت خرید و فروش</span> <br/> 100%
                                </h3>
	
    <div class="price" style="color: #1cacbb;">
                                    کمترین زمان:
                                    <span class="number-price">
											با بیش از 100 آگهی در روز
										</span>
                                </div>
                                {{-- <a href="#" class="button btn-shop-now">Shop now</a> --}}
                            </div>
                        </div>
                    </div>
                
                
            </div>
        </div>
        
        <div class="banner-wrapp rows-space-35">
            <div class="container">
                <div class="row">
                    @if($result->isNotEmpty())
                    @for($i=0; $i<($result->count() < 3 ? $result->count() : 3) ; $i++)
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="banner">
                            <div class="item-banner style12">
                                <div class="inner">
                                    <a href="{{route('detail', ['id'=> $result[$i]->id, 'type'=>$result[$i]->type])}}">
                                    <img src="/uploads/{{$result[$i]->id . ".jpg"}}" alt="img" style="position: absolute; width:100%; height:260px">
                                </a>

                                    <div class="banner-content">
                                  
                                          
                                        
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    @endif
                </div>
            </div>
        </div>
        
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner">
                            <div class="item-banner style6">
                                <div class="inner">
                                    <img src="/assets/images/bannerApartment.jpg" style="height: 100%; width:600px; position:absolute; left:0">
                                    <div class="container">
                                        <div class="banner-content">
                                            <h4 class="teamo-subtitle">آپارتمان و ویلا</h4>
                                            <h3 class="title">برای فروش<br/>بهترین قیمت 
                                            </h3>
                                            <a href="{{route('list', ['type'=>1])}}" class="button btn-view-promotion">نمایش آگهی ها</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner">
                            <div class="item-banner style6">
                                <div class="inner">
                                    <img src="/assets/images/green.jpg" style="height: 100%; width:600px; position:absolute; left:0">
                                    <div class="container">
                                        <div class="banner-content">
                                            <h4 class="teamo-subtitle">باغ و باغچه</h4>
                                            <h3 class="title">برای فروش<br/>در کمترین زمان
                                            </h3>
                                            <a href="{{route('list', ['type'=>2])}}" class="button btn-view-promotion">نمایش آگهی ها</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="teamo-tabs  default rows-space-40">
            <div class="container">
                <div class="tab-head">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#bestseller">اجاره</a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">فروش</a>
                        </li>
                      
                    </ul>
                </div>
                
                    
               
                <div class="tab-container">
                    @foreach ($result as $item)
                    @if(Str::contains($item->type, 'اجاره'))
                    <div id="bestseller" class="tab-panel active">
                        <div class="teamo-product">
                            <ul class="row list-products auto-clear equal-container product-grid">
                                <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <div class="flash">
													<span class="onnew">
														<span class="text">
															new
														</span>
													</span>
                                            </div>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="{{route('detail', ['id'=>$item->id, 'type'=>$item->type])}}">
                                                    <img src="/uploads/{{$item->id . ".jpg"}}" style="height: 200px" alt="img">
                                                </a>
                                                {{-- <div class="thumb-group">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <div class="yith-wcwl-add-button">
                                                            <a href="#">Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="button quick-wiew-button">Quick View</a>
                                                    <div class="loop-form-add-to-cart">
                                                        <button class="single_add_to_cart_button button">Add to cart
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="{{route('detail', ['id'=>$item->id, 'type'=>$item->type])}}">{{$item->type}}</a>
                                            </h5>
                                            <div class="group-info">
                                                {{-- <div class="stars-rating">
                                                    <div class="star-rating">
                                                        <span class="star-3"></span>
                                                    </div>
                                                    <div class="count-star">
                                                        (3)
                                                    </div>
                                                </div> --}}
                                                <div class="price">
                                                    {{-- <del>
                                                        $65
                                                    </del> --}}
                                                    <ins>
                                                        {{$item->price}}
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                    @else
                    <div id="new_arrivals" class="tab-panel">
                        <div class="teamo-product">
                            <ul class="row list-products auto-clear equal-container product-grid">
                                <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <div class="flash">
													<span class="onnew">
														<span class="text">
															new
														</span>
													</span>
                                            </div>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="{{route('detail', ['id'=>$item->id, 'type'=>$item->type])}}">
                                                    <img src="/uploads/{{$item->id . ".jpg"}}" alt="img" style="height: 200px">
                                                </a>
                                                {{-- <div class="thumb-group">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <div class="yith-wcwl-add-button">
                                                            <a href="#">Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="button quick-wiew-button">Quick View</a>
                                                    <div class="loop-form-add-to-cart">
                                                        <button class="single_add_to_cart_button button">Add to cart
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="#">{{$item->type}}</a>
                                            </h5>
                                            <div class="group-info">
                                                {{-- <div class="stars-rating">
                                                    <div class="star-rating">
                                                        <span class="star-3"></span>
                                                    </div>
                                                    <div class="count-star">
                                                        (3)
                                                    </div>
                                                </div> --}}
                                                <div class="price">
                                                    {{-- <del>
                                                        $65
                                                    </del> --}}
                                                    <ins>
                                                        {{$item->price}}
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                           
                                
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endforeach
                
                </div>
            </div>
        </div>
        
        {{-- <div class="product-in-stock-wrapp">
            <div class="container">
                <h3 class="custommenu-title-blog white">
                    Featured Products
                </h3>
                <div class="teamo-product style3">
                    <ul class="row list-products auto-clear equal-container product-grid">
                        <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="product-top">
                                        <div class="flash">
												<span class="onnew">
													<span class="text">
														new
													</span>
												</span>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" tabindex="0">Add to Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb-inner">
                                        <a href="#" tabindex="0">
                                            <img src="assets/images/product-item-black-10.jpg" alt="img">
                                        </a>
                                    </div>
                                    <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="#" tabindex="0">Suction Return</a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-3"></span>
                                            </div>
                                            <div class="count-star">
                                                (3)
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>$375</span>
                                        </div>
                                    </div>
                                    <div class="group-buttons">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="add_to_cart_button button" tabindex="0">Shop now</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="product-top">
                                        <div class="flash">
												<span class="onnew">
													<span class="text">
														new
													</span>
												</span>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" tabindex="0">Add to Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb-inner">
                                        <a href="#" tabindex="0">
                                            <img src="assets/images/product-item-black-2.jpg" alt="img">
                                        </a>
                                    </div>
                                    <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="#" tabindex="0">Blowoff Valve Kit</a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-3"></span>
                                            </div>
                                            <div class="count-star">
                                                (3)
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>$375</span>
                                        </div>
                                    </div>
                                    <div class="group-buttons">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="add_to_cart_button button" tabindex="0">Shop now</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="product-top">
                                        <div class="flash">
												<span class="onnew">
													<span class="text">
														new
													</span>
												</span>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" tabindex="0">Add to Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb-inner">
                                        <a href="#" tabindex="0">
                                            <img src="assets/images/product-item-black-3.jpg" alt="img">
                                        </a>
                                    </div>
                                    <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="#" tabindex="0">Attack Stage</a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-3"></span>
                                            </div>
                                            <div class="count-star">
                                                (3)
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>$375</span>
                                        </div>
                                    </div>
                                    <div class="group-buttons">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="add_to_cart_button button" tabindex="0">Shop now</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="product-top">
                                        <div class="flash">
												<span class="onnew">
													<span class="text">
														new
													</span>
												</span>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" tabindex="0">Add to Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb-inner">
                                        <a href="#" tabindex="0">
                                            <img src="assets/images/product-item-black-4.jpg" alt="img">
                                        </a>
                                    </div>
                                    <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="#" tabindex="0">Cold Intake System</a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-3"></span>
                                            </div>
                                            <div class="count-star">
                                                (3)
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>$375</span>
                                        </div>
                                    </div>
                                    <div class="group-buttons">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="add_to_cart_button button" tabindex="0">Shop now</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="product-top">
                                        <div class="flash">
												<span class="onnew">
													<span class="text">
														new
													</span>
												</span>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" tabindex="0">Add to Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb-inner">
                                        <a href="#" tabindex="0">
                                            <img src="assets/images/product-item-black-5.jpg" alt="img">
                                        </a>
                                    </div>
                                    <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="#" tabindex="0">Bottle Glass Cleaner</a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-3"></span>
                                            </div>
                                            <div class="count-star">
                                                (3)
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>$375</span>
                                        </div>
                                    </div>
                                    <div class="group-buttons">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="add_to_cart_button button" tabindex="0">Shop now</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                            <div class="product-inner equal-element">
                                <div class="product-thumb">
                                    <div class="product-top">
                                        <div class="flash">
												<span class="onnew">
													<span class="text">
														new
													</span>
												</span>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button">
                                                <a href="#" tabindex="0">Add to Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb-inner">
                                        <a href="#" tabindex="0">
                                            <img src="assets/images/product-item-black-6.jpg" alt="img">
                                        </a>
                                    </div>
                                    <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name product_title">
                                        <a href="#" tabindex="0">Toyota Switchback</a>
                                    </h5>
                                    <div class="group-info">
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-3"></span>
                                            </div>
                                            <div class="count-star">
                                                (3)
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span>$375</span>
                                        </div>
                                    </div>
                                    <div class="group-buttons">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="add_to_cart_button button" tabindex="0">Shop now</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 
        <div class="banner-wrapp rows-space-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style10">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h4 class="teamo-subtitle">Wheel Collection!</h4>
                                        <h3 class="title">Big Deal Of The Day</h3>
                                        <div class="description">
                                            We’ve been waiting for you!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style11">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h4 class="teamo-subtitle">Let’s us make your style!</h4>
                                        <h3 class="title">Best Collection </h3>
                                        <div class="description">
                                            A complete shopping guide on what & how to drive it!
                                        </div>
                                        <a href="#" class="button btn-shopping-us">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        {{-- <div class="teamo-blog-wraap">
            <div class="container">
                <h3 class="custommenu-title-blog">
                    Our Latest News
                </h3>
                <div class="teamo-blog default">
                    <div class="owl-slick equal-container nav-center"
                         data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":true, "speed":800, "rows":1}'
                         data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":1}}]'>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="assets/images/slider-blog-thumb-1.jpg" alt="img">
                                </a>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">Skincare</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We bring you the best by working</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Phasellus condimentum nulla a arcu lacinia, a venenatis ex congue.
                                        Mauris nec ante magna.
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="assets/images/slider-blog-thumb-2.jpg" alt="img">
                                </a>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">HOW TO</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We know that buying Cars</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Using Lorem Ipsum allows designers to put together layouts
                                        and the form content
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <div class="video-teamo-blog">
                                    <figure>
                                        <img src="assets/images/slider-blog-thumb-3.jpg" alt="img" width="370"
                                             height="280">
                                    </figure>
                                    <a class="quick-install" href="#" data-videosite="vimeo"
                                       data-videoid="134060140"></a>
                                </div>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">VIDEO</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We design functional Cars</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Risus non porta suscipit lobortis habitasse felis, aptent
                                        interdum pretium ut.
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="teamo-blog-item equal-element layout1">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="assets/images/slider-blog-thumb-4.jpg" alt="img">
                                </a>
                                <div class="category-blog">
                                    <ul class="list-category">
                                        <li class="category-item">
                                            <a href="#">Skincare</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-item-share">
                                    <a href="#" class="icon">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </a>
                                    <div class="box-content">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="post-date">
                                        Agust 17, 09:14 am
                                    </div>
                                    <span class="view">
											<i class="icon fa fa-eye" aria-hidden="true"></i>
											631
										</span>
                                    <span class="comment">
											<i class="icon fa fa-commenting" aria-hidden="true"></i>
											84
										</span>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#">We know that buying Cars</a>
                                </h2>
                                <div class="main-info-post">
                                    <p class="des">
                                        Class integer tellus praesent at torquent cras, potenti erat fames
                                        volutpat etiam.
                                    </p>
                                    <a class="readmore" href="#">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
