<div class="col-lg-3 col-md-6">
    <div class="adress portfolio-carousel-single">
        @if($brand->hasMedia('brand_image'))
        <figure>
            <div style="width: 160px; height: 160px; margin-left: auto; margin-right: auto;">
                <img class="img-fluid img-responsive" src="{{ $brand->getMedia('brand_image')->first()->getUrl() }}"/>
            </div>
            <figcaption>
                <a href="" class="link"><i class="la la-link"></i></a>
            </figcaption>
        </figure>
        @else
        <img src="{{ asset('theme_front/img/ukf.png') }}" alt="img/ukf.png">
        @endif
    </div><!-- end: .adress -->
</div><!-- ends: .col-lg-3 -->