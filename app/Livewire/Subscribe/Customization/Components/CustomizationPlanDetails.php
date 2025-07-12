<?php

namespace App\Livewire\Subscribe\Customization\Components;

use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomizationPlanDetails extends Component
{


    // :: variables
    public $plan;



    #[On('planDetails')]
    public function planDetails($id)
    {

        // 1: getPlan
        $this->plan = Plan::find($id);


    } // end function





    // ------------------------------------------------------------------





    public function render()
    {

        return view('livewire.subscribe.customization.components.customization-plan-details');

    } // end function



} // end class
