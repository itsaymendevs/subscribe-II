<?php

namespace App\Traits;

use App\Models\City;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Lead;
use App\Models\Plan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use stdClass;


trait PaymenntLocalTrait
{


    use HelperTrait;




    protected function makeLocalCheckoutPaymennt($instance, $payment, $paymentMethod)
    {



        // :: dependencies
        $random = date('dmhis');


        $city = City::find($instance->cityId);
        $plan = Plan::find($instance->planId);
        $lead = Lead::where('email', $instance->email)->latest('id')->first();






        // 1.2: updateURL - Reference
        $lead->paymentReference = 'local';
        $lead->paymentURL = 'local';

        $lead->save();





        // 1.3: removeSessions - disableSubmitButton
        Session::forget('customer');
        Session::forget('pre-customer');
        $this->dispatch('processing');




        return redirect()->route('subscribe.invoice', ['checkout' => 'local']);



    } // end function











    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------












    protected function checkLocalCheckoutPaymennt()
    {


        // 1: isPaid
        return true;


    } // end if








} // end trait

