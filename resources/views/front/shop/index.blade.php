@extends('layouts.front.index')

@push('css')
<link rel="stylesheet" href="{{ asset('theme_front/custom/toast.css') }}">
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/shop.png') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">{{ __('global.shop') }}</li>
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
                        <p><sup>$</sup>{{ $product->price }}</p>
                    </div>
                    <div class="pricing__features">
                        <ul>
                            @foreach(explode(',', $product->features) as $feature)
                            <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ route('shop.checkout', $product->id) }}" onclick="return CheckLogin();" class="btn btn-outline-secondary">purchase</a>
                </div><!-- end: .pricing -->
            </div><!-- ends .col-lg-4 -->
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    function CheckLogin() {
        @if(Auth::check())
            return true;
        @else
            toast('error', 'please log in first.');
            return false;
        @endif
    }

    function toast(status, message) {
        css = status;
        let x = $('#snackbar');
        x.addClass(status + ' show');
        x.html(message);
        setTimeout(remove_toast, 3000);
    }

    function remove_toast() {
        let x = $('#snackbar');
        x.removeClass(css + ' show'); 
    }
</script>
@endpush