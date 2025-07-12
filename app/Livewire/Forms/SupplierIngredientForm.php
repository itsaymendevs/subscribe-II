<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class SupplierIngredientForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $supplierId, $ingredientId, $sellPrice, $unitId;

   public $id;



   // :: helpers
   public $unitName;


} // end form
