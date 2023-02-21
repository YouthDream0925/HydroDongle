@extends('layouts.admin.index')

@push('css')
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
                    {!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Product Code" outlined id="code" name="code" value="{{ $product->code }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100" label="Product Name" outlined id="name" name="name" value="{{ $product->name }}"></mwc-textfield>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100 mb-1" label="Price" outlined id="price" name="price" value="{{ $product->price }}"></mwc-textfield>
                                        <span>* Please input to 2 decimal places.</span>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100 mb-1" label="Tax" outlined id="tax" name="tax" value="{{ $product->tax }}"></mwc-textfield>
                                        <span>* Please input to 2 decimal places.</span>
                                    </div>
                                    <div class="col-xl-6 mb-4">
                                        <mwc-textfield class="w-100 mb-1" label="Discount" outlined id="discount" name="discount" value="{{ $product->discount }}"></mwc-textfield>
                                        <span>* Please input to 2 decimal places.</span>
                                    </div>
                                    <div class="col-xl-6 mb-4 d-flex align-items-center">
                                        <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($product->activate == "1") checked @endif></mwc-checkbox></mwc-formfield>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($product->hasMedia('product_image'))
                                        <img id="product_container" class="img-fluid img-responsive mb-1" src="{{ $product->getMedia('product_image')->first()->getUrl() }}" alt="..."/>
                                        @else
                                        <img id="product_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                        @endif
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
                        <div class="text-center">
                            <button class="btn btn-outline-danger btn-delete mdc-ripple-upgraded" type="button">{{ __('global.delete') }}</button>
                            <button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.update') }}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            {!! Form::open(['name' => 'product_delete', 'method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        FileLoader.init('product_image', 'product_container');
    });

    $('.btn-delete').click(function(event){
        var form =  $('form[name="product_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Product?',
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