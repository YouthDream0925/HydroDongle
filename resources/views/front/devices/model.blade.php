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
                    <h4 class="page_title">{{ __('global.model') }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item"><a href="{{ route('devices') }}">{{ __('global.devices') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('devices.brand', $model->brand->brand_id) }}">{{ __('global.brand') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('global.model') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<div class="p-top-100 p-bottom-80">
    <div class="m-bottom-50">
        <div class="divider divider-simple text-center">
            <h3>{{ $model->name }}</h3>
        </div>
    </div>
    <div class="card-style-eleven">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card card--eleven">
                        <figure>
                            @if($model->brand->hasMedia('brand_image'))
                            <div style="width: 360px; height: 350px; margin-left: auto; margin-right: auto;">
                                <img class="img-fluid img-responsive" src="{{ $model->brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                            </div>
                            @else
                            <img src="{{ asset('theme_front/img/g1.jpg') }}" alt="">
                            @endif
                        </figure>
                        <div class="card-body text-center">
                            <div class="card-contents">
                                <div class="content-top">
                                    <h6>{{ __('global.brand') }}</h6>
                                </div>
                                <div class="content-bottom">
                                    <p>{{$model->brand->brand_name}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End: .card -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card--eleven">
                        <figure>
                            @if($model->hasMedia('model_image'))
                            <div style="width: 360px; height: 350px; margin-left: auto; margin-right: auto;">
                                <img class="img-fluid img-responsive" src="{{ $model->getMedia('model_image')->first()->getUrl() }}" alt="">
                            </div>
                            @else
                            <img src="{{ asset('theme_front/img/g1.jpg') }}" alt="">
                            @endif
                        </figure>
                        <div class="card-body text-center">
                            <div class="card-contents">
                                <div class="content-top">
                                    <h6>{{ __('global.model') }}</h6>
                                </div>
                                <div class="content-bottom">
                                    <p>{{$model->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End: .card -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card--eleven">
                        <figure>
                            @if($model->cpu->hasMedia('cpu_image'))
                            <div style="width: 360px; height: 350px; margin-left: auto; margin-right: auto;">
                                <img class="img-fluid img-responsive" src="{{ $model->cpu->getMedia('cpu_image')->first()->getUrl() }}" alt="">
                            </div>                            
                            @else
                            <img src="{{ asset('theme_front/img/g1.jpg') }}" alt="">
                            @endif
                        </figure>
                        <div class="card-body text-center">
                            <div class="card-contents">
                                <div class="content-top">
                                    <h6>{{ __('global.cpu') }}</h6>
                                </div>
                                <div class="content-bottom">
                                    <p>{{$model->cpu->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End: .card -->
                </div>
            </div><!-- ends: .row -->
        </div>
    </div><!-- ends: .card-style-eleven -->
</div><!-- ends: .section-padding -->
<div class="p-top-100 p-bottom-55 sectionbg">
    <div class="m-bottom-50">
        <div class="divider divider-simple text-center">
            <h3>SUPPORTED FUNCTIONS</h3>
        </div>
    </div>
    <section class="icon-boxes icon-box--eight">
        <div class="container">
            <div class="row">
                @foreach($features as $feature)
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box-eight text-center text-md-left">
                        <span class="icon-square-sm">
                            @if($feature->hasMedia('icon'))
                            <div style="width: 60px; height: 60px; margin-left: auto; margin-right: auto;">
                                <img class="img-fluid img-responsive" src="{{ $feature->getMedia('icon')->first()->getUrl() }}" alt="">
                            </div>
                            @else
                            <i class="la la-thumbs-up"></i>
                            @endif
                        </span>
                        <h6>{{ $feature->name }}</h6>
                        <p>{{ $feature->explanation }}</p>
                    </div><!-- ends: .icon-box -->
                </div><!-- ends: .col-lg-4 -->
                @endforeach
            </div><!-- ends: .row -->
        </div>
    </section><!-- ends: .icon-boxes -->
</div><!-- ends: .section-padding5 -->
@endsection

@push('script')
@endpush('script')