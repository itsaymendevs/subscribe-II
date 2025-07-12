<?php

namespace App\Livewire\Subscribe\Customization\Components;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CustomizationLogout extends Component
{





    public function logout()
    {


        Session::forget('logged-customer');
        Session::forget('reToken');

        return $this->redirect(route('subscribe.customization'), navigate: false);


    } // end function






    // -------------------------------------------------------------





    public function render()
    {

        return view('livewire.subscribe.customization.components.customization-logout');

    } // end function


} // end class
