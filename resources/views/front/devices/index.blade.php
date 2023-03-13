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
        <img src="{{ asset('theme_front/banners/supported.png') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">{{ __('global.devices') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="p-top-50 p-bottom-50">
    <div class="address-blocks">
        <div class="container">
            <div class="row item-space">
                <!-- search widget -->
                <div class="col-lg-4 col-md-6 col-sm-8 widget-wrapper">
                    <div class="search-widget">
                        <form action="{{ route('devices') }}">
                            <div class="input-group">
                                <input type="text" name="name" value="{{ request()->get('name') }}" class="fc--rounded" placeholder="Search">
                                <button type="submit"><i class="la la-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div><!-- ends: .widget-wrapper -->
            </div>
            <div id="data-wrapper" class="row ">
                @foreach($brands as $brand)
                <div class="col-lg-3 col-md-6">
                    <div class="adress portfolio-carousel-single">
                        @if($brand->hasMedia('brand_image'))
                        <figure>
                            <div style="width: 160px; height: 160px; margin-left: auto; margin-right: auto;">
                                <img class="img-fluid img-responsive" src="{{ $brand->getMedia('brand_image')->first()->getUrl() }}"/>
                            </div>
                            <figcaption>
                                <a href="{{ route('devices.brand', $brand->brand_id) }}" class="link"><i class="la la-link"></i></a>
                            </figcaption>
                        </figure>
                        @else
                        <img src="{{ asset('theme_front/img/ukf.png') }}" alt="img/ukf.png">
                        @endif
                    </div><!-- end: .adress -->
                </div><!-- ends: .col-lg-3 -->
                @endforeach
            </div>
            <div class="text-center">
                <button id="get-more" class="btn btn-outline-primary">{{ __('global.more') }}</button>
            </div>
        </div><!-- ends: .container -->
    </div><!-- ends: .address-blocks -->
</section><!-- ends: section -->
@endsection

@push('script')
<script type="module">
    import GetData from '{{ asset("theme_front/custom/js/get_data.js") }}';
    GetData('{{ route("devices") }}', '{{ request()->get("name") }}');
</script>
@endpush