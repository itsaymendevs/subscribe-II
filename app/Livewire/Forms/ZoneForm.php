<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ZoneForm extends Form
{
   // :: variables
   public $id, $name, $desc, $cityId, $imageFile;



   // :: helper
   public $imageFileName;


   // :: relation
   public $cityDistricts = [];


} // end form
