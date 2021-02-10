@extends('layouts.fmain')

@section('content')
<!-- Start Breadcrumbs Area -->
        <div class="breadcrumbs-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs text-center text-white">
                           <h3 class="text-uppercase" style="color: black;">Shop</h3> 
                           <ul class="breadcrumbs-list">
                                <li>
                                    <a href="index.html" title="Return to Home" style="color: black;">Home</a>
                                </li>
                                <li>/</li>
                                <li>shop grid left sidebar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Breadcrumbs Area -->
        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">
            <!-- Start Shop Left Side Bar -->
            <div class="shop-left-side-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9 col-sm-push-3">
                            <!-- Start Shop Full Grid View -->
                            <div class="shop-view-area mb-40">
                                <div class="row">
                                    <div class="col-md-3 col-sm-2 col-xs-4">
                                        <div class="shop-tab-pill">
                                            <ul>
                                                <li class="active"><a data-toggle="pill" href="#home"><i class="zmdi zmdi-apps"></i><span></span></a></li>
                                                <li><a data-toggle="pill" href="#menu1"><i class="zmdi zmdi-view-list"></i><span></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-8">
                                        <div class="shop-tab-pill">
                                            <div class="show-label text-center">
                                                <label class="text-uppercase">Sort by : </label>
                                                <select>
                                                    <option selected="selected" value="position">Position</option>
                                                    <option value="Name">Name</option>
                                                    <option value="Price">Price</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 hidden-xs">
                                        <div class="shop-pagination">
                                            <ul>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 hidden-xs">
                                        <div class="shop-tab-pill show">
                                            <div class="show-label text-center">
                                                <label class="text-uppercase">showing </label>
                                                <select>
                                                    <option selected="selected" value="position">9</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Shop Full Grid View -->
                            <!-- Start Product List -->
                            <div class="product-list-tab" id="proid">
                                <div class="row">
                                    <div class="product-list tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                            	@foreach($pdata as $pa)
							                        @php
							                    			foreach($pa['product_image'] as $p)
							                    			{
							                    				$t=$p['product_image_id'];
							                    				break;
							                    			}
							                        @endphp 
                                                <div class="col-md-4 single-product mb-40">
                                                    <div class="product-img-content mb-20">
                                                        <div class="product-img">
                                                            <a href="product-details.html">
                                                         		@foreach($pa['product_image'] as $img)
                                                         			@if($img['product_image_id'] == $t)
                                                                <img src="{{asset('product_image/'.$img['product_image_name'])}}" alt="">
                                                                	@endif
                                                                @endforeach
                                                            </a>
                                                        </div>
                                                        @php
                                                        $f=0;
                                                        foreach($cadata as $c){
                                                            if($c->cart_product_id == $pa['product_id'])
                                                            {
                                                                $f=1;
                                                                break;
                                                            }
                                                        } 
                                                        @endphp
                                                        <div class="product-action text-center">
                                                        	<form method="post" enctype="multipart/form-data" action="{{url('add_cart')}}">
					                                            @csrf
					                                            <input type="hidden" name="cart_product_id" value="{{$pa['product_id']}}">
					                                            <input type="hidden" name="cart_customer_id" value="@if(isset(Auth::guard('customer')->user()->id)){{Auth::guard('customer')->user()->id}}@endif">
					                                            <input type="hidden" name="cart_product_name" value="{{$pa['product_name']}}">
					                                            <div id="quantity-wanted" class="pull-left"> 
					                                                <input type="hidden" class="cart-plus-minus-box" name="cart_product_qty" value="1">    
					                                            </div>
					                                            <input type="hidden" name="cart_product_price" value="{{$pa['product_price']}}">
					                                            @foreach($pa['product_image'] as $p)
					                                                @if($p['product_image_id']==$t)
					                                                    <input type="hidden" name="image" value="{{$p['product_image_name']}}">
					                                                @endif
					                                            @endforeach
                                                                @if($f == 0)
                                                                <input type="submit" class="zmdi zmdi-shopping-cart" name="submit" value="Add To Cart">
                                                                @else
                                                                <input type="button" class="zmdi zmdi-shopping-cart" name="submit" value="Add">
                                                                @endif
					                                        </form>
                                                        </div>
                                                    </div>
                                                    <div class="product-content text-center text-uppercase">
                                                        <a href="{{url('single_product/'.$pa['product_id'])}}" title="Slim Shirt With Stretch">{{$pa['product_name']}}</a>
                                                        <div class="rating-icon">
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star-half"></i>
                                                            <i class="zmdi zmdi-star-half"></i>
                                                        </div>
                                                        <div class="product-price">
                                                            <span class="new-price">£ {{$pa['product_price']}}.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="menu1">
                                            @foreach($pdata as $pa)
							                    @php
					                    			foreach($pa['product_image'] as $p)
					                    			{
					                    				$t=$p['product_image_id'];
					                    				break;
					                    			}
						                        @endphp 
                                            <div class="single-product mb-30 clearfix">
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                    <div class="product-img">
                                                        <a href="product-details.html">
                                                            @foreach($pa['product_image'] as $img)
                                                         			@if($img['product_image_id'] == $t)
                                                                <img src="{{asset('product_image/'.$img['product_image_name'])}}" alt="">
                                                                	@endif
                                                            @endforeach
                                                        </a>
                                                    </div>
                                                    @php
                                                    $z=0;
                                                    foreach($cadata as $c){
                                                        if($c->cart_product_id == $pa['product_id'])
                                                        {
                                                            $z=1;
                                                            break;
                                                        }
                                                    } 
                                                    @endphp
                                                    <div class="product-action text-center">
                                                        	<form method="post" enctype="multipart/form-data" action="{{url('add_cart')}}">
					                                            @csrf
					                                            <input type="hidden" name="cart_product_id" value="{{$pa['product_id']}}">
					                                            <input type="hidden" name="cart_customer_id" value="@if(isset(Auth::guard('customer')->user()->id)){{Auth::guard('customer')->user()->id}}@endif">
					                                            <input type="hidden" name="cart_product_name" value="{{$pa['product_name']}}">
					                                            <div id="quantity-wanted" class="pull-left"> 
					                                                <input type="hidden" class="cart-plus-minus-box" name="cart_product_qty" value="1">    
					                                            </div>
					                                            <input type="hidden" name="cart_product_price" value="{{$pa['product_price']}}">
					                                            @foreach($pa['product_image'] as $p)
					                                                @if($p['product_image_id']==$t)
					                                                    <input type="hidden" name="image" value="{{$p['product_image_name']}}">
					                                                @endif
					                                            @endforeach
                                                                @if($z == 0)
                                                                <input type="submit" class="zmdi zmdi-shopping-cart" name="submit" value="Add To Cart">
                                                                @else
                                                                <input type="button" class="zmdi zmdi-shopping-cart" name="submit" value="Add">
                                                                @endif
					                                        </form>
                                                        </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-7 col-md-8">
                                                    <div class="product-content text-uppercase mt-50">
                                                        <a title="Men’s Blue Short T-Shirt" href="{{url('single_product/'.$pa['product_id'])}}">{{$pa['product_name']}}</a>
                                                        <div class="rating-icon ptb-10">
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star-half"></i>
                                                            <i class="zmdi zmdi-star-half"></i>
                                                        </div>
                                                        <div class="product-price pb-10">
                                                            <span class="new-price">£ {{$pa['product_price']}}.00</span>
                                                            <span class="old-price">£ 45.00</span>
                                                        </div>
                                                        <p>{{$pa['product_description']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Product List -->        
                            <!-- Start Shop Full Grid View -->
                            <div class="shop-view-area">
                                <div class="row">
                                    <div class="col-md-3 col-sm-2 col-xs-4">
                                        <div class="shop-tab-pill">
                                            <ul>
                                                <li class="active"><a data-toggle="pill" href="#home"><i class="zmdi zmdi-apps"></i><span></span></a></li>
                                                <li><a data-toggle="pill" href="#menu1"><i class="zmdi zmdi-view-list"></i><span></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-8">
                                        <div class="shop-tab-pill">
                                            <div class="show-label text-center">
                                                <label class="text-uppercase">Sort by : </label>
                                                <select>
                                                    <option selected="selected" value="position">Position</option>
                                                    <option value="Name">Name</option>
                                                    <option value="Price">Price</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 hidden-xs">
                                        <div class="shop-pagination">
                                            <ul>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 hidden-xs">
                                        <div class="shop-tab-pill show">
                                            <div class="show-label text-center">
                                                <label class="text-uppercase">showing </label>
                                                <select>
                                                    <option selected="selected" value="position">9</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Shop Full Grid View -->                  
                        </div>
                        <form method="post" action="{{url('search_product')}}" id="filterAll">
                        	@csrf
	                        <div class="col-xs-12 col-sm-3 col-sm-pull-9">
	                            <div class="aside-list">
	                                <aside class="single-aside mb-35">
	                                    <h4 class="aside-title text-uppercase pb-20 m-0">Categories</h4>
	                                    <div id="cat-treeview" class="product-cat">
	                                        <ul class="treeview">
	                                        	@foreach($cdata as $c)
	                                            <li class="closed"><a href="#">{{$c->category_name}}</a>
	                                                <ul>
	                                        			@foreach($sdata as $s)
	                                        				@if($s->category_id == $c->category_id)
	                                                    	<li><a href="#">{{$s->sub_category_name}}</a>
	                                                        <!-- <ul>
	                                                            <li><a href="#">LCD TV</a></li>
	                                                            <li><a href="#">LED TV</a></li>
	                                                            <li><a href="#">Plasma TV</a></li>
	                                                            <li><a href="#">Curved TV</a></li>
	                                                        </ul> -->
	                                                    	</li>
	                                                    	@endif
	                                            		@endforeach
	                                                </ul>
	                                            </li>
	                                            @endforeach
	                                        </ul>
	                                    </div>
	                                </aside>
	                                <aside class="single-aside mb-35">
	                                    <h4 class="aside-title text-uppercase pb-20 m-0">price</h4>
	                                    <div class="price-filter mt-10">
	                                        <div class="price-slider-amount mb-10">
	                                            <label>You range</label>
	                                            <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
	                                        </div>
	                                        <div id="slider-range"></div>
	                                    </div>
	                                </aside>
	                                @foreach($ve as $k=>$v)
	                                <aside class="single-aside product-cat mb-40">
	                                    <h4 class="aside-title text-uppercase pb-20 m-0">{{$k}}</h4>
	                                    @foreach($v as $value)
	                                    <ul class="text-uppercase">
	                                        <li>
	                                        	<input type="checkbox" name="{{$k}}[]" value="{{$value['variation_id']}}" class="demo">
	                                        	<a href="#">{{$value['variation_name']}}</a>
	                                        </li>
	                                    </ul>
	                                    @endforeach
	                                </aside> 
	                                @endforeach    
	                            </div>
	                        </div>
        				</form>
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
                                    <form class="news-form" action="#">
                                        <input type="text" placeholder="Enter your email address..." class="f-form">
                                        <button class="submit text-uppercase">subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Newsletter Area -->
        </div>
        <!-- End page content -->
@endsection

@section('custom_js')

	<script type="text/javascript">
		$(document).ready(function(){
			//alert();
			$('.demo').click(function(){
				$.ajax({
					url:$('#filterAll').attr('action'),
					type:'POST',
					data:$('#filterAll').serialize(),
					success:function(res)
					{
							$('#proid').html(res);
					}
				});
			});
		});
	</script>
@endsection