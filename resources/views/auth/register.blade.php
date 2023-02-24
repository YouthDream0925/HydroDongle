@extends('layouts.front.auth.index')

@section('content')
<div class="signup-form d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="form-wrapper">
                    <div class="card card-shadow">
                        <div class="card-header">
                            <h4 class="text-center">Signup Here!</h4>
                        </div>
                        <div class="card-body">
                            @isset($route)
                            <form method="POST" action="{{ $route }}">
                            @else
                            <form method="POST" action="{{ route('register') }}">
                            @endisset
                                @csrf
                                <div class="form-group">
                                    <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="phone" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="custom-control custom-checkbox checkbox-secondary">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" checked="">
                                    <label class="custom-control-label" for="customCheck3">I agree with the all additional <a href="">Terms and Conditions</a></label>
                                </div>
                                <div class="form-group text-center m-top-30 m-bottom-20">
                                    <button class="btn btn-secondary" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <p class="text-center">Do you already have an account? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div><!-- ends: .col-lg-6 -->
        </div>
    </div>
</div><!-- ends: .login-form -->
@endsection