@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.licenseTitle') }} - {{ __('global.showMore') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('licenses.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="row mb-4 item-center">
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="User Name" outlined id="title" value="{{ $license_history->user->first_name }} {{ $license_history->user->last_name }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="License" outlined id="title" value="{{ $license_history->product->products }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="License Date" outlined id="title" value="{{ $license_history->getYearAttribute() }}, {{ $license_history->getMonthAttribute() }}" readonly></mwc-textfield>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        {!! Form::open(['method' => 'DELETE','route' => ['licenses.destroy', $license_history->id],'style'=>'display:inline']) !!}
                            {!! Form::button(__('global.delete'), ['type' =>'submit', 'class' => 'btn btn-outline-success mdc-ripple-upgraded']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush