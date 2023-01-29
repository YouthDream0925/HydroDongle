@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.slideTitle') }} - {{ __('global.create') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('slides.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'slides.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-6">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Title" outlined id="title" name="title" value=""></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Description" outlined id="description" name="description" value=""></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Button Text" outlined id="btn_text" name="btn_text" value="" maxlength="40"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Button Link" outlined id="btn_link" name="btn_link" value=""></mwc-textfield>
                                </div>
                                <div class="d-flex align-items-center item-space">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" checked></mwc-checkbox></mwc-formfield>
                                    <input id="sort_number" name="sort" type="text" maxlength="4" class="form-control" style="width: 100px;" data-inputmask="'alias': 'decimal', 'groupSeparator': ','" />
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="text-center">
                                            <div class="custom-slide-container">
                                                <img id="ads_container1" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                            </div>
                                            <div class="caption fst-italic text-muted mb-2"></div>
                                            <input type="file" name="ads_images[]" id="ads_image1" hidden/>
                                            <div class="custom-btn-group">
                                                <label class="btn btn-outline-primary mdc-ripple-upgraded" for="ads_image1">
                                                    {{ __('global.ads') }}
                                                    <i class="material-icons trailing-icon">upload</i>                                                
                                                </label>
                                                <i class="btn-ads material-icons trailing-icon custom-icon" data-index="1">delete</i>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="text-center">
                                            <div class="custom-slide-container">
                                                <img id="ads_container2" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                            </div>
                                            <div class="caption fst-italic text-muted mb-2"></div>
                                            <input type="file" name="ads_images[]" id="ads_image2" hidden/>
                                            <div class="custom-btn-group">
                                                <label class="btn btn-outline-primary mdc-ripple-upgraded" for="ads_image2">
                                                    {{ __('global.ads') }}
                                                    <i class="material-icons trailing-icon">upload</i>                                                
                                                </label>
                                                <i class="btn-ads material-icons trailing-icon custom-icon" data-index="2">delete</i>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="text-center">
                                            <div class="custom-slide-container">
                                                <img id="ads_container3" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                            </div>
                                            <div class="caption fst-italic text-muted mb-2"></div>
                                            <input type="file" name="ads_images[]" id="ads_image3" hidden/>
                                            <div class="custom-btn-group">
                                                <label class="btn btn-outline-primary mdc-ripple-upgraded" for="ads_image3">
                                                    {{ __('global.ads') }}
                                                    <i class="material-icons trailing-icon">upload</i>                                                
                                                </label>
                                                <i class="btn-ads material-icons trailing-icon custom-icon" data-index="3">delete</i>                                                
                                            </div>
                                        </div>
                                    </div>
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
<script src="{{ asset('theme/js/custom/input-numeric-mask.js') }}"></script>
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sort_number').numeric({ negative: false });
        FileLoader.init('ads_image1', 'ads_container1');
        FileLoader.init('ads_image2', 'ads_container2');
        FileLoader.init('ads_image3', 'ads_container3');
    });

    $('.btn-ads').click(function(event) {
        const id = $(this).attr('data-index');
        if($('#ads_image' + id).val() != '') {
            swal({
                title: 'Are you sure you want to delete this ADS?',
                text: lang.deleteConfirmText,
                icon: lang.deleteConfirmIcon,
                type: lang.deleteConfirmType,
                buttons: lang.deleteConfirmButton,
                confirmButtonColor: lang.deleteConfirmButtonColor,
                cancelButtonColor: lang.cancelButtonColor,
                confirmButtonText: lang.confirmButtonText
            }).then((willDelete) => {
                if (willDelete) {
                    $('#ads_image' + id).val('');
                    $('#ads_container' + id).attr('src', "{{ url('storage/sample/brand') }}")
                    new bs5.Toast({
                        body: 'ADS deleted successfully.',
                        className: 'border-0 bg-success text-white',
                        btnCloseWhite: true,
                    }).show();
                }
            });
        } else {
            new bs5.Toast({
                body: 'No file selected.',
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
        }
    });
</script>
@endpush