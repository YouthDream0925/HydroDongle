@extends('layouts.front.landing')

@push('css')
@endpush

@section('content')
<div id="preloader" class="loading" style="display: none;">
    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
        <path fill="#000"
            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
        </path>
    </svg>
</div>

<section class="p-top-70 p-bottom-70 border-bottom clients-logo-area">
    <div class="container" style="max-width:100% !important;">
        <div class="row">
            <div class="col-lg-1 col-sm-2"></div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/Allwinner.svg') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/images.jfif') }}" alt="">
            </div>                    
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/huawei-logo-4-1.png') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/Vivo_logo_2019.svg') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/Apple_logo_black.svg') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/Xiaomi_logo.svg') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/Qualcomm-Logo.svg') }}" alt="">
            </div>                    
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/unisoc-logo.png') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/MediaTek-Logo.svg') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2" style="width: 145px; height: 60px;">
                <img class="img-fluid img-responsive" src="{{ asset('theme_front/logos/OPPO_LOGO_2019.svg') }}" alt="">
            </div>
            <div class="col-lg-1 col-sm-2"></div>
        </div>
    </div>
</section><!-- ends: clients logo area -->
<section class="features-area border-bottom p-top-105 p-bottom-75">
    <div class="icon-boxes">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 section-title">
                    <h3>{{ __('global.featureTitle') }}</h3>
                    <p>Discover the Power of Hydra Tool Services - Let's Take a Look!</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/FRP-Remove.png') }}" alt="">
                        </div>
                        <h6 class="color-dark">FRP-REMOVE</h6>
                        <p>Factory Reset Protection (FRP) is a security feature on Android devices with Lollipop
                            5.1 and higher. It is automatically activated when you set up a Google Account on your
                            device. FRP protects your device by preventing unauthorized access to it after a factory
                            reset. Hydra Tool is a tool that can remove FRP with just one click for almost all chip and
                            brand models of Android devices.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/Repair-IMEI.png') }}" alt="">
                        </div>                            
                        <h6 class="color-dark">REPAIR-IMEI</h6>
                        <p>IMEI is an International Mobile Equipment Identity is aunique number identifying a
                            device. The Repair IMEI function is for restoring the original phone's IMEI. It can be used to
                            repair any invalid IMEI issues, such as lost, invalid, or damaged IMEI numbers. Once
                            you use this function to change your IMEI, your Android device will have the same
                            benefits and features as before.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/reset.png') }}" alt="">
                        </div>                       
                        <h6 class="color-dark">RESET</h6>
                        <p>Factory Reset (Format) - it will wipe all of your personal data from your phone. Doing a
                            factory reset of your Android phone will remove your Screen Locks, Pin, Passwords.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/read_frm.png') }}" alt="">
                        </div>                          
                        <h6 class="color-dark">READ FRM</h6>
                        <p>Hydra tool allows you to easily backup and restore the firmware (ROM) on your Android
                            device. This can be useful for preserving the stock firmware or for transferring the
                            firmware to a different device of the same model.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/Bootloader-Unlock.png') }}" alt="">
                        </div>                         
                        <h6 class="color-dark">BOOTLOADER-UNLOCK</h6>
                        <p>The bootloader is a critical component of your Android device that protects its state and
                            establishes a root of trust. Unlocking the bootloader allows you to modify the operating
                            system and install custom ROMs, giving you access to lower-level operations on the
                            device.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/write_frm.png') }}" alt="">
                        </div>                        
                        <h6 class="color-dark">WRITE FRM</h6>
                        <p>Write Firmware - Hydra tool can write firmware (ROM) on your Android devices and
                            supports all vendor image files and formats, providing a reliable and efficient way to
                            update or customize your device's firmware.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/Mi-Account-Remove.png') }}" alt="">
                        </div>                     
                        <h6 class="color-dark">MI-ACCOUNT-REMOVE</h6>
                        <p>Mi Account Lock is a security feature on Xiaomi-based devices, such as Redmi, POCO,
                            and Mi. The Hydra Tool is capable of bypassing forgotten Mi Account Locks, providing a
                            convenient solution for users who have lost access to their Mi accounts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/Demo-Remove.png') }}" alt="">
                        </div>                         
                        <h6 class="color-dark">DEMO-REMOVE</h6>
                        <p>Hydra Tool is able to unlock various vendor demo devices and return them to their
                            original state. This can be useful for restoring demo devices to their factory settings or
                            for making them available for use by users. With the Hydra Tool, you can easily and
                            quickly unlock and reset demo devices from various vendors.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="icon-box icon-box-fourteen text-center">
                        <div class="carousel-single" style="width: 70px; height: 70px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                            <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/FRP-Remove.png') }}" alt="">
                        </div>                        
                        <h6 class="color-dark">DEMO-REMOVE</h6>
                        <p>Hydra Tool is able to unlock various vendor demo devices and return them to their
                            original state. This can be useful for restoring demo devices to their factory settings or
                            for making them available for use by users. With the Hydra Tool, you can easily and
                            quickly unlock and reset demo devices from various vendors.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ends: .icon-boxes -->
