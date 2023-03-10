@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex align-items-center justify-content-between flex-wrap">
                    <h4 class="page_title">{{ __('global.model') }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="custom-a-breadcrumb" href="{{ route('devices') }}">{{ __('global.devices') }}</a></li>
                            <li class="breadcrumb-item"><a class="custom-a-breadcrumb" href="{{ route('devices.brand', $model->brand->brand_id) }}">{{ __('global.brand') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple !important;">{{ __('global.model') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="showcase showcase--title1">
                <h3>{{ $model->name }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="icon-boxes icon-box--ten">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="icon-box-img text-center">
                    @if($model->brand->hasMedia('brand_image'))
                    <div style="width: 160px; height: 160px; margin-left: auto; margin-right: auto;">
                        <img class="img-fluid img-responsive" src="{{ $model->brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                    </div>
                    @else
                    <div class="icon">
                        <img src="{{ asset('theme_front/img/svg/businessman.svg') }}" alt="" class="svg">
                    </div>
                    @endif                    
                    <h6 class="mt-5 mb-0">{{ $model->brand->brand_name }}</h6>
                    <p class="mb-0">Brand</p>
                </div><!-- ends: .icon-box -->
            </div><!-- ends: .col-lg-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="icon-box-img text-center">
                    @if($model->hasMedia('model_image'))
                    <div style="width: 160px; height: 160px; margin-left: auto; margin-right: auto;">
                        <img class="img-fluid img-responsive" src="{{ $model->getMedia('model_image')->first()->getUrl() }}" alt="">
                    </div>
                    @else
                    <div class="icon">
                        <img src="{{ asset('theme_front/img/svg/businessman.svg') }}" alt="" class="svg">
                    </div>
                    @endif 
                    <h6 class="mt-5 mb-0">{{ $model->name }}</h6>
                    <p class="mb-0">Model</p>
                </div><!-- ends: .icon-box -->
            </div><!-- ends: .col-lg-4 -->
            <div class="col-lg-4 col-md-6">
                <div class="icon-box-img text-center">
                    @if($model->cpu->hasMedia('cpu_image'))
                    <div style="width: 160px; height: 160px; margin-left: auto; margin-right: auto;">
                        <img class="img-fluid img-responsive" src="{{ $model->cpu->getMedia('cpu_image')->first()->getUrl() }}" alt="">
                    </div>
                    @else
                    <div class="icon">
                        <img src="{{ asset('theme_front/img/svg/crowdfunding.svg') }}" alt="" class="svg">
                    </div>
                    @endif 
                    <h6 class="mt-5 mb-0">{{ $model->cpu->name }}</h6>
                    <p class="mb-0">CPU ({{ $model->soc->name }})</p>
                </div><!-- ends: .icon-box -->
            </div><!-- ends: .col-lg-4 -->
        </div><!-- ends: .row -->
    </div>
</div><!-- ends: .icon-boxes -->
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