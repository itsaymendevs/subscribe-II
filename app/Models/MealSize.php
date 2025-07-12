<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class MealSize extends Model
{
    use HasFactory;




    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function





    public function size()
    {

        return $this->belongsTo(Size::class, 'sizeId');

    } // end function





    // ------------------------------------------




    public function ingredients()
    {

        return $this->hasMany(MealIngredient::class, 'mealSizeId');

    } // end function




    public function parts()
    {

        return $this->hasMany(MealPart::class, 'mealSizeId');

    } // end function












    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // ---------------------------------------------------------





    public function totalGrams()
    {

        // :: root
        $totalGrams = 0;
        $parts = $this->parts()->get();
        $ingredients = $this->ingredients()->get();





        // 1: ingredients
        foreach ($ingredients?->where('isDefault', 1) ?? [] as $mealIngredient) {


            $totalGrams += $mealIngredient?->conversionAmount() ?? 0;

        } // end loop





        // 2: parts
        foreach ($parts?->where('isDefault', 1) ?? [] as $mealPart) {


            $totalGrams += $mealPart?->amount ?? 0;

        } // end loop







        return $totalGrams;




    } // end function









    // ----------------------------------------------------------
    // ----------------------------------------------------------








    public function ingredientsWithGrams()
    {


        // :: root
        $ingredientsWithGrams = [];
        $parts = $this->parts()->get();
        $ingredients = $this->ingredients()->get();





        // 1: ingredients
        foreach ($ingredients?->where('isDefault', 1) ?? [] as $mealIngredient) {


            $ingredientsWithGrams[$mealIngredient->ingredientId] = ($ingredientsWithGrams[$mealIngredient->ingredientId] ?? 0) + $mealIngredient?->conversionAmount() ?? 0;


        } // end loop








        // 2: parts
        foreach ($parts?->where('isDefault', 1) ?? [] as $mealPart) {



            // 2.1: recursive
            $partIngredientsWithGrams = $mealPart->ingredientsWithGrams($mealPart->amount);



            // 2.2: merge
            $ingredientsWithGrams = $ingredientsWithGrams + $partIngredientsWithGrams;



        } // end loop










        return $ingredientsWithGrams;




    } // end function








    // ----------------------------------------------------------
    // ----------------------------------------------------------








    public function contentWithGrams($numberOfMeals = 1)
    {


        // :: root
        $partsWithGrams = [];
        $parts = $this->parts()->get();

        $ingredientsWithGrams = [];
        $ingredientsWithGramsRaw = [];
        $ingredients = $this->ingredients()->get();







        // 1: ingredients
        foreach ($ingredients?->where('isDefault', 1) ?? [] as $mealIngredient) {


            $ingredientsWithGrams[$mealIngredient->ingredientId] = (($ingredientsWithGrams[$mealIngredient->ingredientId] ?? 0) + ($mealIngredient?->conversionAmount() ?? 0)) * $numberOfMeals;


            $ingredientsWithGramsRaw[$mealIngredient->ingredientId] = (($ingredientsWithGramsRaw[$mealIngredient->ingredientId] ?? 0) + ($mealIngredient?->amount ?? 0)) * $numberOfMeals;


        } // end loop








        // 2: parts
        foreach ($parts?->where('isDefault', 1) ?? [] as $mealPart) {


            $partsWithGrams[$mealPart->partId] = (($partsWithGrams[$mealPart->partId] ?? 0) + ($mealPart?->amount ?? 0)) * $numberOfMeals;


        } // end loop









        // 3: create instance
        $instance = new stdClass();

        $instance->partsWithGrams = $partsWithGrams;
        $instance->ingredientsWithGrams = $ingredientsWithGrams;
        $instance->ingredientsWithGramsRaw = $ingredientsWithGramsRaw;




        return $instance;




    } // end function









    // ----------------------------------------------------------
    // ----------------------------------------------------------







    public function costPrice()
    {



        // :: root
        $totalCost = 0;
        $parts = $this->parts()->get();
        $ingredients = $this->ingredients()->get();





        // 1: ingredients
        foreach ($ingredients?->where('isDefault', 1) ?? [] as $mealIngredient) {

            $totalCost += ($mealIngredient?->ingredient?->latestPricePerGram() * ($mealIngredient?->amount ?? 0));

        } // end loop








        // 1.2: parts
        foreach ($parts?->where('isDefault', 1) ?? [] as $mealPart) {

            $totalMacros = $mealPart?->totalMacro($mealPart?->amount ?? 0);
            $totalCost += doubleval($totalMacros?->cost ?? 0);

        } // end loop








        // 1.2: container - lid - label
        $totalCost += $this->meal?->container?->charge ?? 0;
        $totalCost += $this->meal?->container?->lidCharge ?? 0;
        $totalCost += $this->meal?->label?->charge ?? 0;




        // 1.3: cutleryPrice



        return $totalCost;


    } // end function











    // ----------------------------------------------------------
    // ----------------------------------------------------------







    public function costPriceDetails()
    {



        // :: root
        $combine = new stdClass();
        $parts = $this->parts()->get();
        $ingredients = $this->ingredients()->get();





        // 1: ingredients
        $combine->foodCost = 0;

        foreach ($ingredients?->where('isDefault', 1) ?? [] as $mealIngredient) {

            $combine->foodCost += ($mealIngredient?->ingredient?->latestPricePerGram() * ($mealIngredient?->amount ?? 0));

        } // end loop






        // 1.2: parts
        foreach ($parts?->where('isDefault', 1) ?? [] as $mealPart) {

            $totalMacros = $mealPart?->totalMacro($mealPart?->amount ?? 0);
            $combine->foodCost += doubleval($totalMacros?->cost ?? 0);

        } // end loop








        // --------------------------------------------
        // --------------------------------------------





        // 2: container - lid - label
        $combine->margin = 0;
        $combine->operationCost = 0;
        $combine->lidCost = $this->meal?->container?->lidCharge ?? 0;
        $combine->labelCost = $this->meal?->label?->charge ?? 0;
        $combine->containerCost = $this->meal?->container?->charge ?? 0;






        // 2: totalCost
        $combine->totalCost = $combine->foodCost + $combine->lidCost + $combine->labelCost + $combine->containerCost + $combine->operationCost;





        return $combine;


    } // end function







} // end model
