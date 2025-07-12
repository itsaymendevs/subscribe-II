<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ConversionForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name;
    public $id;



    // :: ingredients
    public $ingredients = [];




} // end form
