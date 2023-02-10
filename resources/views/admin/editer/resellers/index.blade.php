@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.resellerTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('resellers.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <h2 class="card-title text-center">{{ __('global.none') }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush