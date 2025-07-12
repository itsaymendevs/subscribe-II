<?php

namespace App\Traits;

use App\Models\City;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Lead;
use App\Models\Plan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use stdClass;


trait PaymenntTrait
{


    use HelperTrait;




    protected function makeCheckoutPaymennt($instance, $payment, $paymentMethod)
    {



        // :: dependencies
        $random = date('dmhis');



        $city = City::find($instance->cityId);
        $plan = Plan::find($instance->planId);
        $lead = Lead::where('email', $instance->email)->latest('id')->first();






        // 1: URL
        $requestURL = $paymentMethod?->isLive ? "https://api.paymennt.com/mer/v2.0/checkout/web" : "https://api.test.paymennt.com/mer/v2.0/checkout/web";






        // 2: prepareBody
        $requestBody = new stdClass();





        // A: checkoutDetails






        // 2.1: general
        $requestBody->requestId = "CUS-".$random."-".$lead->id;
        $requestBody->orderId = "ORD-".$lead->id;
        $requestBody->currency = 'AED';
        $requestBody->amount = doubleval($instance->totalCheckoutPrice); // $instance->totalCheckoutPrice








        // 2.2: items
        $requestBody->items = [];

        $requestBody->items[0] = new stdClass();
        $requestBody->items[0]->name = $plan->name;
        $requestBody->items[0]->quantity = 1;
        $requestBody->items[0]->linetotal = doubleval($instance->totalCheckoutPrice); // $instance->totalCheckoutPrice










        // 2.3: customer
        $requestBody->customer = new stdClass();

        $requestBody->customer->id = $lead->id;
        $requestBody->customer->firstName = $instance->firstName;
        $requestBody->customer->lastName = $instance->lastName;
        $requestBody->customer->email = $instance->email.$instance->emailProvider;
        $requestBody->customer->phone = $instance->phoneKey.$instance->phone;








        // 2.4: billingAddress
        $requestBody->billingAddress = new stdClass();


        $requestBody->billingAddress->name = $instance->firstName.' '.$instance->lastName;
        $requestBody->billingAddress->address1 = $instance->locationAddress;
        $requestBody->billingAddress->city = $city->name;
        $requestBody->billingAddress->country = "AE";
        $requestBody->billingAddress->set = false;









        // 2.5: returnURL
        $requestBody->returnUrl = route('subscribe.invoice');









        // ----------------------------------------------
        // ----------------------------------------------






        // B: makeCheckout






        // 3: sendRequest
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Connection' => 'keep-alive',
            'X-Paymennt-Api-Key' => ($paymentMethod?->isLive ? $paymentMethod->envThirdKey : $paymentMethod->envTestThirdKey),
            'X-Paymennt-Api-Secret' => ($paymentMethod?->isLive ? $paymentMethod->envSecondKey : $paymentMethod->envTestSecondKey),
        ])->post($requestURL."", [
                    "requestId" => $requestBody->requestId,
                    "orderId" => $requestBody->orderId,
                    "currency" => $requestBody->currency,
                    "amount" => $requestBody->amount,
                    "customer" => array(
                        "id" => $lead->id,
                        "firstName" => $requestBody->customer->firstName,
                        "lastName" => $requestBody->customer->lastName,
                        "email" => $requestBody->customer->email,
                        "phone" => $requestBody->customer->phone,
                    ),
                    "billingAddress" => array(
                        "name" => $requestBody->billingAddress->name,
                        "address1" => $requestBody->billingAddress->address1,
                        "city" => $requestBody->billingAddress->city,
                        "country" => $requestBody->billingAddress->country,
                        "set" => $requestBody->billingAddress->set,
                    ),
                    "items" => array(
                        array(
                            "name" => $requestBody->items[0]->name,
                            "quantity" => $requestBody->items[0]->quantity,
                            "linetotal" => $requestBody->items[0]->linetotal
                        )
                    ),
                    "returnUrl" => $requestBody->returnUrl,
                    "allowedPaymentMethods" => array(
                        "CARD"
                    ),
                    "defaultPaymentMethod" => "CARD",
                    "language" => "EN"
                ])->json();








        // ----------------------------------------------
        // ----------------------------------------------




        // C: paymentURL - paymentReference
        $response = json_decode(json_encode($response));






        // 1: success
        if ($response->success == true) {




            // :: continue



            // 1.2: updateURL - Reference
            $lead->paymentReference = $response->result->id;
            $lead->paymentURL = $response->result->redirectUrl;

            $lead->save();




            // 1.3: removeSessions - disableSubmitButton
            Session::forget('customer');
            Session::forget('pre-customer');

            $this->dispatch('processing');






            return $this->redirect($lead->paymentURL);






        } else {




            // failed
            $this->redirect(route('subscribe.customization'));


        } // end if






    } // end function











    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------
    // ----------------------------------------------------------------












    protected function checkCheckoutPaymennt($checkoutId)
    {



        // 1: dependencies
        $paymentMethod = CustomerSubscriptionSetting::all()->first()?->paymentMethod ?? null;







        // 1.2: URL
        $requestURL = $paymentMethod?->isLive ? "https://api.paymennt.com/mer/v2.0/checkout/{$checkoutId}" : "https://api.test.paymennt.com/mer/v2.0/checkout/{$checkoutId}";






        // 1.3: makeRequest
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Connection' => 'keep-alive',
            'X-Paymennt-Api-Key' => ($paymentMethod?->isLive ? $paymentMethod->envThirdKey : $paymentMethod->envTestThirdKey),
            'X-Paymennt-Api-Secret' => ($paymentMethod?->isLive ? $paymentMethod->envSecondKey : $paymentMethod->envTestSecondKey),
        ])->get($requestURL)->json();










        // ----------------------------------------------
        // ----------------------------------------------








        // 2: getResponse
        $response = json_decode(json_encode($response));




        // 2.1: Paid
        if (! empty($response?->result?->status) && $response?->result?->status == 'PAID') {

            return true;

        } else {

            return false;

        } // end if





    } // end if








} // end trait

