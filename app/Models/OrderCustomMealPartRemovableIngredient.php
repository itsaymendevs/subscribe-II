<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCustomMealPartRemovableIngredient extends Model
{
    use HasFactory;


    public function ingredient()
    {

        return $this->belongsTo(related: Ingredient::class, foreignKey: 'ingredientId');

    } // end function






    public function mealPart()
    {

        return $this->belongsTo(related: OrderCustomMealPart::class, foreignKey: 'orderCustomMealPartId');

    } // end function






} // end model
