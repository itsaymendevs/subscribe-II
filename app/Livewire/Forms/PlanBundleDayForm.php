<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanBundleDayForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $planBundleId, $days, $discount;


   public $id;




} // end form