</section><!-- ends: .features-area -->
<section class="content-block content-block--15 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 section-title">
                <h2>Amazing Business Solution <br> Whatever Your Needs</h2>
                <p>Deserunt dolore voluptatem assumenda quae possimus sunt dignissimos tempora officia. Lorem ipsum dolor sit amet consectetur adipisicing dolore.</p>
            </div><!-- ends: .section-title -->
            <div class="col-lg-12 m-bottom-20">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-0 order-1">
                        <div class="content-desc">
                            <h4>Insurance And Finance</h4>
                            <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veri tatis et quasi archi. Totam rem aperiam, eaque ipsa quae abillo. Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi archi.
                                <br><br> On the other hand we denounce with righteous indignation and dislike men who are so beguiled.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 order-lg-1 order-0">
                        <div class="width: 535px; height: 491px;">
                            <img class="img-fluid img-reponsive" src="{{ asset('theme_front/banners/banner1.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div><!-- ends: .col-lg-12 -->
            <div class="col-lg-12 m-bottom-20">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="width: 535px; height: 491px;">
                            <img class="img-fluid img-reponsive" src="{{ asset('theme_front/banners/banner2.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="content-desc">
                            <h4>Business And Consulting</h4>
                            <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veri tatis et quasi archi. Totam rem aperiam, eaque ipsa quae abillo. Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi archi.
                                <br><br> On the other hand we denounce with righteous indignation and dislike men who are so beguiled.</p>
                        </div>
                    </div>
                </div>
            </div><!-- ends: .col-lg-12 -->
        </div>
    </div>
</section><!-- ends: .service-area -->
<section class="form-wrapper section-bg contact--from3 p-top-100 p-bottom-110 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-bottom-65">
                    <div class="divider text-center">
                        <h1 class="color-dark">Start With Your Device</h1>
                        <p class="mx-auto d-none"></p>
                    </div>
                </div>
                <div class="form-wrapper">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 m-bottom-20">
                                <div class="form-group">
                                    <div class="select-basic">
                                        <select id="brand_selecter" class="form-control border-0">
                                            <option value="">Phone Brand</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->brand_id }}" data-brand="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 m-bottom-20">
                                <div class="form-group">
                                    <div class="select-basic">
                                        <select id="model_selecter" class="form-control border-0">
                                            <option value="">Phone Model</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                            </div>
                            <div id="phone_model_container" class="col-lg-4">
                            </div>
                            <div class="col-lg-4">
                            </div>
                            <!-- <div class="col-lg-12 text-center">
                                <button class="btn btn-primary">Search For Unlock</button>
                            </div> -->
                        </div>
                    </form>
                </div><!-- end: .form-wrapper -->
            </div>
        </div>
    </div>
</section><!-- ends: .form-wrapper -->
<section class="p-top-105 p-bottom-65">
    <div class="m-bottom-40">
        <div class="divider text-center">
            <h1>Latest Models</h1>
            <p class="mx-auto"></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-carousel-one owl-carousel">
                    @if(count($models) != 0)
                        @foreach($models as $model)
                        <div class="carousel-single">
                            <div class="card card-shadow card--team1">
                                <div class="card-body text-center">
                                    @if($model->hasMedia('model_image'))
                                    <div class="custom-home-model-container">
                                        <img class="img-fluid img-responsive" src="{{ $model->getMedia('model_image')->first()->getUrl() }}" alt="" class="rounded-circle">
                                    </div>
                                    @else
                                    <img src="{{ url('storage/sample/brand') }}" alt="" class="rounded-circle">
                                    @endif
                                    <h6><a href="team-single.html">{{ $model->name }}</a></h6>
                                    <span class="team-designation">{{ $model->brand->brand_name }}</span>
                                    <ul class="team-social d-flex justify-content-center">
                                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- End: .card -->
                        </div><!-- ends: .carousel-single -->
                        @endforeach
                    @else
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t1.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Jane Shades</a></h6>
                                <span class="team-designation">CEO &amp; Founder</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t2.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Nick Price</a></h6>
                                <span class="team-designation">Business Expert</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t3.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Bob Andrews</a></h6>
                                <span class="team-designation">Financial Expert</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t1.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Jane Shades</a></h6>
                                <span class="team-designation">CEO &amp; Founder</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- end: section -->
@csrf
@endsection

@push('script')
<script type="module">
    import { BrandSelector, ModelSelector } from '{{ asset("theme_front/custom/js/home.js") }}';
    jQuery(document).ready(function () {
        BrandSelector();
        ModelSelector();
    });    
</script>
@endpush