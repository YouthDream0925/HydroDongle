@extends('layouts.admin.index')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/style.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.updateTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('updates.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::model($update, ['method' => 'PATCH','route' => ['updates.update', $update->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-12">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Title" outlined id="title" name="title" value="{{$update->title}}"></mwc-textfield>
                                </div>
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Version" outlined id="version" name="version" value="{{$update->version}}"></mwc-textfield>
                                </div>
                                <div class="d-flex align-items-center breadcrumb-custom">
                                    <mwc-formfield label="Show / Hide"><mwc-checkbox name="activate" value="true" @if($update->activate == '1') checked @endif></mwc-checkbox></mwc-formfield>
                                    <div class="d-flex">
                                        <select name="type" class="form-select mr-1" aria-label="Default select example" style="width: 300px;">
                                            @foreach($history_types as $key => $type)
                                            <option value="{{ $key }}" @if($update->type == $key) selected @endif>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        <input class="form-control" id="litepickerSingleDate" name="date" value="{{$update->date}}" placeholder="Select a date..." style="width: 300px;"/>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <textarea id="history_content" name="content">{{$update->content}}</textarea>
                        <div class="text-center mt-2">
                            <button class="btn btn-outline-danger btn-delete mdc-ripple-upgraded" type="button" data-updateKey="{{ $update->id }}">{{ __('global.delete') }}</button>
                            <button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.update') }}</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            {!! Form::open(['name' => 'update_delete', 'method' => 'DELETE','route' => ['updates.destroy', $update->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/js/main.nocss.js" crossorigin="anonymous"></script>
<script src="{{ asset('theme/js/litepicker.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/j3m0mx68czg9zlr3zwa7d4ohz60pzdsp89lxthokmy28g54o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#history_content',
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
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
        var form =  $('form[name="update_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this History?',
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