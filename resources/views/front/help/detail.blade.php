@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/help.png') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item"><a class="custom-a-breadcrumb" href="{{ route('help') }}">{{ __('global.help') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple !important;">{{ __('global.details') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="service-tab-wrapper section-padding">
    <div class="tab service--tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <div class="tab_nav tab_nav2 m-bottom-50">
                        <div class="nav flex-column" id="tab_nav1" role="tablist" aria-orientation="vertical">
                            @foreach($helps_page as $help)
                                @if($selected_help == $help->id)
                                <a class="nav-link active show" id="v-pills-tab{{$help->id}}" data-toggle="pill" href="#tab{{$help->id}}" role="tab" aria-controls="tab{{$help->id}}" aria-selected="true">{{ \AppHelper::instance()->short_string($help->title, 20) }}</a>
                                @else
                                <a class="nav-link" id="v-pills-tab{{$help->id}}" data-toggle="pill" href="#tab{{$help->id}}" role="tab" aria-controls="tab{{$help->id}}" aria-selected="false">{{ \AppHelper::instance()->short_string($help->title, 20) }}</a>
                                @endif
                            @endforeach
                        </div>
                    </div><!-- ends: .tab_nav -->
                </div><!-- ends: .col-lg-3 -->
                <div class="col-lg-9">
                    <div class="tab-content" id="tabContent1">
                        @foreach($helps_page as $help)
                            @if($selected_help == $help->id)
                            <div class="tab-pane fade active show" id="tab{{$help->id}}" role="tabpanel" aria-labelledby="tab{{$help->id}}">
                                <div class="contents-1">
                                    <div class="m-bottom-30">
                                        <div class="divider divider-simple text-left">
                                            <h3>{{ $help->title }}</h3>
                                        </div>
                                    </div>
                                    <p>{!! $help->content !!}</p>
                                </div>
                                <div class="contents-2 m-top-60">
                                    <div class="m-bottom-35">
                                        <div class="divider divider-simple text-left">
                                            <h3>Brand &amp; CPU</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="icon-box-four d-flex">
                                                <div class="box-icon">
                                                    @if($help->brand->hasMedia('brand_image'))
                                                    <div style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 2rem;">
                                                        <img class="img-fluid img-responsive" src="{{ $help->brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                                                    </div>
                                                    @else
                                                    <span class="icon-rounded-sm">
                                                        <i class="la la-bar-chart"></i>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ $help->brand->brand_name }}</h6>
                                                    <p>{{ $help->brand->brand_link }}</p>
                                                </div>
                                            </div><!-- ends: .icon-box -->
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="icon-box-four d-flex">
                                                <div class="box-icon">
                                                    @if($help->cpu->hasMedia('cpu_image'))
                                                    <div style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 2rem;">
                                                        <img class="img-fluid img-responsive" src="{{ $help->cpu->getMedia('cpu_image')->first()->getUrl() }}" alt="">
                                                    </div>
                                                    @else
                                                    <span class="icon-rounded-sm">
                                                        <i class="la la-bar-chart"></i>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ $help->cpu->name }}</h6>
                                                    <p>{{ $help->cpu->explanation }}</p>
                                                </div>
                                            </div><!-- ends: .icon-box -->
                                        </div><!-- ends: .col-md-6 -->
                                    </div>
                                </div>
                            </div><!-- ends: .tab-pane -->
                            @else
                            <div class="tab-pane fade" id="tab{{$help->id}}" role="tabpanel" aria-labelledby="tab{{$help->id}}">
                                <div class="contents-1">
                                    <div class="m-bottom-30">
                                        <div class="divider divider-simple text-left">
                                            <h3>{{ $help->title }}</h3>
                                        </div>
                                    </div>
                                    <p>{!! $help->content !!}</p>
                                </div>
                                <div class="contents-2 m-top-60">
                                    <div class="m-bottom-35">
                                        <div class="divider divider-simple text-left">
                                            <h3>Brand &amp; CPU</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="icon-box-four d-flex">
                                                <div class="box-icon">
                                                    @if($help->brand->hasMedia('brand_image'))
                                                    <div style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 2rem;">
                                                        <img class="img-fluid img-responsive" src="{{ $help->brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                                                    </div>
                                                    @else
                                                    <span class="icon-rounded-sm">
                                                        <i class="la la-bar-chart"></i>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ $help->brand->brand_name }}</h6>
                                                    <p>{{ $help->brand->brand_link }}</p>
                                                </div>
                                            </div><!-- ends: .icon-box -->
                                        </div><!-- ends: .col-md-6 -->
                                        <div class="col-md-6">
                                            <div class="icon-box-four d-flex">
                                                <div class="box-icon">
                                                    @if($help->cpu->hasMedia('cpu_image'))
                                                    <div style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 2rem;">
                                                        <img class="img-fluid img-responsive" src="{{ $help->cpu->getMedia('cpu_image')->first()->getUrl() }}" alt="">
                                                    </div>
                                                    @else
                                                    <span class="icon-rounded-sm">
                                                        <i class="la la-bar-chart"></i>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ $help->cpu->name }}</h6>
                                                    <p>{{ $help->cpu->explanation }}</p>
                                                </div>
                                            </div><!-- ends: .icon-box -->
                                        </div><!-- ends: .col-md-6 -->
                                    </div>
                                </div>
                            </div><!-- ends: .tab-pane -->
                            @endif
                        @endforeach
                    </div>
                </div><!-- ends: .col-lg-9 -->
            </div>
        </div>
    </div><!-- ends: .service--tabs -->
</section><!-- ends: .service-tab-wrapper -->
@endsection

@push('script')
@endpush