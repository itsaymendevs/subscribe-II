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

class InvoiceQr extends Component
{




    use HelperTrait;
    use PaymenntTrait;
    use PaymenntLocalTrait;
    use MailTrait;

    // :: variables
    public SubscriptionForm $instance;

    public $subscription, $customer, $profile;







    public function mount()
    {



        if (session('invoiceId')) {


            // 1: getProfile
            $this->profile = Profile::first();



            // 2: customer + subscription
            $this->subscription = CustomerSubscription::find(session('invoiceId'));
            $this->customer = $this->subscription?->customer;


        } else {

            return redirect()->route('subscribe.customization');

        } // end if


    } // end function









    // --------------------------------------------------------------------







    public function render()
    {

        return view('livewire.subscribe.invoice-qr');

    } // end function







} // end class
