<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanRangeForm extends Form
{


   // :: variables
   #[Validate('required')]
   public $name, $caloriesRange, $desc, $planId;

   public $id, $isForWebsite;



   // :: helper
   public $planName;


} // end form
