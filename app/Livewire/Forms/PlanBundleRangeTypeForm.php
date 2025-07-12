<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanBundleRangeTypeForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $id, $mealTypeId, $planBundleRangeId, $price, $calories;


   public $sizeId;




   // :: helper
   public $mealTypeName;

} // end form

