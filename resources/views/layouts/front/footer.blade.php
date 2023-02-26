<div class="counter counter--3 biz_overlay overlay--primary">
    <div class="bg_image_holder"><img src="{{ asset('theme_front/img/cbg2.jpg') }}" alt=""></div>
    <div class="container content_above">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-around flex-wrap">
                    <div class="counter_single">
                        <div class="icon">
                            <span class="la la-user-plus"></span>
                        </div>
                        <p class="value count_up">{{ $our_users }}</p>
                        <p class="title">{{ __('global.ourUsers') }}</p>
                    </div><!-- end: .counter_single -->
                    <div class="counter_single">
                        <div class="icon">
                            <span class="la la-apple"></span>
                        </div>
                        <p class="value count_up">{{ $total_brands }}</p>
                        <p class="title">{{ __('global.brands') }}</p>
                    </div><!-- end: .counter_single -->
                    <div class="counter_single">
                        <div class="icon">
                            <span class="la la-mobile"></span>
                        </div>
                        <p class="value count_up">{{ $total_models }}</p>
                        <p class="title">{{ __('global.models') }}</p>
                    </div><!-- end: .counter_single -->
                    <div class="counter_single">
                        <div class="icon">
                            <span class="la la-magic"></span>
                        </div>
                        <p class="value count_up">{{ $total_features }}</p>
                        <p class="title">{{ __('global.supportedFeatures') }}</p>
                    </div><!-- end: .counter_single -->
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer6 footer--light-gradient">
    <div class="footer__big">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widget text_widget">
                        <a class="navbar-brand order-sm-1 order-1" style="width: 150px; height: 38px;" href="#">
                            <img class="img-fluid img-reponsive" src="{{ asset('theme_front/img/logo.png') }}" alt="" />
                        </a>
                        <p>
                            <a href="tel:+123-4567890" class="tel">+123 4567890</a>
                            <a href="mailto:support@Tizara.com" class="mail">Support@Tizara.com</a>
                            <span class="address">Melbourne, Australia, 95 South Park Avenue</span>
                        </p>
                    </div>
                </div><!-- ends: .col-lg-3 -->
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                    <div class="widget widget--links">
                        <h4 class="widget__title2">{{ __('global.companyName') }}</h4>
                        <ul class="links">
                            <li><a href="{{ route('help') }}">{{ __('global.help') }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ __('global.contactUs') }}</a></li>
                            <li><a href="{{ route('agents', 0) }}">{{ __('global.dongleAgents') }}</a></li>
                            <li><a href="{{ route('agents', 1) }}">{{ __('global.licenceAgents') }}</a></li>
                        </ul>
                    </div><!-- ends: .widget -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                    <div class="widget widget--links">
                        <h4 class="widget__title2">Services</h4>
                        <ul class="links">
                            <li><a href="{{ route('devices') }}">{{ __('global.devices') }}</a></li>
                            <li><a href="{{ route('download.software') }}">{{ __('global.downloadSoftware') }}</a></li>
                            <li><a href="{{ route('download.drivers') }}">{{ __('global.downloadDrivers') }}</a></li>
                            <li><a href="{{ route('shop') }}">{{ __('global.shop') }}</a></li>
                        </ul>
                    </div><!-- ends: .widget -->
                </div><!-- ends: .col-lg-3 -->
            </div>
        </div>
    </div><!-- ends: footer__big -->
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__bottom-content">
                        <p>&copy; 2023 <a href="{{ url('/') }}">{{ __('global.appTitle') }}</a></p>
                        <div class="social-basic ">
                            <ul class="d-flex justify-content-end ">
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ends: footer__small -->
</footer><!-- ends: footer -->

<div class="go_top">
    <span class="la la-angle-up"></span>
</div>
<!-- inject:js-->
<script src="{{ asset('theme_front/vendor_assets/js/jquery/jquery-1.12.3.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery/uikit.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/bootstrap/popper.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/revolution/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/chart.bundle.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/dashboard.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/grid.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.camera.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.easing1.3.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.filterizr.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/select2.full.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/slick.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/tether.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/trumbowyg.min.js') }}"></script>
<script src="{{ asset('theme_front/vendor_assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('theme_front/theme_assets/js/main.js') }}"></script>
<script src="{{ asset('theme_front/theme_assets/js/revolution.slider.init.js') }}"></script>
<script src="{{ asset('theme/vendor/bs5-toast/bs5-toast.js') }}"></script>
@stack('script')
<!-- endinject-->