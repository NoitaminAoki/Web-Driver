@extends('layouts.app-adminLogin')

@section('content')
<div class="container">
    <div class="bgline"></div>
    <div class="login">
        <div class="login-wrap">
            <img class="header-logo" src="{{asset('dist\img\EezyLogo.svg')}}" alt="triangle with all three sides equal"/>
            <div id="signinbox">
                <form id="signinform" method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <input placeholder="Email" id="email" type="email" name="email" value="{{ old('email') }}" class="inputfield" required autofocus/>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <input id="password" type="password" name="password" class="inputfield" placeholder="Password" required/>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </form>
                <button id="loginsubmit" type="submit" class="inputsubmit">Sign In</button>
                <div class="spf">
                    <a style="margin-bottom: 10px;text-align: center;font-family: 'Product Sans';">Welcome Back Admin</a>
                    <a style="text-align: center;font-family: 'Product Sans';">Please <i>Sign In</i> to access the Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    
    <svg width="0" height="0" display="none" xmlns="http://www.w3.org/2000/svg">
        <symbol id="logo" viewBox="0 0 138 26" fill="none"
        stroke="#fff" stroke-width="2.3"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M80 6h-9v14h9 M114 6h-9 v14h9 M111 13h-6 M77 13h-6 M122 20V6l11 14V6 M22 16.7L33 24l11-7.3V9.3L33 2L22 9.3V16.7z M44 16.7L33 9.3l-11 7.4 M22 9.3l11 7.3 l11-7.3 M33 2v7.3 M33 16.7V24 M88 14h6c2.2 0 4-1.8 4-4s-1.8-4-4-4h-6v14 M15 8c-1.3-1.3-3-2-5-2c-4 0-7 3-7 7s3 7 7 7 c2 0 3.7-0.8 5-2 M64 13c0 4-3 7-7 7h-5V6h5C61 6 64 9 64 13z"/>
    </symbol>
</svg>
</div>
@endsection