<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Register - Cleo Web Driver</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="{{asset('img/icons/cleologistic.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('pluginregisteradmin/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('pluginregisteradmin/images/img-01.png')}}" alt="IMG">
                </div>
                
                <form class="login100-form validate-form" method="POST" novalidate action="{{ route('admin.register') }}" enctype="multipart/form-data">
                    <span class="login100-form-title">
                        Admin Register
                    </span>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Name is required">
                        <input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('name'))
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Image is required">
                        <input class="input100" type="file" name="profile_img" placeholder="Image" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-image" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('profile_img'))
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $errors->first('profile_img') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Email is required">
                        <input class="input100" type="Email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('email'))
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        @if ($errors->has('password'))
                        <span class="invalid-tooltip" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                    
                    <div class="text-center p-t-15">
                        <a class="txt2" href="{{route('admin.login')}}">
                            Sign in your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
    <!--===============================================================================================-->	
    <script src="{{asset('pluginregisteradmin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginregisteradmin/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('pluginregisteradmin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginregisteradmin/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginregisteradmin/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginregisteradmin/js/main.js')}}"></script>
    
</body>
</html>