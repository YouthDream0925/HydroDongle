<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Create Account - Material Admin Pro</title>
        <!-- Load Favicon-->
        <link href="{{ asset('theme/assets/img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
        <!-- Load Material Icons from Google Fonts-->
        <link href="{{ asset('theme/fonts/fonts1.css') }}" rel="stylesheet" />
        <!-- Roboto and Roboto Mono fonts from Google Fonts-->
        <link href="{{ asset('theme/fonts/fonts2.css') }}" rel="stylesheet" />
        <link href="{{ asset('theme/fonts/fonts3.css') }}" rel="stylesheet" />
        <!-- Load main stylesheet-->
        <link href="{{ asset('theme/css/styles.css') }}" rel="stylesheet" />
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
                            <div class="col-xxl-7 col-xl-10">
                                <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-5">
                                    <div class="card-body p-5">
                                        <!-- Auth header with logo image-->
                                        <div class="text-center">
                                            <img class="mb-3" src="{{ asset('theme/assets/img/icons/background.svg') }}" alt="..." style="height: 48px" />
                                            <h1 class="display-5 mb-0">Create New Account</h1>
                                            <div class="subheading-1 mb-5">to continue to app</div>
                                        </div>
                                        <!-- Register new account form-->
                                        <form method="POST" action="{{ route('admin.register') }}">
                                            @csrf
                                            <!-- <div class="row"> -->
                                                <!-- <div class="col-sm-6 mb-4">
                                                    <mwc-textfield id="firstName" type="text" class="w-100 @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus label="First Name" outlined></mwc-textfield>
                                                    @error('firstName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>                                                 -->
                                                <!-- <div class="col-sm-6 mb-4">
                                                    <mwc-textfield id="lastName" type="text" class="w-100 @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" label="Last Name" outlined></mwc-textfield>
                                                    @error('lastName')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> -->
                                            <!-- </div> -->
                                            <div class="mb-4">
                                                <mwc-textfield id="name" type="text" class="w-100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" label="User Name" outlined></mwc-textfield>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                @if($errors->any())
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first() }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <!-- <div class="mb-4">
                                                <mwc-textfield id="email" type="email" class="w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" label="Email Address" outlined></mwc-textfield>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> -->
                                            <div class="row">
                                                <div class="col-sm-6 mb-4">
                                                    <mwc-textfield id="password" type="password" class="w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" label="Password" outlined icontrailing="visibility_off"></mwc-textfield>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-4">
                                                    <mwc-textfield id="password-confirm" type="password" class="w-100" name="password_confirmation" required autocomplete="new-password" label="Verify Password" outlined icontrailing="visibility_off"></mwc-textfield>
                                                </div>
                                            </div>
                                            <!-- <div class="d-flex align-items-center">
                                                <mwc-formfield label="I agree to the website terms and conditions"><mwc-checkbox></mwc-checkbox></mwc-formfield>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small fw-500 text-decoration-none" href="{{ route('admin.login')}}">Sign in instead</a>
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- Layout footer-->
            <div id="layoutAuthentication_footer">
                <!-- Auth footer-->
                <footer class="p-4">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between small">
                        <div class="me-sm-3 mb-2 mb-sm-0"><div class="fw-500 text-white">Copyright &copy; Your Website 2021</div></div>
                        <div class="ms-sm-3">
                            <a class="fw-500 text-decoration-none link-white" href="#!">Privacy</a>
                            <a class="fw-500 text-decoration-none link-white mx-4" href="#!">Terms</a>
                            <a class="fw-500 text-decoration-none link-white" href="#!">Help</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Load Bootstrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Load global scripts-->
        <script type="module" src="{{ asset('theme/js/material.js') }}"></script>
        <script src="{{ asset('theme/js/scripts.js') }}"></script>
    </body>
</html>
