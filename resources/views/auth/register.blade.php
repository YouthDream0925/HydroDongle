<!doctype html>
<html lang="en">

@include('layouts.front.head')

<body>
    <section class="login-register bgimage biz_overlay overlay--secondary2">
        <div class="bg_image_holder">
            <img src="{{ asset('theme_front/img/image3.jpg') }}" alt="">
        </div>
        <div class="content_above">
            <!-- start menu area -->
            <div class="menu_area menu5">
                <div class="container">
                    <nav class="navbar navbar-bg navbar-expand-lg px-0">
                        <a class="navbar-brand order-sm-1 order-1" href="{{ url('/') }}"><img src="{{ asset('theme_front/img/logo-white.png') }}" alt="" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent5" aria-controls="navbarSupportedContent5" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="la la-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse order-md-1" id="navbarSupportedContent5">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active dropdown">
                                    <a class="nav-link" href="#">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                    <div class="mega-menu d-lg-flex flex-wrap flex-column flex-lg-row">
                                        <ul>
                                            <li>
                                                <a href="index.html">Home Page 1</a>
                                            </li>
                                            <li>
                                                <a href="index2.html">Home Page 2</a>
                                            </li>
                                            <li>
                                                <a href="index3.html">Home Page 3</a>
                                            </li>
                                            <li>
                                                <a href="index4.html">Home Page 4</a>
                                            </li>
                                            <li>
                                                <a href="index5.html">Home Page 5</a>
                                            </li>
                                            <li>
                                                <a href="index6.html">Home Page 6</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="index7.html">Home Page 7</a>
                                            </li>
                                            <li>
                                                <a href="index8.html">Home Page 8</a>
                                            </li>
                                            <li>
                                                <a href="index9.html">Home Page 9</a>
                                            </li>
                                            <li>
                                                <a href="index10.html">Home Page 10</a>
                                            </li>
                                            <li>
                                                <a href="index11.html">Home Page 11</a>
                                            </li>
                                            <li>
                                                <a href="index12.html">Home Page 12</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="index13.html">Home Page 13</a>
                                            </li>
                                            <li>
                                                <a href="index14.html">Home Page 14</a>
                                            </li>
                                            <li>
                                                <a href="index15.html">Home Page 15</a>
                                            </li>
                                            <li>
                                                <a href="index-rtl.html">Home RTL</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end: .mega-menu -->
                                </li>
                                <li class="nav-item has_mega-lg dropdown">
                                    <a class="nav-link" href="#">Pages</a>
                                    <div class="mega-menu mega-menu-lg d-lg-flex flex-wrap">
                                        <ul>
                                            <li>
                                                <h6>Services</h6>
                                            </li>
                                            <li>
                                                <a href="services-one.html">Service One</a>
                                            </li>
                                            <li>
                                                <a href="services-two.html">Service Two</a>
                                            </li>
                                            <li>
                                                <a href="services-three.html">Service Three</a>
                                            </li>
                                            <li>
                                                <a href="services-with-image.html">Services With Image</a>
                                            </li>
                                            <li>
                                                <a href="services-with-icon.html">Services With Icon</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <h6>Projects</h6>
                                            </li>
                                            <li>
                                                <a href="project-grid-1-column.html">Project Grid 1 Column</a>
                                            </li>
                                            <li>
                                                <a href="project-grid-2-column.html">Project Grid 2 Column</a>
                                            </li>
                                            <li>
                                                <a href="project-grid-3-column.html">Project Grid 3 Column</a>
                                            </li>
                                            <li>
                                                <a href="project-grid-2-filter.html">Project Grid 2 Filter</a>
                                            </li>
                                            <li>
                                                <a href="project-grid-3-filter.html">Project Grid 3 Filter</a>
                                            </li>
                                            <li>
                                                <a href="project-masonry.html">Project Masonry</a>
                                            </li>
                                            <li>
                                                <a href="project-single1.html">Project Single 1</a>
                                            </li>
                                            <li>
                                                <a href="project-single2.html">Project Single 2</a>
                                            </li>
                                            <li>
                                                <a href="project-single3.html">Project Single 3</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <h6>Team</h6>
                                            </li>
                                            <li>
                                                <a href="team-grid.html">Team Grid</a>
                                            </li>
                                            <li>
                                                <a href="team-list.html">Team List</a>
                                            </li>
                                            <li>
                                                <a href="team-single.html">Team Single</a>
                                            </li>
                                            <li>
                                                <h6>Events</h6>
                                            </li>
                                            <li>
                                                <a href="event-grid.html">Event Grid</a>
                                            </li>
                                            <li>
                                                <a href="event-list.html">Event List</a>
                                            </li>
                                            <li>
                                                <a href="event-details.html">Event Details</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <h6>Others</h6>
                                            </li>
                                            <li>
                                                <a href="404.html">404</a>
                                            </li>
                                            <li>
                                                <a href="faqs.html">Faqs</a>
                                            </li>
                                            <li>
                                                <a href="login.html">Login</a>
                                            </li>
                                            <li>
                                                <a href="register.html">Register</a>
                                            </li>
                                            <li>
                                                <a href="pricing.html">Pricing</a>
                                            </li>
                                            <li>
                                                <a href="testimonial.html">Testimonial</a>
                                            </li>
                                            <li>
                                                <a href="working-process.html">Working Process</a>
                                            </li>
                                            <li>
                                                <a href="careers.html">Careers</a>
                                            </li>
                                            <li>
                                                <a href="career-single.html">Career Single</a>
                                            </li>
                                            <li>
                                                <a href="apply-form.html">Apply Form</a>
                                            </li>
                                            <li>
                                                <a href="coming-soon.html">Coming Soon</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end: .mega-menu -->
                                </li>
                                <li class="nav-item has_mega-lg dropdown">
                                    <a class="nav-link" href="#">Elements</a>
                                    <div class="mega-menu mega-menu-lg d-lg-flex flex-wrap">
                                        <ul>
                                            <li>
                                                <a href="alerts.html">Alerts</a>
                                            </li>
                                            <li>
                                                <a href="accordion.html">Accordion</a>
                                            </li>
                                            <li>
                                                <a href="blockquotes.html">Blockquotes</a>
                                            </li>
                                            <li>
                                                <a href="box-shadow.html">Box Shadow</a>
                                            </li>
                                            <li>
                                                <a href="breadcrumb.html">Breadcrumbs</a>
                                            </li>
                                            <li>
                                                <a href="buttons.html">Buttons</a>
                                            </li>
                                            <li>
                                                <a href="call-to-action.html">Call To Actions</a>
                                            </li>
                                            <li>
                                                <a href="cards.html">Cards</a>
                                            </li>
                                            <li>
                                                <a href="carousels.html">Carousels</a>
                                            </li>
                                            <li>
                                                <a href="clients.html">Clients</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="colors.html">Colors</a>
                                            </li>
                                            <li>
                                                <a href="contact-blocks.html">Contact Blocks</a>
                                            </li>
                                            <li>
                                                <a href="contact-forms.html">Contact Forms</a>
                                            </li>
                                            <li>
                                                <a href="content-blocks.html">Content Blocks</a>
                                            </li>
                                            <li>
                                                <a href="counter.html">Counters</a>
                                            </li>
                                            <li>
                                                <a href="dividers.html">Dividers</a>
                                            </li>
                                            <li>
                                                <a href="dropdowns.html">Dropdowns</a>
                                            </li>
                                            <li>
                                                <a href="embed-videos.html">Embed Videos</a>
                                            </li>
                                            <li>
                                                <a href="filters.html">Filters</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="flip-box.html">Flip Box</a>
                                            </li>
                                            <li>
                                                <a href="footers.html">Footers</a>
                                            </li>
                                            <li>
                                                <a href="form-elements.html">Form Elements</a>
                                            </li>
                                            <li>
                                                <a href="gallery.html">Gallery</a>
                                            </li>
                                            <li>
                                                <a href="graphs.html">Graphs</a>
                                            </li>
                                            <li>
                                                <a href="headers.html">Header Style</a>
                                            </li>
                                            <li>
                                                <a href="icon-box.html">Icon Box</a>
                                            </li>
                                            <li>
                                                <a href="lists.html">Lists</a>
                                            </li>
                                            <li>
                                                <a href="maps.html">Maps</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="modal.html">Modals</a>
                                            </li>
                                            <li>
                                                <a href="pagination.html">Pagination</a>
                                            </li>
                                            <li>
                                                <a href="parallax.html">Parallax</a>
                                            </li>
                                            <li>
                                                <a href="pricing-tables.html">Pricing Tables</a>
                                            </li>
                                            <li>
                                                <a href="processes.html">Processes</a>
                                            </li>
                                            <li>
                                                <a href="progress-bar.html">Progress Bar</a>
                                            </li>
                                            <li>
                                                <a href="range-slider.html">Range Slider</a>
                                            </li>
                                            <li>
                                                <a href="ratings.html">Ratings</a>
                                            </li>
                                            <li>
                                                <a href="sliders.html">Sliders</a>
                                            </li>
                                        </ul>
                                        <ul>
                                            <li>
                                                <a href="splitted-banners.html">Splitted Banners</a>
                                            </li>
                                            <li>
                                                <a href="subscribe.html">Subscribe</a>
                                            </li>
                                            <li>
                                                <a href="typography.html">Typography</a>
                                            </li>
                                            <li>
                                                <a href="tables.html">Tables</a>
                                            </li>
                                            <li>
                                                <a href="tabs.html">Tabs</a>
                                            </li>
                                            <li>
                                                <a href="teams.html">Teams</a>
                                            </li>
                                            <li>
                                                <a href="testimonial-styles.html">Testimonial Styles</a>
                                            </li>
                                            <li>
                                                <a href="timelines.html">Timelines</a>
                                            </li>
                                            <li>
                                                <a href="twitter-feed.html">Twitter Feed</a>
                                            </li>
                                            <li>
                                                <a href="video-background.html">Video Background</a>
                                            </li>
                                            <li>
                                                <a href="videos.html">Videos</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end: .mega-menu -->
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="about-one.html">About One</a>
                                        <a class="dropdown-item" href="about-two.html">About Two</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="contact-1.html">Contact One</a>
                                        <a class="dropdown-item" href="contact-2.html">Contact Two</a>
                                        <a class="dropdown-item" href="contact-3.html">Contact Three</a>
                                        <a class="dropdown-item" href="contact-4.html">Contact Four</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                        <a class="dropdown-item" href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                        <a class="dropdown-item" href="blog-masonry1.html">Blog Masonry One</a>
                                        <a class="dropdown-item" href="blog-masonry2.html">Blog Masonry Two</a>
                                        <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>
                                        <a class="dropdown-item" href="blog-full-width.html">Blog FullWidth</a>
                                        <hr class="dropdown-divider p-bottom-10">
                                        <a class="dropdown-item" href="blog-details-standard.html">Blog Details Standard</a>
                                        <a class="dropdown-item" href="blog-details-audio.html">Blog Details Audio</a>
                                        <a class="dropdown-item" href="blog-details-gallery.html">Blog Details Gallery</a>
                                        <a class="dropdown-item" href="blog-details-video.html">Blog Details Video</a>
                                        <a class="dropdown-item" href="blog-details-slider.html">Blog Details Slider</a>
                                        <a class="dropdown-item" href="blog-details-link.html">Blog Details Link</a>
                                        <a class="dropdown-item" href="blog-details-full-width.html">Blog Details FullWidth</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="shop-home.html">Shop Home</a>
                                        <a class="dropdown-item" href="shop-products.html">Shop Products</a>
                                        <a class="dropdown-item" href="single-product.html">Product Single</a>
                                        <a class="dropdown-item" href="shopping-cart.html">Shopping Cart</a>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        <a class="dropdown-item" href="checkout-confirm.html">Checkout Confirm</a>
                                    </div>
                                </li>
                            </ul>
                            <!-- end: .navbar-nav -->
                        </div>
                        <div class="nav_right_content d-flex align-items-center order-2 order-sm-2">
                            <div class="nav_right_module search_module">
                                <div class="cart__icon">
                                    <a class="btn btn-primary btn-sm" href="{{ url('/') }}">Home</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- end menu area -->
            <div class="signup-form d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-wrapper">
                                <div class="card card-shadow">
                                    <div class="card-header">
                                        <h4 class="text-center">Signup Here!</h4>
                                    </div>
                                    <div class="card-body">
                                        @isset($route)
                                        <form method="POST" action="{{ $route }}">
                                        @else
                                        <form method="POST" action="{{ route('register') }}">
                                        @endisset
                                            @csrf
                                            <div class="form-group">
                                                <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="phone" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                            <div class="custom-control custom-checkbox checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3" checked="">
                                                <label class="custom-control-label" for="customCheck3">I agree with the all additional <a href="">Terms and Conditions</a></label>
                                            </div>
                                            <div class="form-group text-center m-top-30 m-bottom-20">
                                                <button class="btn btn-secondary" type="submit">Sign Up</button>
                                            </div>
                                        </form>
                                        <p class="text-center">Do you already have an account? <a href="{{ route('login') }}">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- ends: .col-lg-6 -->
                    </div>
                </div>
            </div><!-- ends: .login-form -->
        </div>
    </section>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
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
    <script src="{{ asset('theme_front/theme_assets/js/map.js') }}"></script>
    <script src="{{ asset('theme_front/theme_assets/js/revolution.slider.init.js') }}"></script>
</body>

</html>