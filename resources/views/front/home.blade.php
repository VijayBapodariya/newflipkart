@extends('layouts.fmain')

@section('content')
        <!-- Start of slider area -->
        <div class="slider-area">
            <div id="ensign-nivoslider" class="slides">   
                <img src="{{asset('cilentlib/images/slider/1-1.jpg')}}" alt="" title="#htmlcaption1"/>
                <img src="{{asset('cilentlib/images/slider/1-2.jpg')}}" alt="" title="#htmlcaption2"/>
            </div>
            <!-- direction 1 -->
            <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                <div class="container slider-height">
                    <div class="row slider-height">
                        <div class="col-md-offset-5 col-md-7 slider-height">
                            <div class="slide-text">
                                <div class="cap-title cap-main-title wow bounceInDown mb-35 text-uppercase text-white" data-wow-duration="0.5s" data-wow-delay="0s">
                                    <h2><strong>2016</strong></h2>
                                </div>
                                <div class="cap-sub-title cap-main-title wow bounceInDown mb-40 text-uppercase text-white" data-wow-duration="1s" data-wow-delay="0s">
                                    <h2>boutique special collection</h2>
                                </div>
                                <div class="cap-sub-title wow bounceInDown mb-30 text-white" data-wow-duration="1.5s" data-wow-delay="0s">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ipsum dolor sit amet labore et dolore</p>
                                </div>
                                <div class="cap-shop wow bounceInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                    <a href="#" class="button extra-small text-uppercase">
                                        <span>Shop now</span>
                                    </a>
                                </div>                      
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <!-- direction 2 -->
            <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
                <div class="container slider-height">
                    <div class="row slider-height">
                        <div class="col-md-offset-5 col-md-7 slider-height">
                            <div class="slide-text">
                                <div class="cap-title cap-main-title wow bounceInDown mb-35 text-uppercase text-white" data-wow-duration="0.5s" data-wow-delay="0s">
                                    <h2><strong>2016</strong></h2>
                                </div>
                                <div class="cap-sub-title cap-main-title wow bounceInDown mb-40 text-uppercase text-white" data-wow-duration="1s" data-wow-delay="0s">
                                    <h2>boutique special collection</h2>
                                </div>
                                <div class="cap-sub-title wow bounceInDown mb-30 text-white" data-wow-duration="1.5s" data-wow-delay="0s">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ipsum dolor sit amet labore et dolore</p>
                                </div>
                                <div class="cap-shop wow bounceInUp" data-wow-duration="2s" data-wow-delay=".5s">
                                    <a href="#" class="button extra-small text-uppercase">
                                        <span>Shop now</span>
                                    </a>
                                </div>                      
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>     
        <!-- End of slider area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Banner Area -->
            <div class="banner-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="banner-img banner-hover mb-30">
                                <a href="#" class="b-img">
                                    <img src="{{asset('cilentlib/images/banner/1.jpg')}}" alt="">
                                </a>
                                <div class="shop-cart-icon">
                                    <a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="banner-img banner-hover mb-30">
                                <a href="#" class="b-img">
                                    <img src="{{asset('cilentlib/images/banner/2.jpg')}}" alt="">
                                </a>
                                <div class="shop-cart-icon">
                                    <a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="banner-img banner-hover rmb-30">
                                <a href="#" class="b-img">
                                    <img src="{{asset('cilentlib/images/banner/3.jpg')}}" alt="">
                                </a>
                                <div class="shop-cart-icon">
                                    <a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="banner-img banner-hover">
                                <a href="#" class="b-img">
                                    <img src="{{asset('cilentlib/images/banner/4.jpg')}}" alt="">
                                </a>
                                <div class="shop-cart-icon">
                                    <a href="#"><i class="zmdi zmdi-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Banner Area -->
            <!-- Start Product List -->
            @foreach($cdata as $c)
            @php
            	$m = $c->category_id;
            	break;
            @endphp
            @endforeach
            <div class="product-list-tab pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-menu section-title section-title  mb-30">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">          
                                	@foreach($cdata as $c)
                                		@if($c->category_id == $m)
                                    <li role="presentation" class="first-item active">
                                        <a href="#{{$c->category_name}}" aria-controls="{{$c->category_name}}" role="tab" data-toggle="tab">{{$c->category_name}}</a>
                                    </li>
                                    @else
                                     <li role="presentation" >
                                        <a href="#{{$c->category_name}}" aria-controls="{{$c->category_name}}" role="tab" data-toggle="tab">{{$c->category_name}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-list tab-content">
                        	@foreach($cdata as $c)
                        		@if($c->category_id == $m)
                        			@foreach($pdata as $p)
                                        @php
                                            foreach($p['product_image'] as $v)
                                            {
                                                $t=$v['product_image_id'];
                                                break;
                                            }
                                        @endphp
                                        @if($c->category_id == $p->product_category_id)
    		                                  <div role="tabpanel" class="tab-pane fade in active" id="{{$c->category_name}}">
    			                                <div class="col-md-3 col-sm-4">
    			                                    <div class="single-product mb-40">
    			                                        <div class="product-img-content mb-20">
    			                                            <div class="product-img">
    			                                                @foreach($p['product_image'] as $img)
                                                                    @if($img['product_image_id'] == $t)
                                                                <img src="{{asset('product_image/'.$img['product_image_name'])}}" alt="">
                                                                    @endif
                                                                @endforeach
    			                                            </div>
    			                                            <span class="new-label text-uppercase">-30%</span>
    			                                            <div class="product-action text-center">
    			                                                <form method="post" enctype="multipart/form-data" action="{{url('add_cart')}}">
                                                                @csrf
                                                                <input type="hidden" name="cart_product_id" value="{{$p['product_id']}}">
                                                                <input type="hidden" name="cart_customer_id" value="@if(isset(Auth::guard('customer')->user()->id)){{Auth::guard('customer')->user()->id}}@endif">
                                                                <input type="hidden" name="cart_product_name" value="{{$p['product_name']}}">
                                                                <div id="quantity-wanted" class="pull-left"> 
                                                                    <input type="hidden" class="cart-plus-minus-box" name="cart_product_qty" value="1">    
                                                                </div>
                                                                <input type="hidden" name="cart_product_price" value="{{$p['product_price']}}">
                                                                @foreach($p['product_image'] as $i)
                                                                    @if($i['product_image_id']==$t)
                                                                        <input type="hidden" name="image" value="{{$i['product_image_name']}}">
                                                                    @endif
                                                                @endforeach
                                                                <input type="submit" class="zmdi zmdi-shopping-cart" name="submit" value="Add To Cart">
                                                            </form>
    			                                            </div>
    			                                        </div>
    			                                        <div class="product-content text-center text-uppercase">
    			                                            <a href="{{url('single_product/'.$p->product_id)}}" title="Ripcurl Furry Fleece">{{$p->product_name}}</a>
    			                                            <div class="rating-icon">
    			                                                <i class="zmdi zmdi-star"></i>
    			                                                <i class="zmdi zmdi-star"></i>
    			                                                <i class="zmdi zmdi-star"></i>
    			                                                <i class="zmdi zmdi-star-half"></i>
    			                                                <i class="zmdi zmdi-star-half"></i>
    			                                            </div>
    			                                            <div class="product-price">
    			                                                <span class="new-price">£{{$p->product_price}}</span>
    			                                            </div>
    			                                        </div>
    			                                    </div>
    			                                </div>
    		                            	  </div>
                                        @endif
		                           	@endforeach
                            	@else
                            		@foreach($pdata as $p)
                                        @php
                                            foreach($p['product_image'] as $v)
                                            {
                                                $t=$v['product_image_id'];
                                                break;
                                            }
                                        @endphp
                                        @if($c->category_id == $p->product_category_id)
			                             <div role="tabpanel" class="tab-pane fade" id="{{$c->category_name}}">
			                                <div class="col-md-3 col-sm-4">
			                                    <div class="single-product mb-40">
			                                        <div class="product-img-content mb-20">
			                                            <div class="product-img">
			                                                <a href="product-details.html">
			                                                    @foreach($p['product_image'] as $img)
                                                                    @if($img['product_image_id'] == $t)
                                                                <img src="{{asset('product_image/'.$img['product_image_name'])}}" alt="">
                                                                    @endif
                                                                @endforeach
			                                                </a>
			                                            </div>
			                                            <span class="new-label text-uppercase">-30%</span>
			                                            <div class="product-action text-center">
			                                                <form method="post" enctype="multipart/form-data" action="{{url('add_cart')}}">
                                                                @csrf
                                                                <input type="hidden" name="cart_product_id" value="{{$p['product_id']}}">
                                                                <input type="hidden" name="cart_customer_id" value="@if(isset(Auth::guard('customer')->user()->id)){{Auth::guard('customer')->user()->id}}@endif">
                                                                <input type="hidden" name="cart_product_name" value="{{$p['product_name']}}">
                                                                <div id="quantity-wanted" class="pull-left"> 
                                                                    <input type="hidden" class="cart-plus-minus-box" name="cart_product_qty" value="1">    
                                                                </div>
                                                                <input type="hidden" name="cart_product_price" value="{{$p['product_price']}}">
                                                                @foreach($p['product_image'] as $i)
                                                                    @if($i['product_image_id']==$t)
                                                                        <input type="hidden" name="image" value="{{$i['product_image_name']}}">
                                                                    @endif
                                                                @endforeach
                                                                <input type="submit" class="zmdi zmdi-shopping-cart" name="submit" value="Add To Cart">
                                                            </form>
			                                            </div>
			                                        </div>
			                                        <div class="product-content text-center text-uppercase">
			                                            <a href="{{url('single_product/'.$p->product_id)}}" title="Ripcurl Furry Fleece">{{$p->product_name}}</a>
			                                            <div class="rating-icon">
			                                                <i class="zmdi zmdi-star"></i>
			                                                <i class="zmdi zmdi-star"></i>
			                                                <i class="zmdi zmdi-star"></i>
			                                                <i class="zmdi zmdi-star-half"></i>
			                                                <i class="zmdi zmdi-star-half"></i>
			                                            </div>
			                                            <div class="product-price">
			                                                <span class="new-price">£{{$p->product_price}}</span>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                 </div>
                                        @endif
		                            @endforeach
                             	@endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product List -->
            <!-- Start Sale  Area -->
            <!-- <div class="sale-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="section-title text-uppercase mb-40">
                                <h4>on sale</h4>
                            </div>
                            <div class="sale-list">
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="{{asset('cilentlib/images/sale/1.jpg')}}" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="{{asset('cilentlib/images/sale/2.jpg')}}" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="sinlge-sale clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="{{asset('cilentlib/images/sale/3.jpg')}}" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="section-title text-uppercase mb-40">
                                <h4>Top Rated</h4>
                            </div>
                            <div class="sale-list">
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="{{asset('cilentlib/images/sale/4.jpg')}}" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="sinlge-sale mb-30 clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="{{asset('cilentlib/images/sale/5.jpg')}}" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                    <span class="old-price">£190.00</span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="sinlge-sale clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="sale-img">
                                                <a href="product-details.html" title="Men’s White Short Item">
                                                    <img src="{{asset('cilentlib/images/sale/6.jpg')}}" alt="">
                                                </a>
                                                <div class="sale-shop">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="product-content mt-60">
                                                <a href="#" title="Men’s White Short Item">Men’s White Short Item</a>
                                                <div class="rating-icon">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </div>
                                                <div class="product-price">
                                                    <span class="new-price">£185.00</span>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm">
                            <div class="offer-banner">
                                <a href="#">
                                    <img src="{{asset('cilentlib/images/sale/offer.jpg')}}" alt="">
                                </a>
                                CountDown
                                <div class="product-cuntdown white-bg text-center">
                                    <div class="timer">
                                        <div data-countdown="2018/06/01"></div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End Of Sale  Area -->
            <!-- Start Blog Area -->
            <div class="blog-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="section-title text-uppercase mb-40">
                                <h4>latest blog</h4>
                            </div>
                        </div>                      
                    </div>
                    <div class="blog-list">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img alt="" src="{{asset('cilentlib/images/blog/1.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="blog-content pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content blog-content-overlay pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <p>Adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim</p>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                        <a href="#" class="button extra-small mt-60 text-uppercase">
                                            <span>Read More</span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>  
                            <div class="col-md-4 col-sm-6">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img alt="" src="{{asset('cilentlib/images/blog/2.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="blog-content pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content blog-content-overlay pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <p>Adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim</p>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                        <a href="#" class="button extra-small mt-60 text-uppercase">
                                            <span>Read More</span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>  
                            <div class="col-md-4 hidden-sm">
                                <div class="single-blog rm-0">
                                    <div class="blog-image">
                                        <a href="#">
                                            <img alt="" src="{{asset('cilentlib/images/blog/1.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="blog-content pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                    </div>
                                    <div class="blog-content blog-content-overlay pb-20 text-center">
                                        <div class="date-added mb-20 pt-20"><i class="zmdi zmdi-time mr-10"></i>Date : 26 oct 2016 </div>
                                        <h5><a class="blog-title text-capitalize" href="#">Blog Post Dummy Title</a></h5>
                                        <p>Adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim</p>
                                        <div class="post-info-author mt-30">
                                            <span class="author mr-20">
                                                <i class="zmdi zmdi-account"></i>
                                                By
                                                <a href="#" title="Posts by admin"> A Mollik </a>
                                            </span>
                                            <span class="comments-count mr-20">
                                                <i class="zmdi zmdi-favorite"></i>
                                                20 Likes
                                            </span>
                                            <span class="comments-count">
                                                <i class="zmdi zmdi-comments"></i>
                                                02 Comments
                                            </span>
                                        </div>
                                        <a href="#" class="button extra-small mt-60 text-uppercase">
                                            <span>Read More</span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Blog Area -->
            <!-- Start Brand Area -->
            <div class="brand-area pb-90">
                <div class="container">
                    <div class="row">
                        <div class="brand-list">
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/1.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/2.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/3.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/4.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/5.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/6.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/1.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/2.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/brand/3.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Brand Area -->
            <!-- Start Newsletter Area -->
            <div class="newsletter-area">
                <div class="container">
                    <div class="row">
                        <div class="newsletter-content default-bg clearfix ptb-40">
                            <div class="col-md-offset-2 col-md-3 col-sm-5">
                                <div class="newsletter-title text-white text-uppercase">
                                    <h4>NewsLetter Sign-Up</h4>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-7">
                                <div class="signup-form">
                                    <form class="news-form" method="post" action="{{url('send_demo/')}}">
                                        @csrf
                                        <input type="hidden" name="c_id" value="{{@Auth::guard('customer')->user()->id}}">
                                        <input type="email" placeholder="Enter your email address..." name="email" class="f-form">
                                        <button class="submit text-uppercase" type="submit">subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Newsletter Area -->
        </section>
        <!-- End page content -->
@endsection