<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('global.appTitle') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,900|Mirza:400,700&amp;subset=arabic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/lnr-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/vendor_assets/css/trumbowyg.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme_front/style.css') }}">
    <!-- endinject -->
    <link href="{{ asset('theme/assets/img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
</head>

<body>
    <!-- header area -->
    <section class="header header--2">
        <div class="top_bar top--bar2 d-flex align-items-center bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex topbar_content justify-content-between">
                            <div class="top_bar--lang align-self-center order-2">
                                <div class="dropdown">
                                    <div class="dropdown-toggle d-flex align-items-center" id="dropdownMenuButton1" role="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="lang">en</span>
                                        <img class="lang_flag" src="{{ asset('theme_front/img/en.jpg') }}" alt="English">
                                        <span class="la la-angle-down"></span>
                                    </div>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" data-lang="en" href="#"><img src="{{ asset('theme_front/img/en.jpg') }}" alt="">English</a>
                                        <a class="dropdown-item" data-lang="fr" href="#"><img src="{{ asset('theme_front/img/fr.jpg') }}" alt="">Français</a>
                                        <a class="dropdown-item" data-lang="tr" href="#"><img src="{{ asset('theme_front/img/tr.jpg') }}" alt="">Türkçee</a>
                                        <a class="dropdown-item" data-lang="es" href="#"><img src="{{ asset('theme_front/img/es.jpg') }}" alt="">Español</a>
                                    </div>
                                </div>
                                <div class="drop-down">
                                    <div class="options">
                                        <ul>
                                            <li><a href="#">User1<span class="value">1</span></a></li>
                                            <li><a href="#">User2<span class="value">2</span></a></li>
                                            <li><a href="#">User3<span class="value">3</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="top_bar--info order-0 d-none d-lg-block align-self-center">
                                <ul>
                                    <li><span class="la la-envelope"></span>
                                        <p>support@email.com</p>
                                    </li>
                                    <li><span class="la la-headphones"></span>
                                        <p>800 567.890.576</p>
                                    </li>
                                    <li><span class="la la-clock-o"></span>
                                        <p>Mon-Sat 8.00 - 18.00</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="top_bar--social">
                                <ul>
                                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                                    <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start menu area -->
        <div class="menu_area menu1 menu--sticky">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light px-0">
                    <a class="navbar-brand order-sm-1 order-1" href="#"><img src="{{ asset('theme_front/img/logo.png') }}" alt="" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="la la-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse order-md-1" id="navbarSupportedContent2">
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
                        <div class="nav_right_module cart_module">
                            <div class="cart__icon">
                                <span class="la la-shopping-cart"></span>
                                <span class="cart_count">2</span>
                            </div>
                            <div class="cart__items shadow-lg-2">
                                <div class="items">
                                    <div class="item_thumb">
                                        <img src="{{ asset('theme_front/img/ci1.jpg') }}" alt="hukka miyan">
                                    </div>
                                    <div class="item_info">
                                        <a href="single-product.html">Business Marketing Presentation</a>
                                        <span class="color-primary">$250.00</span>
                                    </div>
                                    <a href="#" class="item_remove">
                                        <span class="la la-close"></span></a>
                                </div>
                                <!-- end .items-->
                                <div class="items">
                                    <div class="item_thumb">
                                        <img src="{{ asset('theme_front/img/ci2.jpg') }}" alt="hukka miyan">
                                    </div>
                                    <div class="item_info">
                                        <a href="single-product.html">Business Marketing Presentation</a>
                                        <span class="color-primary">$75.00</span>
                                    </div>
                                    <a href="#" class="item_remove">
                                        <span class="la la-close"></span></a>
                                </div>
                                <!-- end .items-->
                                <div class="cart_info text-md-right">
                                    <p>Subtotal:
                                        <span class="color-primary">$325.00</span></p>
                                    <a class="btn btn-outline-secondary btn-sm" href="shopping-cart.html">View Cart</a>
                                    <a class="btn btn-primary btn-sm" href="checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!-- end .cart_module -->
                        <div class="nav_right_module search_module">
                            <span class="la la-search search_trigger"></span>
                            <div class="search_area">
                                <form action="/">
                                    <div class="input-group input-group-light">
                                        <span class="icon-left">
                                            <i class="la la-search"></i>
                                        </span>
                                        <input type="text" class="form-control search_field" placeholder="Type words and hit enter...">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end ./search_module -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- end menu area -->
    </section><!-- end: .header -->
    <div id="rev_slider_15_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider1" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullwidth mode -->
        <div id="rev_slider_15_1" class="rev_slider fullwidthabanner dark-overlay" style="display:none;" data-version="5.4.8.1">
            <ul>
                <!-- SLIDE  -->
                <li data-index="rs-36" data-transition="fade,slotfade-horizontal" data-slotamount="default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Elastic.easeOut,default" data-easeout="Elastic.easeIn,default" data-masterspeed="300,default" data-delay="6010" data-rotate="0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('theme_front/img/slider_bg1.jpg') }}" alt="" data-bgposition="center center" data-kenburns="on" data-duration="3000" data-ease="Power3.easeOut" data-scalestart="130" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="15" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <div id="rrzm_36" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption  " id="slide-36-layer-2" data-x="" data-y="center" data-voffset="-210" data-width="['auto']" data-height="['auto']" data-type="row" data-columnbreak="3" data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5670","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption  " id="slide-36-layer-3" data-x="100" data-y="100" data-width="['auto']" data-height="['auto']" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5670","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-columnwidth="75%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; width: 100%;">
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption  tp-no-events   tp-resizeme" id="slide-36-layer-5" data-x="" data-y="" data-height="['auto']" data-type="text" data-responsive_offset="on" data-fontsize="['50', '45', '40', '32']" data-lineheight="['64', '55', '43', '38']" data-frames='[{"delay":"+0","split":"chars","splitdelay":0.05,"speed":2000,"split_direction":"forward","frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"+2570","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power2.easeIn"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[30,30,30,30]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; max-width: 930px; white-space: normal; font-size: 60px; line-height: 70px; font-weight: 600; color: #ffffff; letter-spacing: 0px; display: block;pointer-events:none;">
                                    When One Idea <br>
                                    Changes Everything
                                </div>
                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption   tp-resizeme" id="slide-36-layer-6" data-x="" data-y="" data-height="['auto']" data-fontsize="['20', '20', '18', '16']" data-lineheight="['36', '36', '24', '22']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+2600","speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"+1870","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[35,35,35,35]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; max-width: 731px; white-space: normal; font-size: 20px; line-height: 36px; font-weight: 400; color: #ffffff; letter-spacing: 0px; display: block;">
                                    We activate brands through cultural insight strategic <br> vision, and the motion
                                    across.
                                </div>
                                <!-- LAYER NR. 5 -->
                                <div class="tp-caption" id="slide-36-layer-10" data-x="" data-y="" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+3600","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+2070","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; white-space: normal; display: inline-block;">
                                    <a href="#" class="btn btn-secondary btn--rounded">Learn More</a></div>
                                <!-- LAYER NR. 6 -->
                                <div class="tp-caption" id="slide-36-layer-11" data-x="" data-y="" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+3800","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+1870","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[30,30,30,30]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10; white-space: normal; display: inline-block;">
                                    <a href="#" class="btn btn-outline-light btn--rounded">Learn More</a></div>
                            </div>
                            <!-- LAYER NR. 7 -->
                            <div class="tp-caption  " id="slide-36-layer-4" data-x="100" data-y="100" data-width="['auto']" data-height="['auto']" data-type="column" data-responsive_offset="on" data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5670","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-columnwidth="25%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; width: 100%;"></div>
                        </div>
                    </div>
                </li>
                <!-- SLIDE  -->
                <li data-index="rs-38" data-transition="boxfade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-delay="6010" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('theme_front/img/slider_bg2.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <div id="rrzm_38" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">
                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption  " id="slide-38-layer-2" data-x="" data-y="center" data-voffset="-210" data-width="['auto']" data-height="['auto']" data-type="row" data-columnbreak="3" data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5610","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption  " id="slide-38-layer-3" data-x="100" data-y="100" data-width="['auto']" data-height="['auto']" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5610","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-columnwidth="75%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; width: 100%;">
                                <!-- LAYER NR. 10 -->
                                <div class="tp-caption  tp-no-events   tp-resizeme" id="slide-38-layer-5" data-x="" data-y="" data-height="['auto']" data-type="text" data-responsive_offset="on" data-fontsize="['50', '45', '40', '32']" data-lineheight="['64', '55', '43', '38']" data-frames='[{"delay":"+0","split":"chars","splitdelay":0.1,"speed":500,"split_direction":"forward","frame":"0","from":"sX:0.8;sY:0.8;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"+2610","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power2.easeIn"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[25,25,25,25]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; max-width: 930px; white-space: normal; font-size: 60px; line-height: 70px; font-weight: 600; color: #ffffff; letter-spacing: 0px; display: block;pointer-events:none;">
                                    Best Solution for <br>
                                    Your Business
                                </div>
                                <!-- LAYER NR. 11 -->
                                <div class="tp-caption   tp-resizeme" id="slide-38-layer-6" data-x="" data-y="" data-height="['auto']" data-type="text" data-responsive_offset="on" data-fontsize="['20', '20', '18', '16']" data-lineheight="['36', '36', '24', '22']" data-frames='[{"delay":"+2430","speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"+1980","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[35,35,35,35]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; max-width: 731px; white-space: normal; font-size: 20px; line-height: 36px; font-weight: 400; color: #ffffff; letter-spacing: 0px; display: block;">
                                    We activate brands through cultural insight strategic <br> vision, and the motion
                                    across.
                                </div>
                                <!-- LAYER NR. 12 -->
                                <div class="tp-caption" id="slide-38-layer-8" data-x="" data-y="" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+2910","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+2700","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; white-space: normal; display: inline-block;">
                                    <a href="#" class="btn btn-secondary btn--rounded">Learn More</a></div>
                                <!-- LAYER NR. 13 -->
                                <div class="tp-caption" id="slide-38-layer-9" data-x="5" data-y="5" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+3050","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+2560","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[30,30,30,30]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10; white-space: normal; display: inline-block;">
                                    <a href="#" class="btn btn-outline-light btn--rounded">Learn More</a></div>
                            </div>
                            <!-- LAYER NR. 14 -->
                            <div class="tp-caption  " id="slide-38-layer-4" data-x="100" data-y="100" data-width="['auto']" data-height="['auto']" data-type="column" data-responsive_offset="on" data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5610","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-columnwidth="25%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; width: 100%;"></div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div><!-- END REVOLUTION SLIDER -->
    <section class="subscribe-three">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-5">
                            <h4>Get Latest News Update!</h4>
                        </div><!-- ends: .col-lg-5 -->
                        <div class="col-lg-7">
                            <form action="/" class="intro-form m-0" _lpchecked="1">
                                <div class="input-group input-group-light">
                                    <span class="icon-left" id="basic-addon7"><i class="la la-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter your email" aria-label="Username">
                                </div>
                                <div><button type="submit" class="btn btn-primary">Get Started</button></div>
                            </form>
                        </div><!-- ends: .col-lg-7 -->
                    </div><!-- ends .row -->
                </div>
            </div>
        </div>
    </section><!-- ends: .subscribe-three -->
    <section class="p-top-110 p-bottom-80 section-bg">
        <div class="icon-boxes icon-box--fifteen">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box icon-box-15 text-center">
                            <img src="{{ asset('theme_front/img/service7.png') }}" alt="">
                            <h6>Principal Investing</h6>
                            <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi archi. Totam rem aperiam, eaque ipsa.</p>
                        </div><!-- ends: .icon-box -->
                    </div><!-- ends: .col-lg-4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box icon-box-15 text-center">
                            <img src="{{ asset('theme_front/img/service8.png') }}" alt="">
                            <h6>Project Development</h6>
                            <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi archi. Totam rem aperiam, eaque ipsa.</p>
                        </div><!-- ends: .icon-box -->
                    </div><!-- ends: .col-lg-4 -->
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box icon-box-15 text-center">
                            <img src="{{ asset('theme_front/img/service9.png') }}" alt="">
                            <h6>Financial Advisory</h6>
                            <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi archi. Totam rem aperiam, eaque ipsa.</p>
                        </div><!-- ends: .icon-box -->
                    </div><!-- ends: .col-lg-4 -->
                </div><!-- ends: .row -->
            </div>
        </div><!-- ends: .icon-boxes -->
    </section>
    <section class="p-top-100 p-bottom-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-bottom-50">
                        <div class="divider text-center">
                            <h1 class="color-dark">Expertise Areas</h1>
                            <p class="mx-auto">Investiga tiones demonstr averunt lectres legere me lius quod qua legunt saepius Clarias estre etiam pro cessus dynamicus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-style-ten">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="card--seven card--ten">
                            <figure>
                                <img src="{{ asset('theme_front/img/c1.jpg') }}" alt="">
                            </figure>
                            <div class="card-body px-0 pb-0">
                                <h6><a href="">Insurance And Finance</a></h6>
                                <p>Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes.</p>
                                <a href="" class="btn btn-outline-primary">See Details</a>
                            </div>
                        </div><!-- End: .card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card--seven card--ten">
                            <figure>
                                <img src="{{ asset('theme_front/img/c2.jpg') }}" alt="">
                            </figure>
                            <div class="card-body px-0 pb-0">
                                <h6><a href="">Business And Consulting</a></h6>
                                <p>Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes.</p>
                                <a href="" class="btn btn-outline-primary">See Details</a>
                            </div>
                        </div><!-- End: .card -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card--seven card--ten">
                            <figure>
                                <img src="{{ asset('theme_front/img/c3.jpg') }}" alt="">
                            </figure>
                            <div class="card-body px-0 pb-0">
                                <h6><a href="">Strategy Advisory</a></h6>
                                <p>Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes.</p>
                                <a href="" class="btn btn-outline-primary">See Details</a>
                            </div>
                        </div><!-- End: .card -->
                    </div>
                </div><!-- ends: .card-style-row -->
            </div>
        </div><!-- ends: .card-style-nine -->
    </section><!-- ends: .section-padding -->
    <section class="content-block section-bg content--block8 p-top-110 p-bottom-110">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5 margin-md-60">
                    <div class="divider text-left">
                        <span class="subtext">Annual Report</span>
                        <h3>From Strategy to Results</h3>
                        <p>Investiga tiones demonstr averunt lectores legere me lius quod ii qua legunt saepius. Claritas est etiam pro cessus dynamicus quipro keds sequitur mutay.</p>
                    </div>
                    <div class="m-top-30">
                        <ul class="bullet--list1">
                            <li class="bullet_list"><strong class="color-dark">Professional -</strong> Delivers solutions that help drive</li>
                            <li class="bullet_list"><strong class="color-dark">Business -</strong> Human capital research analytics</li>
                            <li class="bullet_list"><strong class="color-dark">Services -</strong> Complex problems bringing an approach</li>
                            <li class="bullet_list"><strong class="color-dark">Strategy -</strong> Works with senior executives to help them</li>
                        </ul><!-- ends: .bullet--list1 -->
                    </div>
                </div><!-- ends: .col-lg-5 -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="bar-chart_wrap cardify">
                        <canvas class="bar-chart"></canvas>
                        <div class="bar-legend legend"></div>
                    </div><!-- End: .bar-chart_wrap -->
                </div><!-- ends: .col-lg-6 -->
            </div>
        </div>
    </section><!-- ends: .content-block -->
    <div class="p-top-100 p-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <div class="divider text-center">
                            <h1 class="color-dark">Featured Projects</h1>
                            <p class="mx-auto">Investiga tiones demonstr averunt lectres legere me lius quod qua legunt saepius Clarias estre etiam pro cessus dynamicus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="filter-sort">
                            <ul id="card_filter">
                                <li data-uk-filter="" class="active"> All</li>
                                <li data-uk-filter="1"> Business Service</li>
                                <li data-uk-filter="2"> Financial Services</li> 
                                <li data-uk-filter="3"> Travel & Aviation</li>
                                <li data-uk-filter="4"> Academic Research</li>
                            </ul>
                        </div><!-- ends: .filter-sort -->
                    </div><!-- ends: .col-lg-12 -->
                </div>
                <div class="row" data-uk-grid="{controls: '#card_filter'}">
                    <div data-uk-filter="2,4" class="col-lg-4 col-md-6">
                        <div class="card card-shadow card-one">
                            <figure>
                                <img src="{{ asset('theme_front/img/c1.jpg') }}" alt="">
                                <figcaption>
                                    <a href=""><i class="la la-link"></i></a>
                                </figcaption>
                            </figure>
                            <div class="card-body">
                                <p class="card-subtitle color-secondary">Business Services</p>
                                <h6><a href="">Financial Sustainability</a></h6>
                            </div>
                        </div><!-- Ends: .card -->
                    </div>
                    <div data-uk-filter="3,1" class="col-lg-4 col-md-6">
                        <div class="card card-shadow card-one">
                            <figure>
                                <img src="{{ asset('theme_front/img/c2.jpg') }}" alt="">
                                <figcaption>
                                    <a href=""><i class="la la-link"></i></a>
                                </figcaption>
                            </figure>
                            <div class="card-body">
                                <p class="card-subtitle color-secondary">Business Services</p>
                                <h6><a href="">Financial Sustainability</a></h6>
                            </div>
                        </div><!-- Ends: .card -->
                    </div>
                    <div data-uk-filter="2,3" class="col-lg-4 col-md-6">
                        <div class="card card-shadow card-one">
                            <figure>
                                <img src="{{ asset('theme_front/img/c3.jpg') }}" alt="">
                                <figcaption>
                                    <a href=""><i class="la la-link"></i></a>
                                </figcaption>
                            </figure>
                            <div class="card-body">
                                <p class="card-subtitle color-secondary">Business Services</p>
                                <h6><a href="">Financial Sustainability</a></h6>
                            </div>
                        </div><!-- Ends: .card -->
                    </div>
                    <div data-uk-filter="1,4" class="col-lg-4 col-md-6">
                        <div class="card card-shadow card-one">
                            <figure>
                                <img src="{{ asset('theme_front/img/c1.jpg') }}" alt="">
                                <figcaption>
                                    <a href=""><i class="la la-link"></i></a>
                                </figcaption>
                            </figure>
                            <div class="card-body">
                                <p class="card-subtitle color-secondary">Business Services</p>
                                <h6><a href="">Financial Sustainability</a></h6>
                            </div>
                        </div><!-- Ends: .card -->
                    </div>
                    <div data-uk-filter="4,3" class="col-lg-4 col-md-6">
                        <div class="card card-shadow card-one">
                            <figure>
                                <img src="{{ asset('theme_front/img/c2.jpg') }}" alt="">
                                <figcaption>
                                    <a href=""><i class="la la-link"></i></a>
                                </figcaption>
                            </figure>
                            <div class="card-body">
                                <p class="card-subtitle color-secondary">Business Services</p>
                                <h6><a href="">Financial Sustainability</a></h6>
                            </div>
                        </div><!-- Ends: .card -->
                    </div>
                    <div data-uk-filter="1,2" class="col-lg-4 col-md-6">
                        <div class="card card-shadow card-one">
                            <figure>
                                <img src="{{ asset('theme_front/img/c3.jpg') }}" alt="">
                                <figcaption>
                                    <a href=""><i class="la la-link"></i></a>
                                </figcaption>
                            </figure>
                            <div class="card-body">
                                <p class="card-subtitle color-secondary">Business Services</p>
                                <h6><a href="">Financial Sustainability</a></h6>
                            </div>
                        </div><!-- Ends: .card -->
                    </div>
                </div><!-- ends: .row -->
            </div>
        </div><!-- ends: .filter-wrapper -->
    </div><!-- ends: .section-padding2 -->
    <div class="counter counter--3 biz_overlay overlay--primary">
        <div class="bg_image_holder"><img src="{{ asset('theme_front/img/cbg2.jpg') }}" alt=""></div>
        <div class="container content_above">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-around flex-wrap">
                        <div class="counter_single">
                            <div class="icon">
                                <span class="la la-folder-open-o"></span>
                            </div>
                            <p class="value count_up">385</p>
                            <p class="title">Project completed</p>
                        </div><!-- end: .counter_single -->
                        <div class="counter_single">
                            <div class="icon">
                                <span class="la la-headphones"></span>
                            </div>
                            <p class="value count_up">260</p>
                            <p class="title">Consultant</p>
                        </div><!-- end: .counter_single -->
                        <div class="counter_single">
                            <div class="icon">
                                <span class="la la-trophy"></span>
                            </div>
                            <p class="value count_up">150</p>
                            <p class="title">Award Winning</p>
                        </div><!-- end: .counter_single -->
                        <div class="counter_single">
                            <div class="icon">
                                <span class="la la-user-plus"></span>
                            </div>
                            <p class="value count_up">100</p>
                            <p class="title">Satisfied Customers</p>
                        </div><!-- end: .counter_single -->
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ends: .counter -->
    <div class="section-split p-top-100 p-bottom-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="m-bottom-55">
                        <div class="divider divider-simple text-left">
                            <h2>Tizara Awards</h2>
                            <p>Investiga tiones demonstr averunt lectres legere me lius quod waqua legunt saepius.</p>
                        </div>
                    </div>
                    <div class="logo-carousel-two owl-carousel">
                        <div class="carousel-single">
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl14.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl15.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                        </div><!-- end: .carousel-single -->
                        <div class="carousel-single">
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl16.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl17.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                        </div><!-- end: .carousel-single -->
                        <div class="carousel-single">
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl14.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl15.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                        </div><!-- end: .carousel-single -->
                        <div class="carousel-single">
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl16.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl17.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                        </div><!-- end: .carousel-single -->
                        <div class="carousel-single">
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl14.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                            <div class="logo-box">
                                <img src="{{ asset('theme_front/img/cl15.png') }}" alt="">
                            </div><!-- ends: .logo-box -->
                        </div><!-- end: .carousel-single -->
                    </div>
                </div><!-- ends: .col-lg-5 -->
                <div class="col-lg-5 offset-lg-2 skills">
                    <div class="m-bottom-55">
                        <div class="divider divider-simple text-left">
                            <h2>Professional Skills</h2>
                            <p>Investiga tiones demonstr averunt lectres legere me lius quod waqua legunt.</p>
                        </div>
                    </div>
                    <div class="progress-wrapper">
                        <div class="labels d-flex justify-content-between">
                            <span>Business</span>
                            <span>70%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><!-- ends: .progress -->
                    </div><!-- ends: .progress-wrapper -->
                    <div class="progress-wrapper">
                        <div class="labels d-flex justify-content-between">
                            <span>Corporate</span>
                            <span>85%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><!-- ends: .progress -->
                    </div><!-- ends: .progress-wrapper -->
                    <div class="progress-wrapper">
                        <div class="labels d-flex justify-content-between">
                            <span>Finance</span>
                            <span>90%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><!-- ends: .progress -->
                    </div><!-- ends: .progress-wrapper -->
                    <div class="progress-wrapper">
                        <div class="labels d-flex justify-content-between">
                            <span>Strategy</span>
                            <span>75%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><!-- ends: .progress -->
                    </div><!-- ends: .progress-wrapper -->
                </div><!-- ends: .col-lg-5 -->
            </div>
        </div>
    </div><!-- ends: .section-split -->
    <section class="carousel-wrapper tc-four-wrapper bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-carousel-four owl-carousel">
                        <div class="carousel-single text-center">
                            <img src="{{ asset('theme_front/img/client1.jpg') }}" alt="" class="rounded-circle">
                            <p class="author-spec"><strong>Jeff Collins,</strong> <span>Aazztech</span></p>
                            <div class="author-text">
                                <p>Investig ationes demons trave runt lectores legere lius quod ii legunt saepius vbtclary tyitas Investig ationes demon travey rungt. Investig ationes mons trave runt lector ompanies leaders.</p>
                            </div>
                        </div><!-- end: .carousel-single -->
                        <div class="carousel-single text-center">
                            <img src="{{ asset('theme_front/img/client1.jpg') }}" alt="" class="rounded-circle">
                            <p class="author-spec"><strong>Jeff Collins,</strong> <span>Aazztech</span></p>
                            <div class="author-text">
                                <p>Investig ationes demons trave runt lectores legere lius quod ii legunt saepius vbtclary tyitas Investig ationes demon travey rungt. Investig ationes mons trave runt lector ompanies leaders.</p>
                            </div>
                        </div><!-- end: .carousel-single -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-top-100 p-bottom-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <div class="divider text-center">
                            <h1 class="color-dark">Pricing Options</h1>
                            <p class="mx-auto">Investiga tiones demonstr averunt lectres legere me lius quod qua legunt saepius Clarias estre etiam pro cessus dynamicus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing pricing--1 shadow-lg-2">
                        <div class="pricing__title">
                            <h4>Starter</h4>
                            <span>Basic Solution</span>
                        </div>
                        <div class="pricing__price rounded">
                            <p><sup>$</sup>29<small>/month</small></p>
                        </div>
                        <div class="pricing__features">
                            <ul>
                                <li>Limitless Concepts</li>
                                <li>Annual Reports</li>
                                <li>Free Support</li>
                                <li>Expert Reviews</li>
                                <li>Community Access</li>
                            </ul><!-- end: .pricing__features > .pricing -->
                        </div>
                        <a href="#" class="btn btn-outline-secondary">purchase</a>
                    </div><!-- end: .pricing -->
                </div><!-- ends .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pricing pricing--1 shadow-lg-2">
                        <div class="pricing__title">
                            <h4>Professional</h4>
                            <span>Advanced Solutions</span>
                        </div>
                        <div class="pricing__price rounded">
                            <p><sup>$</sup>49<small>/month</small></p>
                        </div>
                        <div class="pricing__features">
                            <ul>
                                <li>Limitless Concepts</li>
                                <li>Annual Reports</li>
                                <li>Free Support</li>
                                <li>Expert Reviews</li>
                                <li>Community Access</li>
                            </ul><!-- end: .pricing__features > .pricing -->
                        </div>
                        <a href="#" class="btn btn-outline-secondary">purchase</a>
                    </div><!-- end: .pricing -->
                </div><!-- ends .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="pricing pricing--1 shadow-lg-2">
                        <div class="pricing__title">
                            <h4>Enterprise</h4>
                            <span>Customizable Solutions</span>
                        </div>
                        <div class="pricing__price rounded">
                            <p><sup>$</sup>69<small>/month</small></p>
                        </div>
                        <div class="pricing__features">
                            <ul>
                                <li>Limitless Concepts</li>
                                <li>Annual Reports</li>
                                <li>Free Support</li>
                                <li>Expert Reviews</li>
                                <li>Community Access</li>
                            </ul><!-- end: .pricing__features > .pricing -->
                        </div>
                        <a href="#" class="btn btn-outline-secondary">purchase</a>
                    </div><!-- end: .pricing -->
                </div><!-- ends .col-lg-4 -->
            </div>
        </div>
    </section><!-- ends:.section-padding -->
    <section class="cta-wrapper-sm cta--seven bgimage biz_overlay overlay--secondary">
        <div class="bg_image_holder">
            <img src="{{ asset('theme_front/img/cta3.png') }}" alt="">
        </div>
        <div class="container content_above">
            <div class="row d-flex align-items-center">
                <div class="col-lg-9">
                    <p class="m-0 color-light">Are you ready to start your business?</p>
                </div>
                <div class="col-lg-3">
                    <div class="action-btn">
                        <a href="" class="btn btn-light">Get a quote</a>
                    </div>
                </div>
            </div><!-- .row -->
        </div>
    </section><!-- ends: .cta-wrapper-sm -->
    <footer class="footer5 footer--bw">
        <div class="footer__big">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget text_widget">
                            <img class="footer_logo" src="{{ asset('theme_front/img/logo-white.png') }}" alt="logo">
                            <p>Nunc placerat mi id nisi interdum they mtolis. Praesient is pharetra justo ught scel
                                erisque the mattis lhreo quam nterdum mollisy.</p>
                            <a href="#">Read More About <span class="la la-chevron-right"></span></a>
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                        <div class="widget widget--links">
                            <h4 class="widget__title">quick links</h4>
                            <ul class="links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contacts Us</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex justify-content-lg-center">
                        <div class="widget widget--links">
                            <h4 class="widget__title">our services</h4>
                            <ul class="links">
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Management</a></li>
                                <li><a href="#">Accounting</a></li>
                                <li><a href="#">Training</a></li>
                                <li><a href="#">Consultation</a></li>
                            </ul>
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget subcribe--widget">
                            <h4 class="widget__title">Newsletter</h4>
                            <p>Subscribe to get update and information. Don't worry, we won't send spam!</p>
                            <form class="subscribe_form">
                                <div class="input_with_embed">
                                    <input type="text" class="form-control-lg input--rounded border-0" placeholder="Enter email">
                                    <div class="embed_icon">
                                        <span class="la la-envelope"></span>
                                    </div>
                                </div>
                            </form>
                            <div class="widget__social">
                                <div class="social  ">
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="#" class="facebook"><span class="fab fa-facebook-f"></span></a></li>
                                        <li><a href="#" class="twitter"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#" class="linkedin"><span class="fab fa-linkedin-in"></span></a></li>
                                        <li><a href="#" class="gplus"><span class="fab fa-google-plus-g"></span></a></li>
                                    </ul>
                                </div><!-- ends: .social -->
                            </div>
                        </div><!-- ends: .widget -->
                    </div><!-- ends: .col-lg-3 -->
                </div>
            </div>
        </div><!-- ends: .footer__big -->
        <div class="footer__small text-center">
            <p>©2019 Tizara. All rights reserved. Created by <a href="#">AazzTech</a></p>
        </div><!-- ends: .footer__small -->
    </footer>
    <div class="go_top">
        <span class="la la-angle-up"></span>
    </div>
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
    <!-- endinject-->
</body>

</html>