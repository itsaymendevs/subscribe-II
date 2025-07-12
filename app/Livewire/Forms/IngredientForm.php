<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class IngredientForm extends Form
{


   // :: variables
   public $id, $name, $desc, $usage, $referenceID, $increment, $decrement, $wastage, $unitId, $purchaseUnitId, $imageFile, $categoryId, $groupId, $excludeId, $allergyId;




   // :: helpers
   public $imageFileName;


} // end form
