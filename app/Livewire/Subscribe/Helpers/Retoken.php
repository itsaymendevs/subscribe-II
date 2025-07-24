<?php

namespace App\Livewire\Subscribe\Helpers;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Retoken extends Component
{


    public function mount($token = null)
    {


        // 1: checkReToken
        $customer = Customer::where('reToken', $token)?->latest()?->first() ?? null;


        if ($customer) {

            Session::put('reTokenOnce', true);
            Session::flash('reToken', $token);

            $this->redirect(route('subscribe.customization'), navigate: false);

        } else {

            $this->redirect(route('subscribe.customization'), navigate: false);

        } // end if


    } // end function






    // ----------------------------------------------------------------





    public function render()
    {
        return view('livewire.subscribe.helpers.retoken');
    }
}
