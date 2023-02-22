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
                    <h4 class="page_title" style="margin-bottom: 1.6rem;">{{ __('global.helpFAQ')}}</h4>
                    <!-- search widget -->
                    <div class="widget-wrapper">
                        <div class="search-widget">
                            <form action="{{ route('help') }}">
                                <div class="input-group">
                                    <input type="text" name="key" value="{{ request()->get('key') }}" class="fc--rounded" placeholder="Search">
                                    <button type="submit"><i class="la la-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div><!-- ends: .widget-wrapper -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page">{{ __('global.helpFAQ')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="flip-boxes p-top-120 p-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-5">
                    <div class="divider divider-simple text-center">
                        <h3>{{ __('global.aboutUS') }}</h3>
                    </div>
                </div>
            </div><!-- ends: .col-lg-12 -->
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($helps_page as $help)
            <div class="col-lg-4 col-md-6">
                <div class="flip-card">
                    <div class="flip-wrapper">
                        <div class="flip-front">
                            <div class="front-contents">
                                <span class="color-primary">
                                    @if($help->brand->hasMedia('brand_image'))
                                    <div style="width: 80px; height: 80px; margin-left: auto; margin-right: auto; margin-bottom: 2rem;">
                                        <img class="img-fluid img-responsive" src="{{ $help->brand->getMedia('brand_image')->first()->getUrl() }}" alt="">
                                    </div>
                                    @else
                                    <i class="la la-floppy-o"></i>
                                    @endif
                                </span>
                                <h6>{{ $help->title }}</h6>
                            </div>
                            <div class="flip-overlay"></div>
                        </div><!-- ends: .flip-front -->
                        <div class="flip-back">
                            <div class="back-contents">
                                <h5 class="color-light">{{ $help->title }}</h5>
                                <a href="{{ route('help.detail', $help->id) }}" class="btn btn-light btn-sm">{{ __('global.seeMore') }}</a>
                            </div>
                            <div class="flip-overlay2"></div>
                        </div><!-- ends: .flip-back -->
                    </div><!-- ends: .flip-wrapper -->
                </div><!-- ends: .flip-card -->
            </div>
            @endforeach
        </div>
    </div>
</section><!-- ends: .flip-boxes -->
<section class="sectionbg p-top-100 p-bottom-110">
    <div class="accordion-styles accordion--one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion accordion_one" id="accordion_one">
                        @foreach($helps_dropdown as $help)
                        <div class="accordion-single">
                            <div class="accordion-heading" id="heading{{$help->id}}">
                                <h6 class="mb-0">
                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse{{$help->id}}" aria-expanded="false" aria-controls="collapse{{$help->id}}">
                                        {{ $help->title }}
                                    </a>
                                </h6>
                            </div>
                            <div id="collapse{{$help->id}}" class="collapse" aria-labelledby="heading{{$help->id}}" data-parent="#accordion_one">
                                <div class="accordion-contents">
                                    {!! $help->content !!}
                                </div>
                            </div>
                        </div><!-- Ends: .accordion-single -->
                        @endforeach
                    </div><!-- Ends: #accordion_one -->
                </div>
            </div>
        </div>
    </div><!-- Ends: accordion-styles -->
</section><!-- ends: .section-padding -->
<section class="p-top-100 p-bottom-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-5">
                    <div class="divider divider-simple text-center">
                        <h3>{{ __('global.faqs') }}</h3>
                    </div>
                </div>
            </div><!-- ends: .col-lg-12 -->
        </div>
    </div>
    <div class="faqs-one">
        <div class="container">
            <div class="row">
                @foreach($faqs as $key => $faq)
                <div class="col-lg-6">
                    <div class="faq-single">
                        <h6>{{ $key+1 }}. {{ $faq->title }}</h6>
                        <p>{!! $faq->content !!}</p>
                    </div>
                </div><!-- ends: .col-lg-6 -->
                @endforeach
            </div>
        </div>
    </div><!-- ends: .faqs-one -->
</section><!-- ends: .section-padding-sm -->
@endsection

@push('script')
@endpush()