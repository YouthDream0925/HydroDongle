<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Editer\Product;
use App\Models\Admin\Editer\Country;
use App\Models\Admin\History\PaymentHistory;
use App\Models\Admin\History\LicenseHistory;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $produts = Product::where('activate', '1')->orderBy('updated_at', 'desc')->get();
        return view('front.shop.index', compact('produts'));
    }

    public function checkout($id)
    {
        $product = Product::find($id);
        $countries = Country::select('id', 'country')->get();
        return view('front.shop.checkout', compact('product', 'countries'));
    }

    public function create_payment(Request $data)
    {
        $code = $this->UniqueRandomNumbersWithinRange(0, 100, 10);
        $check_buyer = User::find($data->buyerId);
        if($check_buyer != null) {
            $request = new \Iyzipay\Request\CreatePaymentRequest();
            $request->setLocale(\Iyzipay\Model\Locale::EN);
            $request->setConversationId($code);
            $request->setPrice($data->price);
            $request->setPaidPrice($data->price);
            $request->setCurrency(\Iyzipay\Model\Currency::TL);
            $request->setInstallment(1);
            $request->setBasketId($data->productId);
            $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
            $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
            $request->setCallbackUrl("http://hydradongle-local.com/callback");
            $paymentCard = new \Iyzipay\Model\PaymentCard();
            $paymentCard->setCardHolderName($data->cardHolderName);
            $paymentCard->setCardNumber($data->cardNumber);
            $paymentCard->setExpireMonth($data->expireMonth);
            $paymentCard->setExpireYear($data->expireYear);
            $paymentCard->setCvc($data->cvc);
            $paymentCard->setRegisterCard(0);
            $request->setPaymentCard($paymentCard);
            $buyer = new \Iyzipay\Model\Buyer();
            $buyer->setId($check_buyer->id);
            $buyer->setName($data->name);
            $buyer->setSurname($data->surname);
            $buyer->setGsmNumber($data->phoneNumber);
            $buyer->setEmail($data->email);
            $buyer->setIdentityNumber($data->identityNumber);
            $buyer->setRegistrationAddress($data->address);
            $buyer->setIp("157.90.163.48");
            $buyer->setCity($data->city);
            $buyer->setCountry($data->country);
            $buyer->setZipCode($data->zipCode);
            $request->setBuyer($buyer);
            $billingAddress = new \Iyzipay\Model\Address();
            $billingAddress->setContactName($data->cardHolderName);
            $billingAddress->setCity($data->city);
            $billingAddress->setCountry($data->country);
            $billingAddress->setAddress($data->address);
            $billingAddress->setZipCode($data->zipCode);
            $request->setBillingAddress($billingAddress);
            $basketItems = array();
            $firstBasketItem = new \Iyzipay\Model\BasketItem();
            $firstBasketItem->setId($data->productId);
            $firstBasketItem->setName($data->productName);
            $firstBasketItem->setCategory1("License");
            $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            $firstBasketItem->setPrice($data->price);
            $basketItems[0] = $firstBasketItem;
            $request->setBasketItems($basketItems);

            $threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($request, Config::options());

            if($data->snplain != null) {
                $description = 'You bought a Hydra Pro Package Activation.';
                $check_buyer->snplain = $data->snplain;
                $check_buyer->update();
            } else {
                $description = 'You bought a Hydra License.';
            }

            PaymentHistory::create([
                'code' => $code,
                'customer_id' => $check_buyer->id,
                'customer_surname' => $data->surname,
                'customer_phone' => $data->phoneNumber,
                'customer_email' => $data->email,
                'customer_identity' => $data->identityNumber,
                'customer_city' => $data->city,
                'customer_country' => $data->country,
                'contact_name' => $data->cardHolderName,
                'address' => $data->address,
                'zip_code' => $data->zipCode,
                'product_id' => $data->productId,
                'products' => $data->productName,
                'total_price' => $data->price,
                'currency' => 'TRY',
                'locale' => 'EN',
                'description' => $description,
                'msg' => 'pending',
                'payment_group' => 'PRODUCT',
                'payment_channel' => 'WEB',
                'status' => '0',
            ]);

            return [
                'status' => $threedsInitialize->getStatus(),
                'data' => $threedsInitialize->gethtmlContent(),
                'msg' => $threedsInitialize->getErrorMessage()
            ];
        } else {
            return [
                'status' => 'failure',
                'data' => null,
                'msg' => "Can't find this buyper."
            ];
        }
    }

    public function callback(Request $request)
    {
        $status = $request->status;
        $errors = Config::errors();
        $conversationId = $request->conversationId;
        $payment_history = PaymentHistory::where('code', $conversationId)->first();
        $user = User::find($payment_history->customer_id);
        if($status == 'success') {            
            $payment_history->status = '1';
            $payment_history->msg = 'success';
            $payment_history->save();

            $product = Product::find($payment_history->product_id);
            if($product->type == '0') {
                $user->isactivated = '1';
                $user->datetimeactivated = Carbon::now();
                $user->datetimeexpired = Carbon::now()->addMonth($product->period);
                $user->update();
            } else if($product->type == '1') {
                $user->ProPack = '1';
                $user->update();
            }

            LicenseHistory::create([
                'user_id' => $user->id,
                'licence_id' => $payment_history->id,
                'history_date' => Carbon::now()
            ]);
        } else if($status == 'failure') {
            $payment_history->status = '0';
            $payment_history->msg = $errors[$request->mdStatus];
            $payment_history->save();
        } else {
            $payment_history->status = '0';
            $payment_history->msg = $errors[$request->mdStatus];
            $payment_history->save();
        }

        return redirect()->route('shop.history', $user->id);
    }

    public function history($id)
    {
        $user = User::find($id);
        $histories = PaymentHistory::where('customer_id', $id)->orderBy('updated_at', 'desc')->get();
        return view('front.shop.history', compact('histories'));
    }

    public function randomConversationId($length = 10) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
        $numbers = range($min, $max);
        shuffle($numbers);
        return implode(array_slice($numbers, 0, $quantity));
    }
}
