<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealSauce extends Model
{
    use HasFactory;
    use MacroTrait;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function sauce()
    {

        return $this->belongsTo(Meal::class, 'sauceId');

    } // end function








    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------








    public function totalMacro($currentAmount = 0)
    {

        // :: root
        $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: sauce (Meal)
        $sauce = $this->sauce()->first();
        $amount = $currentAmount; // currentAmount - upToDateAmount


        // 1.2: MacroHelper - getMacro - RECURSION
        $sauceMacros = $sauce ? $this->getMacro($sauce->id, $sauce->type, null, false, $amount, $sauce->$totalCalories, $totalProteins, $totalCarbs, $totalFats) : [];







        // :: create instance - amountUsedOutside because its not applied in getMacros initial
        $totalMacros = new stdClass();


        $totalMacros->calories = round($sauceMacros[0], 2) ?? 0;
        $totalMacros->proteins = round($sauceMacros[1], 2) ?? 0;
        $totalMacros->carbs = round($sauceMacros[2], 2) ?? 0;
        $totalMacros->fats = round($sauceMacros[3], 2) ?? 0;


        return $totalMacros;


    } // end function






} // end model
