<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class MealPartDetailForm extends Form
{

    // :: variables
    #[Validate('required')]
    public $id, $typeId, $partId, $cookingTypeId, $mealId, $amount, $partType;



    public $remarks, $calories, $afterCookCalories, $proteins, $afterCookProteins, $carbs, $cost, $afterCookCarbs, $fats, $afterCookFats, $grams, $afterCookGrams, $isRemovable, $isDefault, $groupToken, $mealSizeId;





} // end form
