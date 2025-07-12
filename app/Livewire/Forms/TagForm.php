<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class TagForm extends Form
{

   // :: variables
   #[Validate('required')]
   public $name, $imageFile;

   public $id;


   // :: helpers
   public $imageFileName;




} // end form
