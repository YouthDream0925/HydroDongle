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
        <div class="row item-space">
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
<section class="card-style p-top-100 p-bottom-100 border-bottom">
    <div class="testimonial--card2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 section-title text-center">
                    <h3>{{ __('global.featureTitle') }}</h3>
                    <p>Discover the Power of Hydra Tool Services - Let's Take a Look!</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/FRP-REMOVE.svg') }}" alt="">
                            </div>
                            <h6>FRP REMOVE</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>FRP is a security feature that prevents unauthorized access after a factory reset. 
                                Hydra Tool offers one-click FRP removal for almost all brand models of Android devices.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/REPAIR-IMEI.svg') }}" alt="">
                            </div> 
                            <h6>REPAIR IMEI</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool's Repaire IMEI function efficiently restores lost, damaged, or invalid IMEI numbers for Android devices, ensuring optimal functionality and security.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/RESET.svg') }}" alt="">
                            </div>  
                            <h6>RESET</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Factory Reset (Format) function enables a swift and dependable reset process for Android phones, erasing all personal data, including screen locks, pins, and passwords.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/READ-FRM.svg') }}" alt="">
                            </div> 
                            <h6>READ FRM</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool's ability to backup and restore Android device firmware (ROM) is critical for preserving stock firmware and facilitating the seamless transfer of firmware to other devices of the same model.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/BOOTLOADER-UNLOCK.svg') }}" alt="">
                            </div>                         
                            <h6>BOOTLOADER UNLOCK</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool unlocks the Android bootloader, critical for establishing a root of trust, and facilitates custom ROM installation and OS modifications that grant access to lower-level device operations.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/WRITE-FRM.svg') }}" alt="">
                            </div>                        
                            <h6 class="color-dark">WRITE FRM</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool's capability to write fireware (ROM) to Android devices is crucial for updating or customizing device firmware. It supports all vendor image files and formats, providing a reliable and efficient solution.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/MI-ACCOUNT-REMOVE.svg') }}" alt="">
                            </div>                     
                            <h6>MI ACCOUNT REMOVE</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool efficiently bypasses forgotten Mi Account Locks on Xiaomi-based devices (Redmi, POCO, and Mi), providing a convenient and reliable solution for users who have lost account access.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/DEMO-REMOVE.svg') }}" alt="">
                            </div>                         
                            <h6>DEMO REMOVE</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool unlocks vendor demo devices, restoring them to their original state. This capability resets demo devices and is effortless with Hydra Tool.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <div class="carousel-single" style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 1rem;">
                                <img class="img-fluid img-responsive" src="{{ asset('theme_front/features/SIM-UNLOCK.svg') }}" alt="">
                            </div>                        
                            <h6>SIM UNLOCK</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <p>Hydra Tool's tested one-click unlock solutions transform the device state to "Factory Unlocked" by removing SIM and operator locks, unlocking its full potential through reliable and powerful technology.</p>
                        </div>
                    </div><!-- End: .card-body -->
                </div><!-- ends: .col-lg-4 -->
            </div><!-- ends: .row -->
        </div>
    </div><!-- ends: .testimonial--card2-->
</section>
<section class="content-block content-block--15 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 section-title">
                <h2>Stay ahead with Hydra Tool <br> Stay in control</h2>
                <p>Powerful, advanced, and complete - these are the values that we stand for at Hydra Tool. Our motivation is to empower our users with the tools they need to achieve success result.</p>
            </div><!-- ends: .section-title -->
            <div class="col-lg-12 m-bottom-20">
                <div class="row align-items-center">
                    <div class="col-lg-5 order-lg-0 order-1">
                        <div class="content-desc">
                            <h4>First-Class Solutions for Unlockers</h4>
                            <p>We're proud to be part of the world of unlockers, providing our users with first-class software and the latest technology. Our team is motivated by a drive to deliver powerful functions and advanced features that make for complete solutions.
                                <br><br>We focus on developing tools that deliver the results our users need.</p>
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
                            <h4>Comprehensive Support</h4>
                            <p>At Hydra Tool, we provide top-notch support. Our experienced team is dedicated to helping you get the most out of your tools, whether you need assistance with installation, troubleshooting, or usage.We believe that great support is essential to delivering a top-quality product, so we invest heavily in our support services.
                                <br><br> From comprehensive online resources to one-on-one support sessions, we're here to ensure your success.</p>
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
                            <div class="col-lg-6 m-bottom-50">
                                <div class="form-group">
                                    <div class="select-basic">
                                        <select id="brand_selecter" class="form-control border-0">
                                            <option value="">Phone Brand</option>
                                            @foreach($real_brands as $brand)
                                                @if($brand->hasMedia('brand_image'))
                                                <option value="{{ $brand->brand_id }}" data-brand="{{ $brand->brand_name }}" data-brandUrl="{{ $brand->getMedia('brand_image')->first()->getUrl() }}">{{ $brand->brand_name }}</option>
                                                @else
                                                <option value="{{ $brand->brand_id }}" data-brand="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 m-bottom-50">
                                <div class="form-group">
                                    <div class="select-basic">
                                        <select id="model_selecter" class="form-control border-0">
                                            <option value="">Phone Model</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="brand_container" class="col-lg-4">
                            </div>
                            <div id="phone_model_container" class="col-lg-4">
                            </div>
                            <div id="cpu_container" class="col-lg-4">
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
                                    <h6><a href="{{ url('/devices/brand/model/'.$model->id) }}">{{ $model->name }}</a></h6>
                                    <span class="team-designation">{{ $model->brand->brand_name }}</span>
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