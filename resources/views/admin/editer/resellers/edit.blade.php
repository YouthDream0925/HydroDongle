@extends('layouts.admin.index')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css"/>
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.resellerTitle') }} - {{ __('global.edit') }}</h1>
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
                    {!! Form::model($reseller, ['method' => 'PATCH','route' => ['resellers.update', $reseller->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Reseller Name" outlined id="reseller_name" name="name" value="{{ $reseller->name }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Website" outlined id="website" name="website" value="{{ $reseller->website }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Email Address" outlined id="email_address" name="email" type="email" value="{{ $reseller->email }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Telephone Number" outlined id="tel_number" name="tel" value="{{ $reseller->tel }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Address" outlined id="address" name="address" value="{{ $reseller->address }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Facebook" outlined id="facebook" name="facebook" value="{{ $reseller->facebook }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="WhatsApp" outlined id="whatsapp" name="whatsapp" value="{{ $reseller->whatsapp }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Skype" outlined id="skype" name="skype" value="{{ $reseller->skype }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Telegram" outlined id="telegram" name="telegram" value="{{ $reseller->telegram }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Sonork" outlined id="sonork" name="sonork" value="{{ $reseller->sonork }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-select class="w-100" id="country_id" name="country_id" outlined label="Country">
                                            @foreach($countries as $country)
                                                @if($country->id == $reseller->country_id)
                                                <mwc-list-item value="{{ $country->id }}" data-countryCode="{{ $country->alpha_2 }}" selected activated>{{ $country->country }}</mwc-list-item>
                                                @else
                                                <mwc-list-item value="{{ $country->id }}" data-countryCode="{{ $country->alpha_2 }}">{{ $country->country }}</mwc-list-item>
                                                @endif
                                            @endforeach
                                        </mwc-select>
                                    </div>
                                    <div class="col-xl-6 mb-4 d-flex align-items-center">
                                        <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($reseller->activate == '1') checked @endif></mwc-checkbox></mwc-formfield>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($reseller->country != null)
                                        <img id="flag_image" src="{{ asset('vendor/blade-flags/country-') }}{{$reseller->country->alpha_2}}.svg" width="160" height="160"/>
                                        @else
                                        <img id="flag_image" src="{{ asset('vendor/blade-flags/country-united_nations.svg') }}" width="160" height="160"/>
                                        @endif                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-danger btn-delete mdc-ripple-upgraded" type="button">{{ __('global.delete') }}</button>
                            <button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.update') }}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            {!! Form::open(['name' => 'reseller_delete', 'method' => 'DELETE','route' => ['resellers.destroy', $reseller->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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

    $('.btn-delete').click(function(event){
        var form =  $('form[name="reseller_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Reseller?',
            text: lang.deleteConfirmText,
            icon: lang.deleteConfirmIcon,
            type: lang.deleteConfirmType,
            buttons: lang.deleteConfirmButton,
            confirmButtonColor: lang.deleteConfirmButtonColor,
            cancelButtonColor: lang.cancelButtonColor,
            confirmButtonText: lang.confirmButtonText
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endpush