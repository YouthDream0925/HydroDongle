<nav class="top-app-bar navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid px-4">
        <!-- Drawer toggle button-->
        <button class="btn btn-lg btn-icon order-1 order-lg-0" id="drawerToggle" href="javascript:void(0);"><i class="material-icons">menu</i></button>
        <!-- Navbar brand-->
        <a class="navbar-brand me-auto" href="{{ route('admin.dashboard') }}"><div class="text-uppercase font-monospace">{{ __('global.appTitle') }}</div></a>
        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item">
                    @if(!empty(Auth::user()->getRoleNames()) && Auth::user()->hasExactRoles('SuperAdmin'))
                    <div class="me-3 credit-card">
                        <i class="material-icons me-1">credit_card</i>
                        <strong>{{ $infinite_amount }}</strong>
                    </div>
                    @elseif(Auth::user()->can('transfer-credit-to-distributor') && Auth::user()->can('transfer-credit-to-reseller') && !Auth::user()->can('transfer-credit-to-user'))
                    <div class="me-3 credit-card">
                        <i class="material-icons me-1">credit_card</i>
                        <strong>{{ $infinite_amount }}</strong>
                    </div>
                    @else
                    <div class="me-3 credit-card">
                        <i class="material-icons me-1">credit_card</i>
                        <strong>{{ Auth::user()->credits }}</strong>
                    </div>
                    @endif
                </li>
            </ul>
            <!-- Navbar buttons-->
            <div class="d-flex">
                <!-- User profile dropdown-->
                <div class="dropdown">
                    <button class="btn btn-lg btn-icon dropdown-toggle" id="dropdownMenuProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">person</i></button>
                    <ul class="dropdown-menu dropdown-menu-end mt-3" aria-labelledby="dropdownMenuProfile">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="material-icons leading-icon">logout</i>
                                <div class="me-3">{{ __('global.logout') }}</div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>