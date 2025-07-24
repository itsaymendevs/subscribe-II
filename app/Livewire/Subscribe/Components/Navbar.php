<?php

namespace App\Livewire\Subscribe\Components;

use App\Livewire\Forms\SubscriptionForm;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Navbar extends Component
{


    public SubscriptionForm $instance;



    public function mount()
    {


        if (session('logged-customer')) {

            $this->instance = session('logged-customer');
            $this->customerEmail = 'valid';
            Session::flash('hide-login', $this->instance->firstName);

        } // end if


    } // end function







    // --------------------------------------------------------------------





    public function render()
    {
        return view('livewire.subscribe.components.navbar');

    } // end function


} // end class
