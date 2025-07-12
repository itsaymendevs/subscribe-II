<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BagForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $name, $imageFile, $price;

    public $id;




    // :: helpers
    public $imageFileName;




} // end form
