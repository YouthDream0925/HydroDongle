@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/breadbg.jpg') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <h4 class="page_title">{{ __('global.contactUs') }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('global.home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('global.contactUs') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="contact--four">
    <div class="list-inline-wrapper p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="icon-list--three d-flex list--inline">
                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-headphones"></i></span></div>
                            <div class="contents">
                                <h6>800 567.890.576</h6>
                                <span class="sub-text">Mon-Sat 8am - 18pm</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-envelope"></i></span></div>
                            <div class="contents">
                                <h6>{{ $super_admin->email }}</h6>
                                <span class="sub-text">Free enquiry</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-map-marker"></i></span></div>
                            <div class="contents">
                                <h6>Melbourne, Australia</h6>
                                <span class="sub-text">95 South Park Avenue</span>
                            </div>
                        </li>
                    </ul><!-- ends: .icon-list--three -->
                </div>
            </div>
        </div>
    </div><!-- ends: .list-inline -->
    <div class="container p-top-100 p-bottom-110">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-wrapper">
                    <div class="m-bottom-10">
                        <div class="divider divider-simple text-left">
                            <h3>Let&#39;s Get In Touch</h3>
                        </div>
                    </div>
                    <p class="m-bottom-30">Investiga tiones demonstr averunt lectres legere me lius quod ii qua legunt saepius larias est etiam pro cessus.</p>
                    <form action="#">
                        <input type="text" class="form-control form-outline mb-4" placeholder="Name" required>
                        <input type="email" class="form-control form-outline mb-4" placeholder="Email" required>
                        <textarea class="form-control form-outline mb-4" placeholder="Messages" required></textarea>
                        <button class="btn btn-primary">Submit Now</button>
                        </form>
                    </div><!-- end: .form-wrapper -->
                </div><!-- ends: .col-lg-6 -->
                <div class="col-lg-6">
                    <div class="m-bottom-25">
                        <div class="divider divider-simple text-left">
                            <h3>Google Map</h3>
                        </div>
                    </div>
                    <div class="gmap2">
                        <div class="map" id="map3"></div><!-- end: .map -->
                    </div>
                </div><!-- ends: .col-lg-6 -->
            </div>
        </div>
    </section><!-- ends: .contact--four -->
@endsection

@push('script')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
<script src="{{ asset('theme_front/theme_assets/js/map.js') }}"></script>
@endpush