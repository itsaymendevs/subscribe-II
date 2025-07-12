<?php

namespace App\Livewire\Subscribe\Customization\Components;

use App\Livewire\Forms\SubscriptionForm;
use App\Models\Allergy;
use App\Models\Exclude;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CustomizationExcludes extends Component
{


    // :: variables
    public SubscriptionForm $instance;
    public $allergyLists, $excludeLists;



    public function mount()
    {

        // 1: dependencies
        $this->allergyLists = Allergy::all();
        $this->excludeLists = Exclude::all();


    } // end function





    // ------------------------------------------------------------





    public function confirm()
    {


        // 1: create-session
        Session::put('excludeLists', $this->instance->excludeLists);
        Session::put('allergyLists', $this->instance->allergyLists);


        $this->dispatch('syncExcludes');


    } // end function




    // ------------------------------------------------------------







    public function render()
    {

        return view('livewire.subscribe.customization.components.customization-excludes');

    } // end function


} // end class
