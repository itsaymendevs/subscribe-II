<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class VendorForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $phone, $email, $address;

    public $id;




} // end form
