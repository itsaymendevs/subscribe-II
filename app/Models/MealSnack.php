<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealSnack extends Model
{
    use HasFactory;
    use MacroTrait;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function snack()
    {

        return $this->belongsTo(Meal::class, 'snackId');

    } // end function









    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($currentAmount = 0)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: snack (Meal)
        $snack = $this->snack()->first();
        $amount = $currentAmount; // currentAmount - upToDateAmount



        // 1.2: MacroHelper - getMacro - RECURSION
        $snackMacros = $snack ? $this->getMacro($snack->id, $snack->type, null, false, $amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats) : [];








        // :: create instance - amountUsedOutside because its not applied in getMacros initial
        $totalMacros = new stdClass();


        $totalMacros->calories = round($snackMacros[0], 2) ?? 0;
        $totalMacros->proteins = round($snackMacros[1], 2) ?? 0;
        $totalMacros->carbs = round($snackMacros[2], 2) ?? 0;
        $totalMacros->fats = round($snackMacros[3], 2) ?? 0;


        return $totalMacros;


    } // end function








} // end model
