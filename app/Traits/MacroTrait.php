<?php

namespace App\Traits;

use App\Models\ConversionIngredient;
use App\Models\Meal;
use stdClass;

trait MacroTrait
{





    public function getMacro($part, $currentAmount, $brandId = null, $isRecursion = false, $totalGrams = 0, $totalCalories = 0, $totalProteins = 0, $totalCarbs = 0, $totalFats = 0, $totalCost = 0)
    {




        // 1: check part-ingredients
        foreach ($part?->ingredients?->where('isDefault', 1) ?? [] as $partIngredient) {



            // 1.2: conversionValue
            $conversionValue = ConversionIngredient::where('ingredientId', $partIngredient?->ingredientId)
                ->where('cookingTypeId', $partIngredient?->cookingTypeId)?->first()?->conversionValue ?? 1;





            // 1.3: getMacro
            $totalSubMacros = $partIngredient?->totalMacro($partIngredient->amount, $brandId, conversionValue: $conversionValue);



            // ** note: before processing this step the value is coming correct
            // ** which is again doing the same / * on this value

            if ($conversionValue == 1) {

                $totalCalories += ($totalSubMacros->calories / $part->totalGrams()) * $currentAmount;
                $totalProteins += ($totalSubMacros->proteins / $part->totalGrams()) * $currentAmount;
                $totalCarbs += ($totalSubMacros->carbs / $part->totalGrams()) * $currentAmount;
                $totalFats += ($totalSubMacros->fats / $part->totalGrams()) * $currentAmount;
                $totalCost += ($totalSubMacros->cost / $part->totalGrams()) * $currentAmount;


            } else {


                $totalCalories += ($totalSubMacros->calories / $part->totalAfterCookGrams()) * $currentAmount;
                $totalProteins += ($totalSubMacros->proteins / $part->totalAfterCookGrams()) * $currentAmount;
                $totalCarbs += ($totalSubMacros->carbs / $part->totalAfterCookGrams()) * $currentAmount;
                $totalFats += ($totalSubMacros->fats / $part->totalAfterCookGrams()) * $currentAmount;
                $totalCost += ($totalSubMacros->cost / $part->totalAfterCookGrams()) * $currentAmount;


            } // end if







        } // end loop









        // --------------------------------------------------
        // --------------------------------------------------








        // 1.2: check part-otherParts => send original-part
        foreach ($part?->parts?->where('isDefault', 1) ?? [] as $mealPart) {



            // 1: getMacro - recursion
            $partMacro = $this->getMacro($mealPart->part, $currentAmount, null, true);



            // 2: appendToTotal
            $totalCalories += round($partMacro[1] ?? 0, 2);
            $totalProteins += round($partMacro[2] ?? 0, 2);
            $totalCarbs += round($partMacro[3] ?? 0, 2);
            $totalFats += round($partMacro[4] ?? 0, 2);
            $totalCost += round($partMacro[5] ?? 0, 2);




        } // end loop













        return [$totalGrams, $totalCalories, $totalProteins, $totalCarbs, $totalFats, $totalCost];



    } // end function












    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------
    // ---------------------------------------------------------------------










    public function getIngredientsWithGrams($part, $currentAmount, $ingredientsWithGrams, $isRecursion = false)
    {




        // 1: check part-ingredients
        foreach ($part->ingredients?->whereNotNull('ingredientId')?->where('isDefault', 1) ?? [] as $partIngredient) {


            // 1.2: getGrams
            $ingredientsWithGrams[$partIngredient->ingredientId] = ($ingredientsWithGrams[$partIngredient->ingredientId] ?? 0) + ($partIngredient->amount / $part->totalGrams()) * $currentAmount;





        } // end loop









        // --------------------------------------------------
        // --------------------------------------------------








        // 1.2: check part-otherParts => send original-part
        foreach ($part?->parts?->whereNotNull('partId')?->where('isDefault', 1) ?? [] as $mealPart) {



            // 1.3: MacroHelper - recursion
            $partIngredientsWithGrams = $this->getIngredientsWithGrams($mealPart->part, $currentAmount, $ingredientsWithGrams, true);



            // 1.4: merge
            $ingredientsWithGrams = $ingredientsWithGrams + $partIngredientsWithGrams;




        } // end loop













        return $ingredientsWithGrams;



    } // end function








} // end trait
