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
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['admins.update', $user->id]]) !!}
                    <div class="row">
                        <div class="mb-4">
                            <mwc-textfield class="w-100" label="User Name" outlined id="user_name" name="name" value="{{ $user->name }}"></mwc-textfield>
                        </div>
                        <div class="mb-4">
                            @if(!empty($user->getRoleNames()) && $user->hasExactRoles('SuperAdmin'))
                            <mwc-select class="w-100" name="roles[]" outlined label="Roles">
                                <mwc-list-item value="{{ $userRole }}" selected activated>{{ $userRole }}</mwc-list-item>
                            </mwc-select>
                            @else
                            <mwc-select class="w-100" name="roles[]" outlined label="Roles">
                                @foreach($roles as $role)
                                    @if($role == 'SuperAdmin')
                                        <mwc-list-item value="{{ $role }}" disabled>
                                            <div>{{ $role }} (Disabled)</div>
                                        </mwc-list-item>
                                    @else
                                        @if($userRole == $role)
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
                            <button type="submit" class="btn btn-outline-success">Submit</button>
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