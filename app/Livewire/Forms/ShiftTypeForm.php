<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ShiftTypeForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $shiftFrom, $shiftUntil;


    public $id;

} // end form
