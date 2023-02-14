@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.featureTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('features.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.featureDetails') }}</div>
                    {!! Form::model($feature, ['method' => 'PATCH','route' => ['features.update', $feature->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Feature Name" outlined id="feature_name" name="name" value="{{ $feature->name }}"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textarea class="w-100" label="Explanation" outlined name="explanation" value="{{ $feature->explanation }}" rows="10"></mwc-textarea>
                                </div>
                                <div class="d-flex align-items-center breadcrumb-custom">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($feature->activate == '1') checked @endif></mwc-checkbox></mwc-formfield>
                                    <input class="form-control" name="sorting" value="{{ $feature->sorting }}" placeholder="Order Number" style="width: 300px;"/>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($feature->hasMedia('icon'))
                                        <img id="icon_container" class="img-fluid img-responsive mb-1" src="{{ url($feature->firstMedia('icon')->getUrl()) }}" alt="..."/>
                                        @else
                                        <img id="icon_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                        @endif
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="icon" id="icon" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="icon">
                                        {{ __('global.icon') }}
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
            {!! Form::open(['name' => 'feature_delete', 'method' => 'DELETE','route' => ['features.destroy', $feature->id],'style'=>'display:inline']) !!}
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
        FileLoader.init('icon', 'icon_container');
    });

    $('.btn-delete').click(function(event){
        var form =  $('form[name="feature_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Feature?',
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