<?php

namespace App\Livewire\Subscribe;

use App\Models\WebsiteSetting;
use Livewire\Component;

class RefundPolicy extends Component
{


    public $websiteSettings;


    public function mount()
    {


        // 1: get instance
        $this->websiteSettings = WebsiteSetting::first();



    } // end function




    // -----------------------------------------------------------------




    public function render()
    {


        return view('livewire.subscribe.refund-policy');

    } // end function




} // end class
