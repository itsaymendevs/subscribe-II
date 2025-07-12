<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;


class CityDeliveryTimeForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $cityId, $title, $deliveryFrom, $deliveryUntil;


    public $id, $isActive;



} // end form
