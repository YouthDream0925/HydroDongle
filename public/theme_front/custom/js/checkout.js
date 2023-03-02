import toast from './toast.js';

let error_in_billing = true;
let error_in_card = true;

let name = "";
let surname = "";
let email = "";
let phoneNumber = "";
let country = "";
let identityNumber = "";
let city = "";
let zipCode = "";
let address = "";

let cardNumber = "";
let fullName = "";
let expireDate = "";
let expireYear = "";
let expireMonth = "";
let cvc = "";

let snplain = "";

const CountrySelector = () => {
    $('#country_selector').on('change', function() {
        country = $(this).find(":selected").attr('data-countryName') + "";
        if(country == "Turkey") {
            var tmp = 'TCKN <span id="validator" class="text-uppercase text-danger"></span>'
            $('#identify_number').html(tmp);
            $('#tc').val('');
        } else {
            var tmp = 'Passport Number <span class="text-uppercase text-danger"></span>'
            $('#identify_number').html(tmp);
        }
    });
};

const InputTcNum = () => {
    $('#tc').on('keyup focus blur load', function(event) {
        event.preventDefault();
        var isValid = false;
        if(country == "Turkey") {
            isValid = CheckTcNum($(this).val());
        } else {
            return;
        }
        console.log('isValid ' , isValid);
        if (isValid) {
            $('#validator').html("TRUE");
            $('#validator').removeClass('text-danger');
            $('#validator').addClass('text-success');
        }
        else {
            $('#validator').html("Invalid Input");
            $('#validator').addClass('text-danger');
            $('#validator').removeClass('text-success');
        }
    });
};

const CheckTcNum = (value) => {
    value = value.toString();
    var isEleven = /^[0-9]{11}$/.test(value);
    var totalX = 0;
    for (var i = 0; i < 10; i++) {
        totalX += Number(value.substr(i, 1));
    }
    var isRuleX = totalX % 10 == value.substr(10,1);
    var totalY1 = 0;
    var totalY2 = 0;
    for (var i = 0; i < 10; i+=2) {
        totalY1 += Number(value.substr(i, 1));
    }
    for (var i = 1; i < 10; i+=2) {
        totalY2 += Number(value.substr(i, 1));
    }
    var isRuleY = ((totalY1 * 7) - totalY2) % 10 == value.substr(9,0);
    return isEleven && isRuleX && isRuleY;
};

const GetBillingData = () => {
    name = $('#fname').val();
    surname = $('#lname').val();
    email = $('#eaddress').val();
    phoneNumber = $('#kochu').val();
    country = $('#country_selector').find(":selected").attr('data-countryName') + "";
    identityNumber = $('#tc').val();
    city = $('#city').val();
    zipCode = $('#zip').val();
    address = $('#add1').val();
};

const GetCardData = () => {
    cardNumber = $('#card_number').val();
    fullName = $('#full_name').val();
    expireDate = $('#expire_date').val();
    expireYear = expireDate.split('-')[0];
    expireMonth = expireDate.split('-')[1];
    cvc = $('#cvc').val();
};

const CreatePayment = () => {
    $('#billing_continue').on('click', function() {
        GetBillingData();
        if(name != "" && surname != "" && email != "" && phoneNumber != "" && country != "undefined" && identityNumber != "" && city != "" && zipCode != "" && address != "") {
            error_in_billing = false;
            $('#tab6_nav3').trigger('click');
        } else {
            toast('error', 'Please input all fields.');
        }
    });

    $('#payment_continue').on('click', function() {
        GetCardData();
        if(cardNumber != "" && fullName != "" && expireDate != "" && expireYear != "" && expireMonth != "" && cvc != "") {
            error_in_card = false;
            $('#tab6_nav4').trigger('click');
        } else {
            toast('error', 'Please input all fields.');
        }
    });

    $('#tab6_nav4').on('click', function() {
        if(name != "" && surname != "" && address != "" && cardNumber != "") {
            $('#buyer_name').html(name + " " + surname);
            $('#buyer_address').html(address);
            $('#buyer_cardNumber').html("Credit card: " + cardNumber);
        } else {
            toast('error', 'Please confirm all Info.');
        }
    });

    $('#confirm_back').on('click', function() {
        $('#tab6_nav3').trigger('click');
    });

    $('#payment_back').on('click', function() {
        $('#tab6_nav1').trigger('click');
    });

    $('#confirm_order').on('click', function() {
        if(error_in_billing == false && error_in_card == false) {
            snplain = $('#snplain').val();
            $.ajax({
                type: 'post',
                url: '/payment',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'buyerId': $('#buyerId').val(),
                    'price': $('#price').val(),
                    'paidPrice': $('#price').val(),
                    'productId': $('#product_id').val(),
                    'productName': $('#product_name').val(),
                    'cardHolderName': fullName,
                    'cardNumber': cardNumber,
                    'expireMonth': expireMonth,
                    'expireYear': expireYear,
                    'cvc': cvc,
                    'name': name,
                    'surname': surname,
                    'phoneNumber': phoneNumber,
                    'email': email,
                    'identityNumber': identityNumber,
                    'address': address,
                    'city': city,
                    'country': country,
                    'zipCode': zipCode,
                },
                beforeSend() {
                    $('#preloader').show();
                },
                success: function(res) {
                    $('#preloader').hide();

                    if(res['status'] == 'success') {
                        $('#main_container').html(res['data']);
                    } else if(res['status'] == 'failure') {
                        toast('error', res['msg']);
                    } else if(res['status'] == null) {
                        toast('error', 'Unexpected error occured.');
                    } else {
                        toast('error', 'Unexpected error occured.');
                    }
                },
                error: function() {
                    $('#preloader').hide();
                    toast('error', 'Unexpected error occured.');
                }
            });
        } else {
            toast('error', 'Please confirm all Info.');
        }
    });
};

export { CountrySelector, InputTcNum, CreatePayment };