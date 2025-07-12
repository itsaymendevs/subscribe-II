<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ServingItemForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $cutleryPrice;


    public $id;

} // end form
