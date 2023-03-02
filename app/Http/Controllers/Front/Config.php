<?php

namespace App\Http\Controllers\Front;

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('sandbox-n6JrmCyP1bn1jqPawNRuyE95ELcftCeq');
        $options->setSecretKey('sandbox-BTuGf335Iv6eddD6Yfl61pnFvhzIqQCL');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }

    public static function errors()
    {
        return [
            '0' => "Invalid 3D Secure signature or verification",
            '2' => "Card holder or Issuer not registered to 3D Secure network",
            '3' => "Issuer is not registered to 3D secure network",
            '4' => "Verification is not possible, card holder chosen to register later on system",
            '5' => "Verification is not possbile",
            '6' => "3D Secure error",
            '7' => "System error",
            '8' => "Unknown card"
        ];
    }
}