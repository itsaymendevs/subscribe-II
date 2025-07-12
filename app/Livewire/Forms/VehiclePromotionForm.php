<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VehiclePromotionForm extends Form
{

    #[Validate('required')]
    public $promotionURL, $width, $vehicleId;



    public $id, $height;



} // end form
