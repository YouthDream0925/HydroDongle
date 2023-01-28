@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.slideTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('slides.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            @if(count($slides) != 0)
                @foreach($slides as $slide)
                <div class="clicker card card-quick-link card-raised ripple-gray mdc-ripple-upgraded mb-2 shadow-10">
                    <div class="row g-0">
                        <div class="col-lg-7 col-md-6">
                            <div class="row g-0">
                                <div class="col-lg-12 col-md-6">
                                    <div class="card-body p-5">
                                        <div class="text-left">
                                            <h1 class="display-5 mb-0">{{ $slide->title }}</h1>
                                            <div class="subheading-1 mb-5">{{ $slide->description }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="card-body p-5">
                                        <div class="form-group d-flex align-items-center justify-content-between mb-0">
                                            <button class="btn btn-primary btn-raised" type="button" title="{{ $slide->btn_text }}" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="{{ $slide->btn_link }}">{{ $slide->btn_text }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="row g-0">
                                @if($slide->hasMedia('ads_images'))
                                    @foreach($slide->getMedia('ads_images') as $media)
                                        <div class="col-lg-{{ 12 / count($slide->getMedia('ads_images')) }} col-md-12 d-none d-md-block" style="background-image: url({{ $media->getUrl() }}); background-size: contain; background-repeat: no-repeat; background-position: center; height: 300px;"></div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-actions">
                        <a class="card-link text-muted text-decoration-none stretched-link" href="{{ route('slides.edit',$slide->id) }}" title="Bootstrap Card Documentation">{{ __('global.edit') }}</a>
                        <i class="material-icons text-muted rotate-45">arrow_upward</i>
                    </div>
                </div>
                @endforeach
            @else
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <h2 class="card-title text-center">{{ __('global.none') }}</h2>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    jQuery(document).ready(function{
        $('.clicker').on('click', function() {
            alert('asdf');
        });
    });
</script>
@endpush