<?php

namespace App\Traits;

use App\Models\City;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use stdClass;


trait ADCBTrait
{


    use HelperTrait;




    protected function makeCheckoutADCB($instance, $paymentMethod)
    {



        // 1: dependencies
        $random = date('dmhis');
        $orderNumber = Order::count() + 1;
        $city = City::find($instance->cityId);





        // 1.2: makeHash
        $orderDateTime = date("Y:m:d-H:i:s");
        $hashed = $this->makeHash($instance->totalCheckoutPrice ?? 0, $orderDateTime);




        // Generate secure hash
        $paymentUrl = env('ADCB_PAYMENT_URL')."?".$query;







        return redirect()->away($paymentUrl);

        // 2.3: paymentSecret - Token
        // $this->paymentSecret = $paymentIntent->client_secret;
        // $this->order->paymentToken = $paymentIntent->client_secret;



        // 2.4: updateSession
        // Session::put('instance', $this->order);






    } // end function














    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------







    private function makeHash($totalPrice, $orderDateTime)
    {


        // 1: dependencies
        $currency = "AED";
        $sharedSecret = env('ADCB_SECRET_KEY');
        $separator = "|";
        $storeId = env('ADCB_STORE_ID');
        $timezone = "Asia/Dubai";
        $txnType = "sale";
        $checkoutOption = "combinedpage";





        // --------------------------------------------------------
        // --------------------------------------------------------




        // 1.2: combine
        $stringToHash = $totalPrice.$separator.$checkoutOption.$separator.$currency.
            $separator."HMACSHA256".$separator.$storeId.$separator.$timezone.$separator.
            $orderDateTime.$separator.$txnType;




        // 1.3: hash
        return $hash = base64_encode(hash_hmac('sha256', $stringToHash, $sharedSecret, true));



    } // end if





} // end trait

