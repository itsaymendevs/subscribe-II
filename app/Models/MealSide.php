<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealSide extends Model
{
    use HasFactory;
    use MacroTrait;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function



    public function side()
    {

        return $this->belongsTo(Meal::class, 'sideId');

    } // end function







    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($currentAmount = 0)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: side (Meal)
        $side = $this->side()->first();
        $amount = $currentAmount; // currentAmount - upToDateAmount



        // 1.2: MacroHelper - getMacro - RECURSION
        $sideMacros = $side ? $this->getMacro($side->id, $side->type, null, false, $amount, $totalCalories, $totalProteins, $totalCarbs, $totalFats) : [];








        // :: create instance - amountUsedOutside because its not applied in getMacros initial
        $totalMacros = new stdClass();



        $totalMacros->calories = round($sideMacros[0], 2) ?? 0;
        $totalMacros->proteins = round($sideMacros[1], 2) ?? 0;
        $totalMacros->carbs = round($sideMacros[2], 2) ?? 0;
        $totalMacros->fats = round($sideMacros[3], 2) ?? 0;



        return $totalMacros;


    } // end function





} // end model



