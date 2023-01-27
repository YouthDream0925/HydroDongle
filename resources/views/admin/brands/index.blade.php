@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0">{{ __('global.brandTitle') }}</h1>
            <button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </button>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    @if(count($brands) != 0)
                    <div class="row">
                        @foreach($brands as $key => $value)
                        <div class="col-lg-3 p-1">
                            <div class="card card-raised">
                                <img class="card-img" src="https://source.unsplash.com/K9QHL52rE2k/700x394" alt="...">
                                <div class="card-img-overlay">
                                    <h2 class="card-title text-white">{{ $value->brand_name }}</h2>
                                    <p class="card-text text-white">{{ $value->brand_link }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @include('layouts.admin.pagination.index', ['paginator' => $brands])
                    </div>
                    @else
                    <h2 class="card-title text-center">There is no brand.</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush