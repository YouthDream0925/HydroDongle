<div class="col-lg-3 col-md-6">
    <div class="adress portfolio-carousel-single brand-selector-front p-1">
        @if($brand->hasMedia('brand_image'))
        <a href="{{ route('devices.brand', $brand->brand_id) }}">
            <div style="width: 160px; height: 160px; margin-left: auto; margin-right: auto;">
                <img class="img-fluid img-responsive" src="{{ $brand->getMedia('brand_image')->first()->getUrl() }}"/>
            </div>
        </a>
        @else
        <img src="{{ asset('theme_front/img/ukf.png') }}" alt="img/ukf.png">
        @endif
    </div><!-- end: .adress -->
</div><!-- ends: .col-lg-3 -->