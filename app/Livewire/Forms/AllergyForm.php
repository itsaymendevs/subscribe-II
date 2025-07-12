<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AllergyForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $desc;

    public $id;



    // :: helpers
    public $ingredients = [];


} // end form
