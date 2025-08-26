<?php

namespace App\Livewire\Subscribe\Components;

use App\Models\SubscribeCustomization;
use Livewire\Component;

class Colors extends Component
{


    public $colorButtonText, $colorBodyText, $colorBodyTextDim, $colorLayoutText, $colorLayoutTextDim;




    public function mount()
    {


        // 1: customization
        $customization = SubscribeCustomization::first();


        if ($customization->colorBodyText == 'Dark') {

            $this->colorBodyText = "#111";
            $this->colorBodyTextDim = "#454545";

        } else {

            $this->colorBodyText = "#fff";
            $this->colorBodyTextDim = "#dbdbdb";

        } // end if




        if ($customization->colorLayoutText == 'Dark') {

            $this->colorLayoutText = "#111";
            $this->colorLayoutTextDim = "#454545";

        } else {

            $this->colorLayoutText = "#fff";
            $this->colorLayoutTextDim = "#dbdbdb";

        } // end if



        if ($customization->colorButtonText == 'Dark') {

            $this->colorButtonText = "#111";

        } else {

            $this->colorButtonText = "#fff";

        } // end if






    } // end function




    // ---------------------------------------------------------





    public function render()
    {

        return view('livewire.subscribe.components.colors');

    } // end function


} // end class
