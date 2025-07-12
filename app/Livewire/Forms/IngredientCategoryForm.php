<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class IngredientCategoryForm extends Form
{
   // :: variables
   #[Validate('required')]
   public $name, $desc;


   public $id;



} // end form
