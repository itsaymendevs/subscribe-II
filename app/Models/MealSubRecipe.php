<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealSubRecipe extends Model
{
    use HasFactory;
    use MacroTrait;


    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function



    public function subRecipe()
    {

        return $this->belongsTo(Meal::class, 'subRecipeId');

    } // end function










    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($currentAmount = 0)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: subRecipe (Meal)
        $subRecipe = $this->subRecipe()->first();
        $amount = $currentAmount; // currentAmount - upToDateAmount




        // 1.2: MacroHelper - getMacro - RECURSION
        $subRecipeMacros = $subRecipe ? $this->getMacro($subRecipe->id, $subRecipe->type, null, false, $amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats) : [];









        // :: create instance - amountUsedOutside because its not applied in getMacros initial
        $totalMacros = new stdClass();


        $totalMacros->calories = round($subRecipeMacros[0], 2) ?? 0;
        $totalMacros->proteins = round($subRecipeMacros[1], 2) ?? 0;
        $totalMacros->carbs = round($subRecipeMacros[2], 2) ?? 0;
        $totalMacros->fats = round($subRecipeMacros[3], 2) ?? 0;



        return $totalMacros;


    } // end function








} // end model



