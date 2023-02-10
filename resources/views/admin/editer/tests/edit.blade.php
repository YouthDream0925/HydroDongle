@extends('layouts.admin.index')

@push('css')
<link href="{{ asset('css/tags.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.testTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('tests.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-4">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.testDetails') }}</div>
                    {!! Form::model($test, ['method' => 'PATCH','route' => ['tests.update', $test->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Point Name" outlined id="point_name" name="name" value="{{ $test->name }}"></mwc-textfield>
                                </div>
                                <div class="d-flex align-items-center">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($test->activate == '1') checked @endif></mwc-checkbox></mwc-formfield>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($test->hasMedia('test_image'))
                                        <img id="test_container" class="img-fluid img-responsive mb-1" src="{{ $test->firstMedia('test_image')->getUrl() }}" alt="..."/>
                                        @else
                                        <img id="test_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                        @endif
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="test_image" id="test_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="test_image">
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
            {!! Form::open(['name' => 'test_delete', 'method' => 'DELETE','route' => ['tests.destroy', $test->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        FileLoader.init('test_image', 'test_container');
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

    $('.btn-delete').click(function(event){
        var form =  $('form[name="test_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Test Point?',
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