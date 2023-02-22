@extends('layouts.front.index')

@push('css')
@endpush

@section('content')
<section class="breadcrumb_area breadcrumb1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb_wrapper d-flex align-items-center justify-content-between flex-wrap">
                    <h4 class="page_title">Checkout</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- ends: .row -->
    </div>
</section><!-- ends: .breadcrumb_area -->
<section class="checkout-wrapper p-top-90 p-bottom-110">
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
                                <a class="nav-link" id="tab6_nav2" data-toggle="tab" href="#tab6_content2" role="tab" aria-controls="tab6_content2" aria-selected="false">2. Shipping</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab6_nav3" data-toggle="tab" href="#tab6_content3" role="tab" aria-controls="tab6_content3" aria-selected="false">3. Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab6_nav4" data-toggle="tab" href="#tab6_content4" role="tab" aria-controls="tab6_content4" aria-selected="false">4. Order Review</a>
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
                                            <label for="tuihagol">Company</label>
                                            <input type="text" class="form-control" id="tuihagol">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="countr">Country</label>
                                            <div class="form-group">
                                                <div class="select-basic">
                                                    <select class="form-control" id="countr">
                                                        <option>Select Country</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
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
                                                    <div class="select-basic">
                                                        <select class="form-control" id="city">
                                                            <option>Select City</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                            <option>Option 4</option>
                                                        </select>
                                                    </div>
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
                                            <label for="add1">Address 1</label>
                                            <input type="text" class="form-control" id="add1">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="add2">Address 2</label>
                                            <input type="text" class="form-control" id="add2">
                                        </div>
                                    </div><!-- ends: .col-md-6 -->
                                </div>
                                <div class="shipping-method m-top-55">
                                    <h4>Shipping Address</h4>
                                    <div class="custom-control custom-checkbox checkbox-secondary">
                                        <input type="checkbox" class="custom-control-input" id="customCheck111" checked="">
                                        <label class="custom-control-label" for="customCheck111">Same as billing address</label>
                                    </div>
                                </div>
                                <div class="action-btns d-flex m-top-60">
                                    <a href="" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back to cart</a>
                                    <a href="" class="btn btn-primary ml-auto btn-icon icon-right">Continue <i class="la la-angle-double-right"></i></a>
                                </div>
                            </form>
                        </div><!-- end ./tab-pane -->
                        <div class="tab-pane fade" id="tab6_content2" role="tabpanel" aria-labelledby="tab6_nav2">
                            <h4>Choose Shipping Method</h4>
                            <div class="table-responsive">
                                <table class="table table-two">
                                    <thead class="table-gray">
                                        <tr>
                                            <th scope="col">Shipping Method</th>
                                            <th scope="col">Delivery Time</th>
                                            <th scope="col">Handling Fee</th>
                                        </tr>
                                    </thead><!-- ends: thead -->
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="select-one" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="select-one"><span>Fedex Courier</span></label>
                                                </div><!-- End: .custom-control -->
                                            </th>
                                            <td>2 - 4 days</td>
                                            <td>$20</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="select-two" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="select-two"><span>International Shipping</span></label>
                                                </div><!-- End: .custom-control -->
                                            </th>
                                            <td>1 - 3 days</td>
                                            <td>$25</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="select-three" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="select-three"><span>Local Pickup from Store</span></label>
                                                </div><!-- End: .custom-control -->
                                            </th>
                                            <td>1 -2 days</td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="select-four" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="select-four"><span>Local Shipping</span></label>
                                                </div><!-- End: .custom-control -->
                                            </th>
                                            <td>Up to One Week</td>
                                            <td>$10</td>
                                        </tr>
                                    </tbody><!-- ends: tbody -->
                                </table>
                            </div><!-- ends: .table-responsive -->
                            <div class="action-btns d-flex m-top-60">
                                <a href="" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back</a>
                                <a href="" class="btn btn-primary ml-auto btn-icon icon-right">Continue <i class="la la-angle-double-right"></i></a>
                            </div>
                        </div><!-- end ./tab-pane -->
                        <div class="tab-pane fade" id="tab6_content3" role="tabpanel" aria-labelledby="tab6_nav3">
                            <h4>Choose Payment Method</h4>
                            <div class="method-1">
                                <div class="header">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio3">Pay With Credit Card</label>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="d-flex align-items-center flex-wrap">We accept following credit cards: <img src="img/cards.png" alt=""></p>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Card Number" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Full Name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="MM/YY" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="CVC" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <a href="" class="btn btn-outline-secondary">Submit Now</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- ends: .method-1 -->
                            <div class="method-1">
                                <div class="header">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio4">Pay With Paypal</label>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="d-flex align-items-center">All transactions are secure & encrypted <img src="img/paypal.png" alt=""></p>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="email" placeholder="Email" class="form-control">
                                            </div>
                                            <div class="col-lg-12">
                                                <a href="" class="btn btn-outline-secondary">Submit Now</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- ends: .method-1 -->
                            <div class="method-2">
                                <div class="header">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio5">Direct Bank Transfer</label>
                                    </div>
                                </div>
                            </div><!-- ends: .method-2 -->
                            <div class="method-2">
                                <div class="header">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio6">Cash On Delivery</label>
                                    </div>
                                </div>
                            </div><!-- ends: .method-2 -->
                            <div class="action-btns d-flex m-top-60">
                                <a href="" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back</a>
                                <a href="" class="btn btn-primary ml-auto btn-icon icon-right">Continue <i class="la la-angle-double-right"></i></a>
                            </div>
                        </div><!-- end ./tab-pane -->
                        <div class="tab-pane fade" id="tab6_content4" role="tabpanel" aria-labelledby="tab6_nav4">
                            <h4>Review Your Order</h4>
                            <div class="cart-table cart-table--2 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span>Product Name</span></th>
                                            <th scope="col"><span>Quantity</span></th>
                                            <th scope="col" colspan="3"><span>Subtotal</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart-single">
                                            <th scope="row">
                                                <div class="name">
                                                    <img src="img/thumb1.jpg" alt="">
                                                    <a href="">Business Marketing Presentation</a>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="quantity text-right">
                                                    <div class="total-item">
                                                        <span class="minus">-</span>
                                                        <input type="number" value="1" class="numberInput">
                                                        <span class="plus">+</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="subtotal">
                                                    <span>$250.00</span>
                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div><a href="" class="btn btn-sm btn--rounded btn-outline-secondary">Edit</a></div>
                                            </td>
                                        </tr><!-- ends: .cart-single -->
                                        <tr class="cart-single">
                                            <th scope="row">
                                                <div class="name">
                                                    <img src="img/thumb2.jpg" alt="">
                                                    <a href="">Social Media Strategies Marketing</a>
                                                </div>
                                            </th>
                                            <td>
                                                <div class="quantity text-right">
                                                    <div class="total-item">
                                                        <span class="minus">-</span>
                                                        <input type="number" value="1" class="numberInput">
                                                        <span class="plus">+</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="subtotal">
                                                    <span>$250.00</span>
                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div><a href="" class="btn btn-sm btn--rounded btn-outline-secondary">Edit</a></div>
                                            </td>
                                        </tr><!-- ends: cart-single -->
                                        <tr class="cart-bottom">
                                            <td colspan="1">
                                                <div class="total-amount">
                                                    Shipping: <span>$50.00</span>
                                                </div>
                                            </td>
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
                                        </tr>
                                    </tbody>
                                </table><!-- ends: .table -->
                            </div><!-- ends: .table-responsive -->
                            <div class="m-top-40">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="cardify order-info">
                                            <h6>Quick Info</h6>
                                            <ul>
                                                <li><span>Client:</span> <span>Steve Rogers</span></li>
                                                <li><span>Shipping Address:</span> <span>202 Kutubkhali, Donia, Jatrabari Dhaka 1236, Bangladesh</span></li>
                                                <li><span>Shipping Method:</span> <span>International Shipping · $20.00</span></li>
                                                <li><span>Payment Method</span> <span>Credit card: **** **** **** 5678</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- ends: .cart-table -->
                            <div class="action-btns d-flex m-top-60">
                                <a href="" class="btn btn-outline-secondary btn-icon icon-left"><i class="la la-angle-double-left"></i> Back</a>
                                <a href="" class="btn btn-primary ml-auto">Confirm Order</a>
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
@endsection

@push('script')
@endpush