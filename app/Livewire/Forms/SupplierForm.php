<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SupplierForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $phone, $email, $address;

    public $id;




    // :: relations
    public $categories = [];



} // end form
