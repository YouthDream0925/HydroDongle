@extends('layouts.front.index')

@push('css')
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
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">
                                {{ __('global.downloadDrivers') }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="p-top-100 p-bottom-100">
    <div class="icon-boxes icon-box--four">
        <div class="container">
            <div class="row">
                @foreach($drivers as $driver)
                <div class="col-lg-12 col-md-12">
                    <div class="icon-box-four d-flex">
                        <div class="box-icon">
                            <a href="{{ $driver->driver_link }}" target="_blank"><span class="icon-rounded-sm"><i class="la la-download"></i></span></a>
                        </div>
                        <div class="box-content">
                            <h6>{{ $driver->driver_name}} <span class="badge bg-success">{{ $driver->driver_version }}</span></h6>
                            <p>{{ $driver->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div><!-- ends: .icon-boxes -->
</section>
@endsection

@push('script')
@endpush