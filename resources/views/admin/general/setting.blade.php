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
                        <div class="mb-4"><mwc-textfield class="w-100" label="{{ $setting->property }}" outlined name="{{ $setting->property }}" value="{{ $setting->value }}"></mwc-textfield></div>
                        @endforeach
                        <div class="text-end"><button class="btn btn-success" type="submit">{{ __('global.saveChanges') }}</button></div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush