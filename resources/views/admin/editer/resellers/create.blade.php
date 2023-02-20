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
                                        <mwc-select class="w-100" id="country_id" name="country_id" outlined label="Country" style="z-index: 100000">
                                            @foreach($countries as $country)
                                                <mwc-list-item value="{{ $country->id }}" data-countryCode="{{ $country->alpha_2 }}">{{ $country->country }}</mwc-list-item>
                                            @endforeach
                                        </mwc-select>
                                    </div>
                                    <div class="col-xl-6 mb-4 d-flex align-items-center">
                                        <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        <img id="flag_image" src="{{ asset('vendor/blade-flags/country-united_nations.svg') }}" width="160" height="160"/>
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
<script>
    $('#country_id').on('change', function() {
        let code = $(this).find(":selected").attr('data-countryCode') + "";
        code = code.toLowerCase();
        if(code.length == 2) {
            code = 'country-' + code + '.svg';
            var url = "{{ asset('vendor/blade-flags/') }}" + "/" + code;
            UrlExists(url);
        } else {
            var url = "{{ asset('vendor/blade-flags/country-united_nations.svg') }}";
            $('#flag_image').attr('src', url);
        }
    });

    function UrlExists(url) {
        var http = new XMLHttpRequest();
        http.open('HEAD', url, false);
        http.send();
        if (http.status != 404) {
            $('#flag_image').attr('src', url);
        } else {
            new bs5.Toast({
                body: "Can't find this country.",
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
        }
    }
</script>
@endpush