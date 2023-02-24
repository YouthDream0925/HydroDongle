@extends('layouts.front.index')

@push('css')
<link rel="stylesheet" href="{{ asset('theme_front/custom/toast.css') }}">
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/breadbg.jpg') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item"><a class="custom-a-breadcrumb" href="{{ route('devices') }}">{{ __('global.devices') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple !important;">{{ __('global.brand') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="service-tab-wrapper section-padding" style="padding-top: 50px !important;">
    <div class="tab service--tabs">
        <div class="container">
            <div class="row item-space mb-5">
                <!-- search widget -->
                <div class="col-lg-4 col-md-6 col-sm-8 widget-wrapper">
                    <div class="search-widget">
                        <form action="{{ route('devices.brand', $brand->brand_id) }}">
                            <div class="input-group">
                                <input type="text" name="name" value="{{ request()->get('name') }}" class="fc--rounded" placeholder="Search">
                                <button type="submit"><i class="la la-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div><!-- ends: .widget-wrapper -->
            </div>
            <div class="row">
                <div class="col-lg-3 sidebar item-space">
                    <div class="download-widget m-bottom-30">
                        <div class="header">
                            <h6>BRAND</h6>
                        </div>
                        <div class="content">
                            @if($brand->hasMedia('brand_image'))
                            <img src="{{ $brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                            @else
                            <img src="{{ asset('theme_front/img/brochure.jpg') }}" alt="">
                            @endif                            
                        </div>
                    </div><!-- ends: .download-widget -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-lg-1"></div>
                <div class="col-lg-8">
                    <div class="tab-content" id="tabContent1">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                            <div class="contents-1">
                                <div class="row">
                                    @if(count($models) != 0)
                                        @foreach($models as $model)
                                        <div class="col-md-12">
                                            <div class="icon-box-four d-flex item-center">
                                                <div class="box-icon">
                                                    @if($model->hasMedia('model_image'))
                                                    <div style="width: 100px; height: 100px;">
                                                        <img class="img-fluid img-responsive" src="{{ $model->getMedia('model_image')->first()->getUrl() }}" alt="">
                                                    </div>                                                
                                                    @else
                                                    <span class="icon-rounded-sm"><i class="la la-thumbs-up"></i></span>
                                                    @endif
                                                </div>
                                                <div class="box-content">
                                                    <h6><a href="{{ route('devices.brand.model', $model->id) }}">{{ $model->name }}</a></h6>
                                                    <p>{{ $model->note }}</p>
                                                </div>
                                            </div><!-- ends: .icon-box -->
                                        </div><!-- ends: .col-md-6 -->
                                        @endforeach
                                    @else
                                    <div class="col-md-12 text-center">
                                        <h4>There is no models.</h4>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div><!-- ends: .tab-pane -->
                    </div>
                </div><!-- ends: .col-lg-9 -->
            </div>
        </div>
    </div><!-- ends: .service--tabs -->
</section><!-- ends: .service-tab-wrapper -->
@endsection

@push('script')
@endpush