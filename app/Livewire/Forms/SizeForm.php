<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SizeForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $name, $shortName, $price, $calories;


   public $id;


} // end form
