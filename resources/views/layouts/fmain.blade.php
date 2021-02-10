<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from preview.freethemescloud.com/freak-preview/freak/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 11:11:24 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Freak</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('cilentlib/images/favicon.ico')}}">

    <!-- All css files are included here -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/bootstrap.min.css')}}">
    <!-- This core.css')}} file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/custom.css')}}">

    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{asset('cilentlib/css/style-customizer.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('cilentlib/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <header>
            <div class="header-top-bar white-bg ptb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="header-top">
                                <ul>
                                    <li class="lh-50">
                                        <a href="#" class="pr-20"><i class="zmdi zmdi-search"></i></a>
                                        <div class="header-bottom-search header-top-down header-top-hover lh-35">
                                            <form class="header-search-box" action="#" method="POST">
                                                <div>
                                                    <input type="text" value="" placeholder="Search" autocomplete="off">
                                                    <button class="btn btn-search" type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form>                                             
                                        </div>
                                    </li>
                                    <li class="lh-50">
                                        <a href="#" class="prl-20 text-uppercase">USD</a>
                                        <div class="header-top-down header-top-hover pl-15 lh-35">
                                            <ul>
                                                <li><a href="#">USD</a></li>
                                                <li><a href="#">Uero</a></li>
                                                <li><a href="#">Taka</a></li>
                                                <li><a href="#">Pound</a></li>
                                                <li><a href="#">Rupi</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="lh-50">
                                        <a href="#" class="prl-20 text-uppercase">ENG</a>
                                        <div class="header-top-down header-top-hover header-top-down-lang pl-15 lh-35 lh-35">
                                            <ul>
                                                <li><a href="#">Bengali</a></li>
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">French</a></li>
                                                <li><a href="#">German</a></li>
                                                <li><a href="#">Spanish</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="header-logo text-center">
                                <a href="index.html">
                                    <img alt="" src="{{asset('cilentlib/images/logo/logo.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="header-top header-top-right">
                                <ul>
                                    @if(!empty(Auth::guard('customer')->user()->id))
                                    <li class="lh-50">
                                        <a href="#" class="pr-20 text-uppercase"><img src="{{asset('customer/'.Auth::guard('customer')->user()->image)}}" width="20px" style="border-radius: 50%;"/></a>
                                        <div class="header-top-down header-top-hover pl-15 lh-35">
                                            <ul>
                                                <li><a href="{{url('cust_profile/')}}">My Profile</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="lh-50">
                                        <a href="{{url('/logout')}}" class="prl-20 text-uppercase">Logout</a>
                                    </li>
                                    @else
                                    <li class="lh-50">
                                        <a href="{{url('/log')}}" class="pr-20 text-uppercase">Login</a>
                                    </li>
                                    @endif
                                    <li class="cart-link lh-50">
                                        <a href="{{url('cart/')}}" class="pl-20">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                            <span>{{$cart}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="header-area header-wrapper transparent-header">
                <div class="header-middle-area black-bg">
                    <div class="container">
                        <div class="full-width-mega-dropdown">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav id="primary-menu">
                                        <ul class="main-menu text-center">
                                            <li><a href="{{url('cilent/')}}">Home</a></li>
                                        	@foreach($cdata as $c)
                                            	<li><a href="{{url('cate/'.$c->category_id)}}">{{$c->category_name}}</a>
                                            		<ul class="dropdown header-top-hover ptb-10">
                                            			@foreach($sdata as $s)
                                            				@if($s->category_id == $c->category_id)
	                                                    		<li><a href="{{url('subcate/'.$s->sub_id)}}">{{$s->sub_category_name}}</a></li>
	                                                    	@endif
	                                                    @endforeach
                                                	</ul>
                                            	</li>
                                            @endforeach
                                            <!-- <li class="mega-parent"><a href="#">women</a>
                                                <div class="mega-menu-area header-top-hover p-30">
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Men’s</h2></li>
                                                        <li><a href="shop-full.html">Blazers</a></li>
                                                        <li><a href="shop-full.html">Jackets</a></li>
                                                        <li><a href="shop-full.html">Collections</a></li>
                                                        <li><a href="shop-full.html">T-Shirts</a></li>
                                                        <li><a href="shop-full.html">jens pant’s</a></li>
                                                        <li><a href="shop-full.html">sports shoes</a></li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Women’s</h2></li>
                                                        <li><a href="shop-full.html">Cocktail</a></li>
                                                        <li><a href="shop-full.html">Sunglass</a></li>
                                                        <li><a href="shop-full.html">Evening</a></li>
                                                        <li><a href="shop-full.html">Footwear</a></li>
                                                        <li><a href="shop-full.html">Bootees Bags</a></li>
                                                        <li><a href="shop-full.html">Furniture</a></li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Accessaories</h2></li>
                                                        <li><a href="shop-full.html">Gagets</a></li>
                                                        <li><a href="shop-full.html">Laptop</a></li>
                                                        <li><a href="shop-full.html">Mobile</a></li>
                                                        <li><a href="shop-full.html">Lifestyle</a></li>
                                                        <li><a href="shop-full.html">Gens pant’s</a></li>
                                                        <li><a href="shop-full.html">Sports items</a></li>
                                                    </ul>
                                                    <div class="single-mega-item aside-img">
                                                        <a href="shop-full.html" class="b-img widget-img text-uppercase">
                                                            <img src="{{asset('cilentlib/images/widget/1.jpg')}}" alt="">
                                                            <div class="best">best</div>
                                                            <div class="brand">brand</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li> -->
                                            <!-- <li><a href="#">Blog</a>
                                                <ul class="dropdown header-top-hover ptb-10">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-2.html">Blog 2</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="#">Pages</a>
                                                <div class="mega-menu-area-2 header-top-hover p-30">
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Page List</h2></li>
                                                        <li><a href="404.html">404 page</a></li>
                                                        <li><a href="about.html">About Us</a></li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="compare.html">Compare</a></li>
                                                        <li><a href="contact.html">Contact</a></li>
                                                        <li><a href="login.html">Login</a></li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Page List</h2></li>
                                                        <li><a href="my-account.html">My Account</a></li>
                                                        <li><a href="shop-full.html">Shop Full Wide</a></li>
                                                        <li><a href="shop-grid-left.html">Shop Grid Left</a></li>
                                                        <li><a href="shop-grid-right.html">Shop Grid Right</a></li>
                                                        <li><a href="product-details.html">Product Details</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                    </ul>
                                                </div>
                                            </li> -->
                                            <li><a href="{{url('shop/')}}">Shop</a></li>
                                            <li><a href="{{url('cart/')}}">Cart</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="main-menu text-center">
                                            <li><a href="index.html">Home</a></li>
                                        	@foreach($cdata as $c)
                                            	<li><a href="">{{$c->category_name}}</a>
                                            		<ul class="dropdown header-top-hover ptb-10">
                                            			@foreach($sdata as $s)
                                            				@if($s->category_id == $c->category_id)
	                                                    		<li><a href="blog.html">{{$s->sub_cate}}</a></li>
	                                                    	@endif
	                                                    @endforeach
                                                	</ul>
                                            	</li>
                                            @endforeach
                                            <!-- <li class="mega-parent"><a href="#">women</a>
                                                <div class="mega-menu-area header-top-hover p-30">
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Men’s</h2></li>
                                                        <li><a href="shop-full.html">Blazers</a></li>
                                                        <li><a href="shop-full.html">Jackets</a></li>
                                                        <li><a href="shop-full.html">Collections</a></li>
                                                        <li><a href="shop-full.html">T-Shirts</a></li>
                                                        <li><a href="shop-full.html">jens pant’s</a></li>
                                                        <li><a href="shop-full.html">sports shoes</a></li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Women’s</h2></li>
                                                        <li><a href="shop-full.html">Cocktail</a></li>
                                                        <li><a href="shop-full.html">Sunglass</a></li>
                                                        <li><a href="shop-full.html">Evening</a></li>
                                                        <li><a href="shop-full.html">Footwear</a></li>
                                                        <li><a href="shop-full.html">Bootees Bags</a></li>
                                                        <li><a href="shop-full.html">Furniture</a></li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Accessaories</h2></li>
                                                        <li><a href="shop-full.html">Gagets</a></li>
                                                        <li><a href="shop-full.html">Laptop</a></li>
                                                        <li><a href="shop-full.html">Mobile</a></li>
                                                        <li><a href="shop-full.html">Lifestyle</a></li>
                                                        <li><a href="shop-full.html">Gens pant’s</a></li>
                                                        <li><a href="shop-full.html">Sports items</a></li>
                                                    </ul>
                                                    <div class="single-mega-item aside-img">
                                                        <a href="shop-full.html" class="b-img widget-img text-uppercase">
                                                            <img src="{{asset('cilentlib/images/widget/1.jpg')}}" alt="">
                                                            <div class="best">best</div>
                                                            <div class="brand">brand</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li> -->
                                            <!-- <li><a href="#">Blog</a>
                                                <ul class="dropdown header-top-hover ptb-10">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-2.html">Blog 2</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="#">Pages</a>
                                                <div class="mega-menu-area-2 header-top-hover p-30">
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Page List</h2></li>
                                                        <li><a href="404.html">404 page</a></li>
                                                        <li><a href="about.html">About Us</a></li>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="compare.html">Compare</a></li>
                                                        <li><a href="contact.html">Contact</a></li>
                                                        <li><a href="login.html">Login</a></li>
                                                    </ul>
                                                    <ul class="single-mega-item">
                                                        <li><h2 class="mega-menu-title mb-15">Page List</h2></li>
                                                        <li><a href="my-account.html">My Account</a></li>
                                                        <li><a href="shop-full.html">Shop Full Wide</a></li>
                                                        <li><a href="shop-grid-left.html">Shop Grid Left</a></li>
                                                        <li><a href="shop-grid-right.html">Shop Grid Right</a></li>
                                                        <li><a href="product-details.html">Product Details</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                    </ul>
                                                </div>
                                            </li> -->
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
            <!-- Mobile Menu End -->            
        </header>
        <!-- End of header area -->
        @yield('content')
        <!-- Start footer area -->
        <footer id="footer" class="footer-area">
            <div class="footer-top-area gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-widget">
                                <div class="footer-widget-img pb-30">
                                    <a href="#">
                                        <img src="{{asset('cilentlib/images/logo/logo-2.png')}}" alt="">
                                    </a>
                                </div>
                                <ul class="toggle-footer text-white">
                                    <li class="mb-30 pl-45">
                                        <i class="zmdi zmdi-pin"></i>
                                        <p>House No 08, Road No 08, <br>
                                        Din Bari, Dhaka, Bangladesh</p>
                                    </li>
                                    <li class="mb-30 pl-45">
                                        <i class="zmdi zmdi-email"></i>
                                        <p>Username@gmail.com <br>
                                        Damo@gmail.com</p>
                                    </li>
                                    <li class="pl-45">
                                        <i class="zmdi zmdi-phone"></i>
                                        <p>+660 256 24857<br>
                                        +660 256 24857</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="text-white footer-information">
                                <h4 class="pb-40 m-0 text-uppercase">information</h4>
                                <ul class="footer-menu">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Hot Sale</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>best Seller</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Suppliers</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Our Store</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Deal of The Day</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="text-white footer-account">
                                <h4 class="pb-40 m-0 text-uppercase">MY ACCOUNT</h4>
                                <ul class="footer-menu">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>My Account</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Personal Information</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Discount</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Orders History</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i>Payment</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="text-white footer-about-us">
                                <h4 class="pb-40 m-0 text-uppercase">about us</h4>
                                <p>Lorem ipsum dolor sit amet, consecteir our adipisicing elit, sed do eiusmod tempor the incididunt ut labore et dolore magnaa liqua. Ut enim minimn.</p>
                                <ul class="footer-social-icon">
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="footer-bottom black-bg ptb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="copyright text-white">
                                <p>Copyright &copy; 2016 <a href="#">Freaktheme.</a> All Right Reserved.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-img">
                                <img src="{{asset('cilentlib/images/payment.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </footer>
        <!-- End footer area -->
        <!--Quickview Product Start -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="single-product-image">
                                    <div id="product-img-content">
                                        <div id="my-tab-content" class="tab-content mb-20">
                                            <div class="tab-pane b-img active" id="view1">
                                                <a class="venobox" href="images/product/product-details/1.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/1.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="tab-pane b-img" id="view2">
                                                <a class="venobox" href="images/product/product-details/2.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/2.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="tab-pane b-img" id="view3">
                                                <a class="venobox" href="images/product/product-details/3.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/3.jpg')}}" alt=""></a>
                                            </div>
                                            <div class="tab-pane b-img" id="view4">
                                                <a class="venobox" href="images/product/product-details/4.jpg')}}" data-gall="gallery" title=""><img src="{{asset('cilentlib/images/product/product-details/4.jpg')}}" alt=""></a>
                                            </div>
                                        </div>
                                        <div id="viewproduct" class="nav nav-tabs product-view bxslider" data-tabs="tabs">
                                            <div class="pro-view b-img active"><a href="#view1" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-1.jpg')}}" alt=""></a></div>
                                            <div class="pro-view b-img"><a href="#view2" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-2.jpg')}}" alt=""></a></div>
                                            <div class="pro-view b-img"><a href="#view3" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-3.jpg')}}" alt=""></a></div>
                                            <div class="pro-view b-img"><a href="#view4" data-toggle="tab"><img src="{{asset('cilentlib/images/product/product-details/s-4.jpg')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="product-details-content">
                                    <div class="product-content text-uppercase">
                                        <a href="product-details.html" title="Slim Shirt With Stretch">Slim Shirt With Stretch</a>
                                        <div class="rating-icon pb-20 mt-10">
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star"></i>
                                            <i class="zmdi zmdi-star-half"></i>
                                            <i class="zmdi zmdi-star-half"></i>
                                        </div>
                                        <div class="product-price pb-20">
                                            <span class="new-price">£ 185.00</span>
                                            <span class="old-price">£ 200.00</span>
                                        </div>
                                    </div>
                                    <div class="product-view pb-20">
                                        <h4 class="product-details-tilte text-uppercase">overview</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. luptate. </p>
                                    </div>
                                    <div class="product-size text-uppercase pb-30">
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
                                        <div class="product-color text-uppercase pb-30">
                                            <h4 class="product-details-tilte text-uppercase pb-10">color</h4>
                                            <ul>
                                                <li class="color-1"><a href="#"></a></li>
                                                <li class="color-2"><a href="#"></a></li>
                                                <li class="color-3"><a href="#"></a></li>
                                                <li class="color-4"><a href="#"></a></li>
                                            </ul>
                                        </div> 
                                        <div class="pull-left" id="quantity-wanted">
                                            <h4 class="product-details-tilte text-uppercase pb-10">quantity</h4>
                                            <input type="number" value="1">  
                                        </div>                                  
                                    </div>
                                    <div class="product-action-shop text-center mb-30">
                                        <a href="#" title="Quick view">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <a href="#" title="Add to cart">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </a>
                                        <a href="#" title="Add to Wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                        </a>
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
                                <!-- .product-info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Quickview Product-->     
        <!--style-customizer start -->
        <div class="style-customizer closed">
            <div class="buy-button">
                <a href="index.html" class="customizer-logo"><img src="{{asset('cilentlib/images/logo/logo.png')}}" alt="Theme Logo"></a>
                <a class="opener" href="#"><i class="zmdi zmdi-settings"></i></a>
            </div>
            <div class="clearfix content-chooser">
                <h3>Layout Options</h3>
                <p>Which layout option you want to use?</p>
                <ul class="layoutstyle clearfix">
                    <li class="wide-layout selected" data-style="wide" title="wide"> Wide </li>
                    <li class="boxed-layout" data-style="boxed" title="boxed"> Boxed </li>
                </ul>
                <h3>Color Schemes</h3>
                <p>Which theme color you want to use? Select from here.</p>
                <ul class="styleChange clearfix">
                    <li class="skin-default selected" title="skin-default" data-style="skin-default" ></li>
                    <li class="skin-green" title="green" data-style="skin-green"></li>
                    <li class="skin-purple" title="purple" data-style="skin-purple"></li>
                    <li class="skin-blue" title="blue" data-style="skin-blue"></li>
                    <li class="skin-cyan" title="cyan" data-style="skin-cyan"></li>
                    <li class="skin-amber" title="amber" data-style="skin-amber"></li>
                    <li class="skin-blue-grey" title="blue-grey" data-style="skin-blue-grey"></li>
                    <li class="skin-teal" title="teal" data-style="skin-teal"></li>
                </ul>
                <h3>Background Patterns</h3>
                <p>Which background pattern you want to use?</p>
                    <ul class="patternChange clearfix">
                    <li class="pattern-1" data-style="pattern-1" title="pattern-1"></li>
                    <li class="pattern-2" data-style="pattern-2" title="pattern-2"></li>
                    <li class="pattern-3" data-style="pattern-3" title="pattern-3"></li>
                    <li class="pattern-4" data-style="pattern-4" title="pattern-4"></li>
                    <li class="pattern-5" data-style="pattern-5" title="pattern-5"></li>
                    <li class="pattern-6" data-style="pattern-6" title="pattern-6"></li>
                    <li class="pattern-7" data-style="pattern-7" title="pattern-7"></li>
                    <li class="pattern-8" data-style="pattern-8" title="pattern-8"></li>
                </ul>
                <h3>Background Images</h3>
                <p>Which background image you want to use?</p>
                <ul class="patternChange main-bg-change clearfix">
                    <li class="main-bg-1" data-style="main-bg-1" title="Background 1"> <img src="{{asset('cilentlib/images/customizer/bodybg/01.jpg')}}" alt=""></li>
                    <li class="main-bg-2" data-style="main-bg-2" title="Background 2"> <img src="{{asset('cilentlib/images/customizer/bodybg/02.jpg')}}" alt=""></li>
                    <li class="main-bg-3" data-style="main-bg-3" title="Background 3"> <img src="{{asset('cilentlib/images/customizer/bodybg/03.jpg')}}" alt=""></li>
                    <li class="main-bg-4" data-style="main-bg-4" title="Background 4"> <img src="{{asset('cilentlib/images/customizer/bodybg/04.jpg')}}" alt=""></li>
                    <li class="main-bg-5" data-style="main-bg-5" title="Background 5"> <img src="{{asset('cilentlib/images/customizer/bodybg/05.jpg')}}" alt=""></li>
                    <li class="main-bg-6" data-style="main-bg-6" title="Background 6"> <img src="{{asset('cilentlib/images/customizer/bodybg/06.jpg')}}" alt=""></li>
                    <li class="main-bg-7" data-style="main-bg-7" title="Background 7"> <img src="{{asset('cilentlib/images/customizer/bodybg/07.jpg')}}" alt=""></li>
                    <li class="main-bg-8" data-style="main-bg-8" title="Background 8"> <img src="{{asset('cilentlib/images/customizer/bodybg/08.jpg')}}" alt=""></li>
                </ul>
                <ul class="resetAll">
                    <li><a class="button button-border button-reset" href="#">Reset All</a></li>
                </ul>
            </div>
        </div>
        <!--style-customizer end -->           
    </div>
    <!-- Body main wrapper end -->    

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{asset('cilentlib/js/vendor/jquery-3.1.1.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{asset('cilentlib/js/bootstrap.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('cilentlib/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('cilentlib/js/main.js')}}"></script>
    @yield('custom_js')
</body>


<!-- Mirrored from preview.freethemescloud.com/freak-preview/freak/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 11:13:56 GMT -->
</html>