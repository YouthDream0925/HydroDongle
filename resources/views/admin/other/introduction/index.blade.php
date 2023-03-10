@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.introTitle') }}</h1>
            <a id="save_into" class="btn btn-outline-success mdc-ripple-upgraded" href="javascript::void(0)">
                <span class="material-icons">save</span>{{ __('global.save') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-2">
                <div class="card-body p-4">                    
                    @if($intro != null)
                    <mwc-textfield class="w-100" label="Title" outlined id="title" name="title" value="@if($intro != null){{ $intro->title }}@endif"></mwc-textfield>
                    @else
                    <mwc-textfield class="w-100" label="Title" outlined id="title" name="title" value=""></mwc-textfield>
                    @endif
                </div>
            </div>
            @if($intro != null)
            <textarea id="introduction">{{ $intro->content }}</textarea>
            @else
            <textarea id="introduction"></textarea>
            @endif
        </div>
    </div>
</div>
@csrf
@endsection

@push('script')
<script src="https://cdn.tiny.cloud/1/j3m0mx68czg9zlr3zwa7d4ohz60pzdsp89lxthokmy28g54o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#introduction',
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

    $('#save_into').click(function(event) {
        tinymce.triggerSave();
        const content = tinymce.get('introduction').getContent();
        const title = $('#title').val();

        if(content == "" || title == "") {
            new bs5.Toast({
                body: lang.checkInputContent,
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
            return;
        }

        $.ajax({
            type: 'post',
            url: '/admin/other/intro/save',
            data: {
                '_token': $('input[name="_token"]').val(),
                'title': title,
                'content': content
            },
            success: function(result) {
                if(result['success'] == true) {
                    new bs5.Toast({
                        body: result['msg'],
                        className: 'border-0 bg-success text-white',
                        btnCloseWhite: true,
                    }).show();
                } else {
                    new bs5.Toast({
                        body: result['msg'],
                        className: 'border-0 bg-danger text-white',
                        btnCloseWhite: true,
                    }).show();
                }
            }, error: function(res) {
                new bs5.Toast({
                    body: lang.unexpectedErrorOccured,
                    className: 'border-0 bg-danger text-white',
                    btnCloseWhite: true,
                }).show();
            }
        });        
    });
</script>
@endpush