<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MealPackingForm extends Form
{
   // :: variables
   #[Validate('required')]
   public $name, $amount, $mealId;

   public $id, $remarks;



} // end form

