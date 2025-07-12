<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CuisineForm extends Form
{


   // :: variables
   #[Validate('required')]
   public $name;

   public $id;


} // end form
