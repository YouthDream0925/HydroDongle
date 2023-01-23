<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Material Admin Pro</title>
        <!-- Load Favicon-->
        <link href="{{ asset('theme/assets/img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
        <!-- Load Material Icons from Google Fonts-->
        <link href="{{ asset('theme/fonts/fonts1.css') }}" rel="stylesheet" />
        <!-- Roboto and Roboto Mono fonts from Google Fonts-->
        <link href="{{ asset('theme/fonts/fonts2.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/fonts/fonts3.css') }}" rel="stylesheet" />
        <!-- Load main stylesheet-->
        <link href="{{ asset('theme/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/css/custom.css') }}" rel="stylesheet" />
    </head>
    <body class="bg-primary">
        <!-- Layout wrapper-->
        <div id="layoutAuthentication">
            <!-- Layout content-->
            <div id="layoutAuthentication_content">
                <!-- Main page content-->
                <main>
                    <!-- Main content container-->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
                                <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                    <div class="card-body p-5">
                                        <!-- Auth header with logo image-->
                                        <div class="text-center">
                                            <img class="mb-3" src="{{ asset('theme/assets/img/icons/hydra.png') }}" alt="..." style="height: 128px" />
                                            <h1 class="display-5 mb-0">Login</h1>
                                            <div class="subheading-1 mb-5">HYDRA TOOL</div>
                                        </div>
                                        <!-- Login submission form-->
                                        <form method="POST" action="{{ route('admin.login') }}">
                                            @csrf
                                            <!-- <div class="mb-4">
                                                <mwc-textfield id="email" type="email" class="w-100 @error('email') is-invalid @enderror" label="Username" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus outlined></mwc-textfield>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> -->
                                            <div class="mb-4">
                                                <mwc-textfield id="name" type="name" class="w-100 @error('name') is-invalid @enderror" label="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus outlined></mwc-textfield>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <mwc-textfield id="password" type="password" class="w-100 @error('password') is-invalid @enderror" name="password" label="Password" outlined icontrailing="visibility_off" type="password" required autocomplete="current-password"></mwc-textfield>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                                        @endif
                                                    </div>  
                                                </div>
                                            </div>
                                            <!-- <div class="d-flex align-items-center">
                                                <mwc-formfield name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} label="Remember password"><mwc-checkbox></mwc-checkbox></mwc-formfield>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0 f-right">
                                                <!-- @if (Route::has('password.request'))
                                                    <a class="small fw-500 text-decoration-none" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif -->

                                                <button type="submit" class="btn btn-primary txt-right">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Auth card message-->
                                <!-- <div class="text-center mb-5">
                                    <a class="small fw-500 text-decoration-none link-white" href="{{ route('admin.register') }}">Need an account? Sign up!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- Layout footer-->
            <!-- <div id="layoutAuthentication_footer"> -->
                <!-- Auth footer-->
                <!-- <footer class="p-4">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between small">
                        <div class="me-sm-3 mb-2 mb-sm-0"><div class="fw-500 text-white">Copyright &copy; Your Website 2021</div></div>
                        <div class="ms-sm-3">
                            <a class="fw-500 text-decoration-none link-white" href="#!">Privacy</a>
                            <a class="fw-500 text-decoration-none link-white mx-4" href="#!">Terms</a>
                            <a class="fw-500 text-decoration-none link-white" href="#!">Help</a>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>
        <!-- Load Bootstrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Load global scripts-->
        <script type="module" src="{{ asset('theme/js/material.js') }}"></script>
        <script src="{{ asset('theme/js/scripts.js') }}"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </body>
</html>
