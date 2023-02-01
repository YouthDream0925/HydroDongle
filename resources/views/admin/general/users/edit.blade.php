@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.userTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('users.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="First Name" outlined id="first_name" name="first_name" type="text" value="{{ $user->first_name }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Last Name" outlined id="last_name" name="last_name" type="text" value="{{ $user->last_name }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Email Address" outlined id="email" name="email" type="email" value="{{ $user->email }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4 d-flex item-space">
                            <mwc-formfield label="Activate"><mwc-checkbox name="isactivated" value="true" @if($user->isactivated == "1") checked @endif></mwc-checkbox></mwc-formfield>
                            @if($user->isactivated == "1")
                            <input class="form-control" id="litepickerSingleDate" name="date" value="{{$user->getDateTimeExpiredAtAttribute()}}" placeholder="Select a date..." style="width: 300px;" disabled/>
                            @else
                            <mwc-select id="period" name="period" outlined label="Period">
                                <mwc-list-item value=""></mwc-list-item>
                                <mwc-list-item value="6">6 months</mwc-list-item>
                                <mwc-list-item value="12">1 year</mwc-list-item>
                            </mwc-select>
                            @endif
                        </div>
                        <div class="mb-4">
                            <mwc-textfield class="w-100" label="Password" outlined id="password" name="password" value=""></mwc-textfield>
                        </div>
                        <div class="mb-4">
                            <mwc-textfield class="w-100" label="Confirm Password" outlined id="confirm_password" name="confirm-password" value=""></mwc-textfield>
                        </div>                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-outline-success">{{ __('global.update') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush