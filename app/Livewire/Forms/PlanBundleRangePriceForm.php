<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanBundleRangePriceForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $id, $pricePerDay;


   public $planRangeId, $planBundleId;



} // end form
