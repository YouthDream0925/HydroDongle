@extends('layouts.front.index')

@push('css')
<link rel="stylesheet" href="{{ asset('theme_front/custom/toast.css') }}">
@endpush

@section('content')
<div id="preloader" class="loading" style="display: none;">
    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
        <path fill="#000"
            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
        </path>
    </svg>
</div>

<section class="breadcrumb_area breadcrumb2 bgimage biz_overlay" style="min-height: 300px;">
    <div class="bg_image_holder">
        <img src="{{ asset('theme_front/img/shop.png') }}" alt="">
    </div>
    <div class="container content_above">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex flex-column align-items-center">
                    <!-- <h4 class="page_title">{{ __('global.devices') }}</h4> -->
                    <nav aria-label="breadcrumb" style="margin-top: 9.6rem;">
                        <ol class="breadcrumb m-bottom-30">
                            <li class="breadcrumb-item"><a class="custom-a-breadcrumb" href="{{ route('shop') }}">{{ __('global.shop') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: rebeccapurple;">{{ __('global.checkout') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section id="main_container" class="checkout-wrapper p-top-90 p-bottom-110">
    <div class="tab tab--6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab_nav2">
                        <ul class="nav justify-content-around" id="tab6" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab6_nav1" data-toggle="tab" href="#tab6_content1" role="tab" aria-controls="tab6_content1" aria-selected="true">1. Billing Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab6_nav3" data-toggle="tab" href="#tab6_content3" role="tab" aria-controls="tab6_content3" aria-selected="false">2. Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab6_nav4" data-toggle="tab" href="#tab6_content4" role="tab" aria-controls="tab6_content4" aria-selected="false">3. Order Review</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content tab--content2" id="tabcontent6">
                        <div class="tab-pane fade show active" id="tab6_content1" role="tabpanel" aria-labelledby="tab6_nav1">
                            <form action="#">
                                <h4>Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" class="form-control" id="fname">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" class="form-control" id="lname">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eaddress">Email Address</label>
                                            <input type="email" class="form-control" id="eaddress">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kochu">Phone Number</label>
                                            <input type="text" class="form-control" id="kochu">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="countr">{{ __('global.country') }}</label>
                                            <div class="form-group">
                                                <div class="select-basic">
                                                    <select value="" class="form-control" id="country_selector">
                                                        <option value="">Select Country</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" data-countryName="{{ $country->country }}">{{ $country->country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <div class="form-group">
                                                    <input id="city" type="text" class="input-lg form-control" autocomplete="off" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zip">ZIP Code</label>
                                            <input type="text" class="form-control" id="zip">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="add1">Address</label>
                                            <input type="text" class="form-control" id="add1">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                                <div class="action-btns d-flex m-top-60">
                                    <a href="{{ route('shop') }}" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back to shop</a>
                                    <a href="javascript::void(0)" id="billing_continue" class="btn btn-primary ml-auto btn-icon icon-right">Continue <i class="la la-angle-double-right"></i></a>
                                </div>
                            </form>
                        </div><!-- end ./tab-pane -->
                        <div class="tab-pane fade" id="tab6_content3" role="tabpanel" aria-labelledby="tab6_nav3">
                            <h4>Choose Payment Method</h4>
                            <div class="method-1">
                                <div class="header">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="payment_via_iyzico" name="customRadio1" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="payment_via_iyzico">Pay With Credit Card</label>
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="d-flex item-center item-space">
                                        <h5 class="mb-0">We accept following credit cards: </h5>
                                        <div style="width: 300px; height: 150px;"><img class="img-fluid img-responsive" src="{{ asset('theme_front/cards/visa.svg') }}" alt=""></div>
                                        <div style="width: 300px; height: 150px;"><img class="img-fluid img-responsive" src="{{ asset('theme_front/cards/mastercard.svg') }}" alt=""></div>
                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input id="card_number" type="text" placeholder="Card Number" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="full_name" type="text" placeholder="Full Name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="expire_date" type="month" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input id="cvc" type="text" placeholder="CVC" class="form-control">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- ends: .method-1 -->
                            <div class="method-2">
                                    <div class="header">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="payment_via_credits" name="customRadio1" class="custom-control-input">
                                            <label class="custom-control-label" for="payment_via_credits">Pay with your own credits</label>
                                        </div>
                                    </div>
                                </div><!-- ends: .method-2 -->
                            <div class="action-btns d-flex m-top-60">
                                <a href="javascript::void(0)" id="payment_back" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back</a>
                                <a href="javascript::void(0)" id="payment_continue" class="btn btn-primary ml-auto btn-icon icon-right">Continue <i class="la la-angle-double-right"></i></a>
                            </div>
                        </div><!-- end ./tab-pane -->
                        <div class="tab-pane fade" id="tab6_content4" role="tabpanel" aria-labelledby="tab6_nav4">
                            <h4>Review Your Order</h4>
                            <div class="cart-table cart-table--2 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span>{{ __('global.productName') }}</span></th>
                                            @if($product->type == '1')
                                            <th scope="col"><span>{{ __('global.sn') }}</span></th>
                                            @else
                                            <th scope="col"><span>{{ __('global.license') }}</span></th>
                                            @endif
                                            <th scope="col" colspan="3"><span>{{ __('global.price') }}</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart-single">
                                            <th scope="row">
                                                <div class="name">
                                                    @if($product->hasMedia('product_image'))
                                                    <div style="width: 165px; height: 120px;">
                                                        <img class="img-fluid img-responsive" src="{{ $product->getMedia('product_image')->first()->getUrl() }}" alt="">
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('theme_front/img/thumb1.jpg') }}" alt="">
                                                    @endif
                                                    <a href="{{ route('shop') }}">{{ $product->name }}</a>
                                                </div>
                                            </th>
                                            @if($product->type == '1')
                                            <td>
                                                <div class="quantity">
                                                    <div class="total-item">
                                                        <input id="snplain" type="text" value="" style="width: 15rem; text-align: left; padding-right: 0.5rem; padding-left: 0.5rem;" placeholder="SN">
                                                    </div>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div class="quantity">
                                                    <div class="total-item">
                                                        {{ $product->period }} {{ __('global.months') }}
                                                    </div>
                                                </div>
                                            </td>
                                            @endif
                                            <td>
                                                <div class="subtotal">
                                                    <span>${{ $product->price }}</span>
                                                </div>
                                            </td>
                                        </tr><!-- ends: .cart-single -->
                                        <!-- <tr class="cart-bottom">
                                            <td colspan="3">
                                                <div class="total-amount">
                                                    Tax: <span>$7.00</span>
                                                </div>
                                            </td>
                                            <td colspan="1">
                                                <div class="total-amount text-right">
                                                    Total: <span>$557.00</span>
                                                </div>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table><!-- ends: .table -->
                            </div><!-- ends: .table-responsive -->
                            <div class="m-top-40">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <div class="cardify order-info" id="quick_info">
                                            <h6>Quick Info</h6>
                                            <ul>
                                                <li><span>Client:</span> <span id="buyer_name"></span></li>
                                                <li><span>Billing Address:</span> <span id="buyer_address"></span></li>
                                                <li><span>Payment Method</span> <span id="buyer_cardNumber"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- ends: .cart-table -->
                            <div class="action-btns d-flex m-top-60">
                                <a href="" onclick="return false;" id="confirm_back" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back</a>
                                <a href="" onclick="return false;" id="confirm_order" class="btn btn-primary ml-auto">Confirm Order</a>
                            </div>
                        </div><!-- end ./tab-pane -->
                    </div>
                </div>
            </div>
        </div>
        <!--end ./container -->
    </div>
    <!--end ./tab -->
</section><!-- ends: .checkout-wrapper -->
@if(Auth::check())
<input id="buyerId" type="hidden" value="{{ Auth::user()->id }}"/>
@else
<input id="buyerId" type="hidden" value=""/>
@endif

<input id="price" type="hidden" value="{{ $product->price }}"/>
<input id="product_id" type="hidden" value="{{ $product->id }}"/>
<input id="product_name" type="hidden" value="{{ $product->name }}"/>
@csrf
@endsection

@push('script')
<script type="module">
    import { CountrySelector, CreatePayment, SelectPaymentMethod } from '{{ asset("theme_front/custom/js/checkout.js") }}';
    jQuery(document).ready(function() {
        CountrySelector();
        SelectPaymentMethod();
        var type = '{{ $product->type }}';
        CreatePayment(type);
    });
</script>
@endpush