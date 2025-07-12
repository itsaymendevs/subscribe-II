<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMeal extends Model
{
    use HasFactory;



    public function meal()
    {

        return $this->belongsTo(Meal::class, 'mealId');

    } // end function






    public function mealSize()
    {

        return $this->belongsTo(related: MealSize::class, foreignKey: 'mealSizeId');

    } // end function








    public function order()
    {

        return $this->belongsTo(Order::class, 'orderId');

    } // end function











    public function size()
    {

        return $this->belongsTo(related: Size::class, foreignKey: 'sizeId');

    } // end function






    public function removableParts()
    {

        return $this->hasMany(related: OrderMealRemovablePart::class, foreignKey: 'orderMealId');

    } // end function





    public function removablePartsInArray()
    {


        // 1: removables
        $removables = $this->removableParts()?->get()?->pluck('partId')?->toArray() ?? [];

        return $removables;

    } // end function







    // -------------------------------------------------------------
    // -------------------------------------------------------------





    public function removableIngredients()
    {

        return $this->hasMany(related: OrderMealRemovableIngredient::class, foreignKey: 'orderMealId');

    } // end function






    public function removableIngredientsInArray()
    {


        // 1: removables
        $removables = $this->removableIngredients()?->get()?->pluck('ingredientId')?->toArray() ?? [];

        return $removables;

    } // end function






} // end model


