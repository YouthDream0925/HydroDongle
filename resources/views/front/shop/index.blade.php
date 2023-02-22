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
<section class="p-top-100 p-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-bottom-65">
                    <div class="divider text-center">
                        <h1>HYDRA TOOLS</h1>
                        <p class="mx-auto">The Best Physical and Software Tools</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($produts as $product)
            <div class="col-lg-4 col-md-6">
                <div class="pricing pricing--1 shadow-lg-2">
                    <div class="pricing__title">
                        <h4>{{ $product->name }}</h4>
                        <span>Basic Solution</span>
                    </div>
                    <div class="mb-4" style="width: 200px; height: 200px; margin-left: auto; margin-right: auto;">
                        @if($product->hasMedia('product_image'))
                        <img class="img-fluid img-responsive" src="{{ $product->getMedia('product_image')->first()->getUrl() }}" alt="">
                        @else
                        @endif
                    </div>
                    <div class="pricing__price rounded mb-4">
                        <p><sup>$</sup>{{ $product->price }}<small>/month</small></p>
                    </div>
                    <!-- <div class="pricing__features">
                        <ul>
                            <li>Limitless Concepts</li>
                            <li>Annual Reports</li>
                            <li>Free Support</li>
                            <li>Expert Reviews</li>
                            <li>Community Access</li>
                        </ul>
                    </div> -->
                    <a href="{{ route('shop.checkout', $product->id) }}" class="btn btn-outline-secondary">purchase</a>
                </div><!-- end: .pricing -->
            </div><!-- ends .col-lg-4 -->
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('script')
@endpush