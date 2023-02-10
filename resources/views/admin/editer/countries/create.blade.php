@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.countryTitle') }} - {{ __('global.create') }}</h1>
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
                    {!! Form::open(array('route' => 'countries.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-12 mb-4">
                                        <mwc-textfield class="w-100" label="Country Name" outlined id="country_name" name="name" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Country Code" outlined id="country_code" name="code" value="" maxlength="2"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Country Code 3" outlined id="country_code_3" name="code3" value="" maxlength="3"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Number Code" outlined id="num_code" name="num_code" value="" maxlength="9"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Phone Code" outlined id="phone_code" name="phone_code" value="" maxlength="9"></mwc-textfield>
                                    </div>
                                    <input type="hidden" id="country_validation" name="country_validation" value="false"/>
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
</script>
@endpush