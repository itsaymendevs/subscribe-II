<?php

namespace App\Livewire\Subscribe;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\CustomerSubscription;
use App\Models\CustomerSubscriptionSetting;
use App\Models\Lead;
use App\Models\PaymentMethod;
use App\Models\Profile;
use App\Models\SubscribeSection;
use App\Traits\HelperTrait;
use App\Traits\MailTrait;
use App\Traits\PaymenntLocalTrait;
use App\Traits\PaymenntTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Livewire\Component;
use stdClass;

class Invoice extends Component
{




    use HelperTrait;
    use PaymenntTrait;
    use PaymenntLocalTrait;
    use MailTrait;

    // :: variables
    public SubscriptionForm $instance;

    public $customer, $subscription;
    public $invoice, $profile;







    public function mount(Request $request)
    {




        // :: getRequest - removeSessions
        $isPaymentDone = false;
        $request = json_decode(json_encode($request->all()));
        Session::forget('customer');
        Session::forget('pre-customer');



        if ($request || $request?->checkout == 'local') {



            // 1: determinePayment
            $this->profile = Profile::first();
            $paymentMethod = CustomerSubscriptionSetting::first()->paymentMethodId;
            $paymentMethod = PaymentMethod::find($paymentMethod);



            // 1.1.1: Paymennt Or Stripe
            if ($paymentMethod->name == 'Paymennt') {



                if (env('APP_PAYMENT') && env('APP_PAYMENT') == 'local') {

                    $isPaymentDone = $this->checkLocalCheckoutPaymennt();

                } else {

                    $isPaymentDone = $this->checkCheckoutPaymennt($request?->checkout);

                } // end if




            } elseif ($paymentMethod->name == 'Stripe') {



                if (env('APP_PAYMENT') && env('APP_PAYMENT') == 'local') {

                    $isPaymentDone = $this->checkLocalCheckoutPaymennt();

                } else {

                    $isPaymentDone = true;

                } // end if


            } // end if






            // 1.2: notPaid
            if (! $isPaymentDone) {

                return $this->redirect(route('subscribe.customization'));

            } // end if







            // ------------------------------------------------
            // ------------------------------------------------
            // ------------------------------------------------
            // ------------------------------------------------
            // ------------------------------------------------
            // ------------------------------------------------







            // 2: getLead

            // 2.1.1: Paymennt Or Stripe
            if ($paymentMethod->name == 'Paymennt') {



                if (env('APP_PAYMENT') && env('APP_PAYMENT') == 'local') {

                    $lead = Lead::where('paymentReference', 'local')?->latest('id')?->first() ?? null;

                } else {

                    $lead = Lead::where('paymentReference', $request?->checkout)?->latest('id')?->first() ?? null;

                } // end if



            } elseif ($paymentMethod->name == 'Stripe') {



                if (env('APP_PAYMENT') && env('APP_PAYMENT') == 'local') {

                    $lead = Lead::where('paymentReference', 'local')?->latest('id')?->first() ?? null;

                } else {

                    $lead = Lead::where('paymentReference', $request?->payment_intent_client_secret)?->latest('id')?->first() ?? null;

                } // end if



            } // end if








            // --------------------------------------------------------------------
            // --------------------------------------------------------------------
            // --------------------------------------------------------------------
            // --------------------------------------------------------------------
            // --------------------------------------------------------------------







            // 2.1: isFound
            if ($lead) {





                // 2.2: isPending
                if (! $lead->isPaymentDone) {



                    // 2.3: create instance
                    $instance = new stdClass();
                    $instance->id = $lead->id;



                    // 2.4: updatePayment / restructure
                    $response = $this->makeRequest('subscription/lead/convert', $instance);
                    $lead = $response->lead;



                    if (empty($lead)) {

                        return $this->redirect(route('subscribe.customization'));

                    } // end if








                    // ------------------------------------------
                    // ------------------------------------------








                    // 2.5: regular - existing
                    if (! $lead->isExistingCustomer) {

                        $response = $this->makeRequest('subscription/customer/store', $lead);

                    } else {


                        $lead->deliveryDays = null;


                        $response = $this->makeRequest('subscription/customer/existing/store', $lead);


                    } // end if










                    // ------------------------------------------
                    // ------------------------------------------









                    // 2.6: sendMail
                    $subscription = CustomerSubscription::where('paymentReference', $lead->paymentReference)->latest('id')->first();




                } // end if - isPending









                // 3: notFound
            } else {


                return $this->redirect(route('subscribe.customization'));


            } // end if










            // ------------------------------------------
            // ------------------------------------------








            // 3: dependencies
            if ($lead->paymentReference == 'local') {


                $this->subscription = CustomerSubscription::where('paymentURL', $lead->paymentReference)->latest('id')->first();

            } else {

                $this->subscription = CustomerSubscription::where('paymentURL', $lead->paymentReference)->latest('id')->first();

            } // end if


            $this->customer = $this->subscription->customer;







            // ------------------------------------------
            // ------------------------------------------



            // 4: sendEmails
            if ($this->customer && $this->subscription) {


                // 4.1: accountEmail
                $this->sendAccountMail($this->customer->id, $this->customer->fullEmail());


                // 4.2: invoiceEmail
                $this->sendInvoiceMail($this->subscription->id, $this->customer->fullEmail());



            } // end if






        } else {

            return redirect()->route('subscribe.customization');

        } // end if


    } // end function









    // --------------------------------------------------------------------









    public function render()
    {

        return view('livewire.subscribe.invoice');

    } // end function







} // end class
