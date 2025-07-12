<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class IngredientGroupForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $name, $desc;

   public $id;



} // end form
