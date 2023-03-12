@extends('layouts.front.index')

@push('css')
<link rel="stylesheet" href="{{ asset('theme_front/custom/toast.css') }}">
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

<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/breadbg.jpg') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">
                                {{ __('global.downloadDrivers') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="section-padding section-bg">
    <div class="content-block section-bg section-feature-boxes">
        <div class="container">
            <div class="row">
                @foreach($cpus as $cpu)
                <div class="col-lg-6 mb-5">
                    <div class="feature-boxes row">
                        <div class="col-md-12">
                            @if($cpu->hasMedia('cpu_image'))
                            <div style="width: 200px; height: 70px; margin-left: auto; margin-right: auto;">
                                <img class="img-fluid img-responsive" src="{{$cpu->getMedia('cpu_image')->first()->getUrl()}}"/>
                            </div>
                            @else
                            <div class="icon-box-nine text-center">
                                <span class="icon-rounded-sm"><i class="la la-sun-o"></i></span>
                            </div><!-- ends: .icon-box -->
                            @endif
                        </div>
                        @foreach($cpu->drivers as $driver)
                        <div class="col-md-12">                            
                            <div class="icon-box-nine text-center">
                                <a href="{{ $driver->driver_link }}" target="_blank"><span class="icon-rounded-sm"><i class="la la-sun-o"></i></span></a>
                                <h6>{{ $driver->driver_name }}</h6>
                                <p class="">{{ $driver->description }}</p>
                            </div><!-- ends: .icon-box -->
                        </div><!-- ends: .col-md-3 -->
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div><!-- ends: .content-block -->
</section>
@csrf
@endsection

@push('script')
<script type="module">
    import Drivers from '{{ asset("theme_front/custom/js/drivers.js") }}';
    Drivers();
</script>
@endpush