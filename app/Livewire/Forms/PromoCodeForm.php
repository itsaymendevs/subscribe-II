<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PromoCodeForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $name, $code, $limit;


   public $id, $percentage, $cashAmount, $isActive, $isForWebsite;


   // :: relation
   public $plans = [];



} // end form
