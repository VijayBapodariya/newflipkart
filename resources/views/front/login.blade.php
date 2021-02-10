<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from preview.freethemescloud.com/freak-preview/freak/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 11:14:23 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login / Register || Freak</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

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
    <link href="#" data-style="styles" rel="stylesheet">


    <!-- Modernizr JS -->
    <script src="{{asset('cilentlib/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
       <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Wishlist Area -->
            <div class="login-section section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="registered-customers">
                                <div class="section-title text-uppercase mb-40">
                                    <h4>login</h4>
                                </div>
                                <form action="{{url('cust_login/')}}" method="post">
                                    @csrf
                                    <div class="login-account p-30 box-shadow">
                                        <p>If you have an account with us, Please log in.</p>
                                        <input type="text" placeholder="Email Address" name="email" value="{{old('email')}}">
                                        <input type="password" placeholder="Password" name="password">
                                        <input type="checkbox" name="remember">

                                        <button type="submit" class="submit-btn">login</button>

                                        <p><small><a href="{{url('cust/')}}"><h3>New User Register!!!</h3></a></small></p>
                                    </div>
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Wishlist Area -->
        </section>
        <!-- End page content -->
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

</body>


<!-- Mirrored from preview.freethemescloud.com/freak-preview/freak/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 11:14:23 GMT -->
</html>