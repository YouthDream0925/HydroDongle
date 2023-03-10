@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.adminUserTitle') }} - {{ __('global.edit') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('admins.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::model($admin, ['method' => 'PATCH','route' => ['admins.update', $admin->id]]) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="First Name" outlined id="first_name" name="first_name" type="text" value="{{ $admin->first_name }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Last Name" outlined id="last_name" name="last_name" type="text" value="{{ $admin->last_name }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Email Address" outlined id="email" name="email" type="email" value="{{ $admin->email }}"></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            @if(!empty($admin->getRoleNames()) && $admin->hasExactRoles('SuperAdmin'))
                            <mwc-select class="w-100" name="roles[]" outlined label="Roles">
                                <mwc-list-item value="{{ $adminRole }}" selected activated>{{ $adminRole }}</mwc-list-item>
                            </mwc-select>
                            @else
                            <mwc-select class="w-100" name="roles[]" outlined label="Roles">
                                @foreach($roles as $role)
                                    @if($role == 'SuperAdmin')
                                        <mwc-list-item value="{{ $role }}" disabled>
                                            <div>{{ $role }} (Disabled)</div>
                                        </mwc-list-item>
                                    @else
                                        @if($adminRole == $role)
                                        <mwc-list-item value="{{ $role }}" selected activated>{{ $role }}</mwc-list-item>
                                        @else
                                        <mwc-list-item value="{{ $role }}">{{ $role }}</mwc-list-item>
                                        @endif
                                    @endif
                                @endforeach
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