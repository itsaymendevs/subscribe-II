<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanBundleRangeForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $id, $isForWebsite, $planRangeId, $planBundleId;




   // :: helpers
   public $totalCalories, $totalPrice;


} // end form
