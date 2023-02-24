@extends('layouts.front.auth.index')

@section('content')
<div class="login-form d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <div class="form-wrapper">
                    <div class="card card-shadow">
                        <div class="card-header">
                            <h4 class="text-center">{{ __('Reset Password') }}</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group text-center m-bottom-20">
                                    <button class="btn btn-secondary" type="submit">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </form>
                            <p class="text-center m-bottom-25"><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a></p>
                        </div>
                    </div>
                </div>
            </div><!-- ends: .col-lg-6 -->
        </div>
    </div>
</div><!-- ends: .login-form -->
@endsection