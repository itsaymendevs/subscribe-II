<?php

namespace App\Livewire\Subscribe;

use App\Traits\HelperTrait;
use Livewire\Component;

class Terms extends Component
{


    use HelperTrait;


    // :: variable
    public $terms;




    public function render()
    {


        // 1: terms
        $this->terms = [];

        return view('livewire.subscribe.terms');

    } // end function



} // end class
