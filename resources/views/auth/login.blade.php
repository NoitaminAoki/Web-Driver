<!DOCTYPE html>
<html lang="en">
<head>
    <title>Masuk Pengemudi - CleoWebDriver</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="{{asset('pluginlogin/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('pluginlogin/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{asset('pluginlogin/images/bg-01.jpg')}});">
                    <span class="login100-form-title-1">
                        Cleo Web Driver
                    </span>
                    <span class="login100-form-title-2">
                        Selamat Datang! Untuk mengakses portal silahkan masuk terlebih dahulu
                    </span>
                </div>
                
                <form class="login100-form validate-form" method="POST" action="{{ route('auth.login.custom') }}">
                    @csrf
                    @error('error')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Nomor Polisi</span>
                        <input class="input100" name="no_pol" type="text" placeholder="Enter Nomor Polisi" value="{{ old('no_pol') }}" required autocomplete="false" autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Sandi</span>
                        <input class="input100" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan Sandi">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Selalu saya
                            </label>
                        </div>
                        <div>
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="txt1">
                                Lupa Sandi?
                            </a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Perhatian !!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Jika anda mengalami lupa sandi. Silahkan hubungi admin kami melalui <b>Whatsapp</b> yang tertera dibawah.
                                    </div>
                                    <div class="modal-footer">
                                            <a class="btn btn-primary" target="_blank" href="https://wa.me/628976782246">Hubungi Admin</a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tutup Modal -->
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('pluginlogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('pluginlogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('pluginlogin/js/main.js')}}"></script>
    
</body>
</html>