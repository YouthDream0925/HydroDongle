@extends('layouts.admin.index')

@push('css')
<link href="{{ asset('css/tags.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.faqTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('faqs.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-4">
                <div class="card-body p-5">
                    <div class="card-title mb-4">{{ __('global.faqDetails') }}</div>
                    {!! Form::model($faq, ['method' => 'PATCH','route' => ['faqs.update', $faq->id], 'enctype' => 'multipart/form-data']) !!}
                        <div class="row mb-4 item-center">
                            <div class="col-xl-12">
                                <div class="mb-4">
                                    <mwc-textfield class="w-100" label="Title" outlined id="faq_title" name="title" value="{{ $faq->title }}"></mwc-textfield>
                                </div>
                                <textarea id="content" name="content">{{ $faq->content }}</textarea>
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
            {!! Form::open(['name' => 'faq_delete', 'method' => 'DELETE','route' => ['faqs.destroy', $faq->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.tiny.cloud/1/j3m0mx68czg9zlr3zwa7d4ohz60pzdsp89lxthokmy28g54o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    tinymce.init({
        selector: '#content',
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
        var form =  $('form[name="faq_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this FAQ?',
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