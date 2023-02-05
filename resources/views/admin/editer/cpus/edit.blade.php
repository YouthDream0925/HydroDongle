@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.cpuTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('cpus.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.cpuDetails') }}</div>
                    {!! Form::model($cpu, ['method' => 'PATCH','route' => ['cpus.update', $cpu->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-8">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="CPU Name" outlined id="cpu_name" name="name" value="{{ $cpu->name }}"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textarea class="w-100" label="Explanation" outlined name="explanation" value="{{ $cpu->explanation }}" maxlength="200" charcounter></mwc-textarea>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="text-center">
                                    <div class="custom-brand-container">
                                        @if($cpu->hasMedia('cpu_image'))
                                        <img id="cpu_image_container" class="img-fluid img-responsive mb-1" src="{{ url($cpu->firstMedia('cpu_image')->getUrl()) }}" alt="..."/>
                                        @else
                                        <img id="cpu_image_container" class="img-fluid img-responsive mb-1" src="{{ url('storage/sample/brand') }}" alt="..."/>
                                        @endif
                                    </div>
                                    <div class="caption fst-italic text-muted mb-4"></div>
                                    <input type="file" name="cpu_image" id="cpu_image" hidden/>
                                    <label class="btn btn-outline-primary mdc-ripple-upgraded" for="cpu_image">
                                        {{ __('global.image') }}
                                        <i class="material-icons trailing-icon">upload</i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-danger btn-delete mdc-ripple-upgraded" type="button" data-cpuID="{{ $cpu->id }}">{{ __('global.delete') }}</button>
                            <button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.update') }}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card card-raised mb-5">
                <div id="socs_container" class="card-body p-5">
                    <div class="card-title mb-4">
                        {{ __('global.socs') }}
                        <a id="add_new_soc" class="btn btn-outline-success mdc-ripple-upgraded f-right">
                            <span class="material-icons">add</span>{{ __('global.add') }}
                        </a>
                    </div>
                    @foreach($cpu->socs as $key => $soc)
                    <div id="soc_container_{{ ++$key }}" class="row mb-4 item-center">
                        <div class="col-xl-12">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="SOC Name" outlined id="soc_name_{{ $key }}" name="name" value="{{ $soc->name }}"></mwc-textfield>
                            </div>
                            <div class="mb-4">
                                <mwc-textarea class="w-100" label="Explanation" outlined id="soc_explanation_{{ $key }}" name="explanation" value="{{ $soc->explanation }}" maxlength="200" charcounter></mwc-textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-danger btn-soc-delete mdc-ripple-upgraded" type="button" data-socOrder="{{ $key }}" data-socKey="{{ $soc->id }}">{{ __('global.delete') }}</button>
                            <button class="btn btn-outline-success btn-soc-save mdc-ripple-upgraded" type="button" data-socOrder="{{ $key }}" data-socKey="{{ $soc->id }}">{{ __('global.save') }}</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            {!! Form::open(['name' => 'cpu_delete', 'method' => 'DELETE','route' => ['cpus.destroy', $cpu->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('theme/js/custom/file-loader.js') }}"></script>
<script src="{{ asset('theme/js/custom/socs.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    let socs_counter = '{{ count($cpu->socs) }}';
    jQuery(document).ready(function($) {
        FileLoader.init('cpu_image', 'cpu_image_container');
        SOCS.init(socs_counter, '{{ $cpu->id }}');
    });

    $('.btn-delete').click(function(event){
        var form =  $('form[name="cpu_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this CPU?',
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