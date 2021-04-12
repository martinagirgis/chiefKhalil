<?php
namespace App;
class SendCode
{
    public static function sendCode($countryCode,$phone){
        $code = rand(1111,9999);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to'=>'+' . (string)$countryCode .(int) $phone,
            'from' =>'Chief Khalil',
            'text' => 'Chief Khalil veify code: '.$code,
        ]);
        return $code;
    }
}