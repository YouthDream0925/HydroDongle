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
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Reseller Name" outlined id="reseller_name" name="name" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Website" outlined id="website" name="website" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Email Address" outlined id="email_address" name="email" type="email" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Telephone Number" outlined id="tel_number" name="tel" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Address" outlined id="address" name="address" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Facebook" outlined id="facebook" name="facebook" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="WhatsApp" outlined id="whatsapp" name="whatsapp" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Skype" outlined id="skype" name="skype" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Telegram" outlined id="telegram" name="telegram" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <mwc-textfield class="w-100" label="Sonork" outlined id="sonork" name="sonork" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-2 d-flex align-items-center">
                                        <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                    </div>
                                    <input type="hidden" name="country_id" value="" />
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        <img id="brand_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="brand_image" id="brand_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="brand_image">
                                        {{ __('global.country') }}
                                        <i class="material-icons trailing-icon">upload</i>
                                    </label>
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
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        FileLoader.init('brand_image', 'brand_container');
    });

    $('#brand_name').on('input',function(e) {
        const input_text = $(this).val();
        if(input_text == '')
            $('#brand_link').val('');
        else {
            let new_text = input_text.toLowerCase().replace(/\s/g, '-');
            $('#brand_link').val('brands/' + new_text);
        }
    });
</script>
@endpush