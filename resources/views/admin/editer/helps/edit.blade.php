@extends('layouts.admin.index')

@push('css')
<link href="{{ asset('css/tags.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.helpTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('helps.index') }}">
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
                                    @if($brand->hasMedia('brand_image'))
                                    <img class="img-fluid img-responsive mb-1" src="{{ $brand->firstMedia('brand_image')->getUrl() }}" alt="..."/>
                                    @else
                                    <img class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ __('global.brand') }}</div>
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
                                    <img class="img-fluid img-responsive img-filter-gray mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <div class="fs-6 mb-1 fw-500">{{ __('global.cpu') }}</div>
                                    <a class="small stretched-link text-reset text-decoration-none">{{ $cpu->explanation }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-raised mb-4">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.helpDetails') }}</div>
                    {!! Form::model($help, ['method' => 'PATCH','route' => ['helps.update', $help->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-12">
                                <div class="mb-4 d-flex">
                                    <mwc-textfield class="w-100 mr-1" label="Title" outlined id="help_title" name="title" value="{{ $help->title }}"></mwc-textfield>
                                    <mwc-select class="w-50" name="view_type" outlined label="Views">
                                        <mwc-list-item value="0" @if($help->view_type == '0') selected activated @endif>Drop-Down</mwc-list-item>
                                        <mwc-list-item value="1" @if($help->view_type == '1') selected activated @endif>Page</mwc-list-item>
                                    </mwc-select>
                                </div>
                                <div class="mb-4 d-flex">
                                    <div class="w-100 mr-1">
                                        <label class="form-label">Tags Input</label>
                                        <input style="width: 100px;" type="text" class="form-control" data-role="tagsinput" name="tags" value="{{ $help->tags }}">
                                    </div>
                                    <mwc-formfield class="w-50" label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($help->activate == '1') checked @endif></mwc-checkbox></mwc-formfield>
                                </div>
                                <textarea id="content" name="content">{{ $help->content }}</textarea>
                            </div>
                            <input type="hidden" name="brand_id" value="{{ $help->brand_id }}"/>
                            <input type="hidden" name="cpu_id" value="{{ $help->cpu_id }}"/>
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
            {!! Form::open(['name' => 'help_delete', 'method' => 'DELETE','route' => ['helps.destroy', $help->id],'style'=>'display:inline']) !!}
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
<script src="https://cdn.tiny.cloud/1/j3m0mx68czg9zlr3zwa7d4ohz60pzdsp89lxthokmy28g54o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('theme/js/custom/bootstraptagsinput.bundle.js') }}"></script>
<script src="{{ asset('theme/js/custom/model.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        let brand = {
            'id': '{{ $brand->brand_id }}',
            'name': '{{ $brand->brand_name }}',
            'link': '{{ $brand->brand_link }}',
            'url': '',
        };
        let features = [];
        Model.init(brand, features);
    });

    tinymce.init({
        selector: '#content',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount', 'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'linkchecker', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | forecolor backcolor bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        height: 480     
    });

    $('.btn-delete').click(function(event){
        var form =  $('form[name="help_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Help?',
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