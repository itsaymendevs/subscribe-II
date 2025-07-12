<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class KitchenContainerForm extends Form
{



    // :: variables
    #[Validate('required')]
    public $name, $charge;

    public $id, $imageFile, $imageFileName;





} // end form
