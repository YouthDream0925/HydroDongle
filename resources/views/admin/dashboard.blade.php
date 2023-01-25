@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <!-- Colored status cards-->
    <div class="row gx-5">
        <div class="col-xxl-3 col-md-6 mb-5"></div>
        <div class="col-xxl-3 col-md-6 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="txt-deco-none">
                <div class="card card-raised bg-warning text-white">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5 text-white">{{ __('global.brands') }}</div>
                                <div class="card-text">{{ __('global.manageBrands') }}</div>
                            </div>
                            <div class="icon-circle bg-white-50 text-warning"><span class="material-icons">branding_watermark</span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-md-6 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="txt-deco-none">
                <div class="card card-raised bg-secondary text-white">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5 text-white">{{ __('global.models') }}</div>
                                <div class="card-text">{{ __('global.manageModels') }}</div>
                            </div>
                            <div class="icon-circle bg-white-50 text-secondary"><span class="material-icons">business_center</span></div>
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