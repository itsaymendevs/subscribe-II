<?php

namespace App\Traits;
use App\Models\Conversion;
use App\Models\ConversionIngredient;
use App\Models\Ingredient;
use App\Models\IngredientMacro;
use App\Models\Profile;
use Illuminate\Support\Facades\Http;


trait SyncTrait
{



    protected function makeVerificationRequest($requestURL, $instance = [])
    {




        // 1: URL - token
        $profile = Profile::first();
        $requestURL = "{$profile->centralURL}/api/{$requestURL}";


        // 2: sendRequest
        $response = Http::post($requestURL, [
            'instance' => $instance,
        ])->json();





        // 3: convertToObject
        $response = json_decode(json_encode($response));

        return $response;


    } // end function










    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------












    protected function makeSyncRequest($requestURL, $instance = [])
    {




        // 1: URL - token
        $profile = Profile::first();
        $requestURL = "{$profile->centralURL}/api/{$requestURL}";



        // 2: sendRequest
        $response = Http::post($requestURL, [
            'instance' => $instance,
        ])->json();





        // 3: convertToObject
        $response = json_decode(json_encode($response));

        return $response;


    } // end function










    // --------------------------------------------------------------
    // --------------------------------------------------------------
    // --------------------------------------------------------------










    public function syncInventory()
    {



        // 1: makeRequest
        $response = $this->makeSyncRequest('sync/inventory');




        // 1.2: ingredients
        foreach ($response->ingredients ?? [] as $key => $ingredient) {



            // 1.3: checkExisting
            $local = Ingredient::find($ingredient->id);

            ! $local ? $local = new Ingredient() : null;



            // 1.4: general
            $local->id = $ingredient->id;
            $local->name = $ingredient->name;
            $local->desc = $ingredient->desc;
            $local->usage = $ingredient->usage;
            $local->referenceID = $ingredient->referenceID;

            $local->increment = $ingredient->increment;
            $local->decrement = $ingredient->decrement;
            $local->wastage = $ingredient->wastage;




            // 1.5: imageFile
            $local->imageFile = $ingredient->imageFile ?? null;



            // 1.6: units
            $local->unitId = $ingredient->unitId;
            $local->purchaseUnitId = $ingredient->purchaseUnitId;


            $local->save();






        } // end loop







        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------------------------------------






        // 2: macros
        foreach ($response->ingredientsMacro ?? [] as $key => $ingredientMacro) {





            // 2.1: checkMacro
            $localMacro = IngredientMacro::where('ingredientId', $ingredientMacro->ingredientId)
                ->where('brand', $ingredientMacro->brand)
                ->where('ingredientType', $ingredientMacro->ingredientType)
                ->first();



            ! $localMacro ? $localMacro = new IngredientMacro() : null;





            // 2.2: general
            $localMacro->id = $ingredientMacro->id;
            $localMacro->brand = $ingredientMacro->brand;
            $localMacro->ingredientType = $ingredientMacro->ingredientType;





            // 2.3: macros
            $localMacro->calories = $ingredientMacro->calories;
            $localMacro->proteins = $ingredientMacro->proteins;
            $localMacro->carbs = $ingredientMacro->carbs;
            $localMacro->fats = $ingredientMacro->fats;
            $localMacro->cholesterol = $ingredientMacro->cholesterol;
            $localMacro->sodium = $ingredientMacro->sodium;
            $localMacro->fiber = $ingredientMacro->fiber;
            $localMacro->sugar = $ingredientMacro->sugar;
            $localMacro->calcium = $ingredientMacro->calcium;
            $localMacro->iron = $ingredientMacro->iron;
            $localMacro->vitaminA = $ingredientMacro->vitaminA;
            $localMacro->vitaminC = $ingredientMacro->vitaminC;



            // 2.4: ingredient
            $localMacro->ingredientId = $ingredientMacro->ingredientId;

            $localMacro->save();




        } // end loop






        // 2.5: removeSync
        Ingredient::whereNotIn('id', collect($response->ingredients)?->pluck('id')?->toArray())?->delete();











        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------------------------------------








        // 3: conversions
        foreach ($response->conversions ?? [] as $key => $conversion) {



            // 3.1: checkExisting
            $local = Conversion::find($conversion->id);

            ! $local ? $local = new Conversion() : null;



            // 3.2: general
            $local->id = $conversion->id;
            $local->name = $conversion->name;
            $local->save();



            $local->save();



        } // end loop








        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------------------------------------









        // 4: conversionIngredients
        foreach ($response->conversionIngredients ?? [] as $key => $conversionIngredient) {



            // 3.1: checkExisting
            $local = ConversionIngredient::find($conversionIngredient->id);

            ! $local ? $local = new ConversionIngredient() : null;




            // 3.2: general
            $local->groupToken = $conversionIngredient->groupToken;
            $local->ingredientId = $conversionIngredient->ingredientId;
            $local->conversionId = $conversionIngredient->conversionId;
            $local->conversionValue = $conversionIngredient->conversionValue;
            $local->cookingTypeId = $conversionIngredient->cookingTypeId;

            $local->save();




        } // end loop







        // 4.5: removeSync
        Conversion::whereNotIn('id', collect($response->conversions)?->pluck('id')?->toArray())?->delete();







    } // end function








} // end trait
