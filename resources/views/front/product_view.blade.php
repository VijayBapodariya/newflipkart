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
                                    <input type="submit" class="zmdi zmdi-shopping-cart" name="submit" value="Add To Cart">
                                </form>
                            </div>
                        </div>
                        <div class="product-content text-center text-uppercase">
                            <a href="product-details.html" title="Slim Shirt With Stretch">{{$pa['product_name']}}</a>
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
                                    <input type="submit" class="zmdi zmdi-shopping-cart" name="submit" value="Add To Cart">
                                </form>
                            </div>
                    </div>

                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <div class="product-content text-uppercase mt-50">
                            <a title="Men’s Blue Short T-Shirt" href="product-details.html">{{$pa['product_name']}}</a>
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