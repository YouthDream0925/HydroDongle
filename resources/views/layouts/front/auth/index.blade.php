<!doctype html>
<html lang="en">

@include('layouts.front.head')

<body>
    <section class="login-register bgimage biz_overlay overlay--secondary2">
        <div class="bg_image_holder">
            <img src="{{ asset('theme_front/img/image3.jpg') }}" alt="">
        </div>
        <div class="content_above" style="background-color: #ffffff;">
            @include('layouts.front.auth.header')
            @yield('content')
        </div>
    </section>
    <!-- inject:js-->
    @include('layouts.front.auth.footer')
</body>

</html>