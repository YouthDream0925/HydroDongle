@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.modelTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('models.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-5">
                <div class="col-xl-4 col-md-12">
                    <div id="brand_selecter" class="card card-raised ripple-primary mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="custom-brand-container-small">
                                    @if($brand->hasMedia('brand_image'))
                                    <img class="img-fluid img-responsive mb-1" src="{{ $brand->firstMedia('brand_image')->getUrl() }}" alt="..."/>
                                    @else
                                    <img class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ $brand->brand_name }}</div>
                                    <a class="small stretched-link text-reset text-decoration-none">{{ $brand->brand_link }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div id="cpu_selecter" class="card card-raised ripple-primary mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="custom-brand-container-small">
                                    @if($cpu->hasMedia('cpu_image'))
                                    <img class="img-fluid img-responsive mb-1" src="{{ $cpu->firstMedia('cpu_image')->getUrl() }}" alt="..."/>
                                    @else
                                    <img class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ $cpu->name }}</div>
                                    <a class="small stretched-link text-reset text-decoration-none">{{ \AppHelper::instance()->short_string($cpu->explanation, 30) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div id="features_selecter" class="card card-raised ripple-primary mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="custom-brand-container-small">
                                    <img class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ __('global.feature') }}</div>
                                    @if(count($feature_ids) == 0)
                                    <a id="features_selecter_check" class="small stretched-link text-reset text-decoration-none">{{ __('global.noSelected') }}</a>
                                    @else
                                    <a id="features_selecter_check" class="small stretched-link text-reset text-decoration-none">{{ __('global.selectedFeatures') }}: {{ count($feature_ids) }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-raised mb-4">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.modelDetails') }}</div>
                    {!! Form::model($model, ['method' => 'PATCH','route' => ['models.update', $model->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Model Name" outlined id="model_name" name="name" value="{{ $model->name }}"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Model Link" outlined id="model_link" name="link" value="{{ $model->link }}"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-select class="w-100" id="soc_selector" name="soc_id" outlined label="Soc">
                                        @foreach($model->cpu->socs as $soc)
                                            @if($model->soc_id == $soc->id)
                                            <mwc-list-item value="{{ $soc->id }}" selected activated>{{ $soc->name }}</mwc-list-item>
                                            @else
                                            <mwc-list-item value="{{ $soc->id }}">{{ $soc->name }}</mwc-list-item>
                                            @endif
                                        @endforeach
                                    </mwc-select>
                                </div>
                                <div class="mb-4">
                                    <mwc-textarea class="w-100" label="Note" outlined name="note" value="{{ $model->note }}" maxlength="200" charcounter rows="10"></mwc-textarea>
                                </div>
                                <div class="d-flex align-items-center item-space-between">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($model->activate == true) checked @endif></mwc-checkbox></mwc-formfield>
                                    <mwc-select class="w-50" name="memory_id" outlined label="{{ __('global.memory') }}">
                                        @foreach($memories as $memory)
                                            @if($model->memory_id == $memory->id)
                                            <mwc-list-item value="{{ $memory->id }}" selected activated>{{ $memory->name }}</mwc-list-item>
                                            @else
                                            <mwc-list-item value="{{ $memory->id }}">{{ $memory->name }}</mwc-list-item>
                                            @endif
                                        @endforeach
                                    </mwc-select>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($model->hasMedia('model_image'))
                                        <img id="model_container" class="img-fluid img-responsive mb-1" src="{{ $model->firstMedia('model_image')->getUrl() }}" alt="..."/>
                                        @else
                                        <img id="model_container" class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                        @endif
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="model_image" id="model_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="model_image">
                                        {{ __('global.image') }}
                                        <i class="material-icons trailing-icon">upload</i>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="brand_id" value="{{ $brand->brand_id }}"/>
                            <input type="hidden" name="cpu_id" value="{{ $cpu->id }}"/>
                            <input type="hidden" name="feature_id" value="{{ $features }}"/>
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
            {!! Form::open(['name' => 'model_delete', 'method' => 'DELETE','route' => ['models.destroy', $model->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

<button id="modal_show" class="btn btn-primary d-none" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Launch scrollable modal<i class="trailing-icon material-icons">launch</i></button>
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title"></h5>
                <input id="search_bar" class="form-control ml-auto" value="" placeholder="Search..." style="width: 300px;">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal_body" class="modal-body">                
            </div>
            <div class="modal-footer">
                <button class="btn btn-text-primary me-2" type="button" data-bs-dismiss="modal">Close</button>
                <!-- <button id="confirm_btn" class="btn btn-text-primary" type="button">Ok</button> -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('theme/js/custom/model.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        FileLoader.init('model_image', 'model_container');
        let brand = {
            'id': '{{ $brand->brand_id }}',
            'name': '{{ $brand->brand_name }}',
            'link': '{{ $brand->brand_link }}',
            'url': '',
        };
        let feature_ids = $.parseJSON('{{ $model->feature_id }}');
        Model.init(brand, feature_ids);
    });

    $('.btn-delete').click(function(event){
        var form =  $('form[name="model_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Model?',
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