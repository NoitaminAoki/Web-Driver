@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin {{ __('Register') }}</div>
                
                <div class="card-body">
                    <form method="POST" class="needs-validation" novalidate action="{{ route('admin.register') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
                                <div class="invalid-tooltip">
                                    Please fill in a name.
                                </div>
                                @if ($errors->has('name'))
                                <span class="invalid-tooltip" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile_img" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>
                            
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input{{ $errors->has('profile_img') ? ' is-invalid' : '' }}" id="profile_img" name="profile_img" required autofocus>
                                    <label class="custom-file-label" for="profile_img">Choose file</label>
                                    <div class="invalid-tooltip">
                                        Please fill in an image file.
                                    </div>
                                </div>
                                @if ($errors->has('profile_img'))
                                <span class="invalid-tooltip" role="alert">
                                    <strong>{{ $errors->first('profile_img') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">+62</span>
                                    </div>
                                    <input id="no_telp" type="text" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" value="{{ old('no_telp') }}" required autofocus autocomplete="off">
                                    <div class="invalid-tooltip">
                                        Please fill in a telephone number.
                                    </div>
                                    @if ($errors->has('no_telp'))
                                    <span class="invalid-tooltip" role="alert">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>
                            
                            <div class="col-md-6">
                                <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required autofocus>
                                    {{ old('address') }}
                                </textarea>
                                <div class="invalid-tooltip">
                                    Please fill in an address.
                                </div>
                                @if ($errors->has('address'))
                                <span class="invalid-tooltip" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                
                                <div class="invalid-tooltip">
                                    Please fill in an email.
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-tooltip" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                
                                <div class="invalid-tooltip">
                                    Please fill in an password.
                                </div>
                                @if ($errors->has('password'))
                                <span class="invalid-tooltip" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection