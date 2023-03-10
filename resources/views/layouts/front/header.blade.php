<!-- header area -->
<section class="header header--8">
    <!-- start menu area -->
    <div class="menu_area menu8">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0 ">
                <a class="navbar-brand order-sm-1 order-1" style="width: 150px; height: 38px;" href="{{ url('/') }}">
                    <img class="img-fluid img-reponsive" src="{{ asset('theme_front/img/logo.png') }}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22" aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="la la-bars"></span>
                </button>
                <div class="collapse navbar-collapse order-md-1 justify-content-end" id="navbarSupportedContent22">
                    <div class="m-right-15">
                        <ul class="navbar-nav ">
                            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }} dropdown">
                                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">{{ __('global.home')}}</a>
                            </li>
                            <li class="nav-item {{ (request()->is('devices*')) ? 'active' : '' }} dropdown">
                                <a class="nav-link {{ (request()->is('devices*')) ? 'active' : '' }}" href="{{ route('devices') }}">{{ __('global.devices')}}
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item {{ (request()->is('download*')) ? 'active' : '' }} dropdown">
                                <a class="nav-link {{ (request()->is('download*')) ? 'active' : '' }} dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('global.download')}}<i class="ml-2 la la-angle-down"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('download.software') }}">{{ __('global.downloadSoftware') }}</a>
                                    <a class="dropdown-item" href="{{ route('download.drivers') }}">{{ __('global.downloadDrivers') }}</a>
                                </div>
                            </li>
                            <li class="nav-item {{ (request()->is('agents*')) ? 'active' : '' }} dropdown">
                                <a class="nav-link {{ (request()->is('agents*')) ? 'active' : '' }} dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('global.agent')}}<i class="ml-2 la la-angle-down"></i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('agents', '0') }}">{{ __('global.dongleAgents') }}</a>
                                    <a class="dropdown-item" href="{{ route('agents', '1') }}">{{ __('global.licenceAgents') }}</a>
                                </div>
                            </li>
                            <li class="nav-item {{ (request()->is('shop*')) ? 'active' : '' }}">
                                <a class="nav-link {{ (request()->is('shop*')) ? 'active' : '' }}" href="{{ route('shop') }}">{{ __('global.shop')}}</a>
                            </li>
                            <li class="nav-item {{ (request()->is('help*')) ? 'active' : '' }}">
                                <a class="nav-link {{ (request()->is('help*')) ? 'active' : '' }}" href="{{ route('help') }}">{{ __('global.help')}}</a>
                            </li>
                            <li class="nav-item {{ (request()->is('contact*')) ? 'active' : '' }}">
                                <a class="nav-link {{ (request()->is('contact*')) ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('global.contactUs')}}</a>
                            </li>
                        </ul>
                        <!-- end: .navbar-nav -->
                    </div>
                </div>
                <div class="nav_right_content m-left-30 d-flex align-items-center order-2 order-sm-2">
                    <div class="nav_right_module cart_module">
                        <div class="cart__icon">
                            @guest
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('login') }}">{{ __('global.login') }}</a>
                            @else
                            <div class="nav_right_content d-flex align-items-center order-2 order-sm-2">
                                <div class="nav_right_module cart_module">
                                    <div class="cart__icon">
                                        <span class="la la-user"></span>
                                    </div>
                                    <div class="cart__items shadow-lg-2" style="min-width: 140px;">
                                        <div class="items">
                                            <div class="item_info">
                                                <a href="{{ route('profile', Auth::user()->id) }}">{{ __('global.profile') }}</a>
                                                <a class="mb-0" href="{{ route('shop.history', Auth::user()->id) }}">{{ __('global.history') }}</a>
                                            </div>
                                        </div>
                                        <!-- end .items-->
                                        <div class="items">
                                            <div class="item_info">
                                                <a class="mb-0" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('global.logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- end menu area -->
</section><!-- end: .header -->