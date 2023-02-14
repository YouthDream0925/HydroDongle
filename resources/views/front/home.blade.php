@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="p-top-70 p-bottom-70 border-bottom clients-logo-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-four owl-carousel">
                    @if(count($brands) != 0)
                        @foreach($brands as $brand)
                        <div class="carousel-single" style="width: 145px; height: 60px;">
                            <img class="img-fluid img-responsive" src="{{ $brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                        </div>
                        @endforeach
                    @else
                    <div class="carousel-single">
                        <img src="{{ asset('theme_front/img/cl14.png') }}" alt="">
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <img src="{{ asset('theme_front/img/cl15.png') }}" alt="">
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <img src="{{ asset('theme_front/img/cl16.png') }}" alt="">
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <img src="{{ asset('theme_front/img/cl17.png') }}" alt="">
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <img src="{{ asset('theme_front/img/cl18.png') }}" alt="">
                    </div><!-- ends: .carousel-single -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- ends: clients logo area -->
<section class="features-area border-bottom p-top-105 p-bottom-75">
    <div class="icon-boxes">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 section-title">
                    <h3>{{ __('global.featureTitle') }}</h3>
                    <p>Discover the Power of Hydra Tool Services - Let's Take a Look!</p>
                </div>
                @if(count($features) != 0)
                    @foreach($features as $feature)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="icon-box icon-box-fourteen text-center">
                            @if($feature->hasMedia('icon'))
                            <span style="width: 70px; height: 70px;">
                                <img class="img-fluid img-responsive" src="{{ $feature->getMedia('icon')->first()->getUrl() }}" alt="">
                            </span>
                            @else
                            <span class="bg-secondary icon-rounded">
                                <i class="la la-money"></i>
                            </span>                            
                            @endif                            
                            <h6 class="color-dark">{{ $feature->name }}</h6>
                            <p>{{ $feature->explanation }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div><!-- ends: .icon-boxes -->
</section><!-- ends: .features-area -->
<section class="p-top-105 p-bottom-65">
    <div class="m-bottom-40">
        <div class="divider text-center">
            <h1>Latest Models</h1>
            <p class="mx-auto"></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-carousel-one owl-carousel">
                    @if(count($models) != 0)
                        @foreach($models as $model)
                        <div class="carousel-single">
                            <div class="card card-shadow card--team1">
                                <div class="card-body text-center">
                                    @if($model->hasMedia('model_image'))
                                    <div class="custom-home-model-container">
                                        <img class="img-fluid img-responsive" src="{{ $model->getMedia('model_image')->first()->getUrl() }}" alt="" class="rounded-circle">
                                    </div>
                                    @else
                                    <img src="{{ url('storage/sample/brand') }}" alt="" class="rounded-circle">
                                    @endif
                                    <h6><a href="team-single.html">{{ $model->name }}</a></h6>
                                    <span class="team-designation">{{ $model->brand->brand_name }}</span>
                                    <ul class="team-social d-flex justify-content-center">
                                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div><!-- End: .card -->
                        </div><!-- ends: .carousel-single -->
                        @endforeach
                    @else
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t1.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Jane Shades</a></h6>
                                <span class="team-designation">CEO &amp; Founder</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t2.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Nick Price</a></h6>
                                <span class="team-designation">Business Expert</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t3.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Bob Andrews</a></h6>
                                <span class="team-designation">Financial Expert</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    <div class="carousel-single">
                        <div class="card card-shadow card--team1">
                            <div class="card-body text-center">
                                <img src="img/t1.jpg" alt="" class="rounded-circle">
                                <h6><a href="team-single.html">Jane Shades</a></h6>
                                <span class="team-designation">CEO &amp; Founder</span>
                                <ul class="team-social d-flex justify-content-center">
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- End: .card -->
                    </div><!-- ends: .carousel-single -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</section><!-- end: section -->
@endsection

@push('script')
@endpush