<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MenuCalendarForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $name, $desc;

   public $id, $imageFile;




   // :: helpers
   public $imageFileName;



   // :: relations
   public $diets = [], $plans = [];



} // end form

