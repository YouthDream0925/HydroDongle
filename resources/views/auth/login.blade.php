@extends('layouts.front.auth.index')

@section('content')
<div class="login-form d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <div class="form-wrapper">
                    <div class="card card-shadow">
                        <div class="card-header">
                            <h4 class="text-center">Sign In Here!</h4>
                        </div>
                        <div class="card-body">
                            @isset($route)
                                <form method="POST" action="{{ $route }}">
                            @else
                                <form method="POST" action="{{ route('login') }}">
                            @endisset
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox checkbox-secondary">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck3">Remember Me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="color-secondary" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="form-group text-center m-bottom-20">
                                    <button class="btn btn-secondary" type="submit">Sign In</button>
                                </div>
                            </form>
                            <p class="text-center m-bottom-65">Don't you have an account? <a href="{{ route('register') }}">Register</a></p>
                            <!-- <div class="d-flex other-logins justify-content-center">
                                <a href=""><span class="fab fa-facebook-f"></span> Register</a>
                                <a href=""><span class="fab fa-google-plus-g"></span> Google</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div><!-- ends: .col-lg-6 -->
        </div>
    </div>
</div><!-- ends: .login-form -->
@endsection