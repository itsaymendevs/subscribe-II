<?php

namespace App\Models;

use App\Traits\MacroTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealPart extends Model
{

    use HasFactory;
    use MacroTrait;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function




    public function part()
    {

        return $this->belongsTo(Meal::class, 'partId');

    } // end function





    public function type()
    {

        return $this->belongsTo(Type::class, 'typeId');

    } // end function







    public function mealSize()
    {

        return $this->belongsTo(MealSize::class, 'mealSizeId');

    } // end function







    // ------------------------------------------
    // ------------------------------------------
    // ------------------------------------------











    public function totalMacro($currentAmount = 0, $brandId = null, $partId = null)
    {


        // :: root
        $totalGrams = $totalCalories = $totalProteins = $totalCarbs = $totalFats = 0;





        // 1: getPart
        $part = $partId ? Meal::find($partId) : $this->part()->first();




        // 1.2: MacroHelper
        $partMacro = $part ? $this->getMacro($part, $currentAmount, $brandId) : [];








        // :: create instance
        $totalMacros = new stdClass();

        $totalMacros->calories = round($partMacro[1] ?? 0, 2);
        $totalMacros->proteins = round($partMacro[2] ?? 0, 2);
        $totalMacros->carbs = round($partMacro[3] ?? 0, 2);
        $totalMacros->fats = round($partMacro[4] ?? 0, 2);
        $totalMacros->cost = round($partMacro[5] ?? 0, 2);





        return $totalMacros;


    } // end function







    // ------------------------------------------
    // ------------------------------------------












    public function ingredientsWithGrams($currentAmount = 0)
    {


        // :: root
        $ingredientsWithGrams = [];





        // 1: getPart
        $part = $this->part()->first();




        // 1.2: MacroHelper
        $ingredientsWithGrams = $part ? $this->getIngredientsWithGrams($part, $currentAmount, $ingredientsWithGrams) : [];






        return $ingredientsWithGrams;


    } // end function








} // end model
