<style>
    .nav-link {
        color: #000000 !important;
    }
</style>

<!-- start menu area -->
<div class="menu_area menu5">
    <div class="container">
        <nav class="navbar navbar-bg navbar-expand-lg px-0">
            <a class="navbar-brand order-sm-1 order-1" style="width: 150px; height: 38px;" href="{{ url('/') }}">
                <img class="img-fluid img-reponsive" src="{{ asset('theme_front/img/logo.png') }}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent5" aria-controls="navbarSupportedContent5" aria-expanded="false" aria-label="Toggle navigation">
                <span class="la la-bars"></span>
            </button>
            <div class="collapse navbar-collapse order-md-1" id="navbarSupportedContent5">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active dropdown">
                        <a class="nav-link" href="{{ url('/') }}">{{ __('global.home') }}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('devices') }}">{{ __('global.devices') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('global.download')}}<i class="ml-2 la la-angle-down"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('download') }}">{{ __('global.downloadSoftware') }}</a>
                            <a class="dropdown-item" href="javascript::void(0)">{{ __('global.downloadDrivers') }}</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('global.agent')}}<i class="ml-2 la la-angle-down"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('agents', '0') }}">{{ __('global.dongleAgents') }}</a>
                            <a class="dropdown-item" href="{{ route('agents', '1') }}">{{ __('global.licenceAgents') }}</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('shop') }}">{{ __('global.shop')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('help') }}">{{ __('global.help')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('contact') }}">{{ __('global.contactUs')}}</a>
                    </li>
                </ul>
            </div>
            <div class="nav_right_content d-flex align-items-center order-2 order-sm-2">
                <div class="nav_right_module search_module">
                    <div class="cart__icon">
                        <a class="btn btn-outline-primary btn-sm" href="{{ url('/') }}">{{ __('global.home') }}</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- end menu area -->