@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.brandTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('brands.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">Brand Details</div>
                    {!! Form::model($brand, ['method' => 'PATCH','route' => ['brands.update', $brand->brand_id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Brand Name" outlined id="brand_name" name="brand_name" value="{{ $brand->brand_name }}"></mwc-textfield>                                    
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Brand Link" outlined id="brand_link" name="brand_link" value="{{ $brand->brand_link }}"></mwc-textfield>
                                </div>
                                <div class="d-flex align-items-center breadcrumb-custom">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="brand_activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                    <input class="form-control" name="brand_order" value="{{$brand->brand_order}}" placeholder="Order Number" style="width: 300px;"/>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    @if($brand->hasMedia('brand_image'))
                                    <div class="custom-brand-container">
                                        <img id="brand_container" class="img-fluid img-responsive mb-1" src="{{ url($brand->firstMedia('brand_image')->getUrl()) }}" alt="..."/>
                                    </div>
                                    @else
                                    <div class="custom-brand-container">
                                        <img id="brand_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    </div>
                                    @endif
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="brand_image" id="brand_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="brand_image">
                                        {{ __('global.brand') }}
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
        <div class="col-xl-4">
            {!! Form::open(['name' => 'brand_delete', 'method' => 'DELETE','route' => ['brands.destroy', $brand->brand_id],'style'=>'display:inline']) !!}
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
        FileLoader.init('brand_image', 'brand_container');
    });

    $('.btn-delete').click(function(event){
        var form =  $('form[name="brand_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this brand?',
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