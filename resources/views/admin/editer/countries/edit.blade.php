@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.countryTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('countries.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.countryDetails') }}</div>
                    {!! Form::model($country, ['method' => 'PATCH','route' => ['countries.update', $country->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-12 mb-4">
                                        <mwc-textfield class="w-100" label="Country Name" outlined id="country_name" name="name" value="{{ $country->name }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Country Code" outlined id="country_code" name="code" value="{{ $country->code }}" maxlength="2"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Country Code 3" outlined id="country_code_3" name="code3" value="{{ $country->code3 }}" maxlength="3"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Number Code" outlined id="num_code" name="num_code" value="{{ $country->num_code }}" maxlength="9"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Phone Code" outlined id="phone_code" name="phone_code" value="{{ $country->phone_code }}" maxlength="9"></mwc-textfield>
                                    </div>
                                    <input type="hidden" id="country_validation" name="country_validation" value="true"/>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        <img id="flag_image" src="{{ asset('vendor/blade-flags/country-') }}{{strtolower($country->code)}}.svg" width="160" height="160"/>
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
            {!! Form::open(['name' => 'country_delete', 'method' => 'DELETE','route' => ['countries.destroy', $country->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $('#country_code').on('input', function() {
        let input_text = $(this).val();
        input_text = input_text.toLowerCase();
        if(input_text.length == 2) {
            input_text = 'country-' + input_text + '.svg';
            var url = "{{ asset('vendor/blade-flags/') }}" + "/" + input_text;
            UrlExists(url);
        } else {
            var url = "{{ asset('vendor/blade-flags/country-united_nations.svg') }}";
            $('#flag_image').attr('src', url);
            $('#country_validation').val('false');
        }
    });

    function UrlExists(url) {
        var http = new XMLHttpRequest();
        http.open('HEAD', url, false);
        http.send();
        if (http.status != 404) {
            $('#flag_image').attr('src', url);
            $('#country_validation').val('true');
        } else {
            new bs5.Toast({
                body: "Can't find this country.",
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
            $('#country_validation').val('false');
        }
    }

    $('.btn-delete').click(function(event){
        var form =  $('form[name="country_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Country?',
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