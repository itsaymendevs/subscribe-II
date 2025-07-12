<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $name, $phone, $email, $roleId;



    public $id, $imageFile, $password;



    // :: helpers
    public $imageFileName;

} // end form
