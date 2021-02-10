@extends('layouts.fmain')

@section('content')
        <!-- Start Breadcrumbs Area -->
        <div class="breadcrumbs-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumbs text-center text-white">
                           <h3 class="text-uppercase">product details</h3> 
                           <ul class="breadcrumbs-list">
                                <li>
                                    <a href="index.html" title="Return to Home">Home</a>
                                </li>
                                <li>/</li>
                                <li>product details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Of Breadcrumbs Area -->
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Shop Full Grid View -->
            <div class="product-details-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                             <div class="single-product-image">
                                <div id="product-img-content">
                                    <div id="my-tab-content" class="tab-content mb-30">
                                    	@php
                                    		foreach($sidata['product_image'] as $p)
                                    		{
                                    			$t=$p['product_image_id'];
                                    			break;
                                    		}

                                    	@endphp
                                    	@foreach($sidata['product_image'] as $p)
                                        <div class="tab-pane b-img {{($p['product_image_id']==$t) ? 'active' :''}}" id="view{{$p['product_image_id']}}">
                                            <a class="venobox" href="" data-gall="gallery" title=""><img src="{{asset('product_image/'.$p['product_image_name'])}}" alt=""></a>
                                        </div>
                                        @endforeach
                                       <!--  <div class="tab-pane b-img" id="view2">
                                            <a class="venobox" href="images/product/product-details/2.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/2.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="tab-pane b-img" id="view3">
                                            <a class="venobox" href="images/product/product-details/3.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/3.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="tab-pane b-img" id="view4">
                                            <a class="venobox" href="images/product/product-details/4.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/4.jpg')}}" alt=""></a>
                                        </div> -->
                                    </div>
                                    <div id="viewproduct" class="nav nav-tabs product-view bxslider" data-tabs="tabs">
                                    	@foreach($sidata['product_image'] as $p)
                                        <div class="pro-view b-img1 "><a href="#view{{$p['product_image_id']}}" data-toggle="tab"><img src="{{asset('product_image/'.$p['product_image_name'])}}" alt="" ></a></div>
                                        @endforeach
                                   <!--      <div class="pro-view b-img"><a href="#view2" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-2.jpg')}}" alt=""></a></div>
                                        <div class="pro-view b-img"><a href="#view3" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-3.jpg')}}" alt=""></a></div>
                                        <div class="pro-view b-img"><a href="#view4" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-4.jpg')}}" alt=""></a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-details-content">
                                <div class="product-content text-uppercase">
                                    <a title="Slim Shirt With Stretch" href="product-details.html">{{$sidata->product_name}}</a>
                                    <div class="rating-icon pb-30 mt-10">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                    </div>
                                    <div class="product-price pb-30">
                                        <span class="new-price">£ {{$sidata->product_price}}.00</span>
                                        <span class="old-price">£ 200.00</span>
                                    </div>
                                </div>
                                <div class="product-view pb-30">
                                    <h4 class="product-details-tilte text-uppercase">overview</h4>
                                    <p>{{$sidata->product_description}}</p>
                                </div>
                                    <div class="product-size text-uppercase pb-40">
                                        <h4 class="product-details-tilte text-uppercase pb-10">size</h4>
                                        <ul>
                                            <li><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                            <li><a href="#">xxl</a></li>
                                        </ul>
                                    </div>
                                    <div class="product-attributes clearfix">
                                        <div class="product-color text-uppercase pb-40">
                                            <h4 class="product-details-tilte text-uppercase pb-10">color</h4>
                                            <ul>
                                                <li class="color-1"><a href="#"></a></li>
                                                <li class="color-2"><a href="#"></a></li>
                                                <li class="color-3"><a href="#"></a></li>
                                                <li class="color-4"><a href="#"></a></li>
                                            </ul>
                                        </div> 
                                        @php
                                        $f=0;
                                        foreach($cadata as $c){
                                            if($c->cart_product_id == $sidata->product_id)
                                            {
                                                $f=1;
                                                break;
                                            }
                                        } 
                                        @endphp
                                        <form method="post" enctype="multipart/form-data" action="{{url('add_cart')}}">
                                            @csrf
                                            <input type="hidden" name="cart_product_id" value="{{$sidata->product_id}}">
                                            <input type="hidden" name="cart_customer_id" value="@if(isset(Auth::guard('customer')->user()->id)){{Auth::guard('customer')->user()->id}}@endif">
                                            <input type="hidden" name="cart_product_name" value="{{$sidata->product_name}}">
                                            <div id="quantity-wanted" class="pull-left">
                                                <h4 class="product-details-tilte text-uppercase pb-10">quantity</h4>
                                                <input type="number" class="cart-plus-minus-box" name="cart_product_qty" value="1">    
                                            </div>
                                            <input type="hidden" name="cart_product_price" value="{{$sidata->product_price}}">
                                            @foreach($sidata['product_image'] as $p)
                                                @if($p['product_image_id']==$t)
                                                    <input type="hidden" name="image" value="{{$p['product_image_name']}}">
                                                @endif
                                            @endforeach
                                            @if($f == 0)
                                            <input type="submit" class="button small mb-20" name="submit" value="Add To Cart">
                                            @else
                                            <input type="button" class="button small mb-20" name="submit" value="Added Into Cart">
                                            @endif

                                        </form>
                                    </div>
                                <div class="socialsharing-product">
                                    <h4 class="product-details-tilte text-uppercase pb-10">share this on</h4>
                                    <button type="button"><i class="zmdi zmdi-facebook"></i></button>
                                    <button type="button"><i class="zmdi zmdi-instagram"></i></button>
                                    <button type="button"><i class="zmdi zmdi-rss"></i></button>
                                    <button type="button"><i class="zmdi zmdi-twitter"></i></button>
                                    <button type="button"><i class="zmdi zmdi-pinterest"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-details-content pt-90">
                                <div class="p-details-tab">
                                    <ul class="nav nav-tabs text-uppercase mb-20" role="tablist">
                                        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
                                        <li role="presentation"><a href="#tag" aria-controls="tag" role="tab" data-toggle="tab">Product Tags</a></li>
                                    </ul>                             
                                </div>
                                <div class="clearfix"></div>
                                <div class="tab-content review">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to and    what we like best, every pleasure is to be welcomed and every pain avoided. But in cetain circumstances and owing to the claims of duty or the obligations of busness it will frequently occur that pleasures have to be repudiatedTemporibus recaae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus to a maiores maiores alias consequatur aut  endis doloriu asperiores repellat.maiores what we like best, every pleasure is to be welcomed and every pain avoided. But in cetain circumstances and owing to the claims.</p>
                                        <p>maiores alias consequatur aut  endis doloriu asperiores repellat.maiores what we like best, every pleasure is to be welcomed and every pain avoided. But in cetain circumstances and owing to the claims of duty or the obligations of busness it will frequently occur that pleasures have to be repudiatedTemporibus recaae. Itaque earum rerum hic tenetur a sapiente delectus.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <table class="table-data-sheet">
                                            <tbody>
                                                <tr class="odd">
                                                    <td>Compositions</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr class="even">
                                                    <td>Styles</td>
                                                    <td>Casual</td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>Properties</td>
                                                    <td>Short Sleeve</td>
                                                </tr>
                                            </tbody>
                                       </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tag">
                                        <div id="product-comments-block-tab">
                                            <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Shop Full Grid View -->
            <!-- Start Related Product Area -->
            <div class="related-product pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="related-product-title text-uppercase mb-40">
                                <h4>related Products</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="single-product">
                                <div class="product-img-content mb-20">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="{{asset('cilentlib/images/product/1.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="product-action text-center">
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a title="Add to cart" href="#">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                        <a title="Add to Wishlist" href="#">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center text-uppercase">
                                    <a title="Slim Shirt With Stretch" href="product-details.html">Slim Shirt With Stretch</a>
                                    <div class="rating-icon">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="new-price">£ 185.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="single-product">
                                <div class="product-img-content mb-20">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="{{asset('cilentlib/images/product/2.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="product-action text-center">
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a title="Add to cart" href="#">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                        <a title="Add to Wishlist" href="#">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center text-uppercase">
                                    <a title="Slim Shirt With Stretch" href="product-details.html">Slim Shirt With Stretch</a>
                                    <div class="rating-icon">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="new-price">£ 185.00</span>
                                        <span class="old-price">£ 200.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="single-product">
                                <div class="product-img-content mb-20">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="{{asset('cilentlib/images/product/3.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="product-action text-center">
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a title="Add to cart" href="#">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                        <a title="Add to Wishlist" href="#">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center text-uppercase">
                                    <a title="Slim Shirt With Stretch" href="product-details.html">Slim Shirt With Stretch</a>
                                    <div class="rating-icon">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="new-price">£ 185.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 hidden-sm">
                            <div class="single-product">
                                <div class="product-img-content mb-20">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="{{asset('cilentlib/images/product/4.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="product-action text-center">
                                        <a href="#" title="Quick view" data-toggle="modal" data-target="#productModal">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a title="Add to cart" href="#">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                        <a title="Add to Wishlist" href="#">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content text-center text-uppercase">
                                    <a title="Slim Shirt With Stretch" href="product-details.html">Slim Shirt With Stretch</a>
                                    <div class="rating-icon">
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                        <i class="zmdi zmdi-star-half"></i>
                                    </div>
                                    <div class="product-price">
                                        <span class="new-price">£ 185.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Related Product Area -->

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
        </section>
        <!-- End page content -->
@endsection