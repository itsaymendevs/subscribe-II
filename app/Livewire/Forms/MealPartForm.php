<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MealPartForm extends Form
{


    // :: variables
    #[Validate('required')]
    public $id = [], $typeId = [], $partId = [], $mealId = [];


    public $partType = [];
    public $cookingTypeId = [];



} // end form
