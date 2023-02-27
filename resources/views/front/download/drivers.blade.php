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
<section class="p-top-50">
    <div class="icon-boxes icon-box--four">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="select-basic">
                            <select id="cpu_selector" class="form-control">
                                @foreach($cpus as $cpu)
                                <option value="{{ $cpu->id }}">{{ $cpu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- End: .form-group -->
                </div><!-- ends: .col-lg-6 -->
            </div>
            <div id="drivers_container" class="row p-top-50">
                @foreach($drivers as $driver)
                <div class="col-lg-12 col-md-12">
                    <div class="icon-box-four d-flex">
                        <div class="box-icon">
                            <a href="{{ $driver->driver_link }}" target="_blank"><span class="icon-rounded-sm"><i class="la la-download"></i></span></a>
                        </div>
                        <div class="box-content">
                            <h6>{{ $driver->driver_name}} <span class="badge bg-success">{{ $driver->driver_version }}</span></h6>
                            <p>{{ $driver->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div><!-- ends: .icon-boxes -->
</section>
@csrf
@endsection

@push('script')
<script type="module">
    import Drivers from '{{ asset("theme_front/custom/js/drivers.js") }}';
    Drivers();
</script>
@endpush