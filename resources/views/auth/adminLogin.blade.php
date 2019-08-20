<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin - Cleo Web Driver</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('img/icons/cleologistic.ico')}}"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('pluginloginadmin/css/main.css')}}">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('pluginloginadmin/images/bg-01.jpg')}}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="{{ route('admin.login') }}">
					@csrf
					<span class="login100-form-title p-b-49">
						Login Admin
					</span>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your email" value="{{ old('email') }}" required>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						@if ($errors->has('email'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password" required>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
						@if ($errors->has('password'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
						@endif
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					
					<div class="flex-col-c p-t-50">
						<span class="txt1 p-b-17">
							Or
						</span>
						
						<a href="{{route('admin.register')}}" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('pluginloginadmin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('pluginloginadmin/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('pluginloginadmin/js/main.js')}}"></script>
	
</body>
</html>