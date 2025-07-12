<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMealRemovableIngredient extends Model
{
    use HasFactory;


    public function ingredient()
    {

        return $this->belongsTo(related: Ingredient::class, foreignKey: 'ingredientId');

    } // end function




} // end model
