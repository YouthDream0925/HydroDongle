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
                                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ url('/') }}">{{ __('global.home')}}
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item {{ (request()->is('download*')) ? 'active' : '' }} has_mega-lg dropdown">
                                <a class="nav-link {{ (request()->is('download*')) ? 'active' : '' }}" href="{{ route('download') }}">{{ __('global.download')}}</a>
                            </li>
                            <li class="nav-item {{ (request()->is('agents*')) ? 'active' : '' }} has_mega-lg dropdown">
                                <a class="nav-link {{ (request()->is('agents*')) ? 'active' : '' }}" href="{{ route('agents') }}">{{ __('global.agent')}}</a>
                            </li>
                            <li class="nav-item {{ (request()->is('shop*')) ? 'active' : '' }} has_mega-lg dropdown">
                                <a class="nav-link {{ (request()->is('shop*')) ? 'active' : '' }}" href="{{ route('shop') }}">{{ __('global.shop')}}</a>
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
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('global.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- end menu area -->
</section><!-- end: .header -->