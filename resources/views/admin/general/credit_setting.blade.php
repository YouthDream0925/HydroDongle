@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-5 mb-0">{{ __('global.subCategory.creditSetting') }}</h1>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'website.setting.credit.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        @foreach($credit_settings as $key => $credit_setting)
                            <div class="mb-4"><mwc-textfield class="w-100" label="{{ strtoupper($credit_setting->type) }}" outlined name="{{ $credit_setting->type }}" value="{{ $credit_setting->value }}"></mwc-textfield></div>
                        @endforeach
                        <div class="text-end"><button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.save') }}</button></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush