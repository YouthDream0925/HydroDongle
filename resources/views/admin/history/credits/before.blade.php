@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom" style="align-items: center;">
            <h1 class="display-4 mb-0 display-5">
                {!! __('global.transferTitle', ['credit' => $sender->credits]) !!}
            </h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('credits.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-lg-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'credits.transfer','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Transfer Amount" outlined id="amount" name="amount" type="number" maxlength="3" value=""></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-select class="w-100" id="recipient" name="recipient" outlined label="Recipient">
                                <mwc-list-item value=""></mwc-list-item>
                                @foreach($admins as $key => $admin)
                                    @if($admin->email == $sender->email)
                                    <mwc-list-item value="{{ $admin->id }}" disabled>
                                        <div>{{ $admin->email }} (Disabled)</div>
                                    </mwc-list-item>
                                    @else
                                    <mwc-list-item value="{{ $admin->id }}">{{ $admin->email }} ({{ $admin->roles->pluck('name')->first() }})</mwc-list-item>
                                    @endif
                                @endforeach
                            </mwc-select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-outline-success">{{ __('global.transferToAdmin') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'credits.to_user','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Transfer Amount" outlined id="amount" name="amount" type="number" maxlength="3" value=""></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-select class="w-100" id="recipient" name="recipient" outlined label="Recipient">
                                <mwc-list-item value=""></mwc-list-item>
                                @foreach($users as $key => $user)
                                    @if($user->email == $sender->email)
                                    <mwc-list-item value="{{ $user->id }}" disabled>
                                        <div>{{ $user->email }} (Disabled)</div>
                                    </mwc-list-item>
                                    @else
                                    <mwc-list-item value="{{ $user->id }}">{{ $user->email }} (Online User)</mwc-list-item>
                                    @endif
                                @endforeach
                            </mwc-select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-outline-success">{{ __('global.transferToOnlineUser') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    {!! Form::open(array('route' => 'credits.to_dongle_user','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-textfield class="w-100" label="Transfer Amount" outlined id="amount" name="amount" type="number" maxlength="3" value=""></mwc-textfield>
                        </div>
                        <div class="col-lg-6 col-md-12 mb-4">
                            <mwc-select class="w-100" id="recipient" name="recipient" outlined label="Recipient">
                                <mwc-list-item value=""></mwc-list-item>
                                @foreach($dongle_users as $key => $dongle_user)
                                    @if($dongle_user->email == $sender->email)
                                    <mwc-list-item value="{{ $dongle_user->id }}" disabled>
                                        <div>{{ $dongle_user->email }} (Disabled)</div>
                                    </mwc-list-item>
                                    @else
                                    <mwc-list-item value="{{ $dongle_user->id }}">{{ $dongle_user->email }} (Dongle User)</mwc-list-item>
                                    @endif
                                @endforeach
                            </mwc-select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-outline-success">{{ __('global.transferToDongleUser') }}</button>
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