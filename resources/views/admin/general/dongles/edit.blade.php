@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.dongleUserTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('dongles.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::model($dongle_user, ['method' => 'PATCH','route' => ['dongles.update', $dongle_user->id]]) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="User Name" outlined id="name" name="name" type="text" value="{{ $dongle_user->name }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Email Address" outlined id="email" name="email" type="email" value="{{ $dongle_user->email }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Password" outlined id="password" name="password" value=""></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Confirm Password" outlined id="confirm_password" name="confirm-password" value=""></mwc-textfield>
                        </div>                        
                        <div class="col-md-12 mb-4 d-flex item-space">
                            <mwc-formfield label="Activate"><mwc-checkbox name="ProPack" value="true" @if($dongle_user->ProPack == 1) checked @endif></mwc-checkbox></mwc-formfield>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-outline-danger btn-delete mdc-ripple-upgraded" type="button">{{ __('global.delete') }}</button>
                            <button class="btn btn-outline-success mdc-ripple-upgraded" type="submit">{{ __('global.update') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            {!! Form::open(['name' => 'dongle_delete', 'method' => 'DELETE','route' => ['dongles.destroy', $dongle_user->id],'style'=>'display:inline']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $('.btn-delete').click(function(event){
        var form =  $('form[name="dongle_delete"]');
        event.preventDefault();
        swal({
            title: 'Are you sure you want to delete this Dongle User?',
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