@extends('layouts.admin.index')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"/>
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.resellerTitle') }} - {{ __('global.create') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('resellers.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.resellerDetails') }}</div>
                    {!! Form::open(array('route' => 'resellers.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Reseller Name" outlined id="reseller_name" name="name" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Website" outlined id="website" name="website" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Email Address" outlined id="email_address" name="email" type="email" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Telephone Number" outlined id="tel_number" name="tel" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Address" outlined id="address" name="address" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Facebook" outlined id="facebook" name="facebook" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="WhatsApp" outlined id="whatsapp" name="whatsapp" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Skype" outlined id="skype" name="skype" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Telegram" outlined id="telegram" name="telegram" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Sonork" outlined id="sonork" name="sonork" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <select id="country_id" name="country_id" class="form-select form-select-lg" style="padding-top: 0.8rem !important; padding-bottom: 0.8rem !important;" outlined>
                                            <option value="">Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" data-countryCode="{{ $country->alpha_2 }}">{{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-select class="w-100" id="type" name="type" outlined label="Reseller Type" style="z-index: 100000">
                                            <mwc-list-item value="0">Dongle Reseller</mwc-list-item>
                                            <mwc-list-item value="1">License Reseller</mwc-list-item>
                                        </mwc-select>
                                    </div>
                                    <div class="col-xl-6 mb-4 d-flex align-items-center item-space-evenly">
                                        <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        <img id="flag_image" src="{{ asset('storage/sample/brand') }}" width="160" height="160"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.create') }}</button></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script tyle="module">
    import CountrySelector from '{{ asset("theme/js/custom/country.js") }}';
    CountrySelector();
</script>
@endpush