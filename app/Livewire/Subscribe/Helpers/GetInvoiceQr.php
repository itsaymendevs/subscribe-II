<?php

namespace App\Livewire\Subscribe\Helpers;

use App\Models\CustomerSubscription;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class GetInvoiceQr extends Component
{



    public function mount($id)
    {



        // :: forgetAll
        Session::forget('reToken');
        Session::forget('customer');
        Session::forget('pre-customer');
        Session::forget('logged-customer');




        // 1: checkSubscription
        $subscription = CustomerSubscription::find($id);


        if ($subscription) {

            Session::put('invoiceId', $id);
            $this->redirect(url: route('subscribe.invoiceQR'), navigate: false);

        } else {

            $this->redirect(url: route('subscribe.customization'), navigate: false);

        } // end if

    } // end function




    // -----------------------------------------------------------------




    public function render()
    {

        return view('livewire.subscribe.helpers.get-invoice-qr');

    } // end function


} // end class
