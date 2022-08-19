<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VerificationOtp;

class OtpController extends Controller
{
    //
    public function genrateOtp($mobile_no) {

        // $mobile_no = $aadhaarData->mobile_no;

        // generate random otp
        $otp = rand(100000, 999999);

        $otpDetails = [
            'mobile_no' => $mobile_no,
            'otp' => $otp
        ];

        $store_otp = VerificationOtp::updateOrCreate(['mobile_no' => $mobile_no], $otpDetails);

        $basic  = new \Vonage\Client\Credentials\Basic(env("VONAGE_API_KEY"),env("VONAGE_SECRET_KEY"));
        $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("91$mobile_no", BRAND_NAME, "Your authentication code is $otp  ")
        // );
        
        // $message = $response->current();
        
        // if ($message->getStatus() == 0) {
        //     return  true;
        // } else {
        //     return false;
        // }

        return true;
    }
}
