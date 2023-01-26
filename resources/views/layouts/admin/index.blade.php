<!DOCTYPE html>
<html lang="en">
    @include('layouts.admin.head')
    <body class="nav-fixed bg-light">
        <!-- Top app bar navigation menu-->
        @include('layouts.admin.header')
        <!-- Layout wrapper-->
        <div id="layoutDrawer">
            <!-- Layout navigation-->
            @include('layouts.admin.menu')
            <!-- Layout content-->
            <div id="layoutDrawer_content">
                <!-- Main page content-->
                <main>
                    <!-- Main dashboard content-->
                    @yield('content')
                </main>
                <!-- Footer-->
                @include('layouts.admin.footer')
            </div>
        </div>
        <script src="{{asset('theme/vendor/peity/jquery.peity.min.js')}}"></script>
        <!-- Load Bootstrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- Load global scripts-->
        <script type="module" src="{{ asset('theme/js/material.js') }}"></script>
        <script src="{{ asset('theme/js/scripts.js') }}"></script>
        <!--  Load Chart.js via CDN-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.0-beta.10/chart.min.js" crossorigin="anonymous"></script>
        <!--  Load Chart.js customized defaults-->
        <script src="{{ asset('theme/js/charts/chart-defaults.js') }}"></script>
        <!-- Load Simple DataTables Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('theme/js/datatables/datatables-simple-demo.js') }}"></script>
        <script src="{{ asset('theme/js/lang.js') }}"></script>
        <script src="{{ asset('theme/vendor/bs5-toast/bs5-toast.js') }}"></script>
        @include('layouts.admin.flash')

        @stack('script')
    </body>
</html>
