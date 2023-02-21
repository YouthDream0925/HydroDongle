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
                    <h4 class="page_title">{{ __('global.ourProducts') }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page">{{ __('global.product') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="shop-products p-top-100 p-bottom-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-bottom-50">
                    <div class="divider text-center">
                        <h1>HYDRA TOOLS</h1>
                        <p class="mx-auto"></p>
                    </div>
                </div>
            </div><!-- ends: .col-lg-12 -->
            <div class="col-lg-12">
                <div class="product-grid">
                    <div class="row">
                        @foreach($produts as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="card card-product">
                                <figure>
                                    <div style="width: 360px; height: 320px; margin-left: auto; margin-right: auto;">
                                        @if($product->hasMedia('product_image'))
                                        <img class="img-fluid img-responsive" src="{{ $product->getMedia('product_image')->first()->getUrl() }}" alt="">
                                        @else
                                        <img class="img-fluid img-responsive" src="{{ asset('theme_front/img/c9.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <figcaption>
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="" class="btn btn--rounded btn-outline-light btn-sm">Add To Cart</a></li>
                                            <!-- <li><a href="" class="btn like-btn"><i class="la la-heart-o"></i></a></li> -->
                                        </ul>
                                    </figcaption>
                                </figure>
                                @if($product->price != $product->discount)
                                <span class="badge badge-pill badge-primary">{{ \AppHelper::instance()->percentage($product->price, $product->discount) }}</span>
                                @endif
                                <div class="card-body">
                                    <h6><a href="{{ route('shop.detail', $product->id) }}">{{ $product->name }}</a></h6>
                                    <div class="prices">
                                        <span class="product-price color-secondary">${{ $product->discount }}</span>
                                    </div>
                                </div>
                            </div><!-- End: .card -->
                        </div><!-- ends: .col-lg-4 -->
                        @endforeach
                    </div>
                </div>
            </div><!-- ends: .col-lg-12 -->
        </div>
    </div>
</section><!-- ends:  -->
@endsection

@push('script')
@endpush