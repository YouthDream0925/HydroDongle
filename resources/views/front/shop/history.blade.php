@extends('layouts.front.index')

@push('css')
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
                            <li class="breadcrumb-item"><a class="custom-a-breadcrumb" href="{{ route('shop') }}">{{ __('global.shop') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">{{ __('global.history') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="p-top-105 p-bottom-110 section-bg">
    <div class="m-bottom-65">
        <div class="divider text-center">
            <h1>{{ __('global.payHistory') }}</h1>
            <p class="mx-auto"></p>
        </div>
    </div>
    <div class="timeline_area section-bg timeline_area--1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline1">
                        @foreach($histories as $history)
                        <div class="happening row">
                            <div class="happening__period col-md-3">
                                <div class="wrapper rounded shadow-sm">
                                    <p class="date">{{ $history->getMonthAttribute() }}</p>
                                    <h4 class="year">{{ $history->getYearAttribute() }}</h4>
                                </div>
                            </div>
                            <div class="happening__desc col-md-8 offset-md-1">
                                <h5 class="happening_title">
                                    {{ $history->products }}
                                    @if($history->status == '1')
                                    <span class="badge bg-success" style="font-size: 11px; font-weight: 500;">Success</span>
                                    @else
                                    <span class="badge bg-danger" style="font-size: 11px; font-weight: 500;">Failure</span>
                                    @endif
                                </h5>
                                <p>{{ $history->description }}</p>
                                @if($history->msg != null)
                                <strong>- {{ $history->msg }}</strong>
                                @endif
                            </div>
                        </div><!-- ends: .happening -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ends: .timeline_area -->
</section>
@endsection

@push('script')
@endpush