@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-5">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">{{ __('global.dashboard') }}</h1>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xxl-3 col-md-6 mb-5"></div>
        <div class="col-xxl-3 col-md-6 mb-5">
            <a href="{{ route('brands.index') }}" class="txt-deco-none">
                <div class="card card-raised bg-primary text-white">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5 text-white">{{ __('global.brands') }}</div>
                                <div class="card-text">{{ __('global.manageBrands') }}</div>
                            </div>
                            <div class="icon-circle bg-white-50 text-primary"><span class="material-icons">branding_watermark</span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-md-6 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="txt-deco-none">
                <div class="card card-raised bg-info text-white">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5 text-white">{{ __('global.models') }}</div>
                                <div class="card-text">{{ __('global.manageModels') }}</div>
                            </div>
                            <div class="icon-circle bg-white-50 text-info"><span class="material-icons">business_center</span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-md-6 mb-5"></div>
    </div>
</div>
@endsection

@push('script')
@endpush