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
                                    <h4>New User Register</h4>
                                </div>
                                <form action="{{url('cust/')}}" method="post" enctype="multipart/form-data">
                                	@csrf
                                    <div class="login-account p-30 box-shadow">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="name" placeholder="Enter Name">
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="email" name="email" placeholder="Enter Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="password" name="password" placeholder="Enter Password">
                                            </div>
                                            <div class="col-sm-12">
                                            	<span>Gender</span>
                                                <input type="radio" name="gender" value="male">Male
                                                <input type="radio" name="gender" value="female">female
                                            </div>
                                            <div class="col-sm-12">
                                            	<span>Hobby</span>
                                                <input type="checkbox" name="hobby[]" value="reading">Reading
                                                <input type="checkbox" name="hobby[]" value="dancing">Dancing
                                                <input type="checkbox" name="hobby[]" value="travelling">Travelling
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="date" name="dob">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea name="address" style="background: transparent;" placeholder="Enter Address"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <select class="custom-select" name="state" id="state_id">
                                                    <option value="-1">----Select State----</option>
                                                	@foreach($sa as $s)
                                                    	<option value="{{$s->state_id}}">{{$s->state_name}}</option>
                                                	@endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                                <select class="custom-select" name="city" id="city_id">
                                                    <option value="-1">----Select City----</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-12">
                                            	<input type="file" style="border:none; box-shadow:none;" name="profile[]">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button value="register" type="submit" class="submit-btn mt-20">Register</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="reset" class="submit-btn mt-20">Clear</button>
                                            </div>
                                        </div>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#state_id').change(function(){
                    //alert($(this).val());
                    //alert($('input[name="_token"]').val());
                    var cat_id = $(this).val();
                    var token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/get_city')}}",
                        type:'POST',    
                        data:{
                            cat:cat_id,
                            _token:token
                        },
                        success:function(res)
                        {
                            $('#city_id').html(res);
                        }

                    });
            });
        });
    </script>

</body>


<!-- Mirrored from preview.freethemescloud.com/freak-preview/freak/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 11:14:23 GMT -->
</html>