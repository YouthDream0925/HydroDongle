<!doctype html>
<html lang="en">

@include('layouts.front.head')

<body>
    <div id="snackbar"></div>
    <section class="intro-area">
        <div class="">
            <div class="intro-area-11" style="padding-bottom: 0 !important;">
                @include('layouts.front.header')
            </div><!-- ends: .intro-area-11 -->
        </div>
    </section><!-- ends: .intro-area -->
    @yield('content')
    @include('layouts.front.footer')
</body>

</html>