<?php
namespace App\Helpers;

class AppHelper
{
    public function percentage($price, $discount)
    {
        $percentage = round((float)($discount/$price*100 - 100));
        return $percentage.'%';
    }

    public static function instance()
    {
        return new AppHelper();
    }
}