@extends('layouts.admin.index')

@push('css')
<link href="{{ asset('css/tags.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.helpTitle') }} - {{ __('global.create') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('models.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 gx-5">
                <div class="col-xl-2 col-md-12"></div>
                <div class="col-xl-4 col-md-12">
                    <div id="brand_selecter" class="card card-raised ripple-primary mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="custom-brand-container-small">
                                    <img class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ __('global.brand') }}</div>
                                    <a class="small stretched-link text-reset text-decoration-none">{{ __('global.noSelected') }}</a>
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
                                    <img class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ __('global.cpu') }}</div>
                                    <a class="small stretched-link text-reset text-decoration-none">{{ __('global.noSelected') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-raised mb-4">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.helpDetails') }}</div>
                    {!! Form::open(array('route' => 'helps.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-12">
                                <div class="mb-4 d-flex">
                                    <mwc-textfield class="w-100 mr-1" label="Title" outlined id="help_title" name="title" value=""></mwc-textfield>
                                    <mwc-select class="w-50" name="view_format" outlined label="Views">
                                        <mwc-list-item value="1">Drop-Down</mwc-list-item>
                                        <mwc-list-item value="2">Page</mwc-list-item>
                                    </mwc-select>
                                </div>
                                <div class="mb-4 d-flex">
                                    <input type="text" class="form-control" data-role="tagsinput" value="qboat,Admin,React,VueJs,Angular">
                                    <!-- <mwc-textfield class="w-100 mr-1" label="Tags" outlined id="help_tags" name="tags" value=""></mwc-textfield> -->
                                    <!-- <mwc-formfield class="w-50" label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield> -->
                                </div>
                            </div>
                            <input type="hidden" name="brand_id" value=""/>
                            <input type="hidden" name="cpu_id" value=""/>
                        </div>
                        <div class="text-center"><button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.create') }}</button></div>
                    {!! Form::close() !!}
                </div>
            </div>
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
<script src="{{ asset('theme/js/custom/bootstraptagsinput.bundle.js') }}"></script>
<script src="{{ asset('theme/js/custom/model.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        let brand = null;
        let features = [];
        Model.init(brand, features);
    });
</script>
@endpush