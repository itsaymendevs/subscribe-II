<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;


    public function macros()
    {

        return $this->hasMany(IngredientMacro::class, 'ingredientId');

    } // end function







    public function suppliers()
    {

        return $this->hasMany(SupplierIngredient::class, 'ingredientId');

    } // end function






    public function group()
    {

        return $this->belongsTo(IngredientGroup::class, 'groupId');

    } // end function







    public function category()
    {

        return $this->belongsTo(IngredientCategory::class, 'categoryId');

    } // end function








    public function unit()
    {

        return $this->belongsTo(Unit::class, 'unitId');

    } // end function







    public function purchaseUnit()
    {

        return $this->belongsTo(Unit::class, 'purchaseUnitId', 'id');

    } // end function








    public function excludes()
    {

        return $this->hasMany(ExcludeIngredient::class, 'ingredientId', 'id');

    } // end function









    public function conversionValues()
    {

        return $this->hasMany(ConversionIngredient::class, 'ingredientId', 'id');

    } // end function






    public function conversionValue()
    {



        // 1: getConversion
        $conversionValue = $this->conversionValues()?->first()?->conversionValue ?? 1;


        return $conversionValue;



    } // end function






    public function allergies()
    {

        return $this->hasMany(AllergyIngredient::class, 'ingredientId', 'id');

    } // end function









    public function freshMacro($brandId = null)
    {


        // 1: brandOrDefault
        if ($brandId) {

            return $this->macros?->where('id', $brandId)->first();

        } else {

            return $this->macros?->where('brand', 'Regular')->first();

        } // end if


    } // end function








    public function meals()
    {

        return $this->hasMany(MealIngredient::class, 'ingredientId');


    } // end function








    public function stocks()
    {

        return $this->hasMany(Stock::class, 'ingredientId');


    } // end function








    // -------------------------------------------------
    // -------------------------------------------------
    // -------------------------------------------------
    // -------------------------------------------------







    public function excludesInArray()
    {


        // 1: getExcludes
        $excludes = $this->excludes()?->get()?->pluck('excludeId')?->toArray() ?? [];

        return $excludes;


    } // end function







    public function allergiesInArray()
    {


        // 1: getAllergies
        $allergies = $this->allergies()?->get()?->pluck('allergyId')?->toArray() ?? [];

        return $allergies;


    } // end function










    public function getWastage()
    {


        // 1: getWastage
        return doubleval(($this->wastage ?? 0) / 100);




    } // end function









    public function availableQuantity()
    {



        // 1: get stocks
        $totalQuantity = $this->stocks()->sum('availableQuantity');

        return $totalQuantity ?? 0;



    } // end function







    // -------------------------------------------------






    public function latestPrice()
    {



        // 1: get stocks
        $latestPrice = $this->stocks()?->orderBy('created_at', 'desc')?->first()?->buyPrice;

        return $latestPrice ?? 0;




    } // end function









    // -------------------------------------------------






    public function latestPricePerGram()
    {



        // 1: get stocks
        $latestPrice = $this->stocks()?->orderBy('created_at', 'desc')?->first()?->buyPrice;

        return $latestPrice ? doubleval($latestPrice) / 1000 : 0;




    } // end function






} // end function
