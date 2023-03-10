@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.slideTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('slides.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::model($slide, ['method' => 'PATCH','route' => ['slides.update', $slide->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Title" outlined id="title" name="title" value="{{ $slide->title }}"></mwc-textfield>                                    
                                </div>
                                <div class="mb-4">
                                    <mwc-textarea class="w-100" label="Description" outlined id="description" name="description" value="{{ $slide->description }}" maxlength="200" charcounter></mwc-textarea>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Button Text" outlined id="btn_text" name="btn_text" value="{{ $slide->btn_text }}" maxlength="40"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Button Link" outlined id="btn_link" name="btn_link" value="{{ $slide->btn_link }}"></mwc-textfield>
                                </div>
                                <div class="d-flex align-items-center item-space">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($slide->activate == '1') checked @endif></mwc-checkbox></mwc-formfield>
                                    <input id="sort_number" name="sort" value="{{ $slide->sort }}" type="text" maxlength="4" class="form-control" style="width: 100px;" data-inputmask="'alias': 'decimal', 'groupSeparator': ','" />
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="row">
                                    @if($slide->hasMedia('ads_image'))
                                    <div class="text-center">
                                        <div class="custom-slide-container">
                                            <img id="img_container" class="img-fluid img-responsive mb-1" src="{{ $slide->getMedia('ads_image')->first()->getUrl() }}" alt="..."/>
                                        </div>
                                        <div class="caption fst-italic text-muted mb-2"></div>
                                        <input type="file" name="ads_image" id="ads_image" hidden/>
                                        <div class="custom-btn-group">
                                            <label class="btn btn-outline-primary mdc-ripple-upgraded" for="ads_image">
                                                {{ __('global.ads') }}
                                                <i class="material-icons trailing-icon">upload</i>
                                            </label>
                                        </div>
                                    </div>
                                    @endif
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
        <div class="col-lg-12">
            {!! Form::open(['name' => 'slide_delete', 'method' => 'DELETE','route' => ['slides.destroy', $slide->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
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
        FileLoader.init('ads_image', 'img_container');
    });

    $('.btn-delete').click(function(event) {
        var form =  $('form[name="slide_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Slide?',
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