<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DietForm extends Form
{


   // :: variables
   #[Validate('required')]
   public $name, $desc, $proteins, $carbs, $fats;


   public $id;




} // end form

