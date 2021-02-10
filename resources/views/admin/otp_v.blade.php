<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('adminlib/assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminlib/assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminlib/assets/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('adminlib/assets/css/main.css')}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('adminlib/assets/css/pages/auth-light.css')}}" rel="stylesheet" />
</head>

{{Session::get('otp')}}
<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.html">AdminCAST</a>
        </div>
         <form method="POST" action="{{url('otp/')}}">
                        @csrf
                        @php 
                            $o_otp = Session::get('otp');
                            $email = Session::get('email');
                        @endphp
            <h2 class="login-title">Otp Verify</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    {{Session::get('msg')}}
                    <input id="email" type="text" class="form-control" name="otp" required autocomplete="email" placeholder="Enter Your Otp" autofocus>
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="o_otp" value="{{$o_otp}}">   
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Otp Verify</button>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{asset('adminlib/assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('adminlib/assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('adminlib/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset('adminlib/assets/vendors/jquery-validation/dist/jquery.validate.min.js')}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('adminlib/assets/js/app.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>