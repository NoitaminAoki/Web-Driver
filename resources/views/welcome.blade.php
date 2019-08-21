<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.7, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="icon" type="image/png" href="{{asset('img/icons/cleologistic.ico')}}"/>
  <meta name="description" content=""> 
  <title>Selamat Datang di Portal Cleo Driver</title>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('dist/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/bootstrap/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('dist/bootstrap/css/additional.css')}}" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans" type="text/css">
</head>
<body>
  <section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1">
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(35, 35, 35);"></div>
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    Cleo Driver
                </h1>
                <p class="mbr-text pb-3 mbr-fonts-style display-5">
                    Selamat Datang, Silahkan masuk untuk mengakses web portal cleo dengan menekan tombol dibawah ini
                </p>
                @if (Route::has('login'))
                @auth
                <div class="mbr-section-btn"><a class="btn btn-md btn-white-outline display-4" href="{{url('driver/profil')}}">Beranda</a></div>
                @else
                <div class="mbr-section-btn"><a class="btn btn-md btn-white-outline display-4" href="{{route('login')}}">Masuk</a></div>
                @endauth
                @endif
            </div>
        </div>
    </div>
  </section>
</body>
</html>