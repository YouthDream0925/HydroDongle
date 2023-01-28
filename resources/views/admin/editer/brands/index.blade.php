@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.brandTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('brands.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            @if(count($brands) != 0)
            <div class="row">
                @foreach($brands as $key => $brand)
                <div class="col-lg-3 p-1">
                    <div class="card card-quick-link card-raised ripple-gray">
                        <div class="card-body">
                            @if($brand->hasMedia('brand_image'))
                            <img class="card-quick-link-img" src="{{ url($brand->firstMedia('brand_image')->getUrl()) }}" />
                            @else
                            <img class="card-quick-link-img" src="{{ url('storage/sample/brand') }}" />
                            @endif
                            <div class="card-title text-truncate mb-2">{{ $brand->brand_name }}</div>
                            <p class="card-text">{{ $brand->brand_link }}</p>
                        </div>
                        <div class="card-actions">
                            <a class="card-link text-muted text-decoration-none stretched-link" href="{{ route('brands.edit',$brand->brand_id) }}" title="Bootstrap Card Documentation">{{ __('global.edit') }}</a>
                            <i class="material-icons text-muted rotate-45">arrow_upward</i>
                        </div>
                    </div>
                </div>
                @endforeach
                @include('layouts.admin.pagination.index', ['paginator' => $brands])
            </div>
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
@endpush