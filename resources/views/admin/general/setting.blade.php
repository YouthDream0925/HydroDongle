@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-5">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">{{ __('global.settingTitle') }}</h1>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('website.setting.edit') }}">
                        @csrf
                        @foreach($settings as $key => $setting)
                            @if($setting->property != "logo")
                            <div class="mb-4"><mwc-textfield class="w-100" label="{{ $setting->property }}" outlined name="{{ $setting->property }}" value="{{ $setting->value }}"></mwc-textfield></div>
                            @endif
                        @endforeach
                        <div class="text-center mb-4">
                            <!-- Profile picture image-->
                            <img id="avatar_container" class="img-fluid rounded-circle mb-1" src="https://source.unsplash.com/jSUsJWvnnEA/500x500" alt="..." style="width: 160px; height: 160px" />
                            <!-- Profile picture help block-->
                            <div class="caption fst-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                            <!-- Profile picture upload button-->
                            <input type="file" name="logo" id="logo" hidden/>
                            <label class="btn btn-primary" for="logo">
                                Upload new image
                                <i class="material-icons trailing-icon">upload</i>
                            </label>
                        </div>
                        <div class="text-end"><button class="btn btn-success" type="submit">{{ __('global.saveChanges') }}</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('#logo').on("change", function () {
        // the files is a new property from the new File API, if if it is not supported assign an empty array as the value of files
        var files = !! this.files ? this.files : [];

        //if there are no files and FileReader is not supported return
        if (!files.length || !window.FileReader) return;

        var file_name = files[0].name;

        if (/^image/.test(files[0].type)) {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function (event) {
                $('#avatar_container').prop('src', event.target.result);
                $('#avatar_container').prop('title', file_name);
            }
        } else {
            new bs5.Toast({
                body: lang.selectErrorAvatar,
                className: 'border-0 bg-danger text-white',
                btnCloseWhite: true,
            }).show();
        }
    });
</script>
@endpush