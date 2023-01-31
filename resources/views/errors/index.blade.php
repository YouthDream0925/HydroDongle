<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Error - Hydra Dongle</title>
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
    <body>
        <!-- Layout wrapper-->
        <div id="layoutError">
            <!-- Layout content-->
            <div id="layoutError_content">
                <!-- Main page content-->
                <main>
                    @yield('content');                    
                </main>
            </div>
            <!-- Layout footer-->
            <div id="layoutError_footer">
                <!-- Footer-->
                <!-- Min-height is set inline to match the height of the drawer footer-->
                <footer class="py-4 mt-auto border-top" style="min-height: 74px">
                    <div class="container-xl px-5">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between small">
                            <div class="me-sm-2">Copyright &copy; HYDRA DONGLE 2023</div>
                            <div class="d-flex ms-sm-2">
                                <a class="text-decoration-none" href="#!">Privacy Policy</a>
                                <div class="mx-1">&middot;</div>
                                <a class="text-decoration-none" href="#!">Terms &amp; Conditions</a>
                            </div>
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
