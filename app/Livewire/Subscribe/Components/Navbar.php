<?php

namespace App\Livewire\Subscribe\Components;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\Profile;
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





    public function loginToPortal()
    {


        // 1: getProfile
        $profile = Profile::first();

        return $this->redirect($profile->applicationURL, navigate: false);


    } // end function








    // --------------------------------------------------------------------





    public function render()
    {
        return view('livewire.subscribe.components.navbar');

    } // end function


} // end class
