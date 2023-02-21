@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex align-items-center justify-content-between flex-wrap">
                    <h4 class="page_title">{{ $product->name }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="product-details p-top-60 p-bottom-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 margin-md-60">
                <div class="product-gallery">
                    <div class="gallery-image-view">
                        <div class="image-view-carousel owl-carousel">
                            <div class="carousel-single" data-hash="image1">
                                @if($product->hasMedia('product_image'))
                                <figure><img src="{{ $product->getMedia('product_image')->first()->getUrl() }}" alt=""></figure>
                                @else
                                <figure><img src="{{ asset('theme_front/img/p1.jpg') }}" alt=""></figure>
                                @endif
                            </div>
                        </div><!-- ends: .image-view-carousel -->
                    </div><!-- ends: .gallery-image-view -->
                </div>
            </div><!-- ends: .col-lg-5 -->
            <div class="col-lg-6 offset-lg-1">
                <div class="product-info">
                    <h4>{{ $product->name }}</h4>
                    <span class="product-price">${{ $product->discount }}</span>
                    <div class="product-ratings d-flex">
                        <p>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                        </p>
                    </div>
                    <p>Investiga tiones demonstr averunt lectres legere me lius quod itqua legunt saepius. Clarias est etiam pro cessus dyna micus quas seqtur mutaety tionem consu. Investiga tiones demonstr averunt wa lectres legere me ktliusu quod itqu legunt saepius. </p>
                    <div class="product-actions">
                        <form action="#" class="flex-wrap">
                            <ul class="d-flex">
                                <li><a href="" class="btn btn--rounded btn-primary">Add To Cart</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div><!-- ends: .col-lg-6 -->
        </div>
    </div>
</section><!-- ends: .product-details -->
@endsection

@push('script')
@endpush