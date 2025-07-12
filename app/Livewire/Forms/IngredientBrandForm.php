<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class IngredientBrandForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $brand, $ingredientId, $calories, $proteins, $carbs, $fats, $cholesterol, $sodium, $fiber, $sugar, $calcium, $iron, $vitaminA, $vitaminC;


    public $id, $ingredientType;



} // end form
