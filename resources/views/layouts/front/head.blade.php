<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('global.appTitle') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,900|Mirza:400,700&amp;subset=arabic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/lnr-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/style.css') }}">
    <!-- endinject -->
    <link href="{{ asset('theme/assets/img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">
    @stack('css')
</head>