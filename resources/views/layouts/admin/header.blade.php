<nav class="top-app-bar navbar navbar-expand navbar-dark bg-dark">
    <div class="container-fluid px-4">
        <!-- Drawer toggle button-->
        <button class="btn btn-lg btn-icon order-1 order-lg-0" id="drawerToggle" href="javascript:void(0);"><i class="material-icons">menu</i></button>
        <!-- Navbar brand-->
        <a class="navbar-brand me-auto" href="{{ route('admin.dashboard') }}"><div class="text-uppercase font-monospace">{{ __('global.title') }}</div></a>
        <!-- Navbar items-->
        <div class="d-flex align-items-center mx-3 me-lg-0">
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