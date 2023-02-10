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
                                    <div class="col-xl-12 mb-2">
                                        <mwc-textfield class="w-100" label="Country Name" outlined id="country_name" name="name" value="{{ $country->name }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Country Code" outlined id="country_code" name="code" value="{{ $country->code }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Country Code 3" outlined id="country_code_3" name="code3" value="{{ $country->code3 }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Number Code" outlined id="num_code" name="num_code" value="{{ $country->num_code }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Phone Code" outlined id="phone_code" name="phone_code" value="{{ $country->phone_code }}"></mwc-textfield>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($country->hasMedia('country_image'))
                                        <img id="country_container" class="img-fluid img-responsive mb-1" src="{{ $country->firstMedia('country_image')->getUrl() }}" alt="..."/>
                                        @else
                                        <img id="country_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                        @endif
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="country_image" id="country_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="country_image">
                                        {{ __('global.image') }}
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
        FileLoader.init('country_image', 'country_container');
    });
</script>
@endpush