<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PlanBundleForm extends Form
{


   // :: variables
   #[Validate('required')]
   public $name, $planId;


   #[Validate('required')]
   public $mealTypes = [];


   public $id, $remarks, $imageFile;


   // :: helper
   public $imageFileName;




} // end form
