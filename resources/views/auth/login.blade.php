@extends('layouts.app')

@section('style')
    <style> 

    body{
        background-image: url('/images/b.jpg');
        background-position: center;
    }
    .card{
        margin-top: 100px;
        border:2px solid brown;
        color:white;
        background: rgba(0, 151, 19, 0.3); 
        font-weight: 1000;
        font-size: 120%;
        box-shadow: 35px 15px 15px yellowgreen;
        text-shadow: 2px 2px 2px black;
    }
    .card input{
        box-shadow: 5px 5px 5px yellowgreen;
    }
    .card-header{
        border-bottom: 2px solid blueviolet;
        background-color: lightgray  ;
    }

    .form-control:focus {
        outline: 0 !important;
        border-color: initial;
        box-shadow: none;
    }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                               
                                <div class="input-group">
                                <span class="input-group-append">
                                    <button class="btn btn-primary border-left-0 border" type="button">
                                        <i class="fa fa-envelope"></i>
                                    </button>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                                
                            </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-append">
                                    <button class="btn btn-primary border-left-0 border" type="button">
                                        <i class="fa fa-key"></i>
                                    </button>
                                </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a style="color:white" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
