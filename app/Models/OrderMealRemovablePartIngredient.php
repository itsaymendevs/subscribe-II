<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMealRemovablePartIngredient extends Model
{
    use HasFactory;


    public function ingredient()
    {

        return $this->belongsTo(related: Ingredient::class, foreignKey: 'ingredientId');

    } // end function



    public function part()
    {

        return $this->belongsTo(related: Meal::class, foreignKey: 'partId');

    } // end function




} // end model
