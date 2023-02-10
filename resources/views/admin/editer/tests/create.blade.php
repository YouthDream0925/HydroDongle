@extends('layouts.admin.index')

@push('css')
<link href="{{ asset('css/tags.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.testTitle') }} - {{ __('global.create') }}</h1>
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
                    {!! Form::open(array('route' => 'tests.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Point Name" outlined id="point_name" name="name" value=""></mwc-textfield>
                                </div>
                                <div class="d-flex align-items-center">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        <img id="test_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
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
</script>
@endpush