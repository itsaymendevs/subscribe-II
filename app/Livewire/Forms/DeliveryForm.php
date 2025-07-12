<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DeliveryForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $status, $bags;


    public $id, $remarks, $cashOnDelivery, $imageFile;


    // :: helpers
    public $imageFileName;


} // end form
