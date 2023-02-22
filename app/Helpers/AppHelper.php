<?php
namespace App\Helpers;
use Illuminate\Support\Str;

class AppHelper
{
    public function percentage($price, $discount)
    {
        $percentage = round((float)($discount/$price*100 - 100));
        return $percentage.'%';
    }

    public function short_string($str, $length)
    {
        $new_str = Str::of($str)->limit($length);
        return $new_str;
    }

    public static function instance()
    {
        return new AppHelper();
    }
}