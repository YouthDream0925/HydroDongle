@extends('layouts.admin.index')

@push('css')
@endpush

@section('content')
<div class="container-xl p-5">
    <div class="row justify-content-between align-items-center mb-2">
        <div class="col flex-shrink-0 mb-5 mb-md-0 breadcrumb-custom">
            <h1 class="display-4 mb-0 display-5">{{ __('global.paymentTitle') }} - {{ __('global.showMore') }}</h1>
            <a class="btn btn-outline-success mdc-ripple-upgraded" href="{{ route('payments.index') }}">
                <span class="material-icons">reply</span>{{ __('global.back') }}
            </a>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-xl-12">
            <div class="card card-raised mb-5">
                <div class="card-body p-5">
                    <div class="row mb-4 item-center">
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Payment Conversation ID" outlined id="title" value="{{ $payment->code }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Customer Surname" outlined id="title" value="{{ $payment->customer_surname }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Customer Phone" outlined id="title" value="{{ $payment->customer_phone }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Customer Email" outlined id="title" value="{{ $payment->customer_email }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Customer Country" outlined id="title" value="{{ $payment->customer_country }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Customer City" outlined id="title" value="{{ $payment->customer_city }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Customer Address" outlined id="title" value="{{ $payment->address }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Product" outlined id="title" value="{{ $payment->products }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Price" outlined id="title" value="{{ $payment->total_price }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Currency" outlined id="title" value="{{ $payment->currency }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Description" outlined id="title" value="{{ $payment->description }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Status Message" outlined id="title" value="{{ $payment->msg }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                <mwc-textfield class="w-100" label="Payment Date" outlined id="title" value="{{ $payment->getYearAttribute() }}, {{ $payment->getMonthAttribute() }}" readonly></mwc-textfield>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-4">
                                @if($payment->status == '1')
                                <mwc-textfield class="w-100 success-status-background" label="Status" outlined id="title" value="Success" readonly></mwc-textfield>
                                @else
                                <mwc-textfield class="w-100 failure-status-background" label="Status" outlined id="title" value="Failure" readonly></mwc-textfield>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        {!! Form::open(['method' => 'DELETE','route' => ['payments.destroy', $payment->id],'style'=>'display:inline']) !!}
                            {!! Form::button(__('global.delete'), ['type' =>'submit', 'class' => 'btn btn-outline-success mdc-ripple-upgraded']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush