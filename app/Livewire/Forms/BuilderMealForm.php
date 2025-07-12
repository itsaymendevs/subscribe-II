<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class BuilderMealForm extends Form
{


    // 1: ingredient - part
    public $type = [];






    // 1.2: general
    public $id = [], $partId = [], $partBrandId = [], $cookingTypeId = [], $partType = [], $amount = [], $percentage = [], $remarks = [], $groupToken = [], $isRemovable = [], $isDefault = [], $mealId = [], $mealSizeId = [];



    // 1.3: macros
    public $grams = [], $calories = [], $proteins = [], $carbs = [], $fats = [], $cost = [];
    public $afterCookGrams = [], $afterCookCalories = [], $afterCookProteins = [], $afterCookCarbs = [], $afterCookFats = [], $afterCookCost = [];



    // 1.4: forParts
    public $typeId = [];
    public $typeName = [];




    // 1.5: extra
    public $numberOfSizes, $isRemoved = [];





} // end form
