@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="card-style p-top-100 p-bottom-100">
    <div class="testimonial--card2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="card card-shadow card--testimonial2">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/sample/brand') }}" alt="" class="rounded-circle">
                            <h6>{{ $app_name }}</h6>
                            <div class="ratings color-warning">
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                                <span><i class="la la-star"></i></span>
                            </div>
                            <div class="author-spec d-flex item-space-between"><strong>VERSION : </strong> <span class="color-secondary">{{ $app_version }}</span></div>
                            <div class="author-spec d-flex item-space-between"><strong>RELEASE DATE : </strong> <span class="color-secondary">{{ $release_date }}</span></div>
                            <div class="author-spec d-flex item-space-between"><strong>SIZE : </strong> <span class="color-secondary">{{ $size }}</span></div>
                            <div class="author-spec d-flex item-space-between"><strong>ARCHITECTURE : </strong> <span class="color-secondary">{{ $architecture }}</span></div>
                            <div class="author-spec d-flex item-space-between"><strong>MD5 : </strong> <span class="color-secondary">{{ $md5 }}</span></div>
                            <div class="author-spec d-flex item-space-between"><strong>PLATFORM : </strong> <span class="color-secondary">{{ $platform }}</span></div>
                        </div>
                    </div><!-- End: .card-body -->
                    <div class="d-flex item-space-evenly">
                        <!-- <a href="{{ $download_exe }}" target="_blank" class="btn btn-success btn-icon icon-left"><i class="la la-download"></i> EXE Setup</a>
                        <a href="{{ $download_link }}" target="_blank" class="btn btn-success btn-icon icon-left"><i class="la la-download"></i> External Setup</a>
                        <a href="{{ $download_zip }}" target="_blank" class="btn btn-success btn-icon icon-left"><i class="la la-download"></i> Full ZIP package</a> -->
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Download
                                <span class="dropdown-caret la la-angle-down"></span>
                            </a>
                            <div class="dropdown-menu dropdown--btn" aria-labelledby="dropdownbtn">
                                <a class="dropdown-item dropdown-hover" href="{{ $download_exe }}" target="_blank">EXE Setup</a>
                                <a class="dropdown-item dropdown-hover" href="{{ $download_link }}" target="_blank">External Setup</a>
                                <a class="dropdown-item dropdown-hover" href="{{ $download_zip }}" target="_blank">Full ZIP package</a>
                            </div>
                        </div><!-- end: .dropdown -->
                    </div>
                </div><!-- ends: .col-lg-4 -->
            </div><!-- ends: .row -->
        </div>
    </div><!-- ends: .testimonial--card2-->
</section>
<section class="breadcrumb_area breadcrumb1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper">
                    <h2 class="page_title text-center">2023</h2>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<div class="accordion-styles accordion--one p-top-100 p-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="accordion accordion_one" id="accordion_one">
                    @foreach($update_histories as $history)
                    <div class="accordion-single">
                        <div class="accordion-heading" id="heading{{$history->id}}">
                            <h6 class="mb-0">
                                <a href="#" data-toggle="collapse" data-target="#collapse{{$history->id}}" aria-expanded="false" aria-controls="collapse{{$history->id}}">
                                    <div>
                                        <p>{{ $history->title }} @if($history->type != 0) <span class="badge {{ $history_types[$history->type] }}" style="padding: 0.5rem;">{{ $history_types[$history->type] }}</span> @endif</p>
                                        <p>
                                            <strong>Version : </strong>{{ $history->version }}
                                            <span class="f-right">{{ $history->getDateAtAttribute() }}</span>
                                        </p>
                                    </div>
                                </a>
                            </h6>
                        </div>
                        <div id="collapse{{$history->id}}" class="collapse" aria-labelledby="heading{{$history->id}}" data-parent="#accordion_one">
                            <div class="accordion-contents">
                                {!! $history->content !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!-- Ends: #accordion_one -->
            </div>
        </div>
    </div>
</div><!-- Ends: accordion-styles -->
@endsection

@push('script')
@endpush