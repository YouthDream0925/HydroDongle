@extends('layouts.admin.index')

@push('css')
<link href="{{ asset('css/tags.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.productTitle') }} - {{ __('global.create') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('products.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.productDetails') }}</div>
                    {!! Form::open(array('route' => 'products.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Product Code" outlined id="code" name="code" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Product Name" outlined id="name" name="name" value=""></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100 mb-1" label="Price" outlined id="price" name="price" value=""></mwc-textfield>
                                        <span>* Please input to 2 decimal places.</span>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100 mb-1" label="Tax" outlined id="tax" name="tax" value=""></mwc-textfield>
                                        <span>* Please input to 2 decimal places.</span>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100 mb-1" label="Discount" outlined id="discount" name="discount" value=""></mwc-textfield>
                                        <span>* Please input to 2 decimal places.</span>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-select class="w-100 mb-1" id="period" name="period" outlined label="Period">
                                            <mwc-list-item value=""></mwc-list-item>
                                            <mwc-list-item value="6">6 months</mwc-list-item>
                                            <mwc-list-item value="12">1 year</mwc-list-item>
                                        </mwc-select>
                                    </div>
                                    <div class="col-xl-12 mb-4 d-flex align-items-center item-space">
                                        <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                        <mwc-formfield label="ProPack"><mwc-checkbox name="type" id="pro_pack" value="true"></mwc-checkbox></mwc-formfield>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="form-label">Features Tag</label>
                                        <input type="text" class="form-control" data-role="tagsinput" name="features" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        <img id="product_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="product_image" id="product_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="product_image">
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
<script src="{{ asset('theme/js/custom/bootstraptagsinput.bundle.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        FileLoader.init('product_image', 'product_container');
    });

    $('#product_name').on('input',function(e) {
        const input_text = $(this).val();
        if(input_text == '')
            $('#product_link').val('');
        else {
            let new_text = input_text.toLowerCase().replace(/\s/g, '-');
            $('#product_link').val('products/' + new_text);
        }
    });

    $('#pro_pack').on('change', function() {
        if ($(this).prop('checked')) {
            $('#period').attr('disabled', true);
        } else {
            $('#period').attr('disabled', false);
        }
    });
</script>
@endpush