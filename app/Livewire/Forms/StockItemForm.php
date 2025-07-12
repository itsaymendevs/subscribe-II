<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StockItemForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $name, $imageFile;

    public $id, $charge, $desc, $imageFileName;





} // end form
