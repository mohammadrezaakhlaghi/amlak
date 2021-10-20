@extends('layouts.layout')
@section('content')
<div class="main-content main-content-details single right-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-trail breadcrumbs">
					<ul class="trail-items breadcrumb">
						<li class="trail-item trail-begin">
							<a href="{{route('home')}}">خانه</a>
						</li>
						<li class="trail-item">
							<a href="#">Cacti</a>
						</li>
						<li class="trail-item trail-end active">
							{{$result->type}}
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area content-details col-lg-9 col-md-8 col-sm-12 col-xs-12">
				<div class="site-main">
					<div class="details-product">
						<div class="details-thumd">
							<div class="image-preview-container image-thick-box image_preview_container">
								<img id="img_zoom" data-zoom-image="/uploads/{{$result->id . ".jpg"}}" src="/uploads/{{$result->id . ".jpg"}}" alt="img">
								<a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
							</div>
							<div class="product-preview image-small product_preview">
								<div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
									<a href="#" data-image="assets/images/details-item-1.jpg" data-zoom-image="/assets/images/details-item-1.jpg" class="active">
										<img src="/assets/images/details-item-1.jpg" data-large-image="/assets/images/details-item-1.jpg" alt="img">
									</a>
									<a href="#" data-image="assets/images/details-item-2.jpg" data-zoom-image="assets/images/details-item-2.jpg">
										<img src="/assets/images/details-item-2.jpg" data-large-image="/assets/images/details-item-2.jpg" alt="img">
									</a>
									<a href="#" data-image="assets/images/details-item-3.jpg" data-zoom-image="assets/images/details-item-3.jpg">
										<img src="/assets/images/details-item-3.jpg" data-large-image="/assets/images/details-item-3.jpg" alt="img">
									</a>
									<a href="#" data-image="assets/images/details-item-4.jpg" data-zoom-image="assets/images/details-item-4.jpg">
										<img src="/assets/images/details-item-4.jpg" data-large-image="/assets/images/details-item-4.jpg" alt="img">
									</a>
								</div>
							</div>
						</div>
						<div class="details-infor">
							<h1 class="product-title">
                                {{$result->type}}
							</h1>
						</div>
					</div>
					<div class="tab-details-product">
						<ul class="tab-link">
							<li class="active">
								<a data-toggle="tab" aria-expanded="true" href="#product-descriptions">توضیحات </a>
							</li>
						</ul>
						<div class="tab-container">
							<div id="product-descriptions" class="tab-panel active">
                            {{$result->description}}
							</div>
					
					
						</div>
					</div>
					<div style="clear: left;"></div>
				
				</div>
			</div>
			<div class="sidebar sidebar-details col-lg-3 col-md-4 col-sm-12 col-xs-12">
				<div class="wrapper-sidebar">
					
					<div class="widget widget-related-products">
						<h3 class="widgettitle">آگهی های مشابه</h3>
						
                        <div class="slider-related-products owl-slick nav-top-right equal-container"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1 }},{"breakpoint":"992","settings":{"slidesToShow":2}}]'>
							@foreach ($relatedOrder as $order)
                                
                           
                            <div class="product-item style-1">
								<div class="product-inner equal-element">
									<div class="product-top">
										<div class="flash">
													<span class="onnew">
														<span class="text">
														جدید
														</span>
													</span>
										</div>
									</div>
									<div class="product-thumb">
										<div class="thumb-inner">
											<a href="{{route('detail', ['id'=> $result->id, 'type'=>$order->type])}}">
												<img src="/uploads/{{$order->id . ".jpg"}}" alt="img">
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
											<a href="#">{{Str::substr($order->description,0,10)}}</a>
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
												
												<ins>
													{{$order->price}}
												</ins>
											</div>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
						</div>
					</div>
					{{-- <div class="widget widget-banner">
						<a href="#">
							<img src="/assets/images/widget-banner.jpg" alt="img">
						</a>
					</div> --}}
					{{-- <div class="widget widget-testimonials">
						<h3 class="widgettitle">Testimonials</h3>
						<div class="slider-related-products owl-slick nav-top-right"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"991","settings":{"slidesToShow":1 }}]'>
							<div class="testimonials-item">
								<div class="Testimonial-inner">
									<div class="comment">
										Donec ligula mauris, posuere sed tincidunt a, facilisis id enim. Class aptent taciti sociosqu ad litora torquent per conubia.
									</div>
									<div class="author">
										<div class="avt">
											<img src="/assets/images/member1.png" alt="img">
										</div>
										<h3 class="name">
											Adam Smith
											<span class="position">
													CEO/Founder Apple
												</span>
										</h3>

									</div>
								</div>
							</div>
							<div class="testimonials-item">
								<div class="Testimonial-inner">
									<div class="comment">
										Donec ligula mauris, posuere sed tincidunt a, facilisis id enim. Class aptent taciti sociosqu ad litora torquent per conubia.
									</div>
									<div class="author">
										<div class="avt">
											<img src="/assets/images/member2.png" alt="img">
										</div>
										<h3 class="name">
											Tom Milikin
											<span class="position">
													CEO/Founder Apple
												</span>
										</h3>

									</div>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection