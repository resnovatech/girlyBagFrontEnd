<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Login">

    <title>Login</title>
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('/')}}public/admin/assets/images/logo.png">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/main.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/authentication.css">
    <link rel="stylesheet" href="{{asset('/')}}public/admin/assets/css/color_skins.css">
    <style type="text/css">
        @font-face {
  font-family: gill;
  src: url('{{ asset('public/admin/font/GillSans.otf') }}');
}
@font-face {
  font-family: gothic;
  src: url('{{ asset('public/admin/font/gothic/gothic.ttf') }}');
}
    </style>
</head>

<body class="theme-orange" style="font-family: gill;">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="{{asset('/')}}public/admin/assets/images/logo.png" alt="Nexa" style="height: 50px;width: 230px;"></div>
                        <h1>Login</h1>
                        <!--<ul class="list-unstyled l-social">
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook-box"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-linkedin-box"></i></a></li>                            
                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                        </ul>-->
                    </div>                        
                </div>
                <form class="col-lg-12" id="sign_in" method="POST" action="{{route('admin.login.submit')}}">
                    @csrf
                    <h5 class="title">Sign in to your Account</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email">
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <div>
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-cyan">
                        <label for="rememberme">Remember Me</label>
                    </div>                        
               
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-raised btn-primary waves-effect">SIGN IN</button>
                    <!--<a href="sign-up.html" class="btn btn-raised btn-default waves-effect">SIGN UP</a>-->                        
                </div>
                 </form>
                <!--<div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                </div>-->                    
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('/')}}public/admin/assets/bundles/libscripts.bundle.js"></script>    
<script src="{{asset('/')}}public/admin/assets/bundles/vendorscripts.bundle.js"></script>
<script src="{{asset('/')}}public/admin/assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>