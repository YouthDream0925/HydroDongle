@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.phoneTitle') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('brands.create') }}">
                <span class="material-icons">add</span>{{ __('global.add') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised h-100">
                <div class="card-body p-4">
                    <div class="justify-content-between">
                        <h2 class="display-5 mb-0">Brands</h2>
                        <p class="lead mb-4">Select a brand to add new a phone</p>
                        <mwc-textfield class="w-100" label="Search" outlined icontrailing="search" placeholder="Filter the brands..."></mwc-textfield>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray px-4 mdc-ripple-upgraded"><a class="stretched-link text-decoration-none" href="#!">Review suggestions (4)</a></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush