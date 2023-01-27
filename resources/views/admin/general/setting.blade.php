@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0">
            <h1 class="display-4 mb-0">{{ __('global.settingTitle') }}</h1>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'website.setting.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                        @foreach($settings as $key => $setting)
                            @if($setting->property != "logo")
                            <div class="mb-4"><mwc-textfield class="w-100" label="{{ $setting->property }}" outlined name="{{ $setting->property }}" value="{{ $setting->value }}"></mwc-textfield></div>
                            @endif
                        @endforeach
                        <div class="text-center mb-4">
                            <!-- Profile picture image-->                            
                            @foreach($settings as $key => $setting)
                                @if($setting->property == "logo")
                                <img id="site_logo" class="img-fluid rounded-circle mb-1" src="{{ url('storage/'.$setting->value) }}" alt="..." style="width: 160px; height: 160px" />
                                @endif
                            @endforeach
                            <!-- Profile picture help block-->
                            <div class="caption fst-italic text-muted mb-4"></div>
                            <!-- Profile picture upload button-->
                            <input type="file" name="logo" id="logo" hidden/>
                            <label class="btn btn-outline-primary mdc-ripple-upgraded" for="logo">
                                {{ __('global.uploadLogo') }}
                                <i class="material-icons trailing-icon">upload</i>
                            </label>
                        </div>
                        <div class="text-end"><button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.saveChanges') }}</button></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('theme/js/custom/setting.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        Setting.init();
    });
</script>
@endpush